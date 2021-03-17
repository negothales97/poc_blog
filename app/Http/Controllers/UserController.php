<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return 'Usuário';
    }

    public function create()
    {
        return 'criando usuário';
    }

    public function controller($id = "")
    {
        return $id;
    }
}
