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
        //判断提交方式
        if(Input::method() == 'POST')
        {
            //post
            $data = Input::all();
            //查询运动员id
            $row1 = DB::table('user')
                ->where('user_name', $data['username'])
                ->value('id');
            //查询比赛id
            $row2 = DB::table('message')
                ->where('game_name', $data['gamename'])
                ->value('id');
            //组建添加的数据的数组
            $info = [
                'user_id'       => $row1,
                'mess_id'       => $row2,
                'class'         => $data['inning'],
                'score_first'   => $data['score_up'],
                'send'          => $data['serve_catch'],
                'bat_number'    => $data['plate_num'],
                'tool'          => $data['means'],
                'get_lose'      => $data['goal'],
                'score_last'    => $data['score_down'],
                'del'           => 1
            ];
            //执行插入语句
            $res = DB::table('game_data')->insert($info);
            //判断是否插入成功
            if($res)
            {
                $response = ['code' => '0', 'msg' => '添加成功'];
            }else
            {
                $response = ['code' => '1', 'msg' => '添加失败'];
            }
            //返回ajax
            return response()->json($response);
        }else
        {
            //get
            //展示视图
            return view('admin.matchdata.add');
        }
    }
    //修改比赛数据
    public function edit (Request $request)
    {
        //判断传递的参数是否为post
        if(Input::method() == 'POST')
        {
            //post
            $data = Input::all();
            //查询运动员id
            $row1 = DB::table('user')
                ->where('user_name', $data['username'])
                ->value('id');
            //查询比赛id
            $row2 = DB::table('message')
                ->where('game_name', $data['gamename'])
                ->value('id');
            //组建添加的数据的数组
            $info = [
                'user_id'       => $row1,
                'mess_id'       => $row2,
                'class'         => $data['inning'],
                'score_first'   => $data['score_up'],
                'send'          => $data['serve_catch'],
                'bat_number'    => $data['plate_num'],
                'tool'          => $data['means'],
                'get_lose'      => $data['goal'],
                'score_last'    => $data['score_down']
            ];
            //执行插入语句
            $res = DB::table('game_data')->where('id', $data['id'])->update($info);
            //判断是否插入成功
            if($res)
            {
                $response = ['code' => '0', 'msg' => '修改成功'];
            }else
            {
                $response = ['code' => '1', 'msg' => '修改失败'];
            }
            //返回ajax
            return response()->json($response);
        }else
        {
            //get
            //获取要修改的数据的id
            $id =  $request->get('id');
            $data = DB::table('game_data')
                ->where('game_data.id', $id)
                ->leftJoin('user', 'game_data.user_id', 'user.id')
                ->leftJoin('message', 'game_data.mess_id', 'message.id')
                ->select('game_data.*', 'user.user_name', 'message.game_name')
                ->get()->toArray();
            //展示视图并向视图赋值
            return view('admin/matchdata/edit', compact('data'));
        }
    }
    //软删除数据
    public function del (Request $request)
    {
        //获取id
        $id = $request->id;
        $data = DB::table('game_data')->where('id', $id)->update(['del' => '0']);
        if($data)
        {
            $response = ['code' => 0, 'msg' => '删除成功'];
        }else
        {
            $response = ['code' => 1, 'msg' => '删除失败'];
        }
        return response()->json($response);
    }
}
