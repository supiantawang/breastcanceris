<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login/login_page');
    }
    public function loginhandler()
    {
        echo "testtt login handler";
    }
}
