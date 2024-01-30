<?php

namespace App\Controllers;

use App\Models\TypeTravelModels;

class TypeTravelController extends BaseController
{

    //สร้างข้อมูลหมวดหมู่
    public function create_type_travel()
    {
        helper(['form']);
        $TypeTravelModels = new TypeTravelModels();
        $data = [
            'name_travel' => $this->request->getVar('name_travel'),
            'status' => 1,
        ];

        $check = $TypeTravelModels->save($data);
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

        //สร้างข้อมูลหมวดหมู่
        public function edit_type_travel($id_travel)
        {
            helper(['form']);
            $TypeTravelModels = new TypeTravelModels();
            $status = $this->request->getVar('customSwitch3') === 'on' ? 1 : 0;
            $data = [
                'name_travel' => $this->request->getVar('name_travel'),
                'status' => $status,
            ];
    
            $check = $TypeTravelModels->update($id_travel, $data);
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
    //เรียกข้อมูลลง datatable
    public function get_data_table_type_travel()
    {
        $TypeTravelModels = new TypeTravelModels();

        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $draw = $this->request->getVar('draw');
        $searchValue = $this->request->getVar('search')['value'];

        if (!empty($searchValue)) {
            $TypeTravelModels->groupStart()
                ->like('name_travel', $searchValue)
                ->groupEnd();
        }

        $totalRecords = $TypeTravelModels->countAllResults();

        $recordsFiltered = $totalRecords;

        if (!empty($searchValue)) {
            $TypeTravelModels->groupStart()
                ->like('name_travel', $searchValue)
                ->groupEnd();
        }

        $data = $TypeTravelModels->findAll($limit, $start);

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