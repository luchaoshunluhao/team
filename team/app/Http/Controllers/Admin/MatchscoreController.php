<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;

class MatchscoreController extends Controller
{
    //比赛分数列表
    public function index ()
    {
        //获取数据
        $data = DB::table('message')
            ->leftJoin('user as a', 'message.user_a', 'a.id')
            ->leftJoin('user as b', 'message.user_b', 'b.id')
            ->leftJoin('score', 'message.id', 'score.mess_id')
            ->select('message.game_name', 'a.user_name as a_user', 'b.user_name as b_user', 'score.*')
            ->get()->toArray();
        //展示视图并赋值
        return view('admin.matchscore.index', compact('data'));
    }
    //添加比赛分数
    public function add ()
    {
        //判断传递的参数是否为post
        if(Input::method() == 'POST')
        {
            //post
            $data = Input::all();
            //查询mess_id
            $mess_id = DB::table('message')
                ->where('game_name', $data['gamename'])
                ->value('id');
            //组建插入字段的数据
            $info = [
                'score_right'       => $data['rightscore'],
                'score_left'        => $data['leftscore'],
                'big_left'          => $data['bigleft'],
                'big_right'         => $data['big_right'],
                'mess_id'           => $mess_id,
                'class'             => $data['inning'],
                'del'               => 1
            ];
            //执行插入语句
            $res = DB::table('score')->insert($info);
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
            return view('admin.matchscore.add');
        }
    }
    //修改比赛分数
    public function edit (Request $request)
    {
        //判断传递的参数是否为post
        if(Input::method() == 'POST')
        {
            //post
            $data = Input::all();
            //查询mess_id
            $mess_id = DB::table('message')
                ->where('game_name', $data['gamename'])
                ->value('id');
            //组建修改字段的数据
            $info = [
                'score_right'       => $data['rightscore'],
                'score_left'        => $data['leftscore'],
                'big_left'          => $data['bigleft'],
                'big_right'         => $data['big_right'],
                'mess_id'           => $mess_id,
                'class'             => $data['inning'],
            ];
            //执行插入语句
            $res = DB::table('score')->where('id', $data['id'])->update($info);
            //判断是否修改成功
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
            $id = $request->id;
            $data = DB::table('message')
                ->where('score.id', $id)
                ->leftJoin('user as a', 'message.user_a', 'a.id')
                ->leftJoin('user as b', 'message.user_b', 'b.id')
                ->leftJoin('score', 'message.id', 'score.mess_id')
                ->select('message.game_name', 'a.user_name as a_user', 'b.user_name as b_user', 'score.*')
                ->get()->toArray();
            //展示视图并向视图赋值
            return view('admin/matchscore/edit', compact('data'));
        }
    }
    //删除比赛分数
    public function del (Request $request)
    {
        //获取id
        $id = $request->id;
        $data = DB::table('score')->where('id', $id)->update(['del' => '0']);
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
