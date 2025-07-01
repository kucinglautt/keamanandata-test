<?php

namespace App\Controllers;

use App\Models\CandidateModel;

class User extends BaseController
{
    public function index()
    {
        $model = new CandidateModel();

        // Ambil semua kandidat dari database
        $candidates = $model->findAll();

        // Kirim kandidat ke view
        return view('user/index', ['candidates' => $candidates]);
    }
}
