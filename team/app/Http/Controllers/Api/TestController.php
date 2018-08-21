<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;

class TestController extends Controller
{
    //首页显示数据
    public function return_data (Request $request)
    {
        if(!isset($request->all()['key']))
        {
            //获取数据
            $data = DB::table('message')
                ->leftJoin('user as a', 'message.user_a', 'a.id')
                ->leftJoin('user as b', 'message.user_b', 'b.id')
                ->leftJoin('count_score', 'message.id', 'count_score.mess_id')
                ->select('message.*', 'a.user_name as a_user', 'b.user_name as b_user', 'count_score.big', 'count_score.small')
                ->get()->toArray();
        }else
        {
            //获取搜索的值
            $req = $request->all()['key'];
            if(!empty($req)){
                //将获取的搜索值拼成数组
                foreach ($req as $key => $item)
                {
                    if(!empty($item))
                    {
                        $val[$key] = $item;
                    }
                }
                //将搜索的内容数组拼接字符串的函数
                function array2string($array)
                {
                    $string = [];
                    if($array && is_array($array))
                    {
                        foreach ($array as $key => $value)
                        {
                            $string[] = $key . "='" . $value . "'";
                        }
                    }
                    return implode(' and ',$string);
                }
                $a = array2string($val);
                //判断搜索时有没有值存在，没有则会查询全部数据
                if($a)
                {
                    $sql = "SELECT message.*, a.user_name as a_user, b.user_name as b_user, count_score.big, count_score.small FROM message LEFT JOIN user as a ON message.user_a=a.id LEFT JOIN user as b ON message.user_b=b.id LEFT JOIN count_score ON message.id=count_score.mess_id WHERE $a";
                }else
                {
                    $sql = "SELECT message.*, a.user_name as a_user, b.user_name as b_user, count_score.big, count_score.small FROM message LEFT JOIN user as a ON message.user_a=a.id LEFT JOIN user as b ON message.user_b=b.id LEFT JOIN count_score ON message.id=count_score.mess_id";
                }
                $data = DB::select($sql);
            }else
            {
                //首页展示全部数据
                $data = DB::table('message')
                    ->leftJoin('user as a', 'message.user_a', 'a.id')
                    ->leftJoin('user as b', 'message.user_b', 'b.id')
                    ->leftJoin('count_score', 'message.id', 'count_score.mess_id')
                    ->select('message.*', 'a.user_name as a_user', 'b.user_name as b_user', 'count_score.big', 'count_score.small')
                    ->get()->toArray();
            }
        }
        $response = [
            'code'      => '0',
            'msg'       => '成功',
            'data'      => $data
        ];
        return response()->json($response);
    }
}
