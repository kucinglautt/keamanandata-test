<?php

namespace App\Models;

use CodeIgniter\Model;

class CandidateModel extends Model
{
    protected $table = 'kadidat'; // GANTI nama tabelmu
    protected $primaryKey = 'kadidat_id'; 
    protected $allowedFields = ['nama', 'bio', 'photo', 'vote'];
}
