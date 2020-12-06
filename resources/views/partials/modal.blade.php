<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
            </div>
        </div>
    </div>
</div>
@if(Auth::user()->role == 'admin')
<!-- Subject Modal-->
<div class="modal fade" id="subject" tabindex="-3" role="dialog" aria-labelledby="subject" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subject Entry</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="subjectForm">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="Enter Subject Title" name="title">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-user btn-block" onclick="subjectEntry()">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Exam Modal-->
<div class="modal fade" id="exam" tabindex="-3" role="dialog" aria-labelledby="subject" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Exam Setting</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="examForm">
                    @csrf
                    <table>
                        <tr>
                            <th>Subject</th>
                            <th>Question number</th>
                        </tr>
                        @foreach(App\ExamSetting::all() as $sub)
                        <tr>
                            <td>
                                {{$sub->subject->title}}
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-user" name="{{$sub->subject_id}}"
                                    value="{{$sub->number_of_question}}">
                            </td>
                            

                        </tr>

                        @endforeach
                    </table>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-user btn-block" onclick="examEntry()">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Question Modal -->
<div class="modal fade" id="question" tabindex="-3" role="dialog" aria-labelledby="subject" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Question Entry</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="entryForm" class="user">
                    @csrf
                    <div id="idHolder">
                    </div>
                    <div class="form-body">
                        <div class="row mb-1 py-1">
                            <div class="col">
                                <div class="form-label-group">
                                    <textarea class="form-control" id="editor" name="question"
                                        placeholder="Enter Question Here">
                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-auto">
                                <div class="form-label-group">
                                    <input type="text" id="option_a" class="form-control rounded-pill mt-2 mr-2 mb-2"
                                        name="option_a" placeholder="Option A">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-label-group">
                                    <input type="text" id="option_b" class="form-control rounded-pill mt-2 mr-2 mb-2"
                                        name="option_b" placeholder="Option B">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-label-group">
                                    <input type="text" id="option_c" class="form-control rounded-pill mt-2 mr-2 mb-2"
                                        name="option_c" placeholder="Option C">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-label-group">
                                    <input type="text" id="option_d" class="form-control rounded-pill mt-2 mr-2 mb-2"
                                        name="option_d" placeholder="Option D">
                                </div>
                            </div>
                            <div class="col-auto">
                                <select class="form-control rounded-pill mt-2 mr-2 mb-2" name="subject_id" id="subject">
                                    <option selected="" hidden="" value="">
                                        Select One
                                    </option>
                                    @foreach(App\Subject::all() as $sub)
                                    <option value="{{$sub->id}}">{{$sub->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <div class="form-label-group">
                                    <input type="text" id="answare" class="form-control rounded-pill mt-2 mr-2 mb-2"
                                        name="answare" placeholder="Answare">
                                </div>
                            </div>
                            <div class="col-auto mt-2">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-sm font-weight-bold float-left btn-sm" type="button"
                    data-dismiss="modal">Cancel</button>
                <div class="btn-group" role="group" aria-label="Vertical button group">
                    <div class="btn-group" role="group">
                        <button id="btnGroupVerticalDrop6" type="button" class="btn btn-success btn-sm font-weight-bold"
                            onclick="entryData()">
                            Submit
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupVerticalDrop7" type="reset" class="btn btn-danger btn-sm font-weight-bold">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif