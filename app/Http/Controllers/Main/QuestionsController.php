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
        if (Auth::guest()) {
            return redirect(route('login'));
        }
        $data = get_all_questions($id);
        return view('main.testing', ['data' => $data, 'l_id' => $id]);

    }

    public function check(Request $request)
    {
        $answers = null;
        $lect = $request['lecture'];
        foreach ($request->input() as $key => $value) {
            if ($key != '_token') {
                $answers[$key] = +$request[$key];
            }
        };
        $correct_answers = get_correct_answers($lect);

        $data = get_all_questions($lect);
        $correct_answers_count = count($data);
        foreach ($data as $q => $a) {

            $data[$q]['correct'] = $correct_answers[$q];
            if (!isset($answers[$q])) {
                $data[$q]['incorrect'] = 0;
                $correct_answers_count--;
            } elseif ($correct_answers[$q] != $answers[$q]) {
                $data[$q]['incorrect'] = $answers[$q];
                $correct_answers_count--;
            }
        }
        $u_id = Auth::id();
        $res = DB::table('results')
            ->where([['user_id', $u_id], ['lecture_id', $lect]])
            ->get();
        if (count($res)) {
            DB::table('results')
                ->where([['user_id', $u_id], ['lecture_id', $lect]])
                ->update(['user_id' => $u_id, 'lecture_id' => $lect, 'correct_answers' => $correct_answers_count, 'all_answers' => count($data)]);
        }
        else{
            DB::table('results')->insert(
                ['user_id' => $u_id, 'lecture_id' => $lect, 'correct_answers' => $correct_answers_count, 'all_answers' => count($data)]
            );
        }



        return view('main.result', ['data' => $data, 'lecture' => $lect]);
    }
}
