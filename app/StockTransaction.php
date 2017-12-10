<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class StockTransaction extends Model
{
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
