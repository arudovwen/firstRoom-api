<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class ExistingFlatMate extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
