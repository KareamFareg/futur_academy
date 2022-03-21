@extends('layouts.sitelayouts')
@section('title','الاخبار')

@section('content')

<section class="about-layout2 about">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="about__img">
            <?php
                $images1 = $latestnews[0]->Image;
                $images1 = (array)json_decode($images1);
                ?>
                @if(count($images1))
              <img src="{{$images1[0]}}" alt="about" class="img-fluid w-100">
              @else
              <img src="/site/assets/images/about-img.png" alt="about" class="img-fluid w-100">
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="heading heading_color">
              <h2 class="heading__title">
                <img src="/site/assets/images/arrow-right.png">
                {{$latestnews[0]->TitleAr}} 
                <img src="/site/assets/images/arrow-left.png">
              </h2>
           </div>

           <p class="about_desc">{!!$latestnews[0]->ContentAr!!}</p>
          </div>
         
        
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>



  
@endsection