<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{

    public function home()
    {
        return view('index');
    }

}
