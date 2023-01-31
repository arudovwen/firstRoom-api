<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class RoomInformation extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
