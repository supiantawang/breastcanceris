<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function index()
    {
        $data['title'] = "Resident Registration";

        return view('registration/register_listing', $data);
    }
    public function add()
    {
        $data['title'] = "Add New Resident";

        return view('registration/register_add', $data);
    }
}
