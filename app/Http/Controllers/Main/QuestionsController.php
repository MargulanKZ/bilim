<?php

namespace App\Http\Controllers\Main;

use App\Entities\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
$data = null;
class QuestionsController extends Controller
{

    public function show($id)
    {

    }

    public function test($id)
    {
        if (Auth::guest())
        {
            return redirect(route('login'));
        }
        $data = get_all_questions($id);
        return view('main.testing',['data'=>$data,'l_id'=>$id]);

    }

    public function check(Request $request){
        $answers = null;
        $lect = $request['lecture'];
        foreach ($request->input() as $key=>$value){
            if($key!='_token'){
                $answers[$key]=+$request[$key];
            }
        };
        $correct_answers = get_correct_answers($lect);
        $data = get_all_questions($lect);
        foreach ($data as $q=>$a){

            $data[$q]['correct'] = $correct_answers[$q];
            if (!isset($answers[$q])){
                $data[$q]['incorrect'] = 0;
            }
            elseif($correct_answers[$q]!=$answers[$q]){
                $data[$q]['incorrect'] = $answers[$q];
            }

        }

        return view('main.result',['data'=>$data]);
    }
}
