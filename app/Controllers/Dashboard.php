<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function admin_dashboard()
    {
        // Check if the user is logged in and has the admin role
        if (!session()->get('username') || session()->get('role') !== 'Admin') {
            return redirect()->to('auth/login'); // Redirect to login if not logged in or not an admin
        }

        // Logika untuk menampilkan dashboard admin
        return view('admin/index'); // Ganti dengan view dashboard admin Anda
    }

    public function user_dashboard()
    {
        // Check if the user is logged in and has the user role
        if (!session()->get('username') || session()->get('role') !== 'User') {
            return redirect()->to('auth/login'); // Redirect to login if not logged in or not a user
        }

        // Logika untuk menampilkan dashboard user
        return view('user/index'); // Ganti dengan view dashboard user Anda
    }
}