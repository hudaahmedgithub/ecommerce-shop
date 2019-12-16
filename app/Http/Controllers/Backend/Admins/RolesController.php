<?php

namespace App\Http\Controllers\Backend\Admins;

use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Backend\BackendController;

class RolesController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\Models\Admin $admin
     * @return void
     */
    public function __construct(Role $role)
    {
        $this->model    = $role;
        $this->view     = "roles";
        $this->singular = 'role';
        $this->plural   = 'roles';
    }
}
