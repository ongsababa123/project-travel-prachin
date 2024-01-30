<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::indexHome');
$routes->group("/", function ($routes) {
    $routes->match(['get', 'post'], 'index', 'HomeController::indexHome'); //หน้าหลัก
    $routes->match(['get', 'post'], 'article', 'HomeController::index_article'); //หน้าบทความทั้งหมด
    $routes->match(['get', 'post'], 'article/(:num)/(:num)', 'HomeController::index_article/$1/$2'); //หน้าบทความทั้งหมด   (ไอดีบทความ/ประเภท)

    $routes->match(['get', 'post'], 'article/detail', 'HomeController::index_article_detail'); //หน้ารายละเอียดบทความนั้นๆ
    $routes->match(['get', 'post'], 'new', 'HomeController::index_new'); //หน้าข่าวทั้งหมด
});

$routes->match(['get', 'post'], 'dashboard/login', 'DashboardController::index_login'); //หน้าล็อคอิน
$routes->match(['get', 'post'], 'dashboard/auth/login', 'UserController::loginAuth'); //หน้าล็อคอิน
$routes->match(['get', 'post'], 'dashboard/auth/logout', 'UserController::logout'); //หน้าล็อคอิน
$routes->group("/dashboard", ['filter' => ['AuthGuard']], function ($routes) {

    $routes->match(['get', 'post'], 'profile/index', 'DashboardController::index_profile'); //หน้าโปรไฟล์
    $routes->match(['get', 'post'], 'index', 'DashboardController::index_dashboard'); //หน้าหลักหลังบ้าน

    //--ผู้ใช้้--//
    $routes->match(['get', 'post'], 'user/index', 'DashboardController::index_user'); //หน้าแสดงข้อมูลผู้ใช้
    $routes->match(['get', 'post'], 'user/getdata', 'UserController::get_data_table_user'); //หน้าแสดงข้อมูลผู้ใช้
    $routes->match(['get', 'post'], 'user/create', 'UserController::create_user'); //ฟังชั่น เพิ่ม ผู้ใช้
    $routes->match(['get', 'post'], 'user/edit/(:num)/(:num)', 'UserController::edit_user/$1/$2'); //ฟังชั่น แก้ไข ผู้ใช้ (ไอดีผู้ใช้/ประเภท)
    $routes->match(['get', 'post'], 'user/delete/(:num)', 'UserController::delete_user/$1'); //ฟังชั่น ลบ ผู้ใช้ (ไอดีผู้ใช้)

    //--บทความ--//
    $routes->match(['get', 'post'], 'article/index', 'DashboardController::index_article_all'); //หน้าแสดงบทความทั้งหมด
    $routes->match(['get', 'post'], 'article/add/index', 'DashboardController::index_article_add'); //หน้าเพิ่มบทความ
    //ฟังชั่น เพิ่ม บทความ
    $routes->match(['get', 'post'], 'article/edit/index/(:num)', 'DashboardController::index_article_edit/$1'); //หน้าแก้ไขบทความ
    //ฟังชั่น แก้ไข บทความ
    $routes->match(['get', 'post'], 'article/delete', 'DashboardController::delete_article'); //ฟังชั่น ลบ บทความ


    //--หมวดหมู่--//
    $routes->match(['get', 'post'], 'category/index', 'DashboardController::index_category_all'); //หน้าแสดงหมวดหมู่ทั้งหมด
    //ฟังชั่น เพิ่ม หมวดหมู่
    //ฟังชั่น แก้ไข หมวดหมู่
    //ฟังชั่น ลบ หมวดหมู่


    //--ข่าวสาร--//
    $routes->match(['get', 'post'], 'news/index', 'DashboardController::index_news_all'); //หน้าแสดงข่าวสารทั้งหมด
    $routes->match(['get', 'post'], 'news/add/index', 'DashboardController::index_news_add'); //หน้าแสดงข่าวสารทั้งหมด
    //ฟังชั่น เพิ่ม ข่าวสาร
    //ฟังชั่น แก้ไข ข่าวสาร
    //ฟังชั่น ลบ ข่าวสาร

});