@extends('layouts.sitelayouts')
@section('title','من نحن')
@section('content')
 
<section class="about-layout2 about">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="about__img">
              <img src="/site/assets/images/about-img.png" alt="about" class="img-fluid w-100">
            </div>
          </div>
          <div class="col-md-6">
            <div class="heading heading_color">
              <h2 class="heading__title">
                <img src="/site/assets/images/arrow-right.png">
                {{$Data[0]->TitleAr}} 
                <img src="/site/assets/images/arrow-left.png">
              </h2>
           </div>

           <p class="about_desc">{!!strip_tags($Data[0]->ContentAr)!!}</p>
          </div>
         
        
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>



    <section class="mission">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="mb-6">
              <div class="heading heading_white">
                <h2 class="heading__title text-white">
                  <img src="/site/assets/images/arrow-right-white.png">
                  {{$Data[1]->TitleAr}} 
                  <img src="/site/assets/images/arrow-left-white.png">
                </h2>
             </div>
  
  
             <p class="about_desc">
             {!!strip_tags($Data[1]->ContentAr)!!}
             </p>
  
            </div>
           
            <div class="">
              <div class="heading heading_white">
                <h2 class="heading__title text-white">
                  <img src="/site/assets/images/arrow-right-white.png">
                  {{$Data[2]->TitleAr}} 
                  <img src="/site/assets/images/arrow-left-white.png">
                </h2>
             </div>
    
             <p class="about_desc">
             {!!strip_tags($Data[2]->ContentAr)!!}             </p>
            </div>

         

         
          </div>


          <div class="col-md-5">
            <div class="about__img">
              <img src="/site/assets/images/mission.png" alt="about" class="img-fluid w-100">
            </div>
          </div>
      
         
        
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>


    <section class="about_features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="heading heading_color text-center">
              <h2 class="heading__title">
                <img src="/site/assets/images/arrow-right.png">
                لماذا نحن
                <img src="/site/assets/images/arrow-left.png">
              </h2>
           </div>

          
          </div>
        </div>
        <div class="row">
        @foreach($whywe as $eachwhywe)
        <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item_feature">
                <?php 
                                            $images=$eachwhywe->Image; 
                                            $images=(array)json_decode($images);
                                            ?>
                  <div class="icon">
                  @if(count($images)>0)
                   <!-- <img src="{{$images[0]}}">-->
                   <img src="/site/assets/images/icons.png">

                    @else
                    <img src="/site/assets/images/icons.png">
                    @endif
                  </div>
                  <h3>{{$eachwhywe->TitleAr}}</h3>
                  <p>{!!strip_tags($eachwhywe->ContentAr)!!}</p>
                </div>
          </div>
          @endforeach
     

         <!-- <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item_feature">
                  <div class="icon">
                    <img src="/site/assets/images/icons.png">
                  </div>
                  <h3>جودة الدراسة</h3>
                  <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى</p>
                </div>
          </div>-->
       
   


        </div>
      </div>
    </section>





    <section class="banner-layout1 p-0 job">
      <div class="container-fluid col-padding-0 bg-job">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="inner-padding">
              <div class="heading heading_white">
                <h2 class="heading__title text-white">
                  <img src="/site/assets/images/arrow-right-white.png">
                  {{$Data[3]->TitleAr}} 
                  <img src="/site/assets/images/arrow-left-white.png">
                </h2>
             </div>
    
             <p class="about_desc" style="color:white;">
             {!!strip_tags($Data[3]->ContentAr)!!}     </p>
             
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-6 background-banner">
            
           
          </div>
         
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>


    <section class="about-layout2 customer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="about__img">
              <img src="/site/assets/images/image.png" alt="about" class="img-fluid w-100">
            </div>
          </div>
          <div class="col-md-6">
            <div class="heading heading_color">
              <h2 class="heading__title">
                <img src="/site/assets/images/arrow-right.png">
                {{$Data[4]->TitleAr}} 
                <img src="/site/assets/images/arrow-left.png">
              </h2>
           </div>

           <p class="about_desc d-flex">
           {!!strip_tags($Data[4]->ContentAr)!!} </p>
           


         
          </div>
         
        
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>



    @endsection