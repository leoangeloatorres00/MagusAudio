<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <link href="{{ asset('css/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/audio.css') }}" rel="stylesheet">
</head>
<body>
    <div class="home">
        <div class="content">
            <div class="audiocontent">
                <section>
                    <div class="row m-0">
                        <div class="col-md-2 d-none d-lg-block d-xs-none" style="background: rgba(0,0,0,.03)">
                            <div class="row px-2">
                                <div class="col-md-4 ">
                                    <img src="{{ asset('public/image/magus_logo2.png') }}" alt="">
                                </div>
                            </div>
                            <a class="nav-link text-dark font-weight-bold" href="javascript:void(0) }}"> Home </a> 
                            <a class="nav-link text-dark font-weight-bold" href="javascript:void(0) }}"> Browse </a>
                            <a class="nav-link text-dark font-weight-bold" href="javascript:void(0) }}"> Recents </a>
                            <span>Library</span>
                            <a class="nav-link text-dark font-weight-bold" href="javascript:void(0) }}"> Recently Played </a> 
                            <a class="nav-link text-dark font-weight-bold" href="javascript:void(0) }}"> Liked Subs </a>
                            <a class="nav-link text-dark font-weight-bold" href="javascript:void(0) }}"> Bundles </a>
                            <a class="nav-link text-dark font-weight-bold" href="javascript:void(0) }}"> Artist </a>
                            <a class="nav-link text-dark font-weight-bold" href="javascript:void(0) }}"> Live Streams </a>
                            <hr>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="music-search">
                              <div class="row">
                                  <div class="col-12 px-3 pt-3">
                                      <input type="text" name="" id="" class="form-control" placeholder="Search">
                                  </div>
                              </div>
                            </div><hr>
                            @yield('content')
                        </div>
                        <div class="col-md-2 bg-dark text-light d-none d-lg-block d-md-none">
                            <div class="row pt-4 pb-2 px-2">
                                <div class="col-md-4">
                                    <img src="{{ asset('public/image/dp.png') }}" alt="">
                                </div>
                                <div class="col-md-7">
                                    <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-size: 14px;line-height: 2px;">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ url('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    </ul>
                                    <span style="font-size: 12px;">View Profile</span>
                                </div>
                            </div>
                            <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> Account </a> 
                            <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> Storage </a>
                            <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> Notifications </a>
                            <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> Settings </a>
                            <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> About </a>
                        </div>
                    </div>
                </section>
            </div>
            <div class="audioplayer bg-secondary text-light text-center p-3">
                <div>
                    <button class="btn btn-lg text-light border-0" id="btn-loop">
                        <img src="{{ asset('public/image/loop.png') }}" alt="">
                    </button>
                    <button class="btn btn-lg text-light border-0" id="btn-prev">
                        <img src="{{ asset('public/image/previous.png') }}" alt="">
                    </button>
                    <button class="btn btn-lg text-light border-0" id="btn-play">
                        <img src="{{ asset('public/image/play.png') }}" alt="">
                    </button>
                    <button class="btn btn-lg text-light border-0" id="btn-pause">
                        <img src="{{ asset('public/image/pause.png') }}" alt="">
                    </button>
                    <button class="btn btn-lg text-light border-0" id="btn-next">
                        <img src="{{ asset('public/image/next.png') }}" alt="">
                    </button>
                    <button class="btn btn-lg text-light border-0" id="btn-volume">
                        <img src="{{ asset('public/image/volume1.png') }}" alt="">
                    </button>
                      
                    <div class="row">
                        <div id="timer" class="col-sm-4 text-right">
                            <span class="mb-3">0:00</span>
                        </div>
                        <div class="progress col-sm-4 my-2" style="height: 5px;">
                            <div class="progress-bar" id="progress-bar" role="progressbar"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div id="duration" class="col-sm-4 text-left">
                            <span>0:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        * {
        box-sizing: border-box;
        }
        .slick-slide {
        margin: 0px 20px;
        }

        .slick-slide img {
        width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
        color: black;
        }

        .slick-slide {
        transition: all ease-in-out .3s;
        opacity: .2;
        }
        
        .slick-current {
        opacity: 1;
        }

        .slick-prev{
            left: 91%!important;
        }

        .slick-next{
            right: 3%!important;
        }

        .slick-prev, .slick-next{
            top: 110%!important;
        }

        .slick-active{
            opacity: 1!important;
        }
    </style>
    <script> var base_url = "{{ url('/') }}"; </script> 
    <script src="{{ asset('js/howler.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/slick/slick.js') }}"></script>
    <script src="{{ asset('js/audio.js')  }}"></script>       
</body>
</html>