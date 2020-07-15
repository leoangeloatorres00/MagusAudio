<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('public/image/deer.png') }}">
    <title>Magus Audio</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/howler.js') }}"></script>
    <script src="{{ asset('js/slick/slick.js') }}"></script>
</head>
<style>
    body{
        overflow: hidden;
    }

    #sticky-sidebar > div {
        overflow: hidden!important;
    }

    #page-content {
        flex: 1 0 auto;
    }

    #sticky-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100px;
    }

    .slider {
        width: 90%;
        margin-left: 40px;
        margin-right: 40px;
        margin-top: 10px;
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

    .slick-active,
    .slick-current {
        opacity: 1;
    }

    button:disabled{
        cursor: not-allowed;
    }

    .search{
        width: calc(10rem + 45vw)!important
    }

    @media only screen and (min-width: 1300px){
        .search{
            width: calc(10rem + 40vw)!important
        }
    }

    @media only screen and (max-width: 1200px){
        .search{
            width: calc(10rem + 30vw)!important
        }
    }
</style>
<body class="d-flex flex-column">
    <div class="page-content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-3 d-sm-none d-none d-md-block px-1" id="sticky-sidebar" style="border-right: 0.009rem solid #707070">
                    <div class="nav flex-column flex-nowrap vh-100 overflow-auto text-white p-2">
                        <div class="row px-2">
                            <div class="col-md-4">
                                <img src="{{ asset('public/image/magus_logo2.png') }}">
                            </div>
                        </div>
                        <a class="nav-link text-dark font-weight-bold" href="{{ url('/') }}"><i class="fa fa-home"></i> &nbsp; Home </a> 
                        <a class="nav-link text-dark font-weight-bold" href="javascript:void(0)"><i class="fa fa-search"></i> &nbsp; Browse </a>
                        <a class="nav-link text-dark font-weight-bold" href="javascript:void(0)"><i class="fa fa-history"></i> &nbsp; Recents </a>
                        <a class="nav-link text-dark font-weight-light" href="javascript:void(0)"> Library </a>
                        <a class="nav-link text-dark font-weight-bold" href="javascript:void(0)"> Recently Played </a> 
                        <a class="nav-link text-dark font-weight-bold" href="javascript:void(0)"> Liked Subs </a>
                        <a class="nav-link text-dark font-weight-bold" href="javascript:void(0)"> Bundles </a>
                        <a class="nav-link text-dark font-weight-bold" href="javascript:void(0)"> Artist </a>
                        <a class="nav-link text-dark font-weight-bold" href="javascript:void(0)"> Live Streams </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12 col-12" id="main">
                    <div class="row py-3">
                        <div class="col-12 inline">
                            <form class="form-inline">
                                <button type="button" class="btn m-2" id="btn-back">
                                    <i class="fa fa-chevron-left"></i>
                                </button>
                                <button type="button" class="btn m-2" id="btn-forward">
                                    <i class="fa fa-chevron-right"></i>
                                </button>
                                <input type="text" class="form-control search" placeholder="&#xF002; &nbsp; Search" style="font-family: FontAwesome;"/>
                            </form>
                        </div>
                    </div>  
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
                <div class="col-lg-2 d-md-none d-sm-none d-none d-lg-block px-1" id="sticky-sidebar" style="background: #686462">
                    <div class="nav flex-column flex-nowrap vh-100 overflow-auto text-white p-2">
                        <div class="row p-3">
                            <div class="col-4 pt-3">
                                <div class="profile-container">
                                    <div class="profile">
                                    {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Chapultepec_Zoo_-_Jaguar_%2802%29.jpg/2560px-Chapultepec_Zoo_-_Jaguar_%2802%29.jpg" /> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-7 p-3">
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
                                <span style="font-size: calc(0.4rem + 0.4vw)">View Profile</span>
                            </div>
                        </div>
                        <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> Account </a> 
                        <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> Storage </a>
                        <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> Notifications </a>
                        <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> Settings </a>
                        <a class="nav-link text-light font-weight-bold" href="javascript:void(0) }}"> About </a>
                    </div>
                </div>
            </div>
        </div>
        <footer id="sticky-footer" class="text-white-50" style="z-index: 1;background: rgb(58, 58, 61)">
            <div class="container text-center p-2">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-inline-block btn-loop mx-3 mt-1">
                            <i class="fa fa-repeat text-light pt-3" style="font-size: calc(0.9rem + 0.9vw);"></i>
                        </button>
                        <button class="btn btn-inline-block btn-previous mx-3">
                            <i class="fa fa-step-backward text-light pt-2" style="font-size: calc(0.9rem + 0.9vw);"></i>
                        </button>
                        <button class="btn btn-inline-block btn-play mx-3">
                            <i class="fa fa-play text-light pt-2" style="font-size: calc(0.9rem + 0.9vw);"></i>
                        </button>
                        <button class="btn btn-inline-block btn-pause mx-3">
                            <i class="fa fa-pause text-light pt-2" style="font-size: calc(0.9rem + 0.9vw);"></i>
                        </button>
                        <button class="btn btn-inline-block btn-next mx-3">
                            <i class="fa fa-step-forward text-light pt-2" style="font-size: calc(0.9rem + 0.9vw);"></i>
                        </button>
                        <button class="btn btn-inline-block btn-volume mx-3">
                            <i class="fa fa-volume-up text-light pt-2" style="font-size: calc(0.9rem + 0.9vw);"></i>
                        </button>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-3 text-right p-0 m-0">
                        <span id="timer">0:00</span>
                    </div>
                    <div class="col-6 text-center m-auto pt-1">
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-3 text-left p-0 m-0">
                        <span  id="duration">0:00</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

<script>
    var APP_URL = {!! json_encode(url('/')) !!}
    var playlistData = {!! $playlists !!}
    var playlistUrls = []
    var tempPlaylistUrls = []
    var currentIndex = 0
    var loop = false
    var musictimeline = 0

    $('.btn-pause').css('display', 'none')
    musicplayercontrol()
    slickDesign()
    $(document).ready(function(){
        getHistory()
    })

    window.onbeforeunload = function() {
        insertHistory();
        getHistory();
        return null;
    }

    $(document).on('click', '.playlist', function(){
        var playlistid = $(this).attr('data-playlistid');
        var pageurl = APP_URL+'/playlist/'+playlistid;
        displayContent(pageurl)
        updatePlaylistUrls(playlistid)
    })

    $(document).on('click', '.songs', function(){
        currentIndex = $(this).index('.songs')
        playlistUrls = tempPlaylistUrls
        insertHistory()
        initialPlay(currentIndex)
        musicplayer.play()
        musicplayercontrol()
    })

    $(document).on('click', '.btn-playlist', function(){
        playlistUrls = tempPlaylistUrls
        insertHistory()
        initialPlay(0)
        musicplayer.play()
        musicplayercontrol()
        
        $('.clickable-row:eq(0)').addClass('bg-light').siblings().removeClass('bg-light');
    })

    $(document).on('click', '#btn-back', function(){
        var pageurl = APP_URL+'/home'
        displayContent(pageurl)
        musicplayercontrol()
    })

    $(document).on('click', '#btn-forward', function(){
        var pageurl = window.history.forward();
        displayContent(pageurl)
        musicplayercontrol()
    })

    $(document).on('click', '.btn-loop', function(){
        loop = !loop;
        musicplayercontrol()
    })

    $(document).on('click', '.btn-play', function(){
        $('.btn-play').css('display', 'none')
        $('.btn-pause').css('display', 'inline')
        insertHistory()
        musicplayer.play()
    })

    $(document).on('click', '.btn-pause', function(){
        $('.btn-pause').css('display', 'none')
        $('.btn-play').css('display', 'inline')
        insertHistory()
        musicplayer.pause()
    })

    $(document).on('click', '.btn-next', function(){
        currentIndex+=1
        if(loop && playlistUrls.length == currentIndex) currentIndex = 0
        insertHistory()
        initialPlay(currentIndex)
        musicplayercontrol()
        musicplayer.play()
    })

    $(document).on('click', '.btn-previous', function(){
        currentIndex-=1
        if(loop && currentIndex < 0) currentIndex = (playlistUrls.length - 1)
        insertHistory()
        initialPlay(currentIndex)
        musicplayercontrol()
        musicplayer.play()
    })
    
    function musicPlayer(index, playlist) {
        musicplayer = new Howl({
            src: [playlist[index]],
            format: ['flac'],
            onload:function(){
                $('#duration').html(convertToTimeFormat(Math.floor(musicplayer.duration())))
            },
            onplay: isPlaying,
            onend: isEnd, 
            html5: true
        })
        musicplayer.mobileAutoEnable = true
    }

    function displayContent(url){
        $.ajax({
            type:'GET',
            url: url,
            success:function(data) {
                history.pushState('', '', url)
                $('.content').html(data)
                slickDesign()
            }
        })
    }

    function updatePlaylistUrls(playlistid){
        tempPlaylistUrls.length = 0
        playlistData.forEach(element => {
            if(element.playlistId == playlistid){
                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                })
                $.ajax({
                    type:'POST',
                    url: APP_URL+'/playlist',
                    data: {'playlistId' : playlistid},
                    success:function(data) {
                        data.songlists.forEach(value => {
                            var url = APP_URL+'/track/'+playlistid+'/'+value.songId
                            tempPlaylistUrls.push(url)
                        })
                    }
                })

            }
        })
    }

    function initialPlay(index){
        musicPlayer(index, playlistUrls)
        $('.btn-play').css('display', 'none')
        $('.btn-pause').css('display', 'inline')
        Howler.stop()
    }

    function convertToTimeFormat(number){ 
        var minute = Math.floor(number / 60)  
        var seconds = number % 60
        return minute + ":" + ('0' + seconds).slice(-2)         
    }

    function isEnd() {
        currentIndex+=1

        if(!loop && playlistUrls.length == currentIndex){
            Howler.stop()
            return false
        }

        if(playlistUrls.length == currentIndex) currentIndex = 0
        
        initialPlay(currentIndex)
        musicplayercontrol()
        musicplayer.play()

        $('.clickable-row:eq('+currentIndex+')').addClass('bg-light').siblings().removeClass('bg-light');
    }

    function isPlaying(){
        if(musicplayer.playing()){
            var progress = (Math.floor(musicplayer.seek()) / Math.floor(musicplayer.duration())) * 100
            $('#timer').html(convertToTimeFormat(Math.floor(musicplayer.seek())));
            $('#duration').html(convertToTimeFormat(Math.floor(musicplayer.duration())));
            $('.progress-bar').css("width", Math.floor(progress) + "%").attr("aria-valuenow", Math.floor(musicplayer));
            setTimeout(isPlaying, 1000); //adjust timeout to fit your needs
        }
    }

    function getHistory(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            type:'POST',
            url: APP_URL+'/getHistory',
            success:function(data) {
                currentIndex = data.currentIndex
                data.playlistUrls.forEach(element => {
                    playlistUrls.push(APP_URL+'/track/'+element)
                })
            
                musicPlayer(currentIndex, playlistUrls)
                musicplayercontrol()
            }
        });
    }

    function insertHistory(){
        // params = { 'url' : playlistUrls[currentIndex], 'time': musicplayer.seek()}
        params = { 'url' : playlistUrls[currentIndex], 'time': 0}
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            type:'POST',
            url: APP_URL+'/insertHistory',
            data: params,
            success:function(data) {
                console.log(data)
            }
        });
    }

    function musicplayercontrol(){
        if(loop){
            $('.btn-loop').html('<i class="fa fa-repeat text-light" style="font-size: calc(0.9rem + 0.9vw);"></i>')
        }else{
            $('.btn-loop').html('<span class="text-light" style="font-size: calc(0.9rem + 0.9vw)"> No Loop </span>')
        }

        if(playlistUrls.length == 0){
            $('.btn-next').attr('disabled', 'disabled')
            $('.btn-previous').attr('disabled', 'disabled')
            $('.btn-play').attr('disabled', 'disabled')
        }

        if(playlistUrls.length == 1){
            $('.btn-next').attr('disabled', 'disabled')
            $('.btn-previous').attr('disabled', 'disabled')
            $('.btn-play').removeAttr('disabled')
        }

        if(playlistUrls.length > 1){
            if(currentIndex == 0){
                $('.btn-next').removeAttr('disabled')
                $('.btn-previous').attr('disabled', 'disabled')
            }

            if(currentIndex == (playlistUrls.length - 1)){
                $('.btn-previous').removeAttr('disabled')
                $('.btn-next').attr('disabled', 'disabled')
            }

            if(currentIndex > 0 && currentIndex < (playlistUrls.length - 1) || loop){
                $('.btn-previous').removeAttr('disabled')
                $('.btn-next').removeAttr('disabled')
            }

            $('.btn-play').removeAttr('disabled')
        }
    }

    function slickDesign(){
        var myCarousel = $(".variable")
        myCarousel.each(function() {
            var slideCountLG = 3
            var slideCountMD = 2
            var slideCountSM, slideCountXS  = 1
            if($(this).hasClass('round')){
                slideCountLG = 5
                slideCountMD = 4
                slideCountSM = 3
                slideCountXS = 2
            } 

            $(this).slick({
                dots: false,
                infinite: false,
                slidesToShow: slideCountLG,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: slideCountMD
                        }
                    },    
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: slideCountMD
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: slideCountXS
                        }
                    }
                ]
            })
        })
    }
</script>