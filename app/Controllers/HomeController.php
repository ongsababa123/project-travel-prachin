<?php

namespace App\Controllers;

use App\Models\TypeTravelModels;
use App\Models\ArticleModels;


// use App\Models\CategoryModels;

class HomeController extends BaseController
{
    //หน้าหลัก
    public function indexHome()
    {
        $TypeTravelModels = new TypeTravelModels();
        $ArticleModels = new ArticleModels();
        $data['type_travel_data'] = $TypeTravelModels->where('status', 1)->findAll();
        $data['article_data_topview'] = $ArticleModels->where('status', 1)
            ->orderBy('view_count', 'DESC')
            ->select('id_article, view_count, topic, pic_topic, data_create, id_type_travel')
            ->get(3) // Use get() method instead of limit()
            ->getResult();

        $data['article_data_last'] = $ArticleModels->where('status', 1)
            ->orderBy('id_article', 'DESC') // Order by data_create in descending order
            ->select('id_article, view_count, topic, pic_topic, data_create, id_type_travel')
            ->get(3) // Use get() method instead of limit()
            ->getResult();

        echo view('userview/layout/header', $data);
        echo view('userview/home');
        echo view('userview/layout/footer');
    }

    //หน้าบทความ
    public function index_article($id_type_travel = null)
    {
        $TypeTravelModels = new TypeTravelModels();
        $ArticleModels = new ArticleModels();
        $data['type_travel_data'] = $TypeTravelModels->where('status', 1)->findAll();
        if ($id_type_travel == 0) {
            $data_test = [
                'article_data' => $ArticleModels->where('status', 1)->paginate(16),
                'pager' => $ArticleModels->pager
            ];
        } else {
            $data_test = [
                'article_data' => $ArticleModels->where('id_type_travel', $id_type_travel)->where('status', 1)->paginate(16),
                'pager' => $ArticleModels->pager
            ];
        }
        $data['type_page'] = $id_type_travel;

        echo view('userview/layout/header', $data);
        echo view('userview/article', $data_test);
        echo view('userview/layout/footer');
    }

    //หน้าข้อมูลในบทความ
    public function index_article_detail($id_article = null, $id_type_travel = null)
    {
        $TypeTravelModels = new TypeTravelModels();
        $ArticleModels = new ArticleModels();

        $data['type_travel_data'] = $TypeTravelModels->where('status', 1)->findAll();
        $data['type_page'] = $id_type_travel;

        $data['article_data'] = $ArticleModels->updateViewCount($id_article);
        $data['article_data_topview'] = $ArticleModels->where('status', 1)
            ->orderBy('view_count', 'DESC')
            ->select('id_article, view_count, topic, pic_topic, data_create, id_type_travel')
            ->get(3) // Use get() method instead of limit()
            ->getResult();

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