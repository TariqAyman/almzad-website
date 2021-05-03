<html dir="rlt" lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta content='المزاد الخيري' name='keywords'>
    <meta content='المزاد الخيري'>
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!--Icon Website-->
    <link rel="shortcut icon" href="{{ asset('frontend/img/icon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--FontWesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    @yield('style')
    <title>@yield('page-title') | المزاد الخيري</title>
</head>
<body>
<div id="myBtn" class="top">
    <a class="scroll" href="#top"><span class="fa fa-chevron-up"></span></a>
</div>
<!--Start-Header-->
<header id="top">
    <div class="container-fluid">
        <div class="row">
            <!--logo-->
            <div class="col-lg-3 col-6">
                <a href="{{ url('/') }}"><img class="img-fluid" alt="المزاد الخيري" src="{{ asset('frontend/img/logo.png') }}"></a>
            </div>
            <div class=" menu col-6">
                <a class="button-opener qodef-icon" href="#">
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                </a>
                <div id="mySidepanel" class="sidepanel">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a href="javascript:void(0)" class="closebtn fas fa-times "></a>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">@lang('app.home') <span class="sr-only">(current)</span></a>
                            </li>
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link" href="{{ route('frontend.user.store') }}">@lang('app.my_store')</a>--}}
                            {{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.user.store') }}">@lang('app.my_auctions')</a>
                            </li>
                            @auth('user')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.wallet.index') }}">@lang('app.wallet')</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.auctions.index') }}">@lang('app.auctions')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">@lang('app.content_us')</a>
                            </li>
                            <li class="nav-item sid-log">
                                <a class="nav-link" href="#"><span class="ub-font">ENG</span></a>
                            </li>
                            @auth('user')
                                <div class="sid-log">
                                    <ul class="nav fav">
                                        <li class="note-icon sid-log">
                                            <a href="#" class="note">
                                                <span class="num">3</span>
                                                <img src="{{ asset('frontend/img/note.png') }}" alt="المزاد الخيري">
                                            </a>
                                        </li>
                                        <li class="note-icon sid-log">
                                            <a class="dropdown-toggle note" href="#" role="button" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="{{ asset('frontend/img/pro.png') }}" alt="الملف الشخصي">
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="setting">
                                                <a class="dropdown-item" href="#">البروفايل</a>
                                                <a class="dropdown-item" href="#">تسجيل الخروج </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <button class="btn btn-login sid-log mr-2">@lang('app.register_now')</button>
                            @endif
                        </ul>
                    </nav><!--navbar-->
                </div>
            </div><!--menu-->
            <!--buttonLogin-->
            <div class="col-md-3 header-log">
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('app.arabic')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#"><span class="ub-font">ENG</span></a>
                    </div>
                </div>
                @auth('user')
                    <ul class="nav fav">
                        <li class="note-icon">
                            <a href="#" class="note">
                                <span class="num">3</span>
                                <img src="{{ asset('frontend/img/note.png') }}" alt="المزاد الخيري">
                            </a>
                        </li>
                        <li class="note-icon">
                            <a class="dropdown-toggle note" href="#" role="button" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('frontend/img/pro.png') }}" alt="الملف الشخصي">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="setting">
                                <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">البروفايل</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @else
                    <button class="btn btn-login" onclick="location.href='{{ route('register') }}'">@lang('app.register_now')</button>
                @endif
            </div>
        </div>
    </div>
</header>
@include('frontend.layouts.alert')
@yield('content')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg col-sm-12">
                <a href="{{ url('/') }}">
                    <img class="img-fluid" src="{{ setting('company_logo') ?? asset('frontend/img/logo.png') }}" alt="{{ setting('company_name') }}"></a>
                <div class="col-12 social-bg">
                    <ul class="nav socail-media mt-4">
                        @if( setting('youtube_url') )
                            <li class="sub-social">
                                <a href="{{ setting('instagram_url') }}"><i class="fab fa-instagram"></i></a>
                            </li>
                        @endif
                        @if( setting('youtube_url') )
                            <li class="sub-social">
                                <a href="{{ setting('twitter_url') }}"><i class="fab fa-twitter"></i></a>
                            </li>
                        @endif
                        @if( setting('youtube_url') )
                            <li class="sub-social">
                                <a href="{{ setting('facebook_url') }}"><i class="fab fa-facebook-square"></i></a>
                            </li>
                        @endif
                        @if( setting('youtube_url') )
                            <li class="sub-social">
                                <a href="{{ setting('youtube_url') }}"><i class="fab fa-youtube"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg col-sm-6">
                <h4>الأقسام الشائعة</h4>
                <div class="foot-dept">
                    @foreach($categoriesLayout->splitIn(2) as $categories)
                        <ul class="nav footer-link">
                            @foreach($categories as $category)
                                <li><a href="{{ route('frontend.auctions.index',['category' => $category->id]) }}"><i class="fas fas fa-angle-left pl-1"></i>{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-lg col-sm-6">
                <h4>المزادات الشائعة</h4>
                <ul class="nav footer-link">
                    @foreach($auctionsLayout as $auction)
                        <li class="pub-mzad">
                            <div class="pub-pic">
                                <img alt="{{ $auction->name }}" src="{{ !empty($auction->image->image) ? asset($auction->image->image) : asset('frontend/img/new-mzad-01.png') }}" class="img-fluid" style="max-height: 37px; max-width: 57px">
                            </div>
                            <div class="pub-body">
                                <h6>{{ $auction->name }}</h6>
                                <p>{{ $auction->created_at->diffForHumans() }} </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg col-sm-6">
                <h4>تواصل معانا</h4>
                <div class="footer-contact">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="contact-info pr-2">{{ setting('company_city') }} - {{ setting('company_address') }}</div>
                </div>
                <div class="footer-contact">
                    <i class="fas fa-phone"></i>
                    <div class="contact-info ub-font pr-2"> @lang('app.phone_number'): {{ setting('company_phone') }}</div>
                </div>
                <div class="footer-contact">
                    <i class="fas fa-print"></i>
                    <div class="contact-info ub-font pr-2"> {{ setting('company_email') }}</div>
                </div>
            </div>
            <div class="col-lg col-sm-6">
                <h4>اكتشف الروابط</h4>
                <ul class="nav footer-link">
                    @if(setting('url_1') &&  setting('url_1_text'))
                        <li><a href="{{ setting('url_1') }}">{{ setting('url_1') }}</a></li>
                    @endif
                    @if(setting('url_2') &&  setting('url_2_text'))
                        <li><a href="{{ setting('url_2') }}">{{ setting('url_2') }}</a></li>
                    @endif
                    @if(setting('url_3') &&  setting('url_3_text'))
                        <li><a href="{{ setting('url_3') }}">{{ setting('url_3') }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

@yield('page-script')
</body>
</html>
