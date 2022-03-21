@extends('layouts.sitelayouts')
@section('title','خدمتنا')
@section('content')
<?php $setwhats=Mrabe3Helper::Getsettings();?>
<section class="services">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading heading_color">
                 <h2 class="heading__title">
                   <img src="/site/assets/images/arrow-right.png">
                   خدماتنا
                   <img src="/site/assets/images/arrow-left.png">
                 </h2>
              </div>
            </div>
          </div>
          <div class="row">
          @foreach($services as $serv)
          <div class="col-md-4 col-12">
                <div class="service-item">
                  <div class="service__img">
                    <img src="{{$serv->icon}}" alt="portfolio img">
                  </div>
                  <div class="service__content">
                    <h4><a href="#">{{$serv->name}}</a></h4>
                   
                    <p>{{$serv->details}}</p>
                    <div class="btns_service">
                      <a href="/service/{{$serv->id}}" class="btn btn__loadMore">ْالمزيد</a>
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