@extends('layouts.sitelayouts')
@section('title','Home')
@section('content')
<?php $settings = Mrabe3Helper::Getsettings(); ?>
<section class="contact-layout1">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading heading_color">
                <h2 class="heading__title">
                  <img src="/site/assets/images/arrow-right.png" />
                  التواصل معانا
                  <img src="/site/assets/images/arrow-left.png" />
                </h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="contact-info-box">
                <img src="/site/assets/images/location.png" />
                <h3>العنوان</h3>
                <p>{{$settings[0]->company_name}}</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="contact-info-box">
                <img src="/site/assets/images/mail.png" />
                <h3>البريد الالكترونى</h3>
                <p><a href="#">{{$settings[0]->email}}</a></p>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="contact-info-box">
                <img src="/site/assets/images/phone.png" />
                <h3>رقم الهاتف</h3>
                <p><a href="tel:{{$settings[0]->phone}}">{{$settings[0]->phone}}</a></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-12">
              <div class="mapouter">
                <div class="gmap_canvas">
                  <iframe
                    width="100%"
                    height="500"
                    id="gmap_canvas"
                    src="https://maps.google.com/maps?q=%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0"
                    scrolling="no"
                    marginheight="0"
                    marginwidth="0"
                  ></iframe
                  >
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="contact-panel">
                <form method="POST" action="/addcontact" class="contact__panel-form"
                >
                @csrf
                  <div class="row">
                    <div class="col-sm-12">
                      <h4 class="contact__panel-title">التواصل معانا</h4>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="الاسم بالكامل"
                          id="contact-name"
                          name="name"
                          required
                        />
                      </div>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control"
                          placeholder="البريد الالكترونى"
                          id="contact-email"
                          name="email"
                          required
                        />
                      </div>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="رقم الجوال"
                          id="contact-Phone"
                          name="phone"
                          required
                        />
                      </div>
                    </div>
                    <!-- /.col-lg-6 -->

                    <div class="col-sm-12">
                      <div class="form-group">
                        <textarea
                          class="form-control"
                          placeholder="الرسالة"
                          placeholder="Message"
                          id="contact-messgae"
                          name="details"
                          required
                        ></textarea>
                      </div>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-sm-12 col-md-12 col-lg-12 text-left">
                      <button type="submit" class="btn btn_contact">
                        ارسال
                      </button>
                    </div>
                    <!-- /.col-lg-12 -->
                  </div>
                  <!-- /.row -->
                </form>
              </div>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /.contact layout 1 -->

@endsection