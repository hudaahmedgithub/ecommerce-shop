<?php

namespace App\Http\Controllers\Backend\Admins;

use App\User;
use App\Http\Controllers\Backend\BackendController;

class UserController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\Models\Admin $admin
     * @return void
     */
    public function __construct(User $user)
    {
        $this->model    = $user;
        $this->view     = "user";
        $this->singular = 'user';
        $this->plural   = 'users';
    }
}
