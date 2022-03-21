<div class="card-profilee">
               <img src="<?php echo Auth::user()->img;?>" class="baspro"/>
               <h6><?php echo Auth::user()->officename;?></h6>
               <p><?php echo Auth::user()->email;?></p>
               <p class="loc-pro"><img src="images/map.svg" height="20px"/><?php echo Auth::user()->city.' '.Auth::user()->area;?></p>
               <div class="call-pro">
                  <a href="https://api.whatsapp.com/send?phone=<?php echo Auth::user()->officephone;?>"  target="_blank"class="whatsup"><i class="fab fa-whatsapp"></i>الواتس اب</a>
                  <a href="tel:<?php echo Auth::user()->phone;?>" class="phone-cal"><i class="fas fa-phone-alt"></i><?php echo Auth::user()->phone;?></a>
               </div><div class="call-pro">
                  <a href="/addorders" class="whatsup"><i class="fas fa-plus"></i></i> إضافة إعلان</a>
                  <a href="/myorders" class="phone-cal"><i class="far fa-list"></i>عرض الإعلانات</a>
               </div>
            </div>