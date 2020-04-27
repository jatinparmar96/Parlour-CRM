<?php

namespace App\Models;

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
    protected $guarded=[
        'shop_id'
    ];
    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'billed_services', 'bill_id', 'service_id');
    }

    /**
     * @param $value
     * @deprecated
     */
    public function setCustomerAttribute($value)
    {
        $this->attributes['customer_id'] = $value->id;
    }
}
