<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class dashboardadmincontroller extends BaseController
{
    public function index()
    {
        return view('admin/dashboardadmin');
    }
}
