<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'users';
    protected $allowedFields = ['nama', 'username', 'password'];
}