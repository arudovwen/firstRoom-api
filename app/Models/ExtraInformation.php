<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class ExtraInformation extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
