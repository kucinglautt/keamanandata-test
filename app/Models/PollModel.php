<?php

namespace App\Models;

use CodeIgniter\Model;

class PollModel extends Model
{
    protected $table = 'polls';
    protected $primaryKey = 'polls_id';
    protected $allowedFields = ['question', 'created_at'];

    public function getPolls()
    {
        return $this->findAll();
    }

    public function getPoll($id)
    {
        return $this->find($id);
    }

    public function createPoll($data)
    {
        return $this->insert($data);
    }
}