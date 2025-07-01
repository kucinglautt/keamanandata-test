<?php

namespace App\Controllers;

class CsrfTest extends BaseController
{
    public function index()
    {
        return view('csrftest');
    }

    public function submit()
    {
        $nama = $this->request->getPost('nama');
        return "Halo, $nama!";
    }
}
