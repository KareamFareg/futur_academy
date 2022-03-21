@extends('layouts.sitelayouts')
@section('title','Home')

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
                {{$services[0]->name}} 
                <img src="/site/assets/images/arrow-left.png">
              </h2>
           </div>

           <p class="about_desc">{!!$services[0]->details!!}</p>
          </div>
         
        
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>



  
@endsection