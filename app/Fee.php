<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Fee extends Model
{
    protected $appends = ['price'];
    protected $attributes = ['price'];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }

    /**
     * Convert integer price to a double|float
     *
     * @return float|int|null
     */
    public function getPriceAttribute()
    {
        if (isset($this->attributes['price'])) {
            return $this->attributes['price'] / 100;
        }

        return null;
    }

    /**
     * Convert double|float price to integer
     *
     * @param $value
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }
}
