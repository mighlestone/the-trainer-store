<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Shoe extends Model
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
     * Get the user that created this shoe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the brand of the shoe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the show model for this release
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function model()
    {
        return $this->hasOne(ShoeModel::class, 'model_id')->withDefault([
            'name' => 'Unknown'
        ]);
    }

    /**
     * Get the colour of the shoe
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function colour()
    {
        return $this->hasOne(Colour::class);
    }

    /**
     * Get the shoe's category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shoe_category()
    {
        return $this->hasOne(ShoeCategory::class);
    }
}
