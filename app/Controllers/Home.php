<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }
    public function test()
    {
        //echo $this->getData("u_fullname", "ek_admin", "u_id ", 1);
    }
}
