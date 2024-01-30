<?php

namespace App\Controllers;

use App\Models\UserModels;

// use App\Models\CategoryModels;

class UserController extends BaseController
{

    //ฟังชั่นสร้างข้อมูลผู้ใช้
    public function create_user()
    {
        helper(['form']);
        $userModels = new UserModels();
        $rules = [
            'name_user' => 'required|min_length[2]|max_length[200]',
            'lastname_user' => 'required|min_length[2]|max_length[200]',
            'phone' => 'required|numeric|min_length[10]|max_length[10]',
            'email_user' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user_table.email_user]',
        ];

        if ($this->validate($rules)) {
            $data = [
                'email_user' => $this->request->getVar('email_user'),
                'name_user' => $this->request->getVar('name_user'),
                'lastname_user' => $this->request->getVar('lastname_user'),
                'phone' => $this->request->getVar('phone'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status_user' => 1,
            ];
            $check = $userModels->save($data);
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
        } else {
            $data['validation'] = $this->validator;
            $response = [
                'success' => false,
                'message' => 'ผิดพลาด',
                'validator' => $this->validator->getErrors(), // Get validation errors
                'reload' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    //ฟังชั่นแก้ไขข้อมูลผู้ใช้
    public function edit_user($id_user = null)
    {
        helper(['form']);
        $userModels = new UserModels();
        $status = $this->request->getVar('customSwitch3') === 'on' ? 1 : 0;
        $password = $this->request->getVar('password');
        $rules = [
            'name_user' => 'required|min_length[2]|max_length[200]',
            'lastname_user' => 'required|min_length[2]|max_length[200]',
            'phone' => 'required|numeric|min_length[10]|max_length[10]',
            'email_user' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user_table.email_user,id_user,' . $id_user . ']',
        ];

        if ($this->validate($rules)) {
            $userModels = new UserModels();
            $data = [
                'email_user' => $this->request->getVar('email_user'),
                'name_user' => $this->request->getVar('name_user'),
                'lastname_user' => $this->request->getVar('lastname_user'),
                'phone' => $this->request->getVar('phone'),
                'status_user' => $status
            ];
            if ($password === '' || $password === null) {
                $response = [
                    'success' => true,
                    'message' => 'อัพเดทข้อมูลสำเร็จ',
                    'reload' => true,
                ];
            } else {
                $passdata = [
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                ];
                $data = array_merge($data, $passdata);
            }
            $check = $userModels->update($id_user, $data);
            if (!$check) {
                $response = [
                    'success' => false,
                    'message' => 'error',
                    'reload' => false,
                ];
            }
        } else {
            $data['validation'] = $this->validator;
            $response = [
                'success' => false,
                'message' => 'ผิดพลาด',
                'validator' => $this->validator->getErrors(), // Get validation errors
                'reload' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    public function delete_user($id_user = null){
        $userModels = new UserModels();
        $check = $userModels->where('id_user', $id_user)->delete($id_user);
        if ($check) {
            $response = [
                'success' => true,
                'message' => 'ลบข้อมูลสำเร็จ',
                'reload' => true,
            ];
        }else{
            $response = [
                'success' => false,
                'message' => 'error',
                'reload' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    //เรียกข้อมูลลง datatable
    public function get_data_table_user()
    {
        $UserModels = new UserModels();

        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $draw = $this->request->getVar('draw');
        $searchValue = $this->request->getVar('search')['value'];

        if (!empty($searchValue)) {
            $UserModels->groupStart()
                ->like('email_user', $searchValue) // แทน 'column1', 'column2', ... ด้วยชื่อคอลัมน์ที่คุณต้องการค้นหา
                ->orLike('name_user', $searchValue)
                ->orLike('lastname_user', $searchValue)
                ->orLike('phone', $searchValue)
                // เพิ่มคอลัมน์เพิ่มเติมตามที่ต้องการค้นหา
                ->groupEnd();
        }
        $totalRecords = $UserModels->countAllResults();

        $recordsFiltered = $totalRecords;
        if (!empty($searchValue)) {
            $UserModels->groupStart()
                ->like('email_user', $searchValue) // แทน 'column1', 'column2', ... ด้วยชื่อคอลัมน์ที่คุณต้องการค้นหา
                ->orLike('name_user', $searchValue)
                ->orLike('lastname_user', $searchValue)
                ->orLike('phone', $searchValue)
                // เพิ่มคอลัมน์เพิ่มเติมตามที่ต้องการค้นหา
                ->groupEnd();
        }
        $data = $UserModels->findAll($limit, $start);

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