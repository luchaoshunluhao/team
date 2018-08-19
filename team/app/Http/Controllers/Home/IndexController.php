<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function list ()
    {
        return view('home.index.list');
    }
    public function default ()
    {
        return view('home.index.default');
    }
}
