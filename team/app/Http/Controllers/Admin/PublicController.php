<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Auth;

class PublicController extends Controller
{
    //登录模块
    public function login (Request $request)
    {
        if(Input::method() == 'POST')
        {
            //post
            //开始自动验证
            $this->validate($request, [
                //'验证规则'
                'username'      => 'required',
                'userpwd'           => 'required',
//                'captcha'       => 'required'
            ], [
//                //开始进行身份合法的验证
//                'captcha.require'   => '验证码不能为空',
//                'captcha.captcha'   => '验证码错误'
            ]);
            //开始进行身份合法性验证，只获取username和userpwd，所以用only方法
            $data = $request->only(['username', 'userpwd']);
            /*$username = $data['username'];
            $row = DB::table('admin')->where('username', $username)->get()->toArray();
            session(['username' => $row[0]->username]);
            if($row)
            {
                //验证通过
                return redirect(route('index_index'));
            }else
            {
                //验证失败
                return redirect(route('login'))->withErrors(['error' => '用户名或密码错误！']);
            }*/
            //Auth认证
            if((Auth::guard()->attempt(['username' => $data['username'], 'password' => $data['userpwd']])))
            {
                //验证通过
                return redirect(route('index_index'));
            }else
            {
                //验证失败
                return redirect(route('login'))->withErrors(['error' => '用户名或密码错误！']);
            }
        }else
        {
            //get
            return view('admin.public.login');
        }
    }
}
