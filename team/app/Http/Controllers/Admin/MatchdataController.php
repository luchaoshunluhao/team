<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MatchdataController extends Controller
{
    //比赛数据展示
    public function index()
    {
        $data = DB::table('game_data')->get()->toArray();
        dump($data);
    }
}
