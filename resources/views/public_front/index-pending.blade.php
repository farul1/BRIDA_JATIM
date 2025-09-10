@extends('front_index')
@section('title')
BRIDA JATIM
@endsection

@section('logo-header')
<!-- logo begin -->

<!-- logo close -->
@endsection

@section('slider')
<!-- revolution slider begin -->
<section id="section-slider" class="fullwidthbanner-container text-white" aria-label="section-slider">
    <div id="slider-revolution">
        <ul>
            @foreach($slider as $s)
            <li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="">
                <!--  BACKGROUND IMAGE -->
                <img alt="" class="rev-slidebg" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" src="{{asset('file_upload/slider/'.$s->gambar)}}">
                <!-- <div class="tp-caption big-s1" data-x="0" data-y="230" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:200;e:Power2.easeInOut;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                    <h3 class="id-color">Need Any Help?</h3>
                </div> -->
                <!-- <div class="tp-caption very-big-white" data-x="0" data-y="280" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:400;e:Power2.easeInOut;" data-start="600" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                    <h1></h1>
                </div> -->
                <!-- <div class="tp-caption" data-x="0" data-y="360" data-width="480" data-height="none" data-whitespace="wrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:600;e:Power2.easeInOut;" data-start="700">
                    <p class="lead xs-hide">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="tp-caption" data-x="0" data-y="450" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:800;e:Power2.easeInOut;" data-start="800">
                    <a class="btn-custom" href="features.html">Contact Us</a>
                </div> -->
            </li>
            @endforeach
            <!-- <li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="">
                <img alt="" class="rev-slidebg" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" src="{{asset('asset_frontend/images/slider/2.jpg')}}">
                <div class="tp-caption big-s1" data-x="0" data-y="230" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:200;e:Power2.easeInOut;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                    <h3 class="id-color">Law &amp; Insurance Specialist</h3>
                </div>
                <div class="tp-caption very-big-white" data-x="0" data-y="280" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:400;e:Power2.easeInOut;" data-start="600" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                    <h1>Because We Care</h1>
                </div>
                <div class="tp-caption" data-x="0" data-y="360" data-width="480" data-height="none" data-whitespace="wrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:600;e:Power2.easeInOut;" data-start="700">
                    <p class="lead xs-hide">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="tp-caption" data-x="0" data-y="450" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;y:-100;s:800;e:Power2.easeInOut;" data-start="800">
                    <a class="btn-custom" href="features.html">Contact Us</a>
                </div>
            </li> -->
        </ul>
    </div>
</section>
<!-- revolution slider close -->
<section aria-label="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Link Terkait</h2>
                <div class="small-border"></div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3 mb-30 wow fadeInRight mt-200" data-wow-delay=".2s">
                        <div class="mask2" style=" border-radius:5px; padding:10px">
                            <div class="bloglist item">
                                <div class="post-content">
                                    <div class="date-box">
                                    </div>
                                    <div class="post-image">
                                        <img alt="" src="{{asset('img/jurnal.png')}}">
                                    </div>
                                    <div class="post-text2">
                                        <h4>Jurnal Cakrawala</h4>
                                        <a href=""><button type="button" class="btn btn-sm" style="border-color:#FF7300; border-radius:20px; color:#FF7300; background-color:#FEEADA; margin-bottom:20px;">Read More</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-30 wow fadeInRight mt-200" data-wow-delay=".2s">
                        <div class="mask2" style=" border-radius:5px; padding:10px">
                            <div class="bloglist item">
                                <div class="post-content">
                                    <div class="date-box">
                                    </div>
                                    <div class="post-image">
                                        <img alt="" src="{{asset('img/enikibang.png')}}">
                                    </div>
                                    <div class="post-text2">
                                        <h4>E-NIKIBANG</h4>
                                        <a href=""><button type="button" class="btn btn-sm" style="border-color:#FF7300; border-radius:20px; color:#FF7300; background-color:#FEEADA; margin-bottom:20px;">Read More</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-30 wow fadeInRight mt-200" data-wow-delay=".2s">
                        <div class="mask2" style=" border-radius:5px; padding:10px">
                            <div class="bloglist item">
                                <div class="post-content">
                                    <div class="date-box">
                                    </div>
                                    <div class="post-image">
                                        <img alt="" src="{{asset('img/lynbangjol.png')}}">
                                    </div>
                                    <div class="post-text2">
                                        <h4>LYNBANGJOL</h4>
                                        <a href=""><button type="button" class="btn btn-sm" style="border-color:#FF7300; border-radius:20px; color:#FF7300; background-color:#FEEADA; margin-bottom:20px;">Read More</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-30 wow fadeInRight mt-200" data-wow-delay=".2s">
                        <div class="mask2" style=" border-radius:5px; padding:10px">
                            <div class="bloglist item">
                                <div class="post-content">
                                    <div class="date-box">
                                    </div>
                                    <div class="post-image">
                                        <img alt="" src="{{asset('img/teropong.png')}}">
                                    </div>
                                    <div class="post-text2">
                                        <h4>TEROPONG</h4>
                                        <a href=""><button type="button" class="btn btn-sm" style="border-color:#FF7300; border-radius:20px; color:#FF7300; background-color:#FEEADA; margin-bottom:20px;">Read More</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6">
                <img style="width:100%;" src="https://img.icons8.com/bubbles/204/000000/book.png">
            </div>
        </div> -->
    </div>
</section>
@endsection

@section('berita')
<section id="section-highlight" class="relative text-light" >
    <div class="container">
        <div class="spacer-single"></div>
    </div>
</section>
<section class="no-top relative z1000">
    <div class="container">
        <div class="row mt-100">
            <div class="col-md-3">
                <!-- <span class="p-title">Welcome</span><br> -->
                <h1>
                    Berita<br><b>Terkini</b>.
                </h1>
                <div class="small-border bg-white sm-left"></div>
            </div>
            @foreach($berita as $b)
            <div class="col-md-3 mb-sm-30 wow fadeInRight mt-200" data-wow-delay=".2s">
                <div class="mask rounded">
                    <div class="bloglist item">
                        <div class="post-content">
                            <div class="date-box">
                                <?php
                                $tgl = $b->tanggal;
                                $tgl = explode('-',$tgl);
                                ?>
                                <div class="m">{{$tgl[2]}}</div>
                                <div class="d">{{$tgl[1]}}</div>
                            </div>
                            <div class="post-image">
                                <img alt="" src="{{asset('asset_frontend/images/news/3.jpg')}}">
                            </div>
                            <div class="post-text" style="height:390px;">
                                <h4><a href="{{route('detailpost',$b->id)}}">{{$b->judul}}<span></span></a></h4>
                                <?php
                                $str=$b->description;
                                if (strlen($b->description) >=70) {
                                    $str = substr($b->description, 0, 70) . '...';
                                }
                                echo $str;?>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>
</section>
@endsection
@section('galeri')
<section class="text-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <h1 style="color:#FE7301;">
                    Galeri Foto & Video
                </h1>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a style="color:#eaa636;" class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Foto</a>
                    </li>
                    <li class="nav-item">
                        <a style="color:#eaa636;" class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Video</a>
                    </li>
                </ul>
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                    @foreach($foto as $f)
                                    <div class="col-md-4 mb30">
                                        <div class="de-image-hover rounded" style="height:150px;">
                                            <a href="{{ asset('file_upload/foto/'.$f->gambar) }}" class="image-popup">
                                                <span class="dih-title-wrap">
                                                    <span class="dih-title" >{{$f->judul}}</span>
                                                </span>
                                                <span class="dih-overlay"></span>
                                                <img src="{{ asset('file_upload/foto/'.$f->gambar) }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="row">
                                    @foreach($video as $f)
                                    <div class="col-md-6 mb30">
                                        <div class="rounded" style="height:250px;">
                                            <!-- <a href="{{ asset('file_upload/foto/'.$f->gambar) }}" class="image-popup"> -->
                                                <!-- <span class="dih-title-wrap">
                                                    <span class="dih-title">{{$f->judul}}</span>
                                                </span> -->
                                                <!-- <span class="dih-overlay"></span> -->
                                                <iframe width="100%" height="100%" src="{{$f->link}}"></iframe>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 align-self-start" style="margin-left:60px;">
                <h1 style="padding-bottom:60px; color:#FE7301;">Situs Terkait</h1>

            </div>
            <div class="col-lg-2 align-self-start" style="margin-left:60px;">
                <h1 style="padding-bottom:60px; color:#FE7301;">Polling</h1>
                <p style="color:#eaa636;">Berikan penilaian untuk website : </p>
                <form class="rating" method="POST" >
                    <label>
                        <input type="radio" name="stars" value="1" />
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="2" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="3" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="4" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="5" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection
