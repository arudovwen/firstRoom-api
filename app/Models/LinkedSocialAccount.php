<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class LinkedSocialAccount extends Model
{
    use HasFactory;
    protected $fillable = ['provider', 'provider_id', 'user_id'];
    protected $hidden = ['created_at', 'updated_at'];
    public function user(){
        return $this->belongsTo(User::class)->withThrashed();
    }
}
