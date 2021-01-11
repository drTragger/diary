<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function create()
    {
        return view('templates.index');
    }
}