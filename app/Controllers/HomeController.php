<?php

namespace App\Controllers;

use App\Models\UserModels;
use App\Models\DetailsModels;
use App\Models\ActivityModels;

// use App\Models\CategoryModels;

class HomeController extends BaseController
{

    public function indexHome(){

        echo view('userview/home');
    }
}