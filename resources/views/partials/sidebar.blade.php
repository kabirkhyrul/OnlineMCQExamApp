<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/user/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{$site_title}}</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="{{route('dash')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @if(Auth::user()->role == 'admin')
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Entry -->
    <li class="nav-item ">
        <a class="nav-link" href="{{route('question.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Question Bank</span></a>
    </li>
    <!-- Nav Item - Subject -->
    <li class="nav-item ">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#subject">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Subject Entry</span></a>
    </li>
    <!-- Nav Item - Exam Setting -->
    <li class="nav-item ">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exam">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Exam Setting</span></a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Exam
    </div>
    <!-- Nav Item - 10 Questions -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('exam.10q')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>10 Random Questions</span></a>
    </li>
    <!-- Nav Item - 50 Questions -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('exam.50q')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>50 Random Questions</span></a>
    </li>
    <!-- Nav Item - 100 Questions -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('exam.100q')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>100 Random Questions</span></a>
    </li>
    <!-- Nav Item - Admin Questions -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('exam.admin')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>AI Questions</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->