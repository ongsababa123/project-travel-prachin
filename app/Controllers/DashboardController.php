<?php

namespace App\Controllers;

use App\Models\UserModels;
use App\Models\DetailsModels;
use App\Models\ActivityModels;

// use App\Models\CategoryModels;

class DashboardController extends BaseController
{
    //หน้าล็อคอิน
    public function index_login()
    {
        echo view('adminview/login');
    }

    //หน้าโปรไฟล์
    public function index_profile()
    {
        $UserModels = new UserModels();
        $data['data_user'] = $UserModels->where('id_user', session()->get('id_user'))->find();
        echo view('adminview/layout/header');
        echo view('adminview/profile', $data);
    }
    //หน้าหลัก
    public function index_dashboard()
    {
        echo view('adminview/layout/header');
        echo view('adminview/home');
    }
    //หน้าจัดการผู้ใช้
    public function index_user()
    {
        echo view('adminview/layout/header');
        echo view('adminview/user');
    }

    //หน้าจัดการบทความ
    public function index_article_all()
    {

        echo view('adminview/layout/header');
        echo view('adminview/article_all');
    }

    //หน้าเพิ่มบทความ
    public function index_article_add()
    {

        echo view('adminview/layout/header');
        echo view('adminview/article_add');
    }

    //หน้าการจัดการหมวดหมู่
    public function index_category_all()
    {

        echo view('adminview/layout/header');
        echo view('adminview/category');
    }

    //หน้าการจัดข่าวสาร
    public function index_news_all()
    {

        echo view('adminview/layout/header');
        echo view('adminview/news');
    }

    //หน้าเพิ่มจัดข่าวสาร
    public function index_news_add()
    {

        echo view('adminview/layout/header');
        echo view('adminview/news_add');
    }



}