@extends('layouts.sitelayouts')
@section('title','محتوي')
@section('content')
<?php $setwhats = Mrabe3Helper::Getsettings(); ?>
<section class="services projects">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading heading_color">
                 <h2 class="heading__title">
                   <img src="/site/assets/images/arrow-right.png">
                   مشاريع الناجحه
                   <img src="/site/assets/images/arrow-left.png">
                 </h2>
              </div>
            </div>
          </div>
          <div class="row">
            @foreach($latestnews as $news)
              <div class="col-md-4 col-12">
                <div class="service-item project_item">
                    <div class="service__img">
                    <?php
                $images1 = $news->Image;
                $images1 = (array)json_decode($images1);
                ?>
                @if(count($images1))
                <img src="{{$images1[0]}}" style="
    width: 140px;
    height: 195px;
"  alt="blog image">
                @else
                <img src="/site/assets/images/project1.png" alt="portfolio img">
                @endif
                    </div>
                    <div class="service__content">
                      <h4><a href="/blog/{{$news->id}}"> {{\Illuminate\Support\Str::limit($news->TitleAr, 50, $end='...')}}</a></h4>
                     
                      <p>  {{\Illuminate\Support\Str::limit(str_replace("&nbsp;",' ',strip_tags($news->ContentAr)), 150, $end='...')}}</p>
                      <div class="btns_service">
                        <a href="/blog/{{$news->id}}" class="btn btn__loadMore">ْالمزيد</a>
                        <a href="https://api.whatsapp.com/send?phone={{$setwhats[0]->whatsapp}}" class="btn btn__service">طلب خدمة</a>
                      </div>
                    </div>
                  </div>
              </div>
        @endforeach
            
          </div>
        </div>
      </section>


@endsection