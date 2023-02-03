<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 */
class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function propertyInfo()
    {
        return $this->hasOne(PropertyInformation::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function roomInfo()
    {
        return $this->hasOne(RoomInformation::class);
    }

    public function extraInfo()
    {
        return $this->hasOne(ExtraInformation::class);
    }

    public function exixtingFlatmate()
    {
        return $this->hasOne(ExistingFlatMate::class);
    }
}
