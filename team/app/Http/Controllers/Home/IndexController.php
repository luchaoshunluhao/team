<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class IndexController extends Controller
{
    //首页
    public function default ()
    {
        //查询下拉菜单数据
        $game_name = DB::table('message')->groupBy('game_name')->select('game_name')->get()->toArray();
        foreach ($game_name as $item){
            $ga_name[] = $item->game_name;
        }
        $game_stage = DB::table('message')->groupBy('game_stage')->select('game_stage')->get()->toArray();
        foreach ($game_stage as $item){
            $ga_stage[] = $item->game_stage;
        }
        $game_project = DB::table('message')->groupBy('game_project')->select('game_project')->get()->toArray();
        foreach ($game_project as $item){
            $ga_project[] = $item->game_project;
        }
        $citys = DB::table('message')->groupBy('city')->select('city')->get()->toArray();
        foreach ($citys as $item){
            $city[] = $item->city;
        }
        $user_name = DB::table('user')->select('id', 'user_name')->get()->toArray();
        $user_play = DB::table('user')->groupBy('play')->select('play')->get()->toArray();
        foreach ($user_play as $item){
            $play[] = $item->play;
        }
        //给视图展示并赋值
        return view('home.index.default', compact('ga_name', 'ga_stage', 'ga_project', 'city', 'user_name', 'play'));
    }
    //列表页
    public function list ()
    {
        //获取比赛id
        $mess_id = Input::get('mess_id');
        //查询各列的统计的数据
        $username = DB::table('message')
            ->leftJoin('user as a', 'message.user_a', 'a.id')
            ->leftJoin('user as b', 'message.user_b', 'b.id')
            ->where('message.id', $mess_id)
            ->select('a.user_name as a_user', 'a.id as a_id', 'message.id', 'b.user_name as b_user', 'a.image as a_pic', 'b.image as b_pic')
            ->get()->toArray();
        //user_a的得失分情况
        $user_a = DB::table('game_data')
            ->leftJoin('user as a', 'game_data.user_id', 'a.id')
            ->leftJoin('user as b', 'game_data.user_id', 'b.id')
            ->where('mess_id', $mess_id)
            ->where('a.user_name', $username[0]->a_user)
            ->get()->toArray();
        $a_count = [
            'fqdf' => 0, 'fqsf' => 0, 'zsdf' => 0,'zssf' => 0,'fsdf' => 0,
            'fssf' => 0,'csdf' => 0,'cssf' => 0,'kzdf' => 0,'kzsf' => 0,
            'fqddf' => 0,'fqdsf' => 0,'jqddf' => 0,'jqdsf' => 0,
            'zhddf' => 0,'zhdsf' => 0,'xcddf' => 0,'xcdsf' => 0,
            'jfqdf' => 0, 'jfqsf' => 0, 'dsbdf' => 0, 'dsbsf' => 0,
            'dsibdf' => 0, 'dsibsf' => 0, 'dwbdf' => 0, 'dwbsf' => 0,
            'dlbdf' => 0, 'dlbsf' => 0, 'dlbhdf' => 0, 'dlbhsf' => 0
        ];
        foreach ($user_a as $item)
        {
            //统计发球得分
            if($item->bat_number == '发球' && $item->get_lose == '得')
            {
                $a_count['fqdf'] += 1;
            }
            //发球失分
            if($item->bat_number == '发球' && $item->get_lose == '失')
            {
                $a_count['fqsf'] += 1;
            }
            //正手得分
            if($item->tool == '正手' && $item->get_lose == '得')
            {
                $a_count['zsdf'] += 1;
            }
            //正手失分
            if($item->tool == '正手' && $item->get_lose == '失')
            {
                $a_count['zssf'] += 1;
            }
            //反手得分
            if($item->tool == '反手' && $item->get_lose == '得')
            {
                $a_count['fsdf'] += 1;
            }
            //反手失分
            if($item->tool == '反手' && $item->get_lose == '失')
            {
                $a_count['fssf'] += 1;
            }
            //侧身得分
            if($item->tool == '侧身' && $item->get_lose == '得')
            {
                $a_count['csdf'] += 1;
            }
            //侧身失分
            if($item->tool == '侧身' && $item->get_lose == '失')
            {
                $a_count['cssf'] += 1;
            }
            //控制得分
            if(($item->tool == '控制' || $item->tool == '摆' || $item->tool == '劈') && $item->get_lose == '得')
            {
                $a_count['kzdf'] += 1;
            }
            //控制失分
            if(($item->tool == '控制' || $item->tool == '摆' || $item->tool == '劈') && $item->get_lose == '失')
            {
                $a_count['kzsf'] += 1;
            }
            //发抢段得分
            if(($item->bat_number == '发球' || $item->bat_number == '第三板') && $item->get_lose == '得')
            {
                $a_count['fqddf'] += 1;
            }
            //发抢段失分
            if(($item->bat_number == '发球' || $item->bat_number == '第三板') && $item->get_lose == '失')
            {
                $a_count['fqdsf'] += 1;
            }
            //接抢段得分
            if(($item->bat_number == '接发球' || $item->bat_number == '第四板') && $item->get_lose == '得')
            {
                $a_count['jqddf'] += 1;
            }
            //接抢段失分
            if(($item->bat_number == '接发球' || $item->bat_number == '第四板') && $item->get_lose == '失')
            {
                $a_count['jqdsf'] += 1;
            }
            //转换段得分
            if(($item->bat_number == '第五板' || $item->bat_number == '第六板') && $item->get_lose == '得')
            {
                $a_count['zhddf'] += 1;
            }
            //转换段失分
            if(($item->bat_number == '第五板' || $item->bat_number == '第六板') && $item->get_lose == '失')
            {
                $a_count['zhdsf'] += 1;
            }
            //相持段得分
            if($item->bat_number == '相持段' && $item->get_lose == '得')
            {
                $a_count['xcddf'] += 1;
            }
            //相持段失分
            if($item->bat_number == '相持段' && $item->get_lose == '失')
            {
                $a_count['xcdsf'] += 1;
            }
            //接发球得分
            if($item->bat_number == '接发球' && $item->get_lose == '得')
            {
                $a_count['jfqdf'] += 1;
            }
            //接发球失分
            if($item->bat_number == '接发球' && $item->get_lose == '失')
            {
                $a_count['jfqsf'] += 1;
            }
            //第三板得分
            if($item->bat_number == '第三板' && $item->get_lose == '得')
            {
                $a_count['dsbdf'] += 1;
            }
            //第三板失分
            if($item->bat_number == '第三板' && $item->get_lose == '失')
            {
                $a_count['dsbsf'] += 1;
            }
            //第四板得分
            if($item->bat_number == '第四板' && $item->get_lose == '得')
            {
                $a_count['dsibdf'] += 1;
            }
            //第四板失分
            if($item->bat_number == '第四板' && $item->get_lose == '失')
            {
                $a_count['dsibsf'] += 1;
            }
            //第五板得分
            if($item->bat_number == '第五板' && $item->get_lose == '得')
            {
                $a_count['dwbdf'] += 1;
            }
            //第五板失分
            if($item->bat_number == '第五板' && $item->get_lose == '失')
            {
                $a_count['dwbsf'] += 1;
            }
            //第六板得分
            if($item->bat_number == '第六板' && $item->get_lose == '得')
            {
                $a_count['dlbdf'] += 1;
            }
            //第六板失分
            if($item->bat_number == '第六板' && $item->get_lose == '失')
            {
                $a_count['dlbsf'] += 1;
            }
            //第六板后得分
            if($item->bat_number == '第六板后' && $item->get_lose == '得')
            {
                $a_count['dlbhdf'] += 1;
            }
            //第六板后失分
            if($item->bat_number == '第六板后' && $item->get_lose == '失')
            {
                $a_count['dlbhsf'] += 1;
            }
        }
        //user_b的得失分情况
        $user_b = DB::table('game_data')
            ->leftJoin('user as a', 'game_data.user_id', 'a.id')
            ->leftJoin('user as b', 'game_data.user_id', 'b.id')
            ->where('mess_id', $mess_id)
            ->where('a.user_name', $username[0]->b_user)
            ->get()->toArray();
        $b_count = [
            'fqdf' => 0, 'fqsf' => 0, 'zsdf' => 0,'zssf' => 0,'fsdf' => 0,
            'fssf' => 0,'csdf' => 0,'cssf' => 0,'kzdf' => 0,'kzsf' => 0,
            'fqddf' => 0,'fqdsf' => 0,'jqddf' => 0,'jqdsf' => 0,
            'zhddf' => 0,'zhdsf' => 0,'xcddf' => 0,'xcdsf' => 0,
            'jfqdf' => 0, 'jfqsf' => 0, 'dsbdf' => 0, 'dsbsf' => 0,
            'dsibdf' => 0, 'dsibsf' => 0, 'dwbdf' => 0, 'dwbsf' => 0,
            'dlbdf' => 0, 'dlbsf' => 0, 'dlbhdf' => 0, 'dlbhsf' => 0
        ];
        foreach ($user_b as $item)
        {
            //统计发球得分
            if($item->bat_number == '发球' && $item->get_lose == '得')
            {
                $b_count['fqdf'] += 1;
            }
            //发球失分
            if($item->bat_number == '发球' && $item->get_lose == '失')
            {
                $b_count['fqsf'] += 1;
            }
            //正手得分
            if($item->tool == '正手' && $item->get_lose == '得')
            {
                $b_count['zsdf'] += 1;
            }
            //正手失分
            if($item->tool == '正手' && $item->get_lose == '失')
            {
                $b_count['zssf'] += 1;
            }
            //反手得分
            if($item->tool == '反手' && $item->get_lose == '得')
            {
                $b_count['fsdf'] += 1;
            }
            //反手失分
            if($item->tool == '反手' && $item->get_lose == '失')
            {
                $b_count['fssf'] += 1;
            }
            //侧身得分
            if($item->tool == '侧身' && $item->get_lose == '得')
            {
                $b_count['csdf'] += 1;
            }
            //侧身失分
            if($item->tool == '侧身' && $item->get_lose == '失')
            {
                $b_count['cssf'] += 1;
            }
            //控制得分
            if(($item->tool == '控制' || $item->tool == '摆' || $item->tool == '劈') && $item->get_lose == '得')
            {
                $b_count['kzdf'] += 1;
            }
            //控制失分
            if(($item->tool == '控制' || $item->tool == '摆' || $item->tool == '劈') && $item->get_lose == '失')
            {
                $b_count['kzsf'] += 1;
            }
            //发抢段得分
            if(($item->bat_number == '发球' || $item->bat_number == '第三板') && $item->get_lose == '得')
            {
                $b_count['fqddf'] += 1;
            }
            //发抢段失分
            if(($item->bat_number == '发球' || $item->bat_number == '第三板') && $item->get_lose == '失')
            {
                $b_count['fqdsf'] += 1;
            }
            //接抢段得分
            if(($item->bat_number == '接发球' || $item->bat_number == '第四板') && $item->get_lose == '得')
            {
                $b_count['jqddf'] += 1;
            }
            //接抢段失分
            if(($item->bat_number == '接发球' || $item->bat_number == '第四板') && $item->get_lose == '失')
            {
                $b_count['jqdsf'] += 1;
            }
            //转换段得分
            if(($item->bat_number == '第五板' || $item->bat_number == '第六板') && $item->get_lose == '得')
            {
                $b_count['zhddf'] += 1;
            }
            //转换段失分
            if(($item->bat_number == '第五板' || $item->bat_number == '第六板') && $item->get_lose == '失')
            {
                $b_count['zhdsf'] += 1;
            }
            //相持段得分
            if($item->bat_number == '相持段' && $item->get_lose == '得')
            {
                $b_count['xcddf'] += 1;
            }
            //相持段失分
            if($item->bat_number == '相持段' && $item->get_lose == '失')
            {
                $b_count['xcdsf'] += 1;
            }
            //接发球得分
            if($item->bat_number == '接发球' && $item->get_lose == '得')
            {
                $b_count['jfqdf'] += 1;
            }
            //接发球失分
            if($item->bat_number == '接发球' && $item->get_lose == '失')
            {
                $b_count['jfqsf'] += 1;
            }
            //第三板得分
            if($item->bat_number == '第三板' && $item->get_lose == '得')
            {
                $b_count['dsbdf'] += 1;
            }
            //第三板失分
            if($item->bat_number == '第三板' && $item->get_lose == '失')
            {
                $b_count['dsbsf'] += 1;
            }
            //第四板得分
            if($item->bat_number == '第四板' && $item->get_lose == '得')
            {
                $b_count['dsibdf'] += 1;
            }
            //第四板失分
            if($item->bat_number == '第四板' && $item->get_lose == '失')
            {
                $b_count['dsibsf'] += 1;
            }
            //第五板得分
            if($item->bat_number == '第五板' && $item->get_lose == '得')
            {
                $b_count['dwbdf'] += 1;
            }
            //第五板失分
            if($item->bat_number == '第五板' && $item->get_lose == '失')
            {
                $b_count['dwbsf'] += 1;
            }
            //第六板得分
            if($item->bat_number == '第六板' && $item->get_lose == '得')
            {
                $b_count['dlbdf'] += 1;
            }
            //第六板失分
            if($item->bat_number == '第六板' && $item->get_lose == '失')
            {
                $b_count['dlbsf'] += 1;
            }
            //第六板后得分
            if($item->bat_number == '第六板后' && $item->get_lose == '得')
            {
                $b_count['dlbhdf'] += 1;
            }
            //第六板后失分
            if($item->bat_number == '第六板后' && $item->get_lose == '失')
            {
                $b_count['dlbhsf'] += 1;
            }
        }
        //获取局数的数据
        $office = DB::table('office')->get()->toArray();

        $a_fqdfl = !empty($a_count['fqdf'] + $a_count['fqsf']) ? $a_count['fqdf'] / ($a_count['fqdf'] + $a_count['fqsf']) * 100 : 0;

        $a_dsabdfl = !empty($a_count['fqddf'] + $a_count['fqdsf']) ? $a_count['fqddf'] / ($a_count['fqddf'] + $a_count['fqdsf']) * 100 : 0;

        $a_dsbdfl = !empty($a_count['jqddf'] + $a_count['jqdsf']) ? $a_count['jqddf'] / ($a_count['jqddf'] + $a_count['jqdsf']) * 100 : 0;

        $a_dlbdfl = !empty($a_count['zhddf'] + $a_count['zhdsf']) ? $a_count['zhddf']/($a_count['zhddf'] + $a_count['zhdsf']) * 100 : 0;

        $a_lbhdfl = !empty($a_count['xcddf'] + $a_count['xcdsf']) ? $a_count['xcddf'] / ($a_count['xcddf'] + $a_count['xcdsf']) * 100 : 0;

        $b_fqdfl = !empty($b_count['fqdf'] + $b_count['fqsf']) ? $b_count['fqdf'] / ($b_count['fqdf'] + $b_count['fqsf']) * 100 : 0;

        $b_dsabdfl = !empty($b_count['fqddf'] + $b_count['fqdsf']) ? $b_count['fqddf'] / ($b_count['fqddf'] + $b_count['fqdsf']) * 100 : 0;

        $b_dsbdfl = !empty($b_count['jqddf'] + $b_count['jqdsf']) ? $b_count['jqddf'] / ($b_count['jqddf'] + $b_count['jqdsf']) * 100 : 0;

        $b_dlbdfl = !empty($b_count['zhddf'] + $b_count['zhdsf']) ? $b_count['zhddf']/($b_count['zhddf'] + $b_count['zhdsf']) * 100 : 0;

        $b_lbhdfl = !empty($b_count['xcddf'] + $b_count['xcdsf']) ? $b_count['xcddf'] / ($a_count['xcddf'] + $a_count['xcdsf']) * 100 : 0;
        //给视图展示并赋值
        return view('home.index.list', compact('username', 'a_count', 'b_count', 'office', 'a_fqdfl', 'b_fqdfl', 'a_dsabdfl', 'b_dsabdfl',  'a_dsbdfl', 'b_dsbdfl', 'a_dlbdfl', 'a_lbhdfl', 'b_dlbdfl', 'b_lbhdfl'));
    }
}
