<?php
/**
 * Created by PhpStorm.
 * User: Margulan
 * Date: 10.12.2017
 * Time: 13:02
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
class AccountController extends Controller
{
    public function index(){
        return view('account.index');
    }
}