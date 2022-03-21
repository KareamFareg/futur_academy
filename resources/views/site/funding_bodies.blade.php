@extends('layouts.sitelayouts')
@section('title','جهات التمويل')
@section('content')

<section class="portfolio-grid flags">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="heading heading_color">
                <h2 class="heading__title">
                  <img src="/site/assets/images/arrow-right.png">
                  جهات التمويل
                  <img src="/site/assets/images/arrow-left.png">
                </h2>
             </div>
            </div>
          </div>
          <div class="row">
             @foreach($Data as $eachD)
            <div class="col-sm-6 col-md-6">
              <div class="flags-item">
                <div class="flags__img" style="width: 540px; height:360px;">
                
                  @if($eachD->img!='')
                    <img src="{{$eachD->img}}" style="width: 540px; height:360px;">
                    @else
                    <img src="/site/assets/images/flag1.png" alt="portfolio img" style="width: 540px; height:360px;">
                    @endif
                  <div class="flag_content">
                    <h4 class=""><a href="/funding/{{$eachD->id}}">جهات التمويل</a></h4>
                    <p> {{$eachD->Title}} </p>
                  </div>
                </div>
          
              </div>
            </div>
@endforeach
          </div>
        
        </div><!-- /.container -->
      </section>


@endsection