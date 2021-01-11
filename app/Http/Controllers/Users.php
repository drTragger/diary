<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class Users extends Controller
{
    public function index()
    {
        return view('templates.index');
    }
}