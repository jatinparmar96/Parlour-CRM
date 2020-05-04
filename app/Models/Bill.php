<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bill
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill query()
 * @mixin \Eloquent
 */
class Bill extends Model
{
    protected $guarded = [
        'shop_id'
    ];
    protected $appends = ['edit_url'];

    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'billed_services', 'bill_id', 'service_id');
    }

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }

    public function getEditUrlAttribute()
    {
        return route('bill.edit', $this->id);
    }

    /**
     * @param $value
     * @deprecated
     */
    public function setCustomerAttribute($value)
    {
        $this->attributes['customer_id'] = $value->id;
    }

    public function setBillDateAttribute($value)
    {
        if ($value) {
            $this->attributes['bill_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['bill_date'] = null;
        }
    }
}
