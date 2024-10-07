<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <title>NTech - Build your website on your way</title>

    @include('layout.source')
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="NTU, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="NTech - Build your website on your way" />
    <meta property="og:url" content="http://ntechuniverse.com/" />
    <meta property="og:site_name" content="NTechUni | NTU" />
    <style>
        a {
            color: #ffffff
        }

        i {
            color: #ffffff
        }

        .wrapper-logo {
            height: 100vh;
            background: #333;
        }

        .scrolltop {
            left: 20px;
        }

        #main-div {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 0;
        }

        #main-button {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            right: 0;
            bottom: 0;
            height: 50px;
            width: 50px;
            font-size: 20px;
            color: #0064f3;
            cursor: pointer;
            background-color: #fff;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, .5);
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
        }

        #main-button~button {
            visibility: hidden;
            font-weight: 600;
            height: 50px;
            padding: 0 20px;
            color: #fff;
            background: linear-gradient(90deg, #00a1f5, #0064f3);
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, .5);
            border: 0;
            position: absolute;
            z-index: -1;
            right: 0;
            bottom: 0;
            opacity: 0;
            white-space: nowrap;
            cursor: pointer;
            transition: .2s all linear;
            -webkit-transition: .2s all linear;
            -moz-transition: .2s all linear;
            -ms-transition: .2s all linear;
            -o-transition: .2s all linear;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
        }

        #main-button.open~button {
            visibility: visible;
            right: 70px;
            opacity: 1;
            transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
            -webkit-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
            -moz-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
            -ms-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
            -o-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
        }

        #main-button~a {
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: absolute;
            right: 0;
            bottom: 0;
            z-index: -1;
            height: 50px;
            width: 50px;
            font-size: 20px;
            opacity: 0;
            text-decoration: none;
            color: #fff;
            background-color: #fff;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, .5);
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            transition: .2s all linear;
            -webkit-transition: .2s all linear;
            -moz-transition: .2s all linear;
            -ms-transition: .2s all linear;
            -o-transition: .2s all linear;
        }

        #main-button~.telegram-color {
            background: linear-gradient(0deg, #017AB1, #01ABE6);
        }

        #main-button~.whatsapp-color {
            background: linear-gradient(0deg, #00B100, #09db09);
        }

        #main-button~.messenger-color {
            background: linear-gradient(0deg, #0078FF, #00C6FF);
        }

        #main-button.open~a {
            opacity: 1;
            transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
            -webkit-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
            -moz-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
            -ms-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
            -o-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
        }

        #main-button.open~a:nth-of-type(1) {
            bottom: 60px;
        }

        #main-button.open~a:nth-of-type(2) {
            bottom: 120px;
        }

        #main-button.open~a:nth-of-type(3) {
            bottom: 180px;
        }

        .wave {
            animation-name: wave;
            animation-duration: 1s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        @keyframes wave {
            0% {
                box-shadow: 0 0 0px 0px rgba(255, 255, 255, 0.5);
            }

            100% {
                box-shadow: 0 0 0px 10px rgba(255, 255, 255, 0);
            }
        }

        .open {
            animation-iteration-count: 1;
        }
    </style>

    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200"
    class="bg-white position-relative">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(assets/media/svg/illustrations/landing.svg)">
                <!--begin::Header-->
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    {{-- <div class="container">
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center justify-content-between">
                            <!--begin::Logo-->
                            <div class="d-flex align-items-center flex-equal">
                                <!--begin::Mobile menu toggle-->
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                    <span class="svg-icon svg-icon-2hx">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Mobile menu toggle-->
                                <!--begin::Logo image-->
                                <a href="../../demo8/dist/landing.html">
                                    <img alt="Logo" src="assets/media/logos/logo-nc .png"
                                        class="logo-default h-25px h-lg-30px" />
                                    <img alt="Logo" src="assets/media/logos/logo-nc-dark.png"
                                        class="logo-sticky h-20px h-lg-25px" />
                                </a>
                                <!--end::Logo image-->
                            </div>
                            <!--end::Logo-->
                            <!--begin::Menu wrapper-->

                            <!--end::Menu wrapper-->
                            <!--begin::Toolbar-->

                            <div class="flex-equal text-end ms-1">
                                @if (Auth::check())
                                    <a href="{{ route('home') }}" class="btn btn-success">Manage Website</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-success">Sign In</a>
                                @endif

                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div> --}}
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Landing hero-->
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <!--begin::Heading-->
                    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                        <!--begin::Title-->
                        <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Earn 5 billion VND
                            <br />with
                            <span
                                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                <span id="kt_landing_hero_text">NTU</span>
                            </span>
                        </h1>
                        <!--end::Title-->
                        <!--begin::Action-->
                        <div style="
                        background: rgb(141, 137, 104);
                        border-radius: 10px;
                        padding: 10px;
                        font-size: 100px;
                        color: white;
                    ">
                            {{-- <h1 style="color: #344734">Amount Earned:</h1><span> {{ sumMoney() }} VNĐ</span> --}}
                        </div>
                        {{-- <h6  style="
                        margin-top: 10px;
                        background: aquamarine;
                        border-radius: 10px;
                    ">Goal left: {{ leftMoney() }}</h6> --}}
                        <!--end::Action-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Clients-->
                    <div class="d-flex flex-center flex-wrap position-relative px-5">
                        <!--begin::Client-->
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="NTU">
                            <img src="assets/media/logos/ntu.png" class="mh-30px mh-lg-40px" alt="" />
                        </div>
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="ANBU">
                            <img src="assets/media/logos/anbu.png" class="mh-30px mh-lg-40px" alt="" />
                        </div>


                        <!--end::Client-->
                    </div>
                    <div
                        style="
                    height: 50px;
                    padding: 13px;
                    background: aquamarine;
                    border-radius: 10px;
                ">
                        {{-- <h2> {{ calculateTimeElapsed() }}</h2> --}}
                    </div>
                    <!--end::Clients-->
                </div>
                <!--end::Landing hero-->
            </div>

            <!--end::Wrapper-->
            <!--begin::Curve bottom-->
            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <!--end::Curve bottom-->
        </div>

        <!--end::Testimonials Section-->
        <!--begin::Footer Section-->
        <div class="mb-0">
            <!--begin::Curve top-->
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <!--end::Curve top-->
            <!--begin::Wrapper-->
            <div class="landing-dark-bg pt-20">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Row-->
                    <div class="row py-10 py-lg-20">
                        <!--begin::Col-->
                        <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                            <!--begin::Block-->
                            <div class="rounded landing-dark-border p-9 mb-10">
                                <!--begin::Title-->
                                <h2 class="text-white">What is NTU?</h2>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <span class="fw-normal fs-4 text-gray-700">NTU stands for Ninh Technology Universe </span>
                                <!--end::Text-->
                            </div>
                        </div>
                        <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                            <!--begin::Block-->
                            <div class="rounded landing-dark-border p-9 mb-10">
                                <!--begin::Title-->
                                <h2 class="text-white">What is purpose of NTU?</h2>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <span class="fw-normal fs-4 text-gray-700">Mission's NTU is enhance the world through a range of area:
                                   </span>
                                <li class="fw-normal fs-4 text-gray-700">Farm</li>
                                <li class="fw-normal fs-4 text-gray-700">Health</li>
                                <li class="fw-normal fs-4 text-gray-700">Logistics</li>
                                <li class="fw-normal fs-4 text-gray-700">Technology</li>
                                <li class="fw-normal fs-4 text-gray-700">Education</li>
                                <li class="fw-normal fs-4 text-gray-700">Investment</li>
                                <!--end::Text-->
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->

                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
                <!--begin::Separator-->
                <div class="landing-dark-separator"></div>
                <!--end::Separator-->
                <!--begin::Container-->

                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Footer Section-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
            <span class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <rect opacity="0.5" x="13" y="6" width="13" height="2"
                        rx="1" transform="rotate(90 13 6)" fill="black" />
                    <path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>

        <!--end::Scrolltop-->
    </div>
    <!--begin::Contact-->
    {{-- <div class="wrapper-logo" style="z-index: 99999">
        <div id="main-div">
            <div id="main-button" class="wave open">
                <i class="fas fa-comments fa-times" style="
				color: blue;
			"></i>
            </div>
            <button><a href="tel:0399470012"> <i class="fas fa-phone-alt"></i> Phone number</a>
            </button>

            <a href="https://www.messenger.com/t/nctechuniverse" class="messenger-color" style="color: white"><i
                    class="fab fa-facebook-messenger"></i></a>
        </div>
    </div> --}}
    <!--end::Contact-->
    <!--end::Main-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
    <script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="assets/js/custom/landing.js"></script>
    <script src="assets/js/custom/pages/company/pricing.js"></script>
    <script>
        var mainDiv = document.getElementById('main-button');
        mainDiv.addEventListener('click', function() {
            this.children.item(0).classList.toggle('fa-times');
            this.classList.toggle('open');
        });
    </script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
