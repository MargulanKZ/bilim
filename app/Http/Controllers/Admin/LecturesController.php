<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Lecture;
use App\Entities\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LecturesController extends Controller
{
    public function index()
    {
        $lect = new Lecture();
        $lectures = $lect->get();

        return view('admin.lectures.index',['lectures'=>$lectures]);
    }

    public function add()
    {
        return view('admin.lectures.add');
    }

    public function addRequestLecture(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:25',
                'description' => 'required'
            ]);
            $lect = new Lecture();
            $lect = $lect->create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'video' => $request->input('video')
            ]);
            if ($lect) {
                return redirect()->route('admin.lect')->with('success', 'Лекция успешно добавлена');
            }
            return back()->with('error', 'Не удалось добавить');
        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $lecture = Lecture::find($id);
        if(!$lecture) {
            return abort(404);
        }
        return view('admin.lectures.edit',['lecture'=>$lecture]);
    }
    public function editRequestLecture(Request $request,$id)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:25',
                'description' => 'required'
            ]);
            $objLecture = Lecture::find($id);
            if(!$objLecture) {
                return abort(404);
            }
            $objLecture->title = $request->input('title');
            $objLecture->description = $request->input('description');
            $objLecture->video = $request->input('video');
            if($objLecture->save()) {
                return redirect()->route('admin.lect')->with('success', 'Лекция успешно изменена');
            }
            return back()->with('error', 'Не удалось изменить');
        }catch(ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            $id = (int)$request->input('id');
            $objLecture = new Lecture();
            $questions = DB::table('questions')->where('lecture_id',$id)->get();
            DB::table('questions')->where('lecture_id', '=', $id)->delete();
            $objLecture->where('id', $id)->delete();
            foreach ($questions as $q){
                DB::table('answers')->where('question_id','=',$q->id)->delete();
            }
            echo "success";
        }

    }

    public function q_delete(Request $request)
    {
        if($request->ajax()) {
            $id = (int)$request->input('id');
            $objQuestion = new Question();
            $objQuestion->where('id', $id)->delete();
            DB::table('answers')->where('question_id', '=', $id)->delete();
            echo "success";
        }

    }

    public function tests($id){
        $data = get_all_questions($id);
        return view('admin.lectures.test',['id'=>$id,'questions'=>$data]);
    }


    public function add_question($id){
        return view('admin.lectures.add_question',['id'=>$id]);
    }

    public function create_question(Request $request){

        $lect_id = $request->input("lecture");
        $question = $request->input("question");
        DB::table('questions')->insert(
            ['question' => $question, 'lecture_id' => $lect_id]
        );
        $question_id = Question::all()->last()->id;

        foreach ($request->input() as $key => $value) {
            if(starts_with($key, 'answer')){
                DB::table('answers')->insert(
                  ['answer'=>$request[$key],'question_id'=>$question_id,'check'=>0]
                );
            }
            elseif ($key == 'correct'){
                DB::table('answers')->insert(
                    ['answer'=>$request[$key],'question_id'=>$question_id,'check'=>1]
                );
            }
        }

        return redirect(route('lect.tests',['id'=>$lect_id]));
    }

    public function show_results(){
        $questions = DB::table('users')
            ->rightJoin('results', 'users.id', '=', 'results.user_id')
            ->get();

        if(request()->has('lecture')){
            $questions = DB::table('users')
                ->rightJoin('results', 'users.id', '=', 'results.user_id')
                ->where('lecture_id',request('lecture'))
                ->get();
        }
        elseif(request()->has('user')){
            $questions = DB::table('users')
                ->rightJoin('results', 'users.id', '=', 'results.user_id')
                ->where('users.id',request('user'))
                ->get();
        }
        elseif (request()->has('sort')){
            $questions = DB::table('users')
                ->rightJoin('results', 'users.id', '=', 'results.user_id')
                ->orderBy('correct_answers',request('sort'))
                ->get();
        }


        return view('admin.lectures.results',['data'=>$questions]);
    }
}
