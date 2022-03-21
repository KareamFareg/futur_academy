@extends('layouts.adminlayout')
@section('title',' تعديل الاعلان')

@section('extracss')
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#textareaar',
    directionality: "rtl"
  });

 tinymce.init({
    selector: '#textareaen'
  });
  </script>

@endsection
@section('content')
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
          
                                    <!-- Form -->
                                    <form action="/updateorder" class="mt-2" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">

                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">اسم المبنى</label>
                                                <input type="text" name="name" class="form-control input-edit" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$order[0]->name}}" placeholder="شقة ساحلية بأفضل الاماكن" required>
                                                </div>
                                            </div>
  <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">نوع الاعلان</label>
                           <select class="form-control input-edit" name="type" required >
                              <option value="" >أختر نوع الاعلان</option>
                              @foreach($type as $singletype)
                              @if($order[0]->type==$singletype->id)
                              <option value="{{$singletype->id}}" selected>{{$singletype->name}}</option>
                              @else
                              <option value="{{$singletype->id}}">{{$singletype->name}}</option>
                              @endif
                                                            @endforeach
                           </select>
                                                </div>
                                            </div>
<div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1"> العقار للبيع ام الايجار</label>
                           <select class="form-control input-edit" name="forrent" required >
                              <option value="">أختر  </option>
                              @if($order[0]->forrent==0)
                              <option value="0" selected>للبيع</option>
                              <option value="1" >للايجار</option>
                              @else
                              <option value="0" >للبيع</option>
                              <option value="1" selected>للايجار</option>
                              @endif
                           </select>
                                                </div>
                                            </div>
<div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">غرف النوم</label>
                                                <input type="text" pattern="\d*" maxlength="2"  name="rooms" class="form-control input-edit" id="exampleInputEmail1" value="{{$order[0]->rooms}}" aria-describedby="emailHelp" placeholder="3" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">الحمام</label>
                                                <input type="text" pattern="\d*" maxlength="2"  name="bathroom" class="form-control input-edit" value="{{$order[0]->bathroom}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="4" required>
                                                </div>
                                            </div>   <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">المرائب</label>
                                                <input type="text" pattern="\d*" maxlength="2"  name="parking" class="form-control input-edit" value="{{$order[0]->parking}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="4" required>
                                                </div>
                                            </div> <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">عدد الطوابق</label>
                                                <input type="text" pattern="\d*" maxlength="2" name="numfloor" class="form-control input-edit" value="{{$order[0]->numfloor}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="4" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">المساحة</label>
                                                <input type="text"  pattern="[0-9]+(\.[0-9]{1,2})?%?"  maxlength="9" name="area" class="form-control input-edit" value="{{$order[0]->area}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="4" required>
                                                </div>
                                            </div>
 <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">السعر</label>
                                                <input type="text"  pattern="[0-9]+(\.[0-9]{1,2})?%?"  maxlength="9" name="price" class="form-control input-edit" value="{{$order[0]->price}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="4" required>
                                                </div>
                                            </div>
                                             <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">العنوان</label>
                                                <input type="text" name="location" class="form-control input-edit" value="{{$order[0]->location}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="السعوديه" required>
                           <input type="HIDDEN" name="id" class="form-control input-edit" value="{{$order[0]->id}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="السعوديه" required>                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group mb-2">
                                                    <label>المحتوي</label>
                                                    <div id="blog-editor-wrapper">
                                                    <textarea  name="details" id="textareaar" row="6" col="200" ></textarea> 
                                                    </div>
                                                </div>
                                            </div>        
                                            <div class="col-md-12 col-6">
                        <div class="form-group div-editpro" style="margin-bottom: 20px">
                           <label for="exampleInputEmail1">صوره الاعلان</label>
                           <input class="form-control" type="file" id="banner" name="banner" />

                        </div>
                                            <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">الصورة</h4>
                                                    <div class="media flex-column flex-md-row">
                                                        <img src="/app-assets/images/slider/03.jpg" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110"  />
                                                        <div class="media-body">
                                                            
                                                            <div class="d-inline-block">
                                                                <div class="form-group mb-0">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" name="files[]"  multiple/>
                                                                        <label class="custom-file-label" for="blogCustomFile">اختار الصورة</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-12 mt-50">
                                                <input type="submit" class="btn btn-primary mr-1" value="حفظ">
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Blog Edit -->

            </div>
        </div>
    </div>



@endsection



@section('extrajs')


    <!-- BEGIN: Vendor JS-->
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/editors/quill/katex.min.js"></script>
    <script src="/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
    <script src="/app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="/app-assets/js/scripts/forms/pickers/form-pickers.js"></script>

    <!-- END: Page JS-->


    
@endsection