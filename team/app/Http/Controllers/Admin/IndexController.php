<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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
    //退出模块
    public function logout (Request $request)
    {
        //清除session
        //Auth::guard('admin')->logout();
        $request->session()->flush();
        //跳转
        return redirect(route('login'));
    }
}
