<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class PropertyInformation extends Model
{
    use HasFactory;

    protected $casts = [
        'property_images' => 'array'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
