<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class DashController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {       
        return view('index');
    }
    public function reset()
    {       
        DB::table('stats')->where('user_id',Auth::id())->update(['exam_take'=>0,'avarage_mark' => "0"]);
        return response()->json(['type' => 'success','message' => 'Reseted']);
    }

}