@extends('layouts.sitelayouts')
@section('title','الرئيسية')
@section('content')
    <?php $setwhats = Mrabe3Helper::Getsettings(); ?>

    <!-- BANNER
        ================================================== -->
    <section class="p-0 full-screen ">
        <div class="slider-fade2 owl-carousel owl-theme w-100 min-vh-100">
            <div class="item bg-img cover-background overlay-dark" data-overlay-dark="5"
                 data-background="{{asset('assets/images/settings')}}/{{$setwhats[0]->image}}">
                <div class="container d-flex flex-column">
                    <div class="row align-items-center min-vh-100 pt-6 pt-md-0 row_ar">
                        <div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6 mb-1-9 mb-lg-0 pt-6 pb-12 py-sm-20">
                                <span
                                        class="d-block text-secondary display-23 display-md-21 display-lg-20 fw-bold title-font wow"
                                        data-in-effect="">{{$setwhats[0]->company_name}}</span>
                            <h1 class="text-white mb-2 fw-bold title animated fadeInUp">{{$setwhats[0]->content}}</h1>
                            <p class="lead animated fadeInUp"></p>
                            <a href="#" class="butn shadow-none me-2 my-1 my-sm-0 animated fadeInUp">
                                <span>اكتشف المزيد</span>
                            </a>
                            <a href="#"
                               class="butn shadow-none white-opacity my-1 my-sm-0 animated fadeInUp">الالتحاق
                                بالأكاديمية</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item bg-img cover-background overlay-dark" data-overlay-dark="5"
                 data-background="img/slider2.jpg">
                <div class="container d-flex flex-column">
                    <div class="row align-items-center min-vh-100 pt-6 pt-md-0 row_ar">
                        <div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6 mb-1-9 mb-lg-0 pt-6 pb-12 py-sm-6">
                                <span
                                        class="d-block text-secondary display-23 display-md-21 display-lg-20 fw-bold title-font wow"
                                        data-in-effect="">أكاديمية المستقبل التعليمية</span>
                            <h2 class="text-white mb-2 fw-bold title animated fadeInUp">الأكاديمية الرائدة في مجال
                                التدريب والتعليم والاستشارات وتنمية قدرات العنصر البشري</h2>
                            <p class="lead animated fadeInUp">نسعي جميعا لتحقيق هدف واحد محدد وهو تقديم الحلول
                                الذكية لرفع اداء وكفاءة عملاءنا ومتدربينا وشركائنا من الأفراد والشركات لتحقيق أفضل
                                استثمار من العنصر البشري</p>
                            <a href="#" class="butn shadow-none me-2 my-1 my-sm-0 animated fadeInUp">
                                <span>اكتشف المزيد</span>
                            </a>
{{--                            <a href="#"--}}
{{--                               class="butn shadow-none white-opacity my-1 my-sm-0 animated fadeInUp">الالتحاق--}}
{{--                                بالأكاديمية</a>--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="position-absolute right-5 top-15 z-index-1 w-7 ani-left-right opacity2 d-none d-xl-block"><img
                    src="/home_assets/img/icon/icon-04.svg" alt="..."></div>
        <div class="position-absolute right-5 top-55 z-index-1 w-10 ani-top-bottom opacity2 d-none d-xl-block"><img
                    src="/home_assets/img/icon/icon-02.svg" alt="..."></div>
        <div class="position-absolute left-1 top-75 z-index-1 w-9 ani-top-bottom opacity2 d-none d-xl-block"><img
                    src="/home_assets/img/icon/icon-03.svg" alt="..."></div>
        <!-- <div class="position-absolute left-75 top-80 z-index-1 w-9 ani-left-right opacity2 d-none d-xl-block"><img src="img/icon/icon-04.svg" alt="..."></div> -->

    </section>

    <!-- WHY CHOOSE US
    ================================================== -->
    @if($services != null || !empty($services))
        <section class="p-0 mt-n5 secondary-shadow w-95 w-xxl-90 mx-auto border-radius-10 z-index-9">
            <div class="container-fluid px-0">
                <div class="row g-0 justify-content-center text-center">
                    @foreach($services as $service)
                        <div class="col-sm-6 col-lg-3">
                            <div
                                    class="border-bottom border-lg-bottom-0 border-sm-end border-color-light-black py-2-2 px-3 icon-box">
                                @if($service->image != null)
                                   <img src="{{asset('assets/images/services')}}/{{$service->image}}" width="50px" height="50px">
                                @else
                                    <i class="icon-ribbon display-16 text-secondary d-inline-block align-top"></i>
                                @endif
                                    <div class="d-inline-block ms-3 text-start align-top">
                                    <h4 class="h6 mb-2">{{$service->name}}
                                    </h4>
                                    <p class="mb-0 display-30">{{$service->details}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ABOUT
    ================================================== -->
    @if($whoUs != null || !empty($whoUs))
    <section>
        <div class="container pt-lg-4">
            <div class="row align-items-xl-center about-style1">
                <div class="col-lg-6 mb-6 mb-md-8 mb-lg-0 wow fadeIn" data-wow-delay="200ms">
                    <div class="position-relative">
                        <div class="position-relative overflow-hidden pe-xl-7">
                            <img src="{{asset('assets/images/content')}}/{{$whoUs->image}}" class="position-relative pb-1-9 z-index-1" alt="{{$whoUs->name}}">
                        </div>

                    </div>
                </div>
                <?php
                    $titleDetails = explode('-',$whoUs->titleDetails);
                    $contentBody = explode('-',$whoUs->contentBody);
                ?>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="400ms">
                    <div class="ps-xl-4">
                        <div class="title-style2 text-start mb-1-3">
                            <span class="sub-title">{{$whoUs->name}}</span>
                            <h2 class="cd-headline cd-headline-about clip font-weight-600">{{$whoUs->title}}<br>
                                <span class="cd-words-wrapper p-0 d-block d-sm-inline-block d-md-block d-xl-inline-block">
                                    @if($titleDetails != null)
                                        @foreach($titleDetails as $key => $title)
                                           @if($key == 0)
                                                 <b class="is-visible font-weight-600">{{$title}}</b>
                                            @else
                                                 <b class="font-weight-600">{{$title}}</b>
                                            @endif
{{--                                        <b class="font-weight-600">والاستشارات</b>--}}
{{--                                        <b class="font-weight-600">وتنمية قدرات العنصر البشري</b>--}}
                                        @endforeach
                                    @endif
                                </span>
                            </h2>
                        </div>
                        @if($contentBody != null)
                            <ul class="list-style1 mb-0 text-dark">
                                @foreach($contentBody as  $content)
                                    <li>{{$content}}</li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute right-5 top-80 z-index-1 w-10 ani-top-bottom opacity1 d-none d-lg-block"><img
                    src="img/icon/icon-05.svg" alt="..."></div>
        <div class="position-absolute right top-5 z-index-1 w-15 ani-top-bottom opacity2 d-none d-lg-block"><img
                    src="img/icon/icon-08.svg" alt="..."></div>
    </section>
    @endif

    <!-- SERVICES
    ================================================== -->
    @if($sections != null || !empty($sections))
    <section class="bg-dark border-radius-10 mx-auto w-95">
        <div class="container">
            <div class="text-center position-relative mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">
                <span class="d-block text-secondary sub-title wow fadeInRight">خدماتنا</span>
                <h2 class="h1 text-white fw-bold">الألتحاق بالتخصصات التالية</h2>
            </div>

            <div class="row mt-n1-9">
                <div class="col-md-12">
                    <div class="categories-slider owl-carousel owl-theme wow fadeIn" data-wow-delay="200ms">
                        @foreach($sections as $section)
                             <div class="card card-style4 p-4">
                            <div class="card-body p-0">
                                <div class="icon-cat mb-4"> <i class="icon-genius display-12"></i></div>
                                <h3 class="h5 mb-3"><a href="#">{{$section->name}}</a></h3>
                                <p>{{$section->details}}</p>
                            </div>
                            <a href="/dashboard/courses/show/{{$section->id}}" class="text-uppercase read-more">معرفة المزيد</a>
                        </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
        <div class="round-shape-one top-n10 left-90"></div>
    </section>
    @endif


    @if($ourTeam != null || !empty($ourTeam))

    <section>
        <div class="container">
            <div class="title-style2 text-center mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">
                <span class="sub-title">فريق العمل</span>
                <h2 class="mb-0 h1">فريقنا المتميز سيفعل أي شيء من أجلك.
                </h2>
            </div>
            <div class="row mt-n1-9">
                <div class="col-md-12">
                    <div class="team-slider owl-carousel owl-theme wow fadeIn" data-wow-delay="200ms">
                        @foreach($ourTeam as $person)
                            <div class="team-style3">
                                <div class="pb-1-2">
                                    <div class="team-image position-relative">
                                        <div class="team-icons">
                                            <span class="team-icon ti-close"></span>
                                            <a href="{{$person->twitter}}" class="team-icon fab fa-twitter"></a>
                                            <a href="{{$person->facebook}}" class="team-icon fab fa-facebook-f"></a>
                                            <a href="{{$person->instagram}}" class="team-icon fab fa-instagram"></a>
                                        </div>
                                        <a href="/dashboard/ourteam/" class="team-inner-img">
                                            <img src="{{asset('assets/images/ourteam')}}/{{$person->image}}" class="rounded-circle" alt="{{$person->name}}">
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h3 class="h5 mb-1">{{$person->name}}</h3>
                                    <span class="small">{{$person->position}} </span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute top-10 left-5 z-index-1 w-8 ani-top-bottom opacity2"><img
                    src="/home-assets/img/icon/icon-07.svg" alt="..."></div>
        <div class="position-absolute right-5 top-80 z-index-1 w-10 ani-top-bottom opacity1 d-none d-lg-block"><img
                    src="/home-assets/img/icon/icon-05.svg" alt="..."></div>
    </section>

   @endif

    <!-- PORTFOLIO
    ================================================== -->
    @if($portfolio != null || !empty($portfolio))
    <section class="bg-light-gray border-radius-10">
        <div class="container mb-1-6 mb-md-2-2 mb-lg-1-6 mb-xl-0">
            <div class="row align-items-stretch">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="200ms">
                    <div class="row g-0 align-items-center h-100">
                        <div class="col-md-12">
                            <div class="title-style2 text-start mb-1-9">
                                <span class="sub-title">معرض الصور</span>
                                <h2 class="h1 mb-0">ستجد العديد من التخصصات التي تؤهلك لسوق العمل</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 wow fadeIn" data-wow-delay="400ms">
                    <div class="position-relative h-100 vw-lg-60">
                        <div class="portfolio-slider owl-carousel owl-theme h-100 w-100 ms-lg-8 ms-xxl-16">
                            @foreach($portfolio as $subject)
                                <div class="portfolio-style2">
                                    <img src="{{asset('assets/images/portfolio')}}/{{$subject->image}}" alt="{{$subject->title}}">
                                    <div class="portfolio-inner">
                                        <div class="portfolio-overlay"></div>
                                        <div class="portfolio-text">
                                            <h3 class="h4 mb-1"><a href="/dashboard/portfolio/{{$subject->id}}" class="text-white">{{$subject->title}}</a></h3>
                                            <span class="text-white">{{$subject->details}}</span>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($partners != null || !empty($partners))
    <section class="py-5 wow fadeIn" data-wow-delay="100ms">
        <div class="title-style2 text-center mb-2-9 mb-lg-6 wow fadeIn">
            <span class="sub-title">أكاديمية المستقبل</span>
            <h2 class="mb-0 h1">
                شركاء النجاح
            </h2>
        </div>

        <div class="container-fluid px-sm-14">
            <div class="owl-carousel owl-theme client-style1 text-center owl-loaded owl-drag">

                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @foreach($partners as$partner)
                        <div class="owl-item">
                            <div class="image-wrapper">
                                <img class="main-image" src="{{asset('assets/images/partners')}}/{{$partner->image}}" alt="{{$partner->name}}" title="{{$partner->name}}">
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>

            </div>
        </div>
        <div class="position-absolute left top-10 z-index-1 w-8 ani-top-bottom opacity2 d-none d-xl-block"><img
                    src="img/icon/icon-05.svg" alt="..."></div>
        <div class="position-absolute right top-70 z-index-1 w-8 ani-top-bottom opacity1 d-none d-lg-block"><img src="img/icon/icon-06.svg" alt="..."></div>
    </section>
    @endif
    @if($statics != null || !empty($statics))
    <section class="p-1-9 p-md-5 wow fadeIn bg-secondary border-radius-10 mx-auto w-95 counter" data-wow-delay="100ms">
        <div class="container">
            <div class="row text-center position-relative z-index-1">
                @foreach($statics as $stats)
                    <div class="col-sm-6 col-lg-3 mb-1-6 mb-sm-1-9 mb-lg-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="flex-shrink-0 display-14 display-sm-12 display-lg-10 text-white fw-bold w-75px w-lg-auto">
                                <span class="countup">{{$stats->details}}</span>{{$stats->sign}}
                            </div>
                            <div class="flex-grow-1 ms-3 ms-xl-4 text-start">
                                <h4 class="h6 font-weight-500 text-white mb-0 text-uppercase lh-base"> {{$stats->title}}</h4>
                            </div>
                            <i class="fa fa-graduation-cap display-1 text-white position-absolute opacity2 left-n5 bottom-95 left-lg-n5 bottom-lg-n50 d-none d-sm-block"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endif

    <!-- BLOG
    ================================================== -->
    @if($events != null || !empty($events))
    <section class="bg-light-gray pt-100">
        <div class="container">

            <div class="title-style2 text-center mb-2-9 mb-lg-6 wow fadeIn">
                <span class="sub-title">أكاديمية المستقبل</span>
                <h2 class="mb-0 h1">اخر الأخبار
                </h2>
            </div>
                <div class="row g-xl-5 mt-n2-2 portfolio">
                    @foreach($events as $event)
                    <div class="col-md-6 col-lg-4 mt-2-2">
                        <article class="card card-style5 h-100">
                            <div class="card-img">
                                <img src="{{asset('assets/images/events')}}/{{$event->image}}" class="card-img-top border-radius-10" alt="{{$event->title}}" width="100" height="100">
                                <div class="post-date">

                                    <span class="mb-0 d-block">{{  date("d M ", strtotime($event->created_at)) }}</span>
{{--                                    <span class="mb-0 d-block">10</span>--}}
{{--                                    <span class="d-block month">يناير</span>--}}
                                </div>
                            </div>
                            <div class="card-body position-relative">

                                <a href="/dashboard/event/{{$event->id}}" class="text-secondary text-uppercase fw-bold display-30">{{$event->title}}</a>
                                <p>{{$event->details}}</p>

                                <a href="/dashboard/event/{{$event->id}}" class="text-uppercase read-more">معرفة المزيد</a>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
        </div>
        <div class="position-absolute left top-10 z-index-1 w-15 ani-top-bottom opacity2 d-none d-xl-block"><img
                    src="img/icon/icon-08.svg" alt="..."></div>
    </section>
    @endif
@endsection