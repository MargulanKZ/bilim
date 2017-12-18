<?php

namespace App\Http\Controllers\Main;

use App\Entities\Lecture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LecturesController extends Controller
{
    public function index()
    {
        $lectures = Lecture::paginate(3);

        return view('main.home', ['lectures' => $lectures]);
    }

    public function show($id)
    {
        $lecture = Lecture::find($id);

        if (!$lecture) {
            return abort(404);
        }
        return view('main.lecture', ['lecture' => $lecture]);
    }

}
