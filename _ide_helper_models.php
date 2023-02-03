<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\ExistingFlatMate
 *
 * @property int $id
 * @property int $property_id
 * @property int|null $smoking
 * @property string|null $gender
 * @property string|null $occupation
 * @property string|null $pets
 * @property string|null $age
 * @property string|null $language
 * @property string|null $nationality
 * @property string|null $sexual_orientation
 * @property string|null $interests
 * @property string|null $min_age
 * @property string|null $max_age
 * @property int|null $vegetarian_preferred
 * @property string|null $couples_welcome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property|null $property
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereCouplesWelcome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereInterests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereMaxAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereMinAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate wherePets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereSexualOrientation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereSmoking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistingFlatMate whereVegetarianPreferred($value)
 * @mixin \Eloquent
 */
	class ExistingFlatMate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExtraInformation
 *
 * @property int $id
 * @property int $property_id
 * @property int $display_phone
 * @property string|null $where_you_heard_about_us
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property|null $property
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraInformation whereDisplayPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraInformation wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraInformation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraInformation whereWhereYouHeardAboutUs($value)
 * @mixin \Eloquent
 */
	class ExtraInformation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Favourite
 *
 * @property int $id
 * @property string $user_id
 * @property int $property_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property|null $property
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereUserId($value)
 */
	class Favourite extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Interaction
 *
 * @property int $id
 * @property string $user_id
 * @property int $property_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property|null $property
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction whereUserId($value)
 */
	class Interaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LinkedSocialAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereUserId($value)
 * @mixin \Eloquent
 */
	class LinkedSocialAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $user_id
 * @property string $receiver_id
 * @property string|null $message
 * @property string|null $attachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUserId($value)
 * @mixin \Eloquent
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NewFlatMate
 *
 * @property int $id
 * @property int $property_id
 * @property int|null $smoking
 * @property string|null $gender
 * @property string|null $occupation
 * @property int|null $pets
 * @property string|null $age
 * @property string|null $language
 * @property string|null $nationality
 * @property string|null $sexual_orientation
 * @property array|null $interests
 * @property string|null $min_age
 * @property string|null $max_age
 * @property int|null $vegetarian_preferred
 * @property int|null $couples_welcome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property|null $property
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereCouplesWelcome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereInterests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereMaxAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereMinAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate wherePets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereSexualOrientation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereSmoking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewFlatMate whereVegetarianPreferred($value)
 */
	class NewFlatMate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Otp
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Otp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Otp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Otp query()
 * @mixin \Eloquent
 */
	class Otp extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Property
 *
 * @property int $id
 * @property string $user_id
 * @property string $property_title
 * @property string|null $property_description
 * @property string|null $property_type
 * @property string|null $posting_type
 * @property string|null $advert_type
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ExistingFlatMate|null $exixtingFlatmate
 * @property-read \App\Models\ExtraInformation|null $extraInfo
 * @property-read \App\Models\PropertyInformation|null $propertyInfo
 * @property-read \App\Models\RoomInformation|null $roomInfo
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereAdvertType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePostingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePropertyDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePropertyTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePropertyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Interaction[] $interactions
 * @property-read int|null $interactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 */
	class Property extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PropertyInformation
 *
 * @property int $id
 * @property int $property_id
 * @property array|null $property_images
 * @property string|null $rooms_for_rent
 * @property string|null $type_of_property
 * @property string|null $amenities
 * @property string|null $no_of_beds
 * @property string|null $present_occupants
 * @property string|null $property_postcode
 * @property string|null $property_address
 * @property string|null $property_poster
 * @property string|null $property_area
 * @property int $shared_living_room
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property|null $property
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation whereAmenities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation whereNoOfBeds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation wherePresentOccupants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation wherePropertyAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation wherePropertyArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation wherePropertyImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation wherePropertyPostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation wherePropertyPoster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation whereRoomsForRent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation whereSharedLivingRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation whereTypeOfProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyInformation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PropertyInformation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Purchase
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Purchase extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property string $user_id
 * @property int $property_id
 * @property string $message
 * @property string $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property $property
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RoomInformation
 *
 * @property int $id
 * @property int $property_id
 * @property string|null $room_cost
 * @property string|null $cost_duration
 * @property string|null $room_size
 * @property int|null $amenities_ensuite
 * @property int|null $furnishings
 * @property string|null $security_deposits
 * @property string|null $min_stay
 * @property string|null $max_stay
 * @property int|null $short_term_let
 * @property string|null $short_term_let_duration
 * @property int|null $reference_required
 * @property int|null $bills_included
 * @property int|null $internet_included
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property|null $property
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereAmenitiesEnsuite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereBillsIncluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereCostDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereFurnishings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereInternetIncluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereMaxStay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereMinStay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereReferenceRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereRoomCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereRoomSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereSecurityDeposits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereShortTermLet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereShortTermLetDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomInformation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class RoomInformation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SavedSearch
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SavedSearch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SavedSearch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SavedSearch query()
 * @method static \Illuminate\Database\Eloquent\Builder|SavedSearch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SavedSearch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SavedSearch whereUpdatedAt($value)
 */
	class SavedSearch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property string $reference
 * @property string $status
 * @property string $amount
 * @property string|null $payment_mode
 * @property string|null $payment_type
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaymentMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 * @mixin \Eloquent
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string|null $firstName
 * @property string|null $lastName
 * @property string|null $profile
 * @property string|null $gender
 * @property string|null $dob
 * @property string|null $phoneCode
 * @property string|null $phoneNumber
 * @property int $is_admin
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $referral_link
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Property[] $properties
 * @property-read int|null $properties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase[] $purchases
 * @property-read int|null $purchases_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReferralLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Favourite[] $favourites
 * @property-read int|null $favourites_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Interaction[] $interactions
 * @property-read int|null $interactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SavedSearch[] $savedsearches
 * @property-read int|null $savedsearches_count
 */
	class User extends \Eloquent {}
}

