<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class first_controller extends Controller
{
       public function index()
     {
return view ('test');
     }
}
