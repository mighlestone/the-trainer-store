<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Shoe extends Model
{
    use SoftDeletes;

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
