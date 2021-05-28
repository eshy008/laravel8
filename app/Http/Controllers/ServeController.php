<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServeController extends Controller
{
    public function service()
    {
        return view("serve");
    }
}
