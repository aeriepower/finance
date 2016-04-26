<?php

namespace Finance;

use Illuminate\Database\Eloquent\Model;

class GeoLocation extends Model
{
    protected $table = 'geo_location';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'geo_category_id',
        'parent_location_id',
        'longitude',
        'latitude',
        'name_en',
        'name_es'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(GeoLocation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function provider()
    {
        return $this->hasMany(Provider::class);
    }

}
