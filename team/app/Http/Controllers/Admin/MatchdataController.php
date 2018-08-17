<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;

class MatchdataController extends Controller
{
    //比赛数据展示
    public function index()
    {
        //获取比赛数据
        $data = DB::table('game_data')
            ->leftJoin('user', 'game_data.user_id', 'user.id')
            ->leftJoin('message', 'game_data.mess_id', 'message.id')
            ->select('game_data.*', 'user.user_name', 'message.game_name')
            ->get()->toArray();
        //展示视图并赋值
        return view('admin.matchdata.index', compact('data'));
    }
    //添加比赛数据
    public function add ()
    {
        if(Input::method() == 'POST')
        {
            //post
        }else
        {
            //get
            return view('admin.matchdata.add');
        }
    }
}
