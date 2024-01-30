<?php

namespace App\Controllers;

use App\Models\UserModels;
use App\Models\DetailsModels;
use App\Models\ActivityModels;

// use App\Models\CategoryModels;

class HomeController extends BaseController
{

    public function indexHome(){

        echo view('userview/layout/header');
        echo view('userview/home');
        echo view('userview/layout/footer');
    }

    public function index_article(){

        echo view('userview/layout/header');
        echo view('userview/article');
        echo view('userview/layout/footer');
    }

    public function index_article_detail(){

        echo view('userview/layout/header');
        echo view('userview/details_article');
        echo view('userview/layout/footer');
    }

    public function index_new(){

        echo view('userview/layout/header');
        echo view('userview/new');
        echo view('userview/layout/footer');
    }
}