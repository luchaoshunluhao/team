<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TestController extends Controller
{
    //返回接送
    public function return_data ()
    {
        //获取数据
        $data = DB::table('message')
            ->leftJoin('user as a', 'message.user_a', 'a.id')
            ->leftJoin('user as b', 'message.user_b', 'b.id')
            ->leftJoin('count_score', 'message.id', 'count_score.mess_id')
            ->select('message.*', 'a.user_name as a_user', 'b.user_name as b_user', 'count_score.big', 'count_score.small')
            ->get()->toArray();
        $response = [
            'code'      => '0',
            'msg'       => '成功',
            'data'      => $data
        ];
        return response()->json($response);
    }
}
