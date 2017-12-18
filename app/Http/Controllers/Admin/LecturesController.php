<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Lecture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            $objLecture->where('id', $id)->delete();
            echo "success";
        }

    }
}
