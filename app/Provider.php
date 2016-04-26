<?php

namespace Finance;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'provider';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'logo',
        'phone',
        'web',
        'description',
        'geo_location_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geoLocation()
    {
        return $this->belongsTo(GeoLocation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
