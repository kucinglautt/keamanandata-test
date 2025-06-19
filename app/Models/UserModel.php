<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'password', 'email', 'role'];

public function getUser($username)
{
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $query = $db->query($sql);
    return $query->getRowArray(); // atau ->getRow()
}
}