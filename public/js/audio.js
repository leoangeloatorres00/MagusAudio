$(document).ready(function(){
    $('#btn-pause').css('display', 'none');

    playlistUrls = [];
    audioplayer = [];
    loop = false;
    playlistIndex = 0;
    songs = [];
    disabledButton();
    getPlaylists();
    getHistory();

    window.onresize = function (event) {
      changeScreen();
    }
    changeScreen();

    function changeScreen(){
        screenHeight = window.innerHeight;
        if(window.fullScreen || screen.width == 768 || window.innerWidth > 2500){
          screenHeight = screen.height;
        }
        
        // $('.audiocontent > section').eq(0).css('height',(screenHeight*0.85)+'px');
        // $('.audiocontent > section .row').eq(0).css('height',(screenHeight*0.85)+'px');
        // $('.audiocontent > section .row').eq(0).css('max-width', $('.content').css('width'));
        $('.audioplayer').eq(0).css('height',(screenHeight*0.15)+'px');
        $('.music-header').eq(0).css('height',(screenHeight*0.25)+'px');
    }

    function isEnd() {
        if (loop === true ) { playlistIndex = (playlistIndex + 1 !== audioplayer.length)? playlistIndex + 1 : 0; }
        else { playlistIndex = playlistIndex + 1; }
        isSkip('end')
    };

    function isPlaying(){
        if(audioplayer.playing()){
           var progress = (Math.floor(audioplayer.seek()) / Math.floor(audioplayer.duration())) * 100
           $('#timer span').html(convertToTimeFormat(Math.floor(audioplayer.seek())));
           $('#progress-bar').css("width", Math.floor(progress) + "%")
           .attr("aria-valuenow", Math.floor(progress));
           setTimeout(isPlaying, 1000); //adjust timeout to fit your needs
        }
    }

    function howlerPlayer(index, playlist) {
        audioplayer = new Howl({
            src: [playlist[index]],
            format: ['flac'],
            onload:function(){
                $('#duration span').html(convertToTimeFormat(Math.floor(audioplayer.duration())));
            },
            onplay: isPlaying, 
            onend: isEnd,
            html5: true,
            buffer: true
        });

        audioplayer.mobileAutoEnable = true;
    }

    $('#btn-play').on('click', function(){
        audioplayer.play();
        insertHistory();
        $('#btn-pause').css('display', 'inline');
        $('#btn-play').css('display', 'none');
    });

    $('#btn-pause').on('click', function(){
        audioplayer.pause();
        $('#btn-play').css('display', 'inline');
        $('#btn-pause').css('display', 'none');
    });

    $('#btn-prev').on('click', function(){
        isSkip('prev')
        disabledButton();
    });

    $('#btn-next').on('click', function(){
        isSkip('next')
        disabledButton();
    });

    $('#btn-loop').on('click', function(){
        loop = !loop;
        disabledButton();
    });

    $('#btn-back').on('click', function(){
       getPlaylists();
    });

    $(document).on('click', '.playlists', function(){
        var playlistId = $(this).find('.title').attr('data-playlists')
        getSongs(playlistId);
    });

    $(document).on('click', '.songs', function(){
        Howler.stop();
        playlistIndex = $(this).index('.songs');
        howlerPlayer(playlistIndex, playlistUrls);
        audioplayer.play();
        insertHistory();
        $('#btn-pause').css('display', 'inline');
        $('#btn-play').css('display', 'none');
    });

    function isSkip(type){
        if(audioplayer.playing){
            audioplayer.stop();
        }
        if(type!='end'){
            (type == 'next') ? playlistIndex+=1 : playlistIndex-=1; 
        }
        howlerPlayer(playlistIndex, playlistUrls);
        if((playlistIndex >= playlistUrls.length) && (loop == false )){
            playlistIndex-=1;
            audioplayer.stop();
            $('#btn-play').css('display', 'inline');
            $('#btn-pause').css('display', 'none');
            $('#timer span').html(convertToTimeFormat(0));
            $('#duration span').html(convertToTimeFormat(0)); 
        }else{
            if(playlistIndex == playlistUrls.length && loop == true) {
                playlistIndex = 0;
                howlerPlayer(playlistIndex, playlistUrls);
            }
            if(playlistIndex < 0 && loop == true) {
                playlistIndex = (playlistUrls.length - 1);
                howlerPlayer(playlistIndex, playlistUrls);
            }
    
            audioplayer.play();
            insertHistory();
            $('#btn-pause').css('display', 'inline');
            $('#btn-play').css('display', 'none');
            $('#timer span').html(convertToTimeFormat(0));
            $('#duration span').html(convertToTimeFormat(Math.floor(audioplayer.duration())));
        } 
        disabledButton();
    }

    function convertToTimeFormat(number){ 
        var minute = Math.floor(number / 60);  
        var seconds = number % 60;
        return minute + ":" + ('0' + seconds).slice(-2);         
    }

    function disabledButton(){ 
        if(playlistIndex == 0 && loop == false){
            $('#btn-prev').attr('disabled', 'disabled');
            if(playlistIndex < (playlistUrls.length) && loop == false){
                $('#btn-next').removeAttr('disabled');
            }

            if(playlistIndex == (playlistUrls.length-1) && loop == false){
                $('#btn-next').attr('disabled', 'disabled');
            }
        }else{
            $('#btn-prev').removeAttr('disabled');
            if(loop) $('#btn-next').removeAttr('disabled');
            if(playlistIndex == (playlistUrls.length-1) && loop == false){
                $('#btn-next').attr('disabled', 'disabled');
            }
        }
        // $('#btn-loop').text( (loop ? '' : 'No ')+'Loop')
    }

    function insertHistory(){
        var params = getAudioId();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url: base_url+'/insertHistory',
            data: params,
            success:function(data) {}
        });
    }

    function getHistory(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url: base_url+'/getHistory',
            success:function(data) {
                if(data.result!=null){
                    songHistory = Object.values(data.result);
                    playlistUrls.length = 0;
                    songHistory.forEach(song => {
                        playlistUrls.push(base_url+'/play/'+song.playlistId+'/'+song.songId);
                    });
                    howlerPlayer(data.currentIndex, playlistUrls);
                }
            }
        });
    }

    function getAudioId(){
        var url = playlistUrls[playlistIndex]
        var segments = url.split('/');

        var songId  = segments[segments.length-1];
        var playlistId= segments[segments.length-2];

        return {"playlistId": playlistId ,"songId": songId}
    }

    function getPlaylists(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url: base_url+'/getPlaylists',
            success:function(data) {
                $('.featured-container').empty();
                $('.discover-container').empty();
                $('.recent-container').empty();
                const playlists = Object.values(data.result);
                playlists.forEach(playlist => {
                    playlist.forEach(track => {
                        musicCard(track.playlistId, track.name, 'playlists', track.type)
                    });
                });  
                $(".featured-container").not('.slick-initialized').slick({
                    dots: false,
                    infinite: false,
                    slidesToShow: 3,
                    responsive: [{
                        breakpoint: 581,
                        settings: {
                          slidesToShow: 1,
                          dots: false,
                          infinite: false,
                        }
                    }],
                });

                $(".discover-container").not('.slick-initialized').slick({
                    dots: false,
                    infinite: false,
                    slidesToShow: 3
                });
            }
        });
    }

    function getSongs(playlistId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var params = { 'playlistId' : playlistId }
        $.ajax({
            type:'POST',
            url: base_url+'/getSongs',
            data: params,
            success:function(data) {
                $('.featured-container').empty();
                $('.discover-container').empty();
                $('.recent-container').empty();
                songs = Object.values(data.result);
                playlistUrls.length = 0;
                songs.forEach(song => {
                    console.log(base_url+'/play/'+playlistId+'/'+song.songId);
                    playlistUrls.push(base_url+'/play/'+playlistId+'/'+song.songId);
                    musicCard(song.songId, song.title, 'songs', song.type);
                });
                disabledButton();
            }
        });
    }

    function musicCard(id, title, type, playlisttype){
        playlisttype = type.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        
        return $('.featured-container').append(
            // '<a class="btn" href="{{ url(get'+playlisttype+') }}" onclick="event.preventDefault(); document.getElementById(audio-form).submit();">'+
            '<div class="test '+type+'">'+
            '    <img src="'+base_url+'/public/image/featured_content.jpg" height="150" width="350" style="border-radius: 15px">'+
            '    <div class="title" data-'+type+'='+id+'>'+title+'</div>'+
            '</div>'
            // '</a>'
        );
    
    }
});