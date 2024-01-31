<?php

namespace App\Controllers;

use App\Models\UserModels;
use App\Models\TypeTravelModels;
use App\Models\ArticleModels;
use App\Models\NewsModels;

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
        $TypeTravelModels = new TypeTravelModels();
        $ArticleModels = new ArticleModels();
        $NewsModels = new NewsModels();
        $data['data_type_travel'] = $TypeTravelModels->findAll();
        $data['data_article'] = $ArticleModels->select('id_article, topic, view_count')->findAll();
        $data['data_news'] = $NewsModels->select('id_news , topic_news, view_count')->findAll();

        foreach ($data['data_type_travel'] as $key => $value) {
            $data['data_type_travel'][$key]['count_article'] = $ArticleModels->where('id_type_travel', $value['id_type_travel'])->countAllResults();
            $data['data_type_travel'][$key]['count_view_type'] = 0;
            foreach ($data['data_article'] as $key1 => $value1) {
                $data['data_type_travel'][$key]['count_view_type'] = $value1['view_count'] + $data['data_type_travel'][$key]['count_view_type'];
            }
        }
        echo view('adminview/layout/header');
        echo view('adminview/home', $data);
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
        $TypeTravelModels = new TypeTravelModels();
        $data['data_type_travel'] = $TypeTravelModels->findAll();
        echo view('adminview/layout/header');
        echo view('adminview/article_all', $data);
    }

    //หน้าเพิ่มบทความ
    public function index_article_add()
    {
        $TypeTravelModels = new TypeTravelModels();
        $data['data_type_travel'] = $TypeTravelModels->findAll();
        echo view('adminview/layout/header');
        echo view('adminview/article_add', $data);
    }

    //หน้าแก้ไขบทความ
    public function index_article_edit($id_article = null)
    {
        $TypeTravelModels = new TypeTravelModels();
        $ArticleModels = new ArticleModels();
        $data['data_type_travel'] = $TypeTravelModels->findAll();
        $data['data_article'] = $ArticleModels->where('id_article', $id_article)->first();

        echo view('adminview/layout/header');
        echo view('adminview/article_edit', $data);
    }

    //หน้าการจัดการหมวดหมู่
    public function index_category_all()
    {

        echo view('adminview/layout/header');
        echo view('adminview/category');
    }

    //หน้าการจัดการข่าวสาร
    public function index_news_all()
    {

        echo view('adminview/layout/header');
        echo view('adminview/news');
    }

    //หน้าเพิ่มข่าวสาร
    public function index_news_add()
    {
        echo view('adminview/layout/header');
        echo view('adminview/news_add');
    }

    //หน้าแก้ไตข่าวสาร
    public function index_news_edit($id_news = null)
    {
        $NewsModels = new NewsModels();
        $data['data_news'] = $NewsModels->where('id_news', $id_news)->first();

        echo view('adminview/layout/header');
        echo view('adminview/news_edit', $data);
    }

}