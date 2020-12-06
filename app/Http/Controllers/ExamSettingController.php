<?php

namespace App\Http\Controllers;

use App\ExamSetting;
use Illuminate\Http\Request;

class ExamSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach ($request->except('_token') as $name => $value) {
            ExamSetting::where('subject_id', $name)->update(['number_of_question' => $value]);
        }

        return response()->json(['type' => 'success', 'message' => 'Done!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExamSetting  $examSetting
     * @return \Illuminate\Http\Response
     */
    public function show(ExamSetting $examSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExamSetting  $examSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamSetting $examSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExamSetting  $examSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamSetting $examSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExamSetting  $examSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamSetting $examSetting)
    {
        //
    }
}