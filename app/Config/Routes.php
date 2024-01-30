<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group("/", function ($routes) {
    $routes->get('', 'HomeController::indexHome'); //หน้าหลัก
    $routes->get('article', 'HomeController::index_article'); //หน้าบทความทั้งหมด
    $routes->get('article/(:num)/(:num)', 'HomeController::index_article/$1/$2'); //หน้าบทความทั้งหมด   (ไอดีบทความ/ประเภท)

    $routes->get('article/detail', 'HomeController::index_article_detail'); //หน้ารายละเอียดบทความนั้นๆ
    $routes->get('new', 'HomeController::index_new'); //หน้าข่าวทั้งหมด
});

$routes->group("/dashboard", function ($routes) {
    $routes->get('login', 'DashboardController::index_login'); //หน้าล็อคอิน
    $routes->get('profile', 'DashboardController::index_profile'); //หน้าโปรไฟล์
    $routes->get('index', 'DashboardController::index_dashboard'); //หน้าหลักหลังบ้าน

    //--ผู้ใช้้--//
    $routes->get('user/index', 'DashboardController::index_user'); //หน้าแสดงข้อมูลผู้ใช้
    //ฟังชั่น เพิ่ม ผู้ใช้
    //ฟังชั่น แก้ไข ผู้ใช้
    //ฟังชั่น ลบ ผู้ใช้

    //--บทความ--//
    $routes->get('article/index', 'DashboardController::index_article_all'); //หน้าแสดงบทความทั้งหมด
    $routes->get('article/add/index', 'DashboardController::index_article_add'); //หน้าเพิ่มบทความ
    //ฟังชั่น เพิ่ม บทความ
    $routes->get('article/edit/index/(:num)', 'DashboardController::index_article_edit/$1'); //หน้าแก้ไขบทความ
    //ฟังชั่น แก้ไข บทความ
    $routes->get('article/delete', 'DashboardController::delete_article'); //ฟังชั่น ลบ บทความ


    //--หมวดหมู่--//
    $routes->get('category/index', 'DashboardController::index_category_all'); //หน้าแสดงหมวดหมู่ทั้งหมด
    //ฟังชั่น เพิ่ม หมวดหมู่
    //ฟังชั่น แก้ไข หมวดหมู่
    //ฟังชั่น ลบ หมวดหมู่


    //--ข่าวสาร--//
    $routes->get('news/index', 'DashboardController::index_news_all'); //หน้าแสดงข่าวสารทั้งหมด
    //ฟังชั่น เพิ่ม ข่าวสาร
    //ฟังชั่น แก้ไข ข่าวสาร
    //ฟังชั่น ลบ ข่าวสาร

});