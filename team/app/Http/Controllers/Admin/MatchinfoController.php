<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Input;

class MatchinfoController extends Controller
{
    //比赛信息列表
    public function index ()
    {
        //获取数据
        $data = DB::table('message')
            ->leftJoin('user as a', 'message.user_a', 'a.id')
            ->leftJoin('user as b', 'message.user_b', 'b.id')
            ->leftJoin('count_score', 'message.id', 'count_score.mess_id')
            ->select('message.*', 'a.user_name as a_user', 'b.user_name as b_user', 'count_score.big', 'count_score.small')
            ->get()->toArray();
        //展示视图并赋值
        return view('admin/matchinfo/index', compact('data'));
    }
    //添加比赛信息
    public function add ()
    {
        //判断提交方式
        if(Input::method() == 'POST')
        {
            //post
            $data = Input::all();
            //查询运动员aid
            $a_user = DB::table('user')
                ->where('user_name', $data['a_user'])
                ->value('id');

            //查询运动员bid
            $b_user = DB::table('user')
                ->where('user_name', $data['b_user'])
                ->value('id');
            //处理小比分中空格
            $smallsore = str_replace(chr(32),'&nbsp;',addslashes(htmlspecialchars($data['smallscore'])));
            //组建添加的数据的数组
            $info = [
                'game_name'     => $data['gamename'],
                'game_date'     => $data['date'],
                'game_time'     => $data['time'],
                'game_stage'    => $data['stage'],
                'user_a'        => $a_user,
                'user_b'        => $b_user,
                'game_project'  => $data['project'],
                'state'         => $data['country'],
                'city'          => $data['city'],
                'show'          => '1',
                'add_time'      => date('Y-m-d h:i:s', time()),
                'states'        => $data['online'],
                'del'           => 1
            ];
            //执行插入语句并获取最新插入的id
            $res1 = DB::table('message')->insertGetId($info);
            //组建比分的数组
            $score = [
                'mess_id'       => $res1,
                'big'           => $data['bigscore'],
                'small'         => $smallsore
            ];
            //执行插入语句
            $res2 = DB::table('count_score')->insert($score);
            //判断是否插入成功
            if($res1 && $res2)
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
            return view('admin.matchinfo.add');
        }
    }

    //修改比赛信息
    public function edit (Request $request)
    {
        //判断传递的参数是否为post
        if(Input::method() == 'POST')
        {
            //post
            $data = Input::all();
            //查询运动员aid
            $a_user = DB::table('user')
                ->where('user_name', $data['a_user'])
                ->value('id');
            //查询运动员bid
            $b_user = DB::table('user')
                ->where('user_name', $data['b_user'])
                ->value('id');
            //查询mess_id
            $mess_id = DB::table('message')
                ->where('game_name', $data['gamename'])
                ->value('id');
            //处理小比分中空格
            $smallsore = str_replace(chr(32),'&nbsp;',addslashes(htmlspecialchars($data['smallscore'])));
            //组建添加的数据的数组
            $info = [
                'game_name'     => $data['gamename'],
                'game_date'     => $data['date'],
                'game_time'     => $data['time'],
                'game_stage'    => $data['stage'],
                'user_a'        => $a_user,
                'user_b'        => $b_user,
                'game_project'  => $data['project'],
                'state'         => $data['country'],
                'city'          => $data['city'],
                'show'          => '1',
                'add_time'      => date('Y-m-d h:i:s', time()),
                'states'        => $data['online'],
                'del'           => 1
            ];
            //执行更新语句
            $res1 = DB::table('message')->where('id', $data['id'])->update($info);
            //组建比分的数组
            $score = [
                'mess_id'       => $mess_id,
                'big'           => $data['bigscore'],
                'small'         => $smallsore
            ];
            //执行更新语句
            $res2 = DB::table('count_score')->where('mess_id', $mess_id)->update($score);
            //判断是否修改成功
            if($res1 || $res2)
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
            $id = $request->id;
            $data = DB::table('message')
                ->where('message.id', $id)
                ->leftJoin('user as a', 'message.user_a', 'a.id')
                ->leftJoin('user as b', 'message.user_b', 'b.id')
                ->leftJoin('count_score', 'message.id', 'count_score.mess_id')
                ->select('message.*', 'a.user_name as a_user', 'b.user_name as b_user', 'count_score.big', 'count_score.small')
                ->get()->toArray();
            //展示视图并向视图赋值
            return view('admin/matchinfo/edit', compact('data'));
        }
    }
    //删除比赛信息
    public function del (Request $request)
    {
        //获取id
        $id = $request->id;
        $data = DB::table('message')->where('id', $id)->update(['del' => '0']);
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
