<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HospitalController extends BaseController
{
    public function index()
    {
        $data['title'] = "Hospital Listing";

        return view('hospital/hospital_listing', $data);
    }
}
