<?php

namespace App\Http\Controllers\Backend\Users;

use App\User;
use App\Http\Controllers\Backend\BackendController;

class UsersController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->model = $user;
        $this->view = "users";
        $this->singular = 'user';
        $this->plural = 'users';
    }
}
