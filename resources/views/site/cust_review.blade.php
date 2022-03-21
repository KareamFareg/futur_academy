@extends('layouts.sitelayouts')
@section('title','محتوي')
@section('content')
<?php $setwhats = Mrabe3Helper::Getsettings(); ?>

<section class="testimonials testimonials-layout1 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="heading heading_color">
                     <h2 class="heading__title">
                       <img src="/site/assets/images/arrow-right.png">
                       اراء العملاء
                       <img src="/site/assets/images/arrow-left.png">
                     </h2>
                  </div>
                </div>
              </div>
          
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="testimonials-wrapper">
             
                <div class="slider-with-navs slick-carousel"
                data-slick='{"slidesToShow":1, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 1}}, {"breakpoint": 768, "settings": {"slidesToShow": 1}}]}'>
                  <!-- Testimonial #1 -->
                  @foreach($latestnews as $news)
                  <div class=" testimonial-item">
                    <div class="testimonial__content">
                    <?php
                $images1 = $latestnews[0]->Image;
                $images1 = (array)json_decode($images1);
                ?>
                        <a href="#" class="testimonial__thumb">
                        @if(count($images1))
<img src="{{$images1[0]}}">
@else
<img src="/site/assets/images/thumb1.png">
@endif
</a>
                        <h3 class="testimonial__name"><a href="#"> {{$news->TitleAr}} </a></h3>
                      <p class="testimonial__desc">{!!strip_tags($news->ContentAr)!!}</p>
                    </div>
                  </div>
   @endforeach
                </div>
              </div>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.testimonials 1 -->


@endsection