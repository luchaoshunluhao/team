<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ManagerController extends Controller
{
        public function index(Request $request){

            if ($request->method()==='POST'){
                $id = $request->id;
                if (DB::table('admin')->where('id', '=', $id)->delete()){
                    $response = ['code' => 0,'msg'=>'删除成功!'];
                }else{
                    $response = ['code' => 1,'msg'=>'删除失败!'];
                }
                return response()->json($response);
            }else{

                $data = DB::table('admin')->get()->toArray();
                return view('admin.manager.index', ['data' => $data]);
            }

        }

    public function add(Request $request){

        if ($request->method()==='POST'){
            $data = $request->all();

            unset($data['_token']);
            $data['add_time']=time();

            $res = DB::table('admin')->insert(
                ['username' => $data['username'],
                    'userpwd' => bcrypt($data['userpwd']),
                    'show'=>$data['show'],
                    'add_time' => $data['add_time'],
                ]);

            if ($res){
                $response = ['code' => 0,'msg'=>'添加成功!'];
            }else{
                $response = ['code' => 1,'msg'=>'添加失败!'];
            }
            return $response;

        }else{
            return view('admin.manager.add');
        }
    }

    public function show(Request $request){
        $data = $request->all();
        if ($data['show'] == '1'){
            $data['show'] = '0';
        }else{
            $data['show'] = '1';
        }
        if (DB::table('admin')->where('id', '=', $data['id'])->update(
            ['show' => $data['show']]
        )){
            $response = ['code' => 0,'msg'=>'成功!'];
        }else{
            $response = ['code' => 1,'msg'=>'失败!'];
        }
        return response()->json($response);
    }



    public function edit(Request $request){

        if ($request->method()=='POST'){
            $id = $request->id;
            $data = $request->all();
            unset($data['_token']);
            $data['add_time']=time();

            if (DB::table('admin')->where('id', '=', $id)->update(
                    ['username' => $data['username'],
                        'userpwd' => bcrypt($data['userpwd']),
                        'show'=>$data['show'],
                        'add_time' => $data['add_time'],
                    ]
            )){
                $response = ['code' => 0,'msg'=>'修改成功!'];
            }else{
                $response = ['code' => 1,'msg'=>'修改成功!'];
            }
            return $response;
        }else{

            $id = $request->id;
            $data = DB::table('admin')->where('id', '=', $id)->get()->toArray();
//            dd($data);
            return view('admin.manager.edit', ['data' => $data]);
        }
    }

}
