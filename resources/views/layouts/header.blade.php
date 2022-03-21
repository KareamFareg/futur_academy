{{--<section id="header">--}}
{{--            <div class="head-image">--}}
{{--            <img src="/images/bk-head.png" width="100%"  style="border-radius:20px"/>--}}
{{--            <div class="content-head">--}}
{{--                <!----}}
{{--                <h3>اوجد افضل بيتك مستقبلك </h3>--}}
{{--             --}}
{{--                  <h3> الان بمنتهى السهوله</h3>--}}
{{--    --}}
{{--    -->--}}
{{--                </div>--}}
{{--                <div class="search-head">--}}
{{--                    <div class="search-content">--}}
{{--                    --}}
{{--                     <ul class="nav nav-pills " id="pills-tab" role="tablist">--}}
{{--  <li class="nav-item">--}}
{{--    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">بحث</a>--}}
{{--  </li>--}}
{{--  <li class="nav-item">--}}
{{--    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">اطلب عقارك</a>--}}
{{--  </li>--}}

{{--</ul>--}}
{{--                    <div class="tab-content content-tab" id="pills-tabContent">--}}
{{--  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">--}}
{{--                        <div class="card-search">--}}
{{--                        <form action="/searchword" method="post" enctype="multipart/form-data">--}}
{{--                  @csrf--}}
{{--                              <div class="form-row">--}}
{{--                                  <div class="col-10">--}}
{{--                            <div class="input-group mb-2 mt-2">--}}
{{--                                     <div class="input-group-prepend">--}}
{{--                                     <div class="input-group-text">--}}
{{--                                         <i class="fas fa-search"></i>--}}
{{--                                         </div>--}}
{{--                                       </div>--}}
{{--                                <input type="text" name="txt" class="form-control input-search" id="inlineFormInputGroup" placeholder="ابحث عن عقار" required>--}}
{{--                                 </div>--}}
{{--                               </div>--}}
{{--                                    <div class="col-2">--}}
{{--                                        --}}
{{--                                        <button type="submit" class="btn btn-search"><i class="fas fa-search"></i></button>--}}
{{--                                  </div>--}}
{{--                          </div>--}}
{{--                        </form>--}}
{{--                      </div>--}}
{{--      --}}
{{--                  </div>--}}
{{--  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">--}}
{{--               <div class="card-search">--}}
{{--                            <form action="/makecustorder" method="post" enctype="multipart/form-data" class="text-right">--}}
{{--                  @csrf--}}
{{--                              <div class="form-row">--}}
{{--                                  <div class="col-md-3 col-sm-6">--}}
{{--                                      <div class="form-group">--}}
{{--                                        <label  class="labelsearch">طلبك</label>--}}
{{--                                        <select class="form-control selectsearch" name="type" required>--}}
{{--                                        <option>اختر نوع طلبك</option>--}}
{{--                                        <?php Mrabe3Helper::GetSelectItem("ordertype","id","name");?>--}}
{{--                                         </select>--}}
{{--                                        </div>--}}
{{--                                     </div>--}}
{{--                                  <div class="col-md-3 col-sm-6">--}}
{{--                                      <div class="form-group">--}}
{{--                                        <label class="labelsearch">المساحة المطلوبة</label>--}}
{{--                                          <input type="text" name="area" class="form-control inputspace"  placeholder="150 متر" required>--}}
{{--                                        </div>--}}
{{--                                     </div>--}}
{{--                                   <div class="col-md-3 col-sm-6">--}}
{{--                                      <div class="form-group">--}}
{{--                                        <label class="labelsearch">السعر المطلوب</label>--}}
{{--                                          <input type="text" class="form-control inputspace"  placeholder="581510" name="price" required>--}}
{{--                                        </div>--}}
{{--                                     </div>--}}
{{--                                     <div class="col-md-3 col-sm-6">--}}
{{--                                      <div class="form-group">--}}
{{--                                        <label class="labelsearch">المنطقة</label>--}}
{{--                                          <input type="text" class="form-control inputspace" name="location"  placeholder="السعودية - المملكة العربية السعودية- شارع الرحمن" required>--}}
{{--                                        </div>--}}
{{--                                     </div>--}}
{{--                                      <div class="col-md-4 col-sm-6">--}}
{{--                                      <div class="form-group">--}}
{{--                                        <label class="labelsearch">الايميل</label>--}}
{{--                                          <input type="email" name="email" class="form-control inputspace"  placeholder="test@test.test" required>--}}
{{--                                        </div>--}}
{{--                                     </div>--}}
{{--                                  <div class="col-md-3 col-sm-6">--}}
{{--                                      <div class="form-group">--}}
{{--                                        <label class="labelsearch">الجوال</label>--}}
{{--                                          <input type="text" name="phone" class="form-control inputspace"  placeholder="+545544495959" required>--}}
{{--                                        </div>--}}
{{--                                     </div>--}}
{{--                                  <div class="col-md-5 col-sm-6">--}}
{{--                                      <div class="form-group">--}}
{{--                                        <label class="labelsearch">الرسالة</label>--}}
{{--                                             <textarea class="form-control textarasearch" id="exampleFormControlTextarea1" name="cont" rows="1" placeholder="نريد ان يكون في اسرف وقت ممكن" required></textarea>--}}
{{-- --}}
{{--                                        </div>--}}
{{--                                     </div>--}}
{{--                                  --}}
{{--                          </div>--}}
{{--                                <div class="text-left">--}}
{{--                                     <button type="submit" class="btn btn-submit">اطلب عقارك الان</button>--}}
{{--                                 </div>--}}
{{--                                --}}
{{--                        </form>--}}
{{--                      </div>--}}
{{--      </div>--}}
{{--  --}}
{{--</div>--}}
{{--                </div>--}}
{{--                   --}}
{{--                --}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}