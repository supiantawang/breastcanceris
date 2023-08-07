<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CommunityController extends BaseController
{
    public function index()
    {
        $data['title'] = "Community Listing";

        return view('community/community_listing', $data);
    }
}
