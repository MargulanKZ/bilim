<?php
/**
 * Created by PhpStorm.
 * User: Margulan
 * Date: 10.12.2017
 * Time: 13:02
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index(){
        return view('account.index');
    }

    public function user_result(){
        $id = Auth::user()->id;
        $results = DB::table('results')
            ->where('user_id', $id)
            ->get();
        return view('account.results',['data'=>$results]);
    }
}