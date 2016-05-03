<?php

namespace Finance\Policies;

use Finance\User;
use Finance\Transaction;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Transaction $transaction
     * @return bool
     */
    public function owner(User $user, Transaction $transaction){
        return $user->id === $transaction->user_id;
    }
}
