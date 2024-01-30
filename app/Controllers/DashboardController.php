<?php

namespace App\Controllers;

use App\Models\UserModels;
use App\Models\DetailsModels;
use App\Models\ActivityModels;

// use App\Models\CategoryModels;

class DashboardController extends BaseController
{

    public function index_login(){

        echo view('adminview/login');
    }

    public function index_dashboard(){

        echo view('adminview/layout/header');
        echo view('adminview/home');
    }

}