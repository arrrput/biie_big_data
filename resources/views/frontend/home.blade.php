@extends('layouts.frontend')
@section('title')
    ETIS || Beranda
@endsection

@section('content')
    <!--Slider Start-->
<div class="slider" id="main-slider">

    <div class="slide-carousel owl-carousel">
        @foreach ($slider as $slide)
        <div class="slider-item flex" style="background-image:url({{ $slide->image }});">
            <div class="bg-slider"></div>
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
        @endforeach      
    </div>
</div>
<!--Slider End-->


<!--Feature Start-->
<div class="about-area">
    <div class="container">
        <div class="row ov_hd">
            <div class="col-md-12 wow fadeInDown">
                <div class="main-headline">
                    <h1>Apa Itu <span>ETIS</span></h1>
                    <p>Merupakan sistem informasi berbasis digital guna memberikan informasi tentang Departemen Estate,
                        PT. Bintan Inti Industrial Estate, baik informasi terkait data-data ataupun kegiatan yang dilakukan Departemen Estate.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="coustom-container">
        <div class="row ov_hd">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-skey mt_50">
                    <div class="about-img">
                        <img src="https://setkab.go.id/wp-content/uploads/2021/05/PRESIDEN-DAN-SESKAB-KE-KEPRI-.jpeg" alt="">
                        <div class="video-section video-section-home">
                            <a class="video-button mgVideo" href="https://www.youtube.com/watch?v=9EukBC5wlUs"><span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="feature-section-text mt_50">
                    <h2>Manfaat & Tujuan dari ETIS</h2>
                    <p>Menjadi sistem yang dapat membagi dan menginterasikan data dan informasi yang dibutuhkan secara internal</p>
                    <div class="feature-accordion" id="accordion">
                                                <div class="faq-item card">
                            <div class="faq-header" id="heading1-1">
                                <button class="faq-button " data-toggle="collapse" data-target="#collapse1-1" aria-expanded="true" aria-controls="collapse1-1">Paperless</button>
                            </div>

                            <div id="collapse1-1" class="collapse show" aria-labelledby="heading1-1" data-parent="#accordion">
                                <div class="faq-body">
                                   <p>Mendigitalisasi data dalam bentuk analog menjadi data digital (paperless).                                   <br></p>
                                </div>
                            </div>
                        </div>
                                                <div class="faq-item card">
                            <div class="faq-header" id="heading1-2">
                                <button class="faq-button collapsed" data-toggle="collapse" data-target="#collapse1-2" aria-expanded="true" aria-controls="collapse1-2">Lorem ipsum</button>
                            </div>

                            <div id="collapse1-2" class="collapse " aria-labelledby="heading1-2" data-parent="#accordion">
                                <div class="faq-body">
                                   <p>Menjadikan Website ETIS sebagai sumber informasi akurat dan up to date yang dibutuhkan oleh semua stake holder.
                                    .<br></p>
                                </div>
                            </div>
                        </div>
                                                <div class="faq-item card">
                            <div class="faq-header" id="heading1-3">
                                <button class="faq-button collapsed" data-toggle="collapse" data-target="#collapse1-3" aria-expanded="true" aria-controls="collapse1-3">How Do I Register In This System?</button>
                            </div>

                            <div id="collapse1-3" class="collapse " aria-labelledby="heading1-3" data-parent="#accordion">
                                <div class="faq-body">
                                   <p>Est odio quaeque legimus ad. Eu sumo diam fabellas vim. In mea graece suscipiantur, omnis dolorem expetenda in usu, suas oportere theophrastus ei pro. Amet facer eripuit cu his, mea at quis maluisset, ferri perfecto constituam at mea. Nostro eleifend in pri.<br></p>
                                </div>
                            </div>
                        </div>
                                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Feature End-->

<!--Service Start-->
<div class="service-area bg-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <h1><span>Sort</span> History</h1>
                    <p>PT. Bintan Inti Industrial Estate merupakan perusahaan yang bergerak dalam bidang pengembangan, pengoperasian, dan pemeliharaan Kawasan industri. Kawasan ini berdiri pada tahun 1990 dan mulai beroperasi pada tahun 1994.
                    </p>
                </div>
            </div>
        </div>
        <div class="row service-row">
            <div class="col-md-12">
                <div class="service-coloum-area">
                        <div class="service-coloum">
                        <div class="service-item">
                            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_BhbCTg.json" background="transparent"  speed="1"  style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                            <h3>Environment</h3>
                            <p>Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.</p>

                            <a href="http://127.0.0.1:8000/service-details/corporate-law">Learn More →</a>
                            
                        </div>
                    </div>
                    <div class="service-coloum">
                        <div class="service-item">
                            
                            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jiedl6fj.json" background="transparent"  speed="1"  style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                            <h3>Maintenance</h3>
                            <p>Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.</p>

                            <a href="http://127.0.0.1:8000/service-details/family-law">Learn More →</a>
                            
                        </div>
                    </div>
                        <div class="service-coloum">
                        <div class="service-item">
                            
                            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_aDxvEq.json" background="transparent"  speed="1"  style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                            <h3>RWPS</h3>
                            <p>Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.</p>

                                                        <a href="http://127.0.0.1:8000/service-details/criminal-law">Learn More →</a>
                            
                        </div>
                    </div>
                        <div class="service-coloum">
                        <div class="service-item">
                            
                            <lottie-player src="https://assets5.lottiefiles.com/private_files/lf30_zwnlhtfw.json" background="transparent"  speed="1"  style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                            <h3>WWTP</h3>
                            <p>Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.</p>

                                                        <a href="http://127.0.0.1:8000/service-details/business-law">Learn More →</a>
                            
                        </div>
                    </div>
                                        <div class="service-coloum">
                        <div class="service-item">
                            
                            <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_I1Y1sN.json" background="transparent"  speed="1"  style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                            <h3>TRANSMISI</h3>
                            <p>Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.</p>

                            <a href="http://127.0.0.1:8000/service-details/insurance-law">Learn More →</a>
                            
                        </div>
                    </div>
                                        <div class="service-coloum">
                        <div class="service-item">
                            
                            <lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_lem2zbj4.json" background="transparent"  speed="1"  style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                            <h3>STP</h3>
                            <p>Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.</p>

                              <a href="http://127.0.0.1:8000/service-details/environmental-law">Learn More →</a>
                            
                        </div>
                    </div>
                                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="home-button ser-btn">
                    
                </div>
            </div>
        </div>
        <!--Counter Start-->

        <div class="counter-row row mb_100" style="background-image: url(http://127.0.0.1:8000/uploads/website-images/overview-banner-2021-09-04-11-08-53-5236.png); width:100%;">
            <div class="col-lg-3 col-6 mt_30 wow fadeInDown" data-wow-delay="0.2s">
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <div id="counter"><h2 class="counter counter-value" data-count="300">18</h2></div>
                    <h4>Tenants</h4>
                </div>
            </div>
            <div class="col-lg-3 col-6 mt_30 wow fadeInDown" data-wow-delay="0.2s">
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fas fa-hospital-user"></i>
                    </div>
                    <h2 class="counter counter-value" data-count="11">11</h2>
                    <h4>Departments</h4>
                </div>
            </div>
            <div class="col-lg-3 col-6 mt_30 wow fadeInDown" data-wow-delay="0.2s">
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h2 class="counter counter-value" data-count="42">260</h2>
                    <h4>Expert Person</h4>
                </div>
            </div>
            <div class="col-lg-3 col-6 mt_30 wow fadeInDown" data-wow-delay="0.2s">
                <div class="counter-item">
                    <div class="counter-icon">
                        
                        <i class="fab fa-artstation"></i>
                    </div>
                    <h2 class="counter counter-value" data-count="22">342 Hektar</h2>
                    <h4>Land Active</h4>
                </div>
            </div>
            
        </div>
        <!--Counter End-->
    </div>
</div>
<!--Service End-->



<!--Team Area Start-->
<div class="team-area ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <h1><span>Our</span> Team</h1>
                    <p>Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="team-carousel owl-carousel">
                    @foreach ($team as $team)
                        
                    <div class="team-item">
                        <div class="team-photo">
                            <img src="http://127.0.0.1:8000/img/{{ $team->image }}" alt="Team Photo">
                        </div>
                        <div class="team-text text-center">
                            <a href="http://127.0.0.1:8000/images/mul.jpg">{{ $team->name }}</a>
                            <p><span><b><i class="fas fa-street-view"></i> {{ $team->posisi }}</b></span></p>
                            <p class="text-center"><i>"{{ $team->description }}"</i></p>
                        </div>
                        <div class="team-social">
                            <ul>
                                <li><a href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $team->wa }}"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!--Team Area End-->


<!--Portfolio Start-->
<div class="case-study-home-page case-study-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <h1><span>Our</span> Tenant</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<img  src="{{ URL::asset('frontend/img/tenant.jpg') }}"/>
<!--Testimonial End-->

<!--Blog-Area Start-->
<div class="blog-area bg_ecf1f8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <h1><span>Our</span> Blog</h1>
                    <p>Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="blog-item first-blog">
                    <a href="http://127.0.0.1:8000/uploads/custom-images/blog-feature-2021-09-15-10-43-17-5398.jpg" class="image-effect">
                        <div class="blog-image">
                            <img src="http://127.0.0.1:8000/uploads/custom-images/blog-feature-2021-09-15-10-43-17-5398.jpg" alt="">
                        </div>
                    </a>
                    <div class="blog-text">
                        <div class="blog-author">
                            <span><i class="fas fa-user"></i> Admin</span>
                            <span><i class="far fa-calendar-alt"></i> 07-15-2021</span>
                        </div>
                        <h3><a href="http://127.0.0.1:8000/blog-details/mea-graece-suscipia-omnis-dolorem-expet">Mea graece suscipia omnis dolorem expet</a></h3>
                        <p>
                            Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu.
                        </p>

                        <a class="sm_btn" href="http://127.0.0.1:8000/blog-details/mea-graece-suscipia-omnis-dolorem-expet">See Details →</a>
                        

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="blog-carousel owl-carousel">
                                                                                                                                                                                            <div class="blog-item effect-item">
                            <a href="#" class="image-effect">
                                <div class="blog-image">
                                    <img src="uploads/custom-images/blog-thumbnail-2021-10-22-11-31-39-3261.jpg" alt="Blog Thumbnail Image">
                                </div>
                            </a>
                            <div class="blog-text">
                                <div class="blog-author">
                                    <span><i class="fas fa-user"></i> Admin</span>
                                    <span><i class="far fa-calendar-alt"></i> 10-22-2021</span>
                                </div>
                                <h3><a href="http://127.0.0.1:8000/blog-details/10-reasons-to-start-your-own-profitable-website">10 Reasons To Start Your Own, Profitable Website!</a></h3>
                                <p>
                                    Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu.
                                </p>

                                                                <a class="sm_btn" href="http://127.0.0.1:8000/blog-details/10-reasons-to-start-your-own-profitable-website">See Details →</a>
                            </div>
                        </div>
                        <div class="blog-item effect-item">
                            <a href="#" class="image-effect">
                                <div class="blog-image">
                                    <img src="uploads/custom-images/blog-thumbnail-2021-10-22-11-30-26-6925.jpg" alt="Blog Thumbnail Image">
                                </div>
                            </a>
                            <div class="blog-text">
                                <div class="blog-author">
                                    <span><i class="fas fa-user"></i> Admin</span>
                                    <span><i class="far fa-calendar-alt"></i> 10-22-2021</span>
                                </div>
                                <h3><a href="http://127.0.0.1:8000/blog-details/9-things-i-love-about-shaving-my-head-during-quarantine">9 Things I Love About Shaving My Head During Quarantine</a></h3>
                                <p>
                                    Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu.
                                </p>

                                                                <a class="sm_btn" href="http://127.0.0.1:8000/blog-details/9-things-i-love-about-shaving-my-head-during-quarantine">See Details →</a>
                                                            </div>
                        </div>
                                                                                            <div class="blog-item effect-item">
                            <a href="#" class="image-effect">
                                <div class="blog-image">
                                    <img src="uploads/custom-images/blog-thumbnail-2021-10-22-11-27-33-4085.jpg" alt="Blog Thumbnail Image">
                                </div>
                            </a>
                            <div class="blog-text">
                                <div class="blog-author">
                                    <span><i class="fas fa-user"></i> Admin</span>
                                    <span><i class="far fa-calendar-alt"></i> 10-22-2021</span>
                                </div>
                                <h3><a href="http://127.0.0.1:8000/blog-details/level-up-your-live-streams-with-automated-captions-and-more">Level Up Your Live Streams With Automated Captions And More</a></h3>
                                <p>
                                    Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu.
                                </p>

                                                                <a class="sm_btn" href="http://127.0.0.1:8000/blog-details/level-up-your-live-streams-with-automated-captions-and-more">See Details →</a>
                                                            </div>
                        </div>
                                                                                            <div class="blog-item effect-item">
                            <a href="#" class="image-effect">
                                <div class="blog-image">
                                    <img src="uploads/custom-images/blog-thumbnail-2021-10-22-11-23-37-8966.jpg" alt="Blog Thumbnail Image">
                                </div>
                            </a>
                            <div class="blog-text">
                                <div class="blog-author">
                                    <span><i class="fas fa-user"></i> Admin</span>
                                    <span><i class="far fa-calendar-alt"></i> 10-22-2021</span>
                                </div>
                                <h3><a href="http://127.0.0.1:8000/blog-details/apple-imac-with-retina-5k-display-review">Apple IMac With Retina 5K Display Review</a></h3>
                                <p>
                                    Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu.
                                </p>

                                                                <a class="sm_btn" href="http://127.0.0.1:8000/blog-details/apple-imac-with-retina-5k-display-review">See Details →</a>
                                                            </div>
                        </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
<!--Blog-Area End-->
<!--Start of Tawk.to Script-->
<!--End of Tawk.to Script-->

<!--Subscribe Start-->
<div class="subscribe-area" style="background-image: url(http://127.0.0.1:8000/uploads/website-images/subscribe-us-banner-2021-09-15-10-36-19-1469.jpg)">
    <div class="container">
        <div class="row ov_hd">
            <div class="col-md-12 wow fadeInDown" data-wow-delay="0.1s">
                <div class="main-headline white">
                    <h1>Subscribe Us</h1>
                    <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola, est ut clita dolorem, ei est mazim fuisset scribentur</p>
                </div>
            </div>
        </div>
        <div class="row ov_hd">
            <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="subscribe-form">
                    <form method="POST" action="http://127.0.0.1:8000/subscribe-us">
                        <input type="hidden" name="_token" value="LPVRizSycft6UNmgZCqaCVMhJ5rO09jjNwQAiNK8">                        <input type="email" required name="email" placeholder="Email Address">
                        <button type="submit" class="btn-sub">Subscribe Us</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Subscribe Start-->


@endsection

@push('prepend-script')
<script>
var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});
    
</script>
@endpush