<?php

namespace App\Controllers;

use App\Models\NewsModels;

class NewsController extends BaseController
{

    //สร้างข้อมูลบทความ
    public function crate_news()
    {
        helper(['form']);
        $NewsModels = new NewsModels();
        $profile_picture = $this->request->getFile('uploadImage');
        $data = [
            'topic_news' => $this->request->getVar('topic_news'),
            'detail' => $this->request->getVar('detail'),
            'view_count' => 0,
            'data_create' => date('Y/m/d'),
            'data_edit' => date('Y/m/d'),
            'status' => 1,
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
                'message' => 'โปรดอัปโหลดภาพหน้าปกข่าวสารก่อน',
                'reload' => false,
            ];
            return $this->response->setJSON($response);
        }
        $check = $NewsModels->save($data);
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
    public function edit_news($id_news = null)
    {
        helper(['form']);
        $NewsModels = new NewsModels();
        $profile_picture = $this->request->getFile('uploadImage');
        $data = [
            'topic_news' => $this->request->getVar('topic_news'),
            'detail' => $this->request->getVar('detail'),
            'data_edit' => date('Y/m/d'),
            'status' => $this->request->getVar('status'),
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
        $check = $NewsModels->update($id_news, $data);
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
    public function delete_news($id_news = null)
    {
        helper(['form']);
        $NewsModels = new NewsModels();
        $check = $NewsModels->delete($id_news);
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
    public function get_data_table_news()
    {
        $NewsModels = new NewsModels();

        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $draw = $this->request->getVar('draw');
        $searchValue = $this->request->getVar('search')['value'];

        if (!empty($searchValue)) {
            $NewsModels->groupStart()
                ->like('topic_news', $searchValue)
                ->groupEnd();
        }

        $totalRecords = $NewsModels->countAllResults();
        $recordsFiltered = $totalRecords;

        if (!empty($searchValue)) {
            $NewsModels->groupStart()
                ->like('topic_news', $searchValue)
                ->groupEnd();
        }

        $data = $NewsModels->select("id_news, topic_news, data_create, data_edit, status")->findAll($limit, $start);

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