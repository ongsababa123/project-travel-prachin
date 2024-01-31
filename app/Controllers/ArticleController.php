<?php

namespace App\Controllers;

use App\Models\ArticleModels;
use App\Models\TypeTravelModels;

class ArticleController extends BaseController
{

    //สร้างข้อมูลบทความ
    public function crate_article()
    {
        helper(['form']);
        $ArticleModels = new ArticleModels();
        $profile_picture = $this->request->getFile('uploadImage');
        $data = [
            'id_type_travel' => $this->request->getVar('id_type_travel'),
            'topic' => $this->request->getVar('topic'),
            'detail' => $this->request->getVar('detail'),
            'view_count' => 0,
            'data_create' => date('Y/m/d'),
            'data_edit' => date('Y/m/d'),
            'status' => 1,
            'google_link' => $this->request->getVar('google_link'),
            'location' => $this->request->getVar('location'),
            'location_price' => $this->request->getVar('location_price'),
            'face_book_name' => $this->request->getVar('face_book_name'),
            'facebook_link' => $this->request->getVar('facebook_link'),
            'time_open' => $this->request->getVar('time_open'),
        ];
        if ($profile_picture->isValid() && !$profile_picture->hasMoved()) {
            $validationRules = [
                'uploadImage' => 'max_size[uploadImage,10240]', // 10MB in kilobytes
            ];
            // Validate the input
            if (!$this->validate($validationRules)) {
                $response = [
                    'success' => false,
                    'message' => 'ผิดพลาด',
                    'reload' => false,
                    'image_error' => 'ไฟล์จะต้องมีขนาดต่ำกว่า 10MB'
                ];
                return $this->response->setJSON($response);
            }
            $minFileSize = 1024; // 1MB in kilobytes
            if ($profile_picture->getSize() >= $minFileSize) {
                if ($profile_picture->isValid() && !$profile_picture->hasMoved()) {
                    $imageData = file_get_contents($profile_picture->getTempName()); // Read image file data
                    $base64ImageData = base64_encode($imageData);
                    $data['pic_topic'] = $base64ImageData;
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'ผิดพลาด',
                    'reload' => false,
                    'image_error' => 'ไฟล์จะต้องมีขนาดอย่างน้อย 1MB'
                ];
                return $this->response->setJSON($response);
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'โปรดอัปโหลดภาพหน้าปกบทความก่อน',
                'reload' => false,
            ];
            return $this->response->setJSON($response);
        }
        $check = $ArticleModels->save($data);
        if ($check) {
            $response = [
                'success' => true,
                'message' => 'สร้างข้อมูลสำเร็จ',
                'reload' => true,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'error',
                'reload' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    //แก้ไขข้อมูลบทความ
    public function edit_article($id_article = null)
    {
        helper(['form']);
        $ArticleModels = new ArticleModels();
        $profile_picture = $this->request->getFile('uploadImage');
        $data = [
            'id_type_travel' => $this->request->getVar('id_type_travel'),
            'topic' => $this->request->getVar('topic'),
            'detail' => $this->request->getVar('detail'),
            'data_edit' => date('Y/m/d'),
            'status' => $this->request->getVar('status'),
            'google_link' => $this->request->getVar('google_link'),
            'location' => $this->request->getVar('location'),
            'location_price' => $this->request->getVar('location_price'),
            'face_book_name' => $this->request->getVar('face_book_name'),
            'facebook_link' => $this->request->getVar('facebook_link'),
            'time_open' => $this->request->getVar('time_open'),
        ];
        if ($profile_picture->isValid() && !$profile_picture->hasMoved()) {
            $validationRules = [
                'uploadImage' => 'max_size[uploadImage,10240]', // 10MB in kilobytes
            ];
            // Validate the input
            if (!$this->validate($validationRules)) {
                $response = [
                    'success' => false,
                    'message' => 'ผิดพลาด',
                    'reload' => false,
                    'image_error' => 'ไฟล์จะต้องมีขนาดต่ำกว่า 10MB'
                ];
                return $this->response->setJSON($response);
            }
            $minFileSize = 1024; // 1MB in kilobytes
            if ($profile_picture->getSize() >= $minFileSize) {
                if ($profile_picture->isValid() && !$profile_picture->hasMoved()) {
                    $imageData = file_get_contents($profile_picture->getTempName()); // Read image file data
                    $base64ImageData = base64_encode($imageData);
                    $data['pic_topic'] = $base64ImageData;
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'ผิดพลาด',
                    'reload' => false,
                    'image_error' => 'ไฟล์จะต้องมีขนาดอย่างน้อย 1MB'
                ];
                return $this->response->setJSON($response);
            }
        }
        $check = $ArticleModels->update($id_article, $data);
        if ($check) {
            $response = [
                'success' => true,
                'message' => 'แก้ไขข้อมูลสำเร็จ',
                'reload' => true,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'error',
                'reload' => false,
            ];
        }
        return $this->response->setJSON($response);
    }


    //ลบข้อมูลบทความ
    public function delete_article($id_article = null)
    {
        helper(['form']);
        $ArticleModels = new ArticleModels();
        $check = $ArticleModels->delete($id_article);
        if ($check) {
            $response = [
                'success' => true,
                'message' => 'ลบข้อมูลสำเร็จ',
                'reload' => true,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'error',
                'reload' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    //เรียกข้อมูลลง datatable
    public function get_data_table_article($type_travel = null)
    {
        $ArticleModels = new ArticleModels();
        $TypeTravelModels = new TypeTravelModels();

        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $draw = $this->request->getVar('draw');
        $searchValue = $this->request->getVar('search')['value'];

        if (!empty($searchValue)) {
            $ArticleModels->groupStart()
                ->like('topic', $searchValue)
                ->groupEnd();
        }
        if ($type_travel == 0) {
            $totalRecords = $ArticleModels->countAllResults();
        }else{
            $totalRecords = $ArticleModels->where('id_type_travel', $type_travel)->countAllResults();
        }

        $recordsFiltered = $totalRecords;

        if (!empty($searchValue)) {
            $ArticleModels->groupStart()
                ->like('topic', $searchValue)
                ->groupEnd();
        }

        if ($type_travel == 0) {
            $data = $ArticleModels->select("id_article, id_type_travel, topic, data_create, data_edit, status")->findAll($limit, $start);
        }else{
            $data = $ArticleModels->where('id_type_travel', $type_travel)->select("id_article, id_type_travel, topic, data_create, data_edit, status")->findAll($limit, $start);
        }
        foreach ($data as $key => $value) {
            $data[$key]['type_travel'] = $TypeTravelModels->where('id_type_travel', $value['id_type_travel'])->first();
        }
        $response = [
            'draw' => intval($draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
            'searchValue' => $searchValue,
        ];

        return $this->response->setJSON($response);
    }
}