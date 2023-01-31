<?php

namespace App\Http\Controllers\Auth;

use App\Models\Otp;
use App\Models\User;
use App\Mail\PasswordReset;
use Illuminate\Support\Str;
use App\Jobs\VerifyEmailJob;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\PasswordChanged;
use App\Notifications\UserIntroduction;
use App\Notifications\LoginNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function index()
    {
        return User::get(['name', 'username', 'phone', 'id', 'avatar', 'email']);
    }
    public function show(User $user)
    {
        return  new UserResource($user);
    }

    public function register(Request $request)
    {

        try {
            return  DB::transaction(function () use ($request) {
                $validator = Validator::make(request()->all(), [
                    'email' => 'required|email:rfc,dns|unique:users,email',
                    'password' => [
                        'required',
                        Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()
                            ->uncompromised()
                    ],

                    'firstName' => 'required|min:2',
                    'lastName' => 'required|min:2',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'errors' => $validator->errors(),

                    ], 422);
                }
                $info = $request->all();
                $info['password'] = Hash::make($request->password);


                $user = User::create($info);
                $credentials = [
                    'email' => $request->email,
                    'password' => $request->password
                ];
                if ($request->is_admin && $request->has('is_admin')  && $request->filled('is_admin')) {
                    $token = $user->createToken('user-token', ['role-admin'])->plainTextToken;
                } else {
                    $token = $user->createToken('user-token', ['role-client'])->plainTextToken;
                }

                $data = [
                    'email' => $user->email,
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,

                ];


                $code = Str::random(40);


                // send email verification email
                DB::table('password_resets')->insert(
                    ['email' => $request->email, 'token' => $code, 'created_at' => Carbon::now()]
                );
                $detail = [
                    'email' => $user->email,
                    'url' => 'https://firstroom.co.uk/verify-email?token=' . $code . '&new_user=' . $user->email
                ];



                if ($request->has('referral') && $request->filled('referral') && !is_null($request->referral)) {
                    $referral = new Referral();
                    $referringUser = User::where('referral', $request->referral)->first();
                    $referral->user_id = $referringUser->id;
                    $referral->invited_user_id = $user->id;
                    $referral->save();
                    $referringUser->notify(new NewReferral($user));
                }


                //send welcome email
                dispatch(new \App\Jobs\WelcomeEmailJob($data))->afterResponse();
                dispatch(new \App\Jobs\VerifyEmailJob($detail))->afterResponse();


                return response([
                    'status' => true,
                    'message' => 'creation successful',
                    'token' => $token,
                    'user' => new UserResource($user)
                ], 201);
            });
        } catch (\Throwable $th) {
            return $th;
            return response([
                'status' => false,
                'message' => 'Registration failed',

            ], 500);
        }
    }
    public function login(Request $request)
    {
        try {

            $validator = Validator::make(request()->all(), [
                'email' => 'required|email|exists:users',
                'password' => 'required|min:6',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),

                ], 422);
            }
            $check = Auth::attempt($validator->validated());
            if (!$check) {
                return response([
                    'status' => false,
                    'message' => 'Invalid credentials'
                ], 422);
            }
            $user = User::where('email', $request['email'])->first();
            if ($user->is_admin) {
                $token = $user->createToken('user-token', ['role-admin'])->plainTextToken;
            } else {
                $token = $user->createToken('user-token', ['role-client'])->plainTextToken;
            }
            $data =  $user;
            $user->notify(new LoginNotification(['device' => $request->header('User-Agent')]));
            return response([
                'status' => true,
                'message' => 'login successful',
                'token' => $token,
                'user' => new UserResource($user)
            ], 200);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'login failed',

            ], 500);
        }
    }

    public function forgotpassword(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);

            $token = Str::random(40);

            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );


            $credentials = $request->only(["email"]);
            $user = User::where('email', $credentials['email'])->first();
            if (!$user) {
                $responseMessage = "Email not found";

                return response()->json([
                    "success" => false,
                    "message" => $responseMessage,

                ], 422);
            }
            $details = [
                'title' => 'FirstRoom Password Reset',
                'url' => 'http://localhost:8000/?token=' . $token . '&action=password_reset'
            ];

            Mail::to($credentials['email'])->send(new PasswordReset($details));
            return response()->json([
                "success" => true,
                "message" => 'email sent',
            ], 200);
        } catch (Throwable $th) {
            return response([
                'status' => false,
                'message' => 'failed'
            ], 500);
        }
    }
    public function resetpassword(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [

                'token' => 'required',
                'password' => 'required|confirmed|min:6',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),

                ], 422);
            }

            $updatePassword = DB::table('password_resets')
                ->where(['token' => $request->token])
                ->first();

            if (!$updatePassword) {
                return response()->json([
                    "success" => false,
                    "message" => 'Invalid request'

                ], 500);
            }

            $oldpassword = User::where('email', $updatePassword->email)->first()->password;
            $checkpassword = Hash::check($request->password, $oldpassword);
            if ($checkpassword) {
                return response()->json([
                    "success" => false,
                    "message" => 'match old password'

                ], 422);
            }

            $user = User::where('email', $updatePassword->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();

            DB::table('password_resets')->where(['token' => $request->token])->delete();

            $user->notify(new PasswordChanged());
            $this->logout($user);
            return response()->json([
                "success" => true,
                "message" => 'Your password has been changed'

            ], 200);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'failed'
            ], 500);
        }
    }
    public function changepassword(Request $request)
    {

        $user = auth("sanctum")->user();
 
        try {
            $validator = Validator::make($request->all(), [

                'oldPassword' => 'required|min:6',
                'newPassword' => 'required|confirmed|min:6',


            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),

                ], 422);
            }



            $checkpassword = Hash::check($request->oldPassword, $user->password);
            if (!$checkpassword) {
                return response()->json([
                    "success" => false,
                    "message" => 'invalid old password'

                ], 422);
            }

            $user->password = Hash::make($request->newPassword);
            $user->save();

            $user->notify(new PasswordChanged());
           
            return response()->json([
                "success" => true,
                "message" => 'Your password has been changed'

            ], 200);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'failed'
            ], 500);
        }
    }
    public function requestotp(Request $request)
    {

        try {
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);

            $user =  User::where('email', $request->email)->first();

            if (is_null($user)) {

                return response([
                    'status' => false,
                    'message' => 'Email not found'
                ], 422);
            }
            $code = mt_rand(100000, 999999);

            $otp = Otp::updateOrCreate(
                ['email' => $request->email],
                ['code' => $code]
            );
            $otp->save();
            $maildata = [
                'code' => $code
            ];



            return response()->json([
                "success" => true,
                "message" => 'otp sent to email'

            ], 200);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'failed'
            ], 500);
        }
    }

    public function changePasswordByOtp(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'code' => 'required|min:6|max:6',
                'password' => 'required|confirmed|min:6',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),

                ], 422);
            }

            $email  = Otp::where('code', $request->code)->value('email');

            if (!$email) {
                return response()->json([
                    "success" => false,
                    "message" => 'Invalid code'

                ], 422);
            }

            $user = User::where('email', $email)->first();
            $oldpassword = $user->password;
            $checkpassword = Hash::check($request->password, $oldpassword);
            if ($checkpassword) {
                return response()->json([
                    "success" => false,
                    "message" => 'identical password'

                ], 422);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            Otp::where('code', $request->code)->first()->delete();
            $user->notify(new PasswordChanged());
            return response()->json([
                'status' => true,
                'message' => 'Password changed'
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'failed'
            ], 500);
        }
    }
    public function update(User $user, Request $request)
    {
        try {


            if ($request->has('phoneCode') && $request->filled('phoneCode') && !is_null($request->phoneCode)) {
                $user->phoneCode = $request->phoneCode;
            }
            if ($request->has('phoneNumber') && $request->filled('phoneNumber') && !is_null($request->phoneNumber)) {
                $user->phoneNumber = $request->phoneNumber;
            }
            if ($request->has('profile') && $request->filled('profile') && !is_null($request->avatar)) {
                $user->avatar = $request->avatar;
            }

            if ($request->has('firstName') && $request->filled('firstName') && !is_null($request->firstName)) {
                $user->firstName = $request->firstName;
            }
            if ($request->has('lastName') && $request->filled('lastName') && !is_null($request->lastName)) {
                $user->lastName = $request->lastName;
            }

            if ($request->has('gender') && $request->filled('gender') && !is_null($request->gender)) {
                $user->gender = $request->gender;
            }

            if ($request->has('address') && $request->filled('address') && !is_null($request->address)) {
                $user->address = $request->address;
            }
            if ($request->has('dob') && $request->filled('dob') && !is_null($request->dob)) {
                $user->dob = $request->dob;
            }


            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'updated',
                'data' =>  new UserResource($user)
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'update failed',

            ], 500);
        }
    }

    public function verifyemail(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'token' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }


        $verifyemail = DB::table('password_resets')
            ->where(['token' => $request->token])
            ->first();

        if (!$verifyemail) {
            return response()->json([
                "success" => false,
                "message" => 'Invalid request'

            ], 500);
        }
        $user = User::where('email', $verifyemail->email)->first();
        $user->email_verified_at = Carbon::now();
        $user->save();
        DB::table('password_resets')->where(['token' => $request->token])->delete();
        return response()->json([
            "success" => true,
            "message" => 'verified'

        ], 200);
    }
    public function destroy(User $user)
    {

        try {
            $user->delete();
            return response()->json([
                'message' => 'Delete successful'
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'delete failed',

            ], 500);
        }
    }
    public function logout(User $user)
    {

        try {
            $user->tokens()->delete();
            return response()->json([
                'message' => 'logout successful'
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'logout failed',

            ], 500);
        }
    }
}
