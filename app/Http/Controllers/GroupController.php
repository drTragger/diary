<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function create()
    {
        echo 'group controller create action';
    }

    public function delete(){
        echo 'group controller delete action';
    }
}