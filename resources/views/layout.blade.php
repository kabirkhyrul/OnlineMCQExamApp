<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{$site_title}}</title>
    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/datatables.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('partials\sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('partials\topBar')
                <!-- Begin Page Content -->
                <div class="container">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            @include('partials/modal')
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <script>
                            document.write(new Date().getFullYear());
                            </script> People of this world. Application Developed By <strong>Khyrul
                                Kabir</strong></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{ asset('vendor/datatables/datatables.min.js')}}"></script>
        <script src="{{ asset('vendor/ckeditor/ckeditor.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('vendor/sweet-alert/sweetalert2@9.js')}}"></script>
        <script src="{{ asset('js/admin.js')}}"></script>
        <script>
        function notification(e,f,a,b,c){Swal.fire({position:"top-start",title:e,html:f,icon:a,timer:b,timerProgressBar:!0,toast:c})}function resetStat(){$.ajax({method:"GET",url:"{{route('reset')}}",data:{token:"{{csrf_token()}}"}}).done(function(b){notification(b.type,b.message,b.type,1e3,1),location.reload()})}function getResult(){$.ajax({type:"POST",url:"{{route('examin')}}",data:$("#ansSheet").serializeArray(),success:function(a){Swal.fire({position:"top-start",title:a.title,html:a.message,icon:a.type,timer:0,timerProgressBar:!0,toast:0}).then(()=>{location.replace("{{route('dash')}}")})}})}
        </script>
        @if(Auth::user()->role=='admin')
        <script>
        function entryData(){$("#editor").val(CKEDITOR.instances.editor.getData()),$.ajax({type:"POST",url:"{{route('question.store')}}",data:$("#entryForm").serializeArray(),success:function(a){$("#question").modal("hide"),$("#questionTable").DataTable().ajax.reload(),notification(a.type,a.message,a.type,1e3,1),$("#entryForm").trigger("reset")}})}function subjectEntry(){$.ajax({type:"POST",url:"{{route('subject.store')}}",data:$("#subjectForm").serializeArray(),success:function(a){notification(a.type,a.message,a.type,1e3,1)}})}function examEntry(){$.ajax({type:"POST",url:"{{route('exam.store')}}",data:$("#examForm").serializeArray(),success:function(a){notification(a.type,a.message,a.type,1e3,1)}})}function destroy(a){$.ajax({url:"question/"+a,type:"DELETE",data:{id:a,_token:"{{ csrf_token() }}"},success:function(a){notification(a.type,a.message,a.type,1e3,1),$("#questionTable").DataTable().ajax.reload()}})}function update(b){var c=$(b).data("id");$.ajax({url:"question/"+c+"/edit",type:"GET",data:{id:c,_token:"{{ csrf_token() }}"},success:function(){}})}CKEDITOR.replace("editor",{extraPlugins:"confighelper"});
        </script>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <script>
        notification('error', '{{ $error }}');
        </script>
        @endforeach
        @endif
        @yield('script')
</body>
<!-- END: Body-->

</html>