

!(function (i) {
  "use strict";
  var s = i(window);
  function a() {
    var e, a;
    (e = i(".full-screen")),
      (a = s.height()),
      e.css("min-height", a),
      (e = i("header").height()),
      (a = i(".screen-height")),
      (e = s.height() - e),
      a.css("height", e);
  }
  i("#preloader").fadeOut("normall", function () {
    i(this).remove();
  }),
    // s.on("scroll", function () {
    //   var e = s.scrollTop(),
    //     a = i(".navbar-brand img"),
    //     t = i(".navbar-brand.logodefault img"),
    //     o = i(".navbar-brand.dark img");
    //   e <= 50
    //     ? (i("header").removeClass("scrollHeader").addClass("fixedHeader"),
    //       a.attr("src", ""))
    //     : (i("header").removeClass("fixedHeader").addClass("scrollHeader"),
    //       a.attr("src", "")),
    //     t.attr("src", ""),
    //     o.attr("src", "");
    // }),
    s.on("scroll", function () {
      500 < i(this).scrollTop()
        ? i(".scroll-to-top").fadeIn(400)
        : i(".scroll-to-top").fadeOut(400);
    }),
    i(".scroll-to-top").on("click", function (e) {
      e.preventDefault(), i("html, body").animate({ scrollTop: 0 }, 600);
    }),
    new WOW({
      boxClass: "wow",
      animateClass: "animated",
      offset: 0,
      mobile: !1,
      live: !0,
    }).init(),
    i(".text-animation").waypoint(
      function () {
        i(".text-animation.animated").textillate();
      },
      { offset: "100%" }
    ),
    0 !== i(".tilt").length &&
      i(".tilt").tilt({
        maxTilt: 6,
        perspective: 1e3,
        scale: 1,
        speed: 300,
        reset: !0,
      }),
    i(".parallax,.bg-img").each(function (e) {
      i(this).attr("data-background") &&
        i(this).css(
          "background-image",
          "url(" + i(this).data("background") + ")"
        );
    }),
    i(".popup-social-video").magnificPopup({
      disableOn: 700,
      type: "iframe",
      mainClass: "mfp-fade",
      removalDelay: 160,
      preloader: !1,
      fixedContentPos: !1,
    }),
    i(".source-modal").magnificPopup({
      type: "inline",
      mainClass: "mfp-fade",
      removalDelay: 160,
    }),
    i(".tab1").click(function () {
      i(".second, .third, .four").fadeOut(), i(".first").fadeIn(1e3);
    }),
    i(".tab2").click(function () {
      i(".first, .third, .four").fadeOut(), i(".second").fadeIn(1e3);
    }),
    i(".tab3").click(function () {
      i(".second, .first, .four").fadeOut(), i(".third").fadeIn(1e3);
    }),
    s.resize(function (e) {
      setTimeout(function () {
        a();
      }, 500),
        e.preventDefault();
    }),
    a(),
    0 !== i(".copy-clipboard").length &&
      (new ClipboardJS(".copy-clipboard"),
      i(".copy-clipboard").on("click", function () {
        var e = i(this);
        e.text();
        e.text("Copied"),
          setTimeout(function () {
            e.text("Copy");
          }, 2e3);
      })),
    i(".vision-wrapper").on("mouseenter", function (e) {
      var a = i(this).data("background");
      i(".vision-changebg").animate({ opacity: 0.9 }, 50, function () {
        i(".vision-changebg").css("background-image", "url(" + a + ")");
      }),
        i(".vision-changebg").delay(50).animate({ opacity: 0.9 }, 50);
    }),
    i(document).ready(function () {
      i(".testimonial-style1").owlCarousel({
        loop: !0,
        responsiveClass: !0,
        nav: !1,
        dots: !0,
        autoplay: !0,
        autoplayTimeout: 5e3,
        margin: 0,
        smartSpeed: 800,
        responsive: { 0: { items: 1 }, 768: { items: 1 }, 1200: { items: 1 } },
      }),
      i(".categories-slider").owlCarousel({
        loop: !0,
        responsiveClass: !0,
        nav: 0,
        dots: !0,
        autoplay: 0,
        autoplayTimeout: 4e3,
        margin: 30,
        smartSpeed: 800,
        responsive: { 0: { items: 1 }, 768: { items: 1 }, 1200: { items: 4 } },
      }),
        i(".testimonial-style2").owlCarousel({
          loop: !0,
          responsiveClass: !0,
          nav: !1,
          dots: !1,
          margin: 0,
          autoplay: !0,
          thumbs: !0,
          thumbsPrerendered: !0,
          autoplayTimeout: 5e3,
          smartSpeed: 800,
          responsive: { 0: { items: 1 }, 600: { items: 1 }, 1e3: { items: 1 } },
        }),
        i(".testimonial-style3").owlCarousel({
          loop: !0,
          responsiveClass: !0,
          nav: !1,
          dots: !1,
          autoplay: !0,
          autoplayTimeout: 5e3,
          margin: 0,
          smartSpeed: 800,
          responsive: {
            0: { items: 1 },
            768: { items: 1 },
            1200: { items: 1 },
          },
        }),
        i(".testimonial-style4").owlCarousel({
          loop: !0,
          responsiveClass: !0,
          autoplay: !0,
          autoplayTimeout: 5e3,
          smartSpeed: 1500,
          nav: !1,
          dots: !0,
          center: !1,
          margin: 10,
          responsive: {
            0: { items: 1, margin: 0 },
            768: { items: 2 },
            1400: { items: 3 },
          },
        }),
        i(".portfolio-slider").owlCarousel({
          center: !0,
          items: 3,
          loop: !0,
          dots: !1,
          margin: 10,
          autoplay: !0,
          autoplayTimeout: 5e3,
          smartSpeed: 900,
          responsive: {
            0: { items: 1 },
            576: { items: 2, center: !1 },
            1200: { items: 3, center: !1 },
            1400: { items: 3 },
          },
        }),
        i(".portfolio-carousel").owlCarousel({
          center: !1,
          items: 1,
          loop: !0,
          dots: !1,
          margin: 40,
          autoplay: !0,
          autoplayTimeout: 5e3,
          smartSpeed: 900,
          responsive: {
            0: { items: 1 },
            576: { items: 2 },
            992: { items: 3 },
            1200: { items: 4 },
            1400: { items: 5 },
          },
        }),
        i(".portfolio-block").owlCarousel({
          loop: !0,
          responsiveClass: !0,
          center: !0,
          nav: !1,
          dots: !0,
          autoplay: !0,
          autoplayTimeout: 5e3,
          margin: 30,
          smartSpeed: 900,
          responsive: { 0: { items: 1 }, 768: { items: 2 } },
        }),
        i(".vision-changebg").owlCarousel({
          loop: !0,
          responsiveClass: !0,
          center: !1,
          nav: !1,
          dots: !1,
          autoplay: !1,
          autoplayTimeout: 5e3,
          margin: 0,
          smartSpeed: 900,
          responsive: {
            0: { items: 1 },
            576: { items: 2 },
            992: { items: 4, loop: !1 },
          },
        }),
        i(".slider-fade1").owlCarousel({
          items: 1,
          loop: !0,
          dots: !0,
          margin: 0,
          nav: !0,
          navText: [
            "<i class='ti-angle-left'></i>",
            "<i class='ti-angle-right'></i>",
          ],
          autoplay: !0,
          smartSpeed: 1500,
          mouseDrag: !1,
          animateIn: "fadeIn",
          animateOut: "fadeOut",
          responsive: { 992: { nav: !0, dots: !1 } },
        }),
        i(".slider-fade2").owlCarousel({
          items: 1,
          loop: !0,
          nav: 0,
          dots: !0,
          autoplay: 0,
          smartSpeed: 1500,
          mouseDrag: !1,
          animateIn: "fadeIn",
          animateOut: "fadeOut",
          responsive: { 992: { nav: 0, dots: !0 } },
        }),
        i(".team-slider").owlCarousel({
            items: 4,
            loop: !0,
            nav: 0,
          navText: [
            "<i class='ti-angle-left'></i>",
            "<i class='ti-angle-right'></i>",
          ],
            dots: 0,
            autoplay: 0,
            smartSpeed: 1500,
            mouseDrag: !0,
            animateIn: "fadeIn",
            animateOut: "fadeOut",
            responsive: { 0: { items: 1 }, 768: { items: 1 }, 1200: { items: 4 } },
          }),
        i(".slider-fade3").owlCarousel({
          items: 1,
          loop: !0,
          dots: !0,
          margin: 0,
          nav: !1,
          navText: [
            "<i class='ti-angle-left'></i>",
            "<i class='ti-angle-right'></i>",
          ],
          autoplay: !0,
          smartSpeed: 1500,
          mouseDrag: !1,
          animateIn: "fadeIn",
          animateOut: "fadeOut",
          responsive: { 992: { nav: !0, dots: !1 } },
        }),
        i(".client-style1").owlCarousel({
          loop: !0,
          nav: !1,
          dots: !1,
          autoplay: !0,
          smartSpeed: 800,
          autoplayTimeout: 3e3,
          responsiveClass: !0,
          autoplayHoverPause: !1,
          responsive: {
            0: { items: 2, margin: 30 },
            481: { items: 2, margin: 15 },
            576: { items: 3, margin: 30 },
            992: { items: 4, margin: 40 },
            1200: { items: 5, margin: 60 },
            1600: { items: 7, margin: 80 },
          },
        }),
        i(".clients-style2").owlCarousel({
          loop: !0,
          nav: !1,
          dots: !1,
          autoplay: !0,
          smartSpeed: 800,
          autoplayTimeout: 3e3,
          responsiveClass: !0,
          autoplayHoverPause: !1,
          responsive: {
            0: { items: 2, margin: 30 },
            576: { items: 3, margin: 40 },
            768: { items: 3, margin: 40 },
            992: { items: 4, margin: 60 },
            1200: { items: 5, margin: 80 },
          },
        }),
        i(".clients-style3").owlCarousel({
          loop: !0,
          nav: !1,
          dots: !1,
          autoplay: !0,
          smartSpeed: 800,
          autoplayTimeout: 3e3,
          responsiveClass: !0,
          autoplayHoverPause: !1,
          responsive: {
            0: { items: 1, margin: 30 },
            481: { items: 2, margin: 15 },
            576: { items: 3, margin: 30 },
            992: { items: 4, margin: 40 },
            1200: { items: 5, margin: 60 },
            1600: { items: 7, margin: 80 },
          },
        }),
        i(".client-style4").owlCarousel({
          loop: !0,
          nav: !1,
          dots: !1,
          autoplay: !0,
          smartSpeed: 800,
          autoplayTimeout: 3e3,
          responsiveClass: !0,
          autoplayHoverPause: !1,
          responsive: {
            0: { items: 1, margin: 30 },
            481: { items: 2, margin: 15 },
            576: { items: 4, margin: 30 },
            992: { items: 4, margin: 30 },
            1200: { items: 4, margin: 30 },
            1600: { items: 5, margin: 30 },
          },
        }),
        i(".owl-carousel").owlCarousel({
          items: 1,
          loop: !0,
          dots: !1,
          margin: 0,
          autoplay: !0,
          smartSpeed: 500,
        }),
        i(".slider-fade1").on("changed.owl.carousel", function (e) {
          e = e.item.index - 2;
          i(".h5").removeClass("animated fadeInUp"),
            i(".title").removeClass("animated fadeInUp"),
            i("p").removeClass("animated fadeInUp"),
            i("a").removeClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find(".h5")
              .addClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find(".title")
              .addClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find("p")
              .addClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find("a")
              .addClass("animated fadeInUp");
        }),
        i(".slider-fade-test").on("changed.owl.carousel", function (e) {
          e = e.item.index - 2;
          i(".text-animations").removeClass("animated"),
            i(".title").removeClass("animated fadeInUp"),
            i(".lead").removeClass("animated fadeInUp"),
            i(".butn").removeClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find(".text-animations")
              .addClass("animated"),
            i(".text-animations").textillate("in"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find(".title")
              .addClass("animated fadeInUp"),
              i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find(".lead")
              .addClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find(".butn")
              .addClass("animated fadeInUp");
        }),
        i(".slider-fade3").on("changed.owl.carousel", function (e) {
          e = e.item.index - 2;
          i("span").removeClass("animated fadeInUp"),
            i("h1").removeClass("animated fadeInUp"),
            i("p").removeClass("animated fadeInUp"),
            i("a").removeClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find("span")
              .addClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find("h1")
              .addClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find("p")
              .addClass("animated fadeInUp"),
            i(".owl-item")
              .not(".cloned")
              .eq(e)
              .find("a")
              .addClass("animated fadeInUp");
        }),
        0 !== i(".horizontaltab").length &&
          i(".horizontaltab").easyResponsiveTabs({
            type: "default",
            width: "auto",
            fit: !0,
            tabidentify: "hor_1",
            activate: function (e) {
              var a = i(this),
                t = i("#nested-tabInfo");
              i("span", t).text(a.text()), t.show();
            },
          }),
        i(".countup").counterUp({ delay: 25, time: 2e3 }),
        0 !== i(".countdown").length &&
          i(".countdown").countdown({
            date: "01 Jan 2024 00:01:00",
            format: "on",
          }),
        i(".current-year").text(new Date().getFullYear());
    }),
    s.on("load", function () {
      var a = i(".portfolio-gallery-isotope").isotope({});
      i(".filtering").on("click", "span", function () {
        var e = i(this).attr("data-filter");
        a.isotope({ filter: e });
      }),
        i(".filtering").on("click", "span", function () {
          i(this).addClass("active").siblings().removeClass("active");
        }),
        i(".portfolio-gallery,.portfolio-gallery-isotope").lightGallery(),
        s.stellar();
    });
})(jQuery);
