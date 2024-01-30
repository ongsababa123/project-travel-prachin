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
    public function edit_user($id_user = null, $type = null)
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
            ];
            if ($type != '1') {
                $data_status = [
                    'status_user' => $status
                ];
                $data = array_merge($data, $data_status);
            }
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
            if ($type == '1') {
                $data_update = $userModels->where('id_user', $id_user)->first();
                $ses_data = [
                    'id_user' => $data_update['id_user'],
                    'name_user' => $data_update['name_user'],
                    'lastname_user' => $data_update['lastname_user'],
                    'isLoggedIn' => TRUE
                ];
                $session = session();
                $session->set($ses_data);
            }
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

    public function delete_user($id_user = null)
    {
        $userModels = new UserModels();
        $check = $userModels->where('id_user', $id_user)->delete($id_user);
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
    public function get_data_table_user()
    {
        $UserModels = new UserModels();
        $id_user = session()->get('id_user');

        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $draw = $this->request->getVar('draw');
        $searchValue = $this->request->getVar('search')['value'];

        if (!empty($searchValue)) {
            $UserModels->groupStart()
                ->like('email_user', $searchValue)
                ->orLike('name_user', $searchValue)
                ->orLike('lastname_user', $searchValue)
                ->orLike('phone', $searchValue)
                ->groupEnd();
        }

        // Exclude records where id_user is equal to the value from the session
        $UserModels->where('id_user !=', $id_user);

        $totalRecords = $UserModels->countAllResults();

        $recordsFiltered = $totalRecords;

        if (!empty($searchValue)) {
            $UserModels->groupStart()
                ->like('email_user', $searchValue)
                ->orLike('name_user', $searchValue)
                ->orLike('lastname_user', $searchValue)
                ->orLike('phone', $searchValue)
                ->groupEnd();
        }

        // Exclude records where id_user is equal to the value from the session
        $UserModels->where('id_user !=', $id_user);

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


    public function loginAuth()
    {
        $session = session();
        $UserModels = new UserModels();
        $email_user = $this->request->getVar('email_user');
        $password = $this->request->getVar('password');
        $data = $UserModels->where('email_user', $email_user)->first();
        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                if ($data['status_user'] === '1') {
                    $ses_data = [
                        'id_user' => $data['id_user'],
                        'name_user' => $data['name_user'],
                        'lastname_user' => $data['lastname_user'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    $response = [
                        'success' => true,
                        'message' => 'เข้าสู่ระบบสำเร็จ',
                        'reload' => true,
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'บัญชีผู้ใช้นี้ถูกระงับ',
                        'reload' => false,
                    ];
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
                    'reload' => false,
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
                'reload' => false,
            ];
        }
        return $this->response->setJSON($response);
    }
    //ออกจากระบบ
    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/dashboard/login');
    }
}