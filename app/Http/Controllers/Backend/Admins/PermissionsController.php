<?php

namespace App\Http\Controllers\Backend\Admins;

use App\User;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Backend\BackendController;

class PermissionsController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\Models\Admin $admin
     * @return void
     */
	
    public function __construct(Permission $permission)
    {
        $this->model    = $permission;
        $this->view     = "permissions";
        $this->singular = 'permission';
        $this->plural   = 'permissions';
    }
}
