<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class StockTransaction extends Model
{
    use SoftDeletes;

    protected $appends = ['total_price'];
    protected $attributes = ['total_price'];

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
     * The attributes that indicates usage of incrementing IDs
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Convert integer price to a double|float
     *
     * @return float|int|null
     */
    public function getPriceAttribute()
    {
        if (isset($this->attributes['total_price'])) {
            return $this->attributes['total_price'] / 100;
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
        $this->attributes['total_price'] = $value * 100;
    }

    /**
     * Get the user that created this transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the shoe of this transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoe()
    {
        return $this->belongsTo(Shoe::class);
    }

    /**
     * Get the shoe size of this transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shoe_size()
    {
        return $this->hasOne(ShoeSize::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}
