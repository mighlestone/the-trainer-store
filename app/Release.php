<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Release extends Model
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
     * Get the user that created this release
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the release type that this release has
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function release_type()
    {
        return $this->hasOne(ReleaseType::class);
    }

    /**
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
     * Get the colour of the shoe for this release
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function colour()
    {
        return $this->hasOne(Colour::class);
    }

    /**
     * Get the location of the release
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
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

    /**
     * Get the links added to this release
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
