<?php

namespace App\Policies;

use App\Models\Customer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     *  Проверяем может ли организатор видеть данную заявку
     *
     * @param User $user
     * @param Customer $customer
     * @return bool
     */
    public function view(User $user, Customer $customer) : bool
    {
        return $user->isAdmin() ? true :  $user->id == $customer->meeting()->user()->first()->id;
    }
}
