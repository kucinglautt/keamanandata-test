<?php

namespace App\Controllers;

class XssTest extends BaseController
{
    public function index()
    {
        $input = $this->request->getGet('input'); // ambil dari query string
        echo "Output: " . $input;
    }
}

