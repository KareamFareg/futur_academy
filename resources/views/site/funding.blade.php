@extends('layouts.sitelayouts')
@section('title','محتوي')
@section('content')
<?php $setwhats = Mrabe3Helper::Getsettings(); ?>
<section class="portfolio-grid companies">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="heading heading_color">
          <h2 class="heading__title">
            <img src="/site/assets/images/arrow-right.png">
            {{$cat[0]->Title}}
            <img src="/site/assets/images/arrow-left.png">
          </h2>
        </div>
      </div>
    </div>
    <div class="row">
    @foreach($latestnews as $news)
      <div class="col-sm-6 col-md-3">
        <div class="company-item">
          <div class="com_img">
          <?php
                $images1 = $news->Image;
                $images1 = (array)json_decode($images1);
                ?>
                @if(count($images1))
                <img src="{{$images1[0]}}" alt="blog image" style="
    width: 215px;
    height: 60px;
">
                @else
                <img src="/site/assets/images/c1.png" alt="blog image">
                @endif          </div>
          <h4 class=""><a href="/blog/{{$news->id}}"> {{$news->TitleAr}}</a></h4>
        </div>
      </div>
@endforeach



    </div>

  </div><!-- /.container -->
</section>



@endsection