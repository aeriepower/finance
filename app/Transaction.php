<?php

namespace Finance;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $showFields = array(
        'id',
        'concept',
        'data',
        'amount',
        'account_balance',
        'datetime',
    );


    protected $fillable = array(
        'concept',
        'data',
        'amount',
        'account_balance',
        'datetime',
        'billing',
        'user_id',
        'category_id',
        'provider_id',
        'reiterate',
        'exception',
    );

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    /**
     * Give array list of specific attributes
     *
     * @return array
     */
    public function getAttributes()
    {
        $attributes = array();

        foreach ($this->showFields as $item) {
            $attributes[$item] =  $this->attributes[$item];
        }

        return $attributes;
    }
}
