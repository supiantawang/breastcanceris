<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function __construct()
    {
        if (!session()->has('userdata')) {
            return redirect()->route('admin.login.form')->with('Fail', 'You are logged out!');
            exit;
        }
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        return view('dashboard', $data);
    }
    public function test()
    {
        //echo $this->getData("u_fullname", "ek_admin", "u_id ", 1);
    }
}
