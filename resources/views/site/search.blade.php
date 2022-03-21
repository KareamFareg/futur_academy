@extends('layouts.sitelayouts')
@section('title','دراسات الجدوي')

@section('content')
<?php $setwhats=Mrabe3Helper::Getsettings();?>

<section class="studies studies_bg_white">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading">
                 <h2 class="heading__title">
                   <img src="/site/assets/images/arrow-right.png">
                   نتائج البحث
                   <img src="/site/assets/images/arrow-left.png">
                 </h2>
              </div>
            </div>
          </div>
          <div class="row filters">
              <!--<div class="col-md-12">
                <h3>فلتر الدراسات</h3>
              </div>
              <div class="col-md-12">
                  <div class="list_filters">
                    <select>
                        <option data-display="حسب القطاع">حسب القطاع </option>
                        <option value="1">القطاع التجارى</option>
                        <option value="2">القطاع التجارى</option>
                      </select> 
                      <select>
                        <option data-display="حسب الدولة">حسب الدولة</option>
                        <option value="1">الاردان</option>
                        <option value="2">الاردان</option>
                      </select> 
                      <select>
                        <option data-display="حسب راس المال">حسب راس المال</option>
                        <option value="1">من 10 -12 ريال</option>
                        <option value="2">من 20 - 30 ريال</option>
                      </select> 
                      <select>
                        <option data-display="حسب راس المال">حسب راس المال</option>
                        <option value="1">من 10 -12 ريال</option>
                        <option value="2">من 20 - 30 ريال</option>
                      </select> 
                  </div>

              </div>
--> 
             
          </div>
          <div class="row">
             @foreach($Data as $eachdata)
              <div class="col-md-3 col-12">
                <div class="studies-item" style="width: 250px;height: 371px;">
                    <div class="studies__img" style="width: 230px; height:140px">
                      <img src="{{$eachdata->img}}" alt="portfolio img" width="295px" height="150px">
                    </div>
                    <div class="studies__content">
                      <h4><a href="/study/{{$eachdata->id}}"> {{\Illuminate\Support\Str::limit($eachdata->title, 50, $end='...')}}</a></h4>
                     
                      <p>
                      <?php $str=strip_tags($eachdata->details);?>
              {{\Illuminate\Support\Str::limit(str_replace("&nbsp;",' ',$str), 150, $end='...')}}</p>
                      <div class="btns_studies">
                        <a href="/study/{{$eachdata->id}}" class="btn btn__loadMore">ْالمزيد</a>
                        <a href="https://api.whatsapp.com/send?phone={{$setwhats[0]->whatsapp}}" class="btn btn__service">طلب خدمة</a>
                      </div>
                    </div>
                  </div>
              </div>
           @endforeach
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section>



@endsection
