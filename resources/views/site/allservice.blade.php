@extends('layouts.sitelayouts')
@section('title','الخدمات')
@section('content')
<section class="services services_company">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading heading_color">
                 <h2 class="heading__title">
                   <img src="/site/assets/images/arrow-right.png">
                   خدمات الشركة
                   <img src="/site/assets/images/arrow-left.png">
                 </h2>
              </div>
            </div>
          </div>
          <div class="row">
            @foreach($services as $eachserv)
              <div class="col-md-2 col-12">
                <div class="circle-service">
                    <img src="{{$eachserv->icon}}">
                    <p>{{$eachserv->name}}</p>
                </div>
        
              </div>
              @endforeach
     
          </div>
        </div>
      </section>

   
@endsection