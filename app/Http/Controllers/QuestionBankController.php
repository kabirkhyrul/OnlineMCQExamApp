<?php
namespace App\Http\Controllers;
use App\QuestionBank;
use Illuminate\Http\Request;
use DB;
use Response;
class QuestionBankController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('question.index');
    }
    public function data()
    {
        $data = QuestionBank::with(['subject'])->get()->toArray();
        return Response::json(array( 'data' => array_values($data)));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(QuestionBank::updateOrCreate(['id'=>$request->id],$request->except('_token'))){
            return response()->json(['type' => 'success','message' => 'Done!']);
        }
        return response()->json(['type' => 'error','message' => 'Error!']);
    }   
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = QuestionBank::destroy($request->id);
        if ($data) {
            return response()->json(['type' => 'success','message' => 'Deleted!']);
        } 
        return response()->json(['type' => 'error','message' => 'Error!']);
    }
}