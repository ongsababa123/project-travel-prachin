<?php

namespace App\Controllers;

use App\Models\TypeTravelModels;


// use App\Models\CategoryModels;

class HomeController extends BaseController
{
    //หน้าหลัก
    public function indexHome()
    {
        $TypeTravelModels = new TypeTravelModels();
        $data['type_travel_data'] = $TypeTravelModels->where('status', 1)->findAll();
        echo view('userview/layout/header', $data);
        echo view('userview/home');
        echo view('userview/layout/footer');
    }

    //หน้าบทความ
    public function index_article($id_type_travel = null)
    {
        $TypeTravelModels = new TypeTravelModels();
        $data['type_travel_data'] = $TypeTravelModels->where('status', 1)->findAll();
        echo view('userview/layout/header', $data);
        echo view('userview/article');
        echo view('userview/layout/footer');
    }

    //หน้าข้อมูลในบทความ
    public function index_article_detail()
    {
        $TypeTravelModels = new TypeTravelModels();
        $data['type_travel_data'] = $TypeTravelModels->where('status', 1)->findAll();
        echo view('userview/layout/header', $data);
        echo view('userview/details_article');
        echo view('userview/layout/footer');
    }

    //หน้าข่าวสาร
    public function index_new()
    {
        $TypeTravelModels = new TypeTravelModels();
        $data['type_travel_data'] = $TypeTravelModels->where('status', 1)->findAll();
        echo view('userview/layout/header', $data);
        echo view('userview/new');
        echo view('userview/layout/footer');
    }
}