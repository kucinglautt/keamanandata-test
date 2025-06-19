<?php

namespace App\Controllers;

class XssTest extends BaseController
{
    public function index()
    {
        $q = $this->request->getGet('q');
        return view('xsstest', ['q' => $q]);
    }
}
