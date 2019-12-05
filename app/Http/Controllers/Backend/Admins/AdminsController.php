<?php

namespace App\Http\Controllers\Backend\Admins;

use App\Models\Admins\Admin;
use App\Http\Controllers\Backend\BackendController;

class AdminsController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\Models\Admin $admin
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->model    = $admin;
        $this->view     = "admins";
        $this->singular = 'admin';
        $this->plural   = 'admins';
    }
}
