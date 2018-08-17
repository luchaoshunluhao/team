<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SportsmanController extends Controller
{
    public function index(Request $request){

        if ($request->method()==='POST'){
            $id = $request->id;
            if (DB::table('user')->where('id', '=', $id)->update(['del'=>'0'])){
                $response = ['code' => 0,'msg'=>'删除成功!'];
            }else{
                $response = ['code' => 1,'msg'=>'删除失败!'];
            }
            return response()->json($response);
        }else{

            $data = DB::table('user')->get()->toArray();
            return view('admin.Sportsman.index', ['data' => $data]);
        }
    }
    public function add(Request $request){

        if ($request->method()==='POST'){
            $data = $request->all();
            unset($data['_token']);
            $data['add_time']=date('Y-m-d H:i:s',time());

            $res = DB::table('user')->insert(
                ['user_name' => $data['user_name'],
                'sex' => $data['gender'],
                'age' => $data['age'],
                'state' => $data['state'],
                'hand' => $data['hand'],
                'bat' => $data['bat'],
                'play' => $data['play'],
                'del'=>'1',
                'add_time' => $data['add_time'],
            ]);

            if ($res){
                $response = ['code' => 0,'msg'=>'添加成功!'];
            }else{
                $response = ['code' => 1,'msg'=>'添加失败!'];
            }
                return $response;

        }else{
            return view('admin.Sportsman.add');
        }
    }

    public function edit(Request $request){
        if ($request->method()=='POST'){
            $id = $request->id;
            $data = $request->all();
            unset($data['_token']);
            $data['add_time']=date('Y-m-d H:i:s',time());

            if (DB::table('user')->where('id', '=', $id)->update(
            [
                'user_name'=>$data['user_name'],
                 "sex" => $data['gender'],
                  "age" => $data['age'],
                  "state" => $data['state'],
                  "hand" => $data['hand'],
                  "bat" => $data['bat'],
                  "play" => $data['play'],
                  "add_time" => $data['add_time'],
            ]
            )){
                $response = ['code' => 0,'msg'=>'修改成功!'];
            }else{
                $response = ['code' => 1,'msg'=>'修改成功!'];
            }
            return $response;
        }else{
            $id = $request->id;
            $data = DB::table('user')->where('id', '=', $id)->get()->toArray();
            return view('admin.Sportsman.edit', ['data' => $data]);
        }
    }
}
