<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function logout()
    {
        // session()->destroy();
        $auth = service('authentication');
        $auth->logout();
        return redirect()->to('/login');
    }
}
