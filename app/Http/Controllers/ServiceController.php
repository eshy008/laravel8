<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function Services($services_id = null, $name= null) 
    {
        echo "<h3>ID: </h3>" . $services_id . ", " .$name;
        return view("services");
    }
}
