<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property int $shop_id
 * @property string $name
 * @property string $phone_number
 * @property string $email_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $edit_url
 */
class Customer extends Model
{
    protected $guarded = [
        'shop_id',
    ];
    protected $appends = ['edit_url'];

    public function getEditUrlAttribute()
    {
        return route('customer.edit', $this->id);
    }

    public function getBirthDateAttribute($value)
    {
        if ($value) {
            return Carbon::createFromFormat('Y-m-d', $value)->toFormattedDateString();
        }
        return $value;
    }

    public function getAnniversaryDateAttribute($value)
    {
        if ($value) {
            return Carbon::createFromFormat('Y-m-d', $value)->toFormattedDateString();
        }
        return $value;
    }

    public function setBirthDateAttribute($value)
    {
        if ($value) {
            $this->attributes['birth_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['birth_date'] = $value;
        }
    }

    public function setAnniversaryDateAttribute($value)
    {
        if ($value) {
            $this->attributes['anniversary_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['anniversary_date'] = $value;
        }
    }
    public function setNameAttribute($value)
    {
       $this->attributes['name']= ucwords($value);
    }
}
