<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'user_table';

    protected $primaryKey = 'id_user';

    protected $allowedFields = ['name_user' , 'lastname_user' , 'email_user' , 'phone' , 'password' , 'status_user'];

}
