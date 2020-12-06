 @extends('layouts.app')
 @section('content')
 <!-- banner part start-->
 <section class="banner_part" id="banner">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-6 col-xl-6">
                 <div class="banner_text">
                     <div class="banner_text_iner">
                         <h5>Every unemployed man yearns to learn</h5>
                         <h1>Making Your Job Preparation
                             More Better</h1>
                         <p>Take exam as many as you want. This app will take your exam as exam taker do. It's Time
                             based Auto Submitted and Make Result By Awesome AI system</p>
                         <a href="{{ route('register') }}" class="btn_1">Let's Have a Look </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- banner part start-->
 <!-- feature_part start-->
 <section class="feature_part" id="feature">
     <div class="container">
         <div class="row">
             <div class="col-sm-6 col-xl-3 align-self-center">
                 <div class="single_feature_text ">
                     <h2>Awesome <br> Feature</h2>
                 </div>
             </div>
             <div class="col-sm-6 col-xl-3">
                 <div class="single_feature">
                     <div class="single_feature_part">
                         <span class="single_feature_icon"><i class="fa fa-newspaper"></i></span>
                         <h4>Question Number</h4>
                         <p>Can Take 10, 50 and 100 Question Based Exam</p>
                     </div>
                 </div>
             </div>
             <div class="col-sm-6 col-xl-3">
                 <div class="single_feature">
                     <div class="single_feature_part">
                         <span class="single_feature_icon"><i class="fas fa-retweet"></i></span>
                         <h4>Instant Result</h4>
                         <p>As soon as you submit answer sheet, you will get your result. also can see wrong answer's
                             correct option</p>
                     </div>
                 </div>
             </div>
             <div class="col-sm-6 col-xl-3">
                 <div class="single_feature">
                     <div class="single_feature_part single_feature_part_2">
                         <span class="single_service_icon style_icon"><i class="fas fa-street-view"></i></span>
                         <h4>Statistics</h4>
                         <p>You can see how many exam you have been taken, and your average marks
                         </p>
                         <p>Find your current position of study</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- upcoming_event part start-->
 <!-- learning part start-->
 <section class="learning_part" id="how-to">
     <div class="container">
         <div class="row align-items-sm-center align-items-lg-stretch">
             <div class="col-md-7 col-lg-7">
                 <div class="learning_img">
                     <img class="img-responsive" src="img/learning_img.png" alt="">
                 </div>
             </div>
             <div class="col-md-5 col-lg-5 pb-5">
                 <div class="learning_member_text pb-4">
                     <h5>Steps to take exam</h5>
                     <h1>Complete Two Steps, And Justify your Skills </h1>
                     <br>
                     <ul>
                         <li><span class="ti-pencil-alt"></span>
                             Complete Registration by clicking Register button
                         </li>
                         <li><span class="ti-ruler-pencil"></span>Choose How many question you want and take exam</li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- learning part end-->
 @endsection