<?php

namespace Finance;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $showFields = array(
        'concept',
        'data',
        'amount',
        'account_balance',
        'datetime',
        'billing'
    );

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
