<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeTravelModels extends Model
{
    protected $table = 'type_travel_table';

    protected $primaryKey = 'id_type_travel';

    protected $allowedFields = ['name_travel' , 'status'];

}
