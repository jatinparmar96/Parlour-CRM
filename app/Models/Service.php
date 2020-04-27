<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Service
 *
 * @property int $id
 * @property int $shop_id
 * @property string $name
 * @property float $cost
 * @property float $charge
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $edit_url
 */
class Service extends Model
{
    protected $fillable = [
        'name',
        'charge',
        'cost',
        'description'
    ];
    protected $appends = ['edit_url','actions'];

    public function getEditUrlAttribute()
    {
        return route('service.edit',$this->id);
    }

    public function getActionsAttribute()
    {
        return [
            'edit' => route('service.edit', $this->id),
            'delete' => route('service.destroy', $this->id)
        ];
    }
}
