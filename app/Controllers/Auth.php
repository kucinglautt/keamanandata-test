<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use Config\Database;

class Auth extends Controller
{
    protected $userModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('login');
    }

    // 🚨 SQL Injection Rawan
    public function loginProcess()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM user WHERE username = '$username'");
    $user = $query->getRow();

    if ($user) {
        // Tanpa cek password
        session()->set('loggedIn', true);
        session()->set('user_id', $user->user_id);
        session()->set('username', $user->username);
        session()->set('role', trim($user->role));
        return redirect()->to('admin/index');
    } else {
        return redirect()->back()->with('error', 'Login gagal!');
    }
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('Login/login');
    }

    public function register()
    {
        return view('admin/create_user');
    }

    // 🚨 XSS Reflected
    public function xssTest()
    {
        $input = $this->request->getGet('q');
        echo "<h1>Hasil Input:</h1><p>$input</p>";
    }

    // 🚨 Tidak aman karena tidak validasi input
    public function registerProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $role = $this->request->getPost('role');

        // Password langsung disimpan (tanpa hash)
        $db = Database::connect();
        $db->query("INSERT INTO user (username, password, email, role) 
                    VALUES ('$username', '$password', '$email', '$role')");

        return redirect()->to('login')->with('success', 'Pendaftaran berhasil');
    }

    // Endpoint delete tanpa auth
    public function delete($id)
    {
        $db = Database::connect();
        $db->query("DELETE FROM user WHERE user_id = $id");

        return redirect()->to('userList')->with('success', 'User dihapus');
    }
}
