@extends('layouts.sitelayouts')
@section('title','خط انتاج ')
@section('content')
<?php $setwhats = Mrabe3Helper::Getsettings(); ?>
<section class="about-layout2 about pb-0">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="heading heading_color">
                 <h2 class="heading__title">
                   <img src="/site/assets/images/arrow-right.png">
خط إنتاج
                   <img src="/site/assets/images/arrow-left.png">
                 </h2>
              </div>
            </div>
          </div>
     <div class="card_details">
        <div class="row">
            <div class="col-md-4">
              <div class="about__img">
                @if($Data[0]->img!='')
                <img src="{{$Data[0]->img}}" alt="about" class="img-fluid w-100">

                @else
                <img src="/site/assets/images/study_details.png" alt="about" class="img-fluid w-100">
                @endif
              </div>
            </div>
            <div class="col-md-8">
              <div class="heading heading_color">
                <h2 class="heading__title mb-2">
                  <img src="/site/assets/images/arrow-right.png">
                  {{$Data[0]->title}} 
                  <img src="/site/assets/images/arrow-left.png">
                </h2>
             </div>
  
  

             <p class="about_desc">
{!!$Data[0]->details!!}             </p>
          <div class="text-left">
              <a href="https://api.whatsapp.com/send?phone={{$setwhats[0]->whatsapp}}" class="btn btn_request">طلب الدراسة</a>
              </div>
            </div>
          </div><!-- /.row -->
     </div>

      </div><!-- /.container -->
    </section>

    <section class="studies_details">
        <div class="container">
            <div class="card_details">
                <div class="row">
            
                    <div class="col-sm-12 col-md-12 col-lg-3">
                      <aside class="mb-30">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">وصف المشروع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">المنتجات /الخدمات</a>
                            </li>
                           <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">المؤاشرت مالية</a>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">مواصفات المشروع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab">محتوى الدراسة</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">الدولة</a>
                            </li>
                           
                        </ul>
                      </aside>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <p>
                                {!!$Data[0]->projectdetails!!}

                                 </p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <p>
                                <?php $products=explode("-",$Data[0]->productstudies);
             if(count($products)>0)
             {
                 foreach($products as $pro){
                 ?>
                  <p>
                 <?php echo $pro;?>
                
                 </p>
                 <?php
             }}
             ?>                    
                            </div>
                          <!--  <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <p>
                                {!!$Data[0]->financial!!}
                                 </p>
                            </div>-->
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                            <?php $projectdesc=explode("-",$Data[0]->projectdesc);
             if(count($projectdesc)>0)
             {
                 foreach($projectdesc as $proj){
                 ?>
                  <p>
                 <?php echo $proj;?>
                
                 </p>
                 <?php
             }}
             ?>  
                               
                            </div>
                            <div class="tab-pane" id="tabs-5" role="tabpanel">
                            <?php $studycontent=explode("-",$Data[0]->studycontent);
             if(count($studycontent)>0)
             {
                 foreach($studycontent as $cont){
                 ?>
                  <p>
                 <?php echo $cont;?>
                
                 </p>
                 <?php
             }}
             ?>  
                            </div>
                            <div class="tab-pane" id="tabs-6" role="tabpanel">
                            <?php $country=explode("-",$Data[0]->country);
             if(count($country)>0)
             {
                 foreach($country as $scont){
                 ?>
                  <p >
                 <?php echo $scont;?>
                
                 </p>
                 <?php
             }}
             ?>  
                            </div>
                        </div>
                  
          
                    </div>
                  </div><!-- /.row -->
            </div>
          
        </div>

    </section>


@endsection