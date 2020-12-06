@extends('layout')
@section('content')
<!-- Zero configuration table -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="m-0 font-weight-bold text-primary">All Questions
                    <button class="float-right btn btn-facebook" href="#" data-toggle="modal" data-target="#question"
                        type="button">
                        <i class="fa fa-plus-circle mr-1"></i>
                        New Question
                    </button></h4>
            </div>
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="table-responsive">
                        <table id="questionTable" class="table table-bordered table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th class="col-auto">Question</th>
                                    <th class="col-auto">Option A</th>
                                    <th class="col-auto">Option B</th>
                                    <th class="col-auto">Option C</th>
                                    <th class="col-auto">Option D</th>
                                    <th class="col-auto">Answare</th>
                                    <th class="col-auto">Subject</th>
                                    <th class="col-auto">Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Zero configuration table -->
@endsection
@section('script')
<script>
var table=$("#questionTable").DataTable({responsive:1,ajax:"{{route('question.data')}}",columns:[{data:"id"},{data:"question"},{data:"option_a"},{data:"option_b"},{data:"option_c"},{data:"option_d"},{data:"answare"},{data:"subject.title"},{data:null,defaultContent:"<button id='edit' class='btn btn-sm btn-outline-warning'>Edit</button><button class='btn btn-sm btn-outline-danger' id='delete'>Delete</button>"}]});$("#questionTable tbody").on("click","#edit",function(){var a=table.row($(this).parents("tr")).data();console.log(a);$("#question").modal("show"),CKEDITOR.instances.editor.setData(a.question),$("#option_a").val(a.option_a),$("#option_b").val(a.option_b),$("#option_c").val(a.option_c),$("#option_d").val(a.option_d),$("#answare").val(a.answare),$("#subject option[value=\""+a.subject_id+"\"]").prop("selected",!0),$("#idHolder").empty().append("<input type=\"hidden\" name=\"id\" value=\""+a.id+"\">")}),$("#questionTable tbody").on("click","#delete",function(){var a=table.row($(this).parents("tr")).data();destroy(a.id)});
</script>
@endsection