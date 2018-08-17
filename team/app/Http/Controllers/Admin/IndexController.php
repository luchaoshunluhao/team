<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台框架展示
    public function index ()
    {
        //展示视图
        return view('admin.index.index');
    }
    //后台首页展示
    public function welcome ()
    {
        //展示视图
        return view('/admin/index/welcome');
    }
}
