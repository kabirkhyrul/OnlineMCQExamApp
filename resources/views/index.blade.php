@extends('layout')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <button onclick="resetStat()" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-recycle fa-sm text-white-50 mr-1"></i> Reset Exam Statistics</a>
</div>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Question</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\QuestionBank::count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Exams Taken</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Stat::find(Auth::id())->exam_take}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Avarage Marks</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{\App\Stat::find(Auth::id())->avarage_mark}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Subjectwise Question Collection</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm table-borderless  text-center" id="zero-configuration">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Question amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(App\Subject::all() as $sub)
                        <tr>
                            <td>
                                {{$sub->title}}
                            </td>
                            <td>
                                {{App\QuestionBank::where('subject_id',$sub->id)->count()}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">AI Exam Setting</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm table-borderless  text-center" id="zero-configuration">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Question amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(App\Subject::all() as $sub)
                        <tr>
                            <td>
                                {{$sub->title}}
                            </td>
                            <td>
                                {{App\ExamSetting::where('subject_id',$sub->id)->first()->number_of_question}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- // Statistics Card section end-->
@endsection