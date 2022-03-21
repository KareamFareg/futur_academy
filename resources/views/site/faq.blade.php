@extends('layouts.sitelayouts')
@section('title','محتوي')
@section('content')
<?php $setwhats = Mrabe3Helper::Getsettings(); ?>
<section class="faq">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading heading_color">
          <h2 class="heading__title">
            <img src="/site/assets/images/arrow-right.png">
            الأسئلة الشائعه
            <img src="/site/assets/images/arrow-left.png">
          </h2>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($latestnews as $news)

      <div class="col-md-6 col-12">
        <div id="accordion">

          <div class="accordion-item">
            <div class="accordion__item-header" data-toggle="collapse" data-target="#collapse{{$news->id}}">
              <a class="accordion__item-title" href="#">{{$news->TitleAr}}</a>
            </div><!-- /.accordion-item-header -->
            <div id="collapse{{$news->id}}" class="collapse" data-parent="#accordion">
              <div class="accordion__item-body">
                <p>{!!strip_tags($news->ContentAr)!!}</p>
              </div><!-- /.accordion-item-body -->
            </div>
          </div>





        </div> 
           </div>

        @endforeach

    </div>


  </div><!-- /.container -->
</section><!-- /.FAQ -->

@endsection