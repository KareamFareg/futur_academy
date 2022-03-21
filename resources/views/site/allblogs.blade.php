@extends('layouts.sitelayouts')
@section('title','محتوي')
@section('content')
<?php $setwhats = Mrabe3Helper::Getsettings(); ?>
<section class="blog-carousel ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading heading_color">
          <h2 class="heading__title">
            <img src="/site/assets/images/arrow-right.png">
{{$cat[0]->Title}}            <img src="/site/assets/images/arrow-left.png">
          </h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-right">
        <div class="slick-carousel" data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
          @foreach($latestnews as $news)
          <div class="blog-item" style="width: 375px; height:415px">
          <div class="blog__img"  style="width: 300px; height:200px">
              <a href="#">
                <?php
                $images1 = $news->Image;
                $images1 = (array)json_decode($images1);
                ?>
                @if(count($images1))
                <img src="{{$images1[0]}}" alt="blog image">
                @else
                <img src="/site/assets/images/blog1.png" alt="blog image">
                @endif
              </a>
              <div class="blog__meta bg_orange">
                <div class="blog__meta-cat">
                <a href="/blog/{{$news->id}}"> {{\Illuminate\Support\Str::limit($news->TitleAr, 50, $end='...')}} </a>
                </div>
              </div>
            </div>
            <div class="blog__content">

              <h4 class="blog__title">
                <a href="/blog/{{$news->id}}"> {{\Illuminate\Support\Str::limit($news->TitleAr, 50, $end='...')}} </a>
              </h4>
              <span class="blog__meta-date">{{$news->CreatedAt}} </span>
              <p class="blog__desc">
              <?php $str=strip_tags($news->ContentAr);?>
                {{\Illuminate\Support\Str::limit(str_replace("&nbsp;",' ',$str), 150, $end='...')}} </p>
              <a href="/blog/{{$news->id}}" class="btn_link_blog">
                <span>قراءة المزيد</span>
                <i class="icon-arrow-left"></i>
              </a>
            </div>
          </div>

          @endforeach

        </div>
      </div>
    </div>
  </div>
</section>

@endsection