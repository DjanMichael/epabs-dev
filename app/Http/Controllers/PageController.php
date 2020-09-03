<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function redirectToSystemModule()
    {
        return view('pages.system-menu');
    }
}
