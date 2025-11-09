@extends('layouts.generic')

@section('page_description', getSetting('site.description'))
@section('share_url', route('home'))
@section('share_title', getSetting('site.name') . ' - ' . getSetting('site.slogan'))
@section('share_description', getSetting('site.description'))
@section('share_type', 'article')
@section('share_img', GenericHelper::getOGMetaImage())

@section('scripts')
    <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "{{getSetting('site.name')}}",
    "url": "{{getSetting('site.app_url')}}",
    "address": ""
  }
</script>
@stop

@section('styles')
    {!!
        Minify::stylesheet([
            '/css/pages/home.css',
            '/css/pages/search.css',
         ])->withFullUrl()
    !!}
@stop

@section('content')

    <!-- Demo styles -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #000;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
            max-height: 100%; /* or whatever height you want */
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #444;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <div class="home-header min-vh-100 position-relative  overflow-hidden">
        <div class="container h-100">
            <div class="row d-flex align-items-center h-100 ">
                <!-- Left column (text) -->
                <div class="col-12 col-md-5 mt-6 mt-md-0 ">
                    <h2 class="font-weight-bold text-gradient text-center">{{__('Create. Earn. Connect. All with Crypto')}},</h2>
                    <p class="text-gradient bg-white text-center">{{__('Billionsub empowers creators to earn globally and instantly in crypto – and gives fans a secure, borderless way to support the content they love.')}}.</p>
                    <div class="mt-4 text-center">
                        <a href="{{route('login')}}" class="btn btn-grow bg-gradient-primary btn-round mb-0 me-1 mt-2 mt-md-0">
                            {{__('Join as a Creator')}}
                        </a>
                        <a href="{{route('search.get')}}" class="btn btn-grow btn-link btn-round mb-0 me-1 mt-2 mt-md-0">
                            @include('elements.icon',['icon'=>'search-outline','centered'=>false])
                            {{__('Discover Creators')}}
                        </a>
                    </div>
{{--                    <div class="d-flex col-12 col-5 ">--}}
{{--                        <img src="{{asset('/img/homePic2.jpg')}}" class="" style="width: 250px; height: 250px; object-fit: cover" alt="">--}}
{{--                        <h6>Experience the Pulse of Exclusive Content</h6>--}}
{{--                    </div>--}}
                </div>

                <!-- Right column (image fills column entirely) -->
                <div class="col-5 col-md-6 d-none d-md-flex justify-content-center align-items-end h-100 p-0 mt-5">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide ">
                                <video autoplay loop muted playsinline class="h-100 w-100" style="object-fit: cover" src="{{asset('/videos/slider1.mp4')}}"></video>
                            </div>
                            <div class="swiper-slide">
                                <video autoplay loop muted playsinline class="h-100 w-100" style="object-fit: cover" src="{{asset('/videos/slider22.mp4')}}"></video>
                            </div>
                            <div class="swiper-slide">
                                <video autoplay loop muted playsinline class="h-100 w-100" style="object-fit: cover" src="{{asset('/videos/slider3.mp4')}}"></video>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="my-5 py-5 home-bg-section">
        <div class="row justify-content-md-center">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="section-title text-center title-ex1 ">
                    <h2 class="text-gradient">Why Billionsub?</h2>
                    <p>Why Thousands Are Switching to Billionsub:</p>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                        <!--   <img src="{{asset('/img/home-scene-1.svg')}}" class="img-fluid home-box-img" alt="{{__('Premium & Private content')}}"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold text-gradient text-lg">{{__('Keep More Earnings')}}</h5>
                            <span class="text-md">{{__('We take less, you earn more')}} </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                     <!--   <img src="{{asset('/img/home-scene-1.svg')}}" class="img-fluid home-box-img" alt="{{__('Premium & Private content')}}"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold text-gradient text-lg">{{__('Global, Instant Payments')}}</h5>
                            <span class="text-md">{{__('Zero borders, 24/7 access')}} </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                    <!--    <img src="{{asset('/img/home-scene-2.svg')}}" class="img-fluid home-box-img" alt="{{__('Private chat & Tips')}}"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold text-gradient text-lg">{{__('Total Privacy')}}</h5>
                            <span class="text-md">{{__('No credit card leaks. No ID needed')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                    <!--    <img src="{{asset('/img/home-scene-3.svg')}}" class="img-fluid home-box-img" alt="{{__('Secured assets & Privacy focus')}}"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold text-gradient">{{__('Invite & Earn')}}</h5>
                            <span class="text-md">{{__("Our viral referral system pays you forever")}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="pricing-section">
        <div class="container">
            <!-- cards starts -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <h2>Step 1</h2>
                        <p>Set Up Instantly</p>
                        <ul class="pricing-offers">
                            <li>Create your page in minutes. No ID. No bank. Just freedom.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card featured">
                        <h2>Step 2</h2>
                        <p>Accept Any Major Crypto</p>
                        <ul class="pricing-offers">
                            <li>From Bitcoin to stablecoins, get paid in what matters to you.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <h2>Step 3</h2>
                        <p>Get Paid Directly</p>
                        <ul class="pricing-offers">
                            <li>Your fans subscribe, tip, unlock content — and you earn without delay.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <div class="my-5 py-5 home-bg-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="font-weight-bold">{{__("Featured creators")}}</h2>
            </div>

            <div class="creators-wrapper">
                <div class="row px-3">
                    @if(count($featuredMembers))
                        @foreach($featuredMembers as $member)
                            <div class="col-12 col-md-4 p-1">
                                <div class="p-2">
                                    @include('elements.vertical-member-card',['profile' => $member])
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

{{--    <div class="py-4 my-4 white-section ">--}}
{{--        <div class="container">--}}
{{--            <div class="text-center">--}}
{{--                <h3 class="font-weight-bold">{{__("Got questions?")}}</h3>--}}
{{--                <p>{{__("Don't hesitate to send us a message at")}} - <a href="{{route('contact')}}">{{__("Contact")}}</a> </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@stop
