<?php

namespace App\Http\Controllers;

use App\ExamSetting;
use Illuminate\Http\Request;
use App\QuestionBank;
use App\Stat;
use Auth;
use DB;

class ExamController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function tenqexam()
	{
		$question = QuestionBank::all()->random(10);
		$title = "Ten Question's Exam";
		$time = 600;
		return view('exam.answaresheet', compact('question', 'title', 'time'));
	}
	public function fiftyqexam()
	{
		$question = QuestionBank::all()->random(50);
		$title = "Fifty Question's Exam";
		$time = 3000;
		return view('exam.answaresheet', compact('question', 'title', 'time'));
	}
	public function hundredqexam()
	{
		$question = QuestionBank::all()->random(10);
		$title = "Hundred Question's Exam";
		$time = 6000;
		return view('exam.answaresheet', compact('question', 'title', 'time'));
	}

	public function adminexam()
	{
		$setting = ExamSetting::all();
		$question = collect();

		foreach ($setting as $s) {
			$question->push(QuestionBank::where('subject_id', $s->subject_id)->get()->random($s->number_of_question));
		}
		$title = "AI Generated Question";
		$time = ExamSetting::sum('number_of_question') * 60;
		$question = $question->flatten();
		return view('exam.answaresheet', compact('question', 'title', 'time'));
	}

	public function examin(Request $request)
	{
		$stat = Stat::where('user_id', Auth::id())->first();
		$ans = $request->except('_token');
		$mark = 0;
		$correct = '';
		foreach ($ans as $key => $value) {
			$answare = QuestionBank::find(substr($key, 2))->answare;
			$q= QuestionBank::find(substr($key, 2))->question;
			if ($answare == $value) {
				$mark++;
			} else {
				$mark -= 0.25;
				$correct .= trim($q).'- A: '.$answare . '(W: ' . $value . '), ';
			}
		}
		DB::table('stats')->where('user_id', Auth::id())->update(['avarage_mark' => ($stat->avarage_mark == 0) ? $mark : ($stat->avarage_mark + $mark) / 2]);
		DB::table('stats')->where('user_id', Auth::id())->increment('exam_take');
		$message =  'Total Answered: ' . count($ans) . ', Obtained Mark is: ' . $mark . ' And Correct Answer is: ' . $correct;
		return response()->json(['title' => 'Result', 'type' => 'success', 'message' => $message]);
	}
}