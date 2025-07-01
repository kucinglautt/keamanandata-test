<?php

namespace App\Models;

use CodeIgniter\Model;

class VoteModel extends Model
{
    protected $table = 'vote';
    protected $primaryKey = 'vote_id';
    protected $allowedFields = ['user_id', 'kadidat_id', 'vote_type'];

    public function getVoteByUser ($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    public function createVote($data)
    {
        return $this->insert($data);
    }
}