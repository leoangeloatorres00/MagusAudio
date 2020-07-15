<style>
    .FixedHeightContainer
    {
        height: 500px;;
        width: 100%;
    }
  
    .Content
    {
        height: 565px;
        padding-bottom: 60px;
        overflow-y:auto;
        overflow-x:hidden;
        background:#fff;
    }

    .playlist{
        border-radius: 15px; 
        height: 8rem;
    }

    .playlist.round{
        border-radius: 50%; 
        height: calc(6rem + 1vw);
        width: calc(6rem + 1vw)!important;
    }

    .playlist.round > .card-footer{
        font-size: calc(0.3rem + 0.4vw);
        padding-top: 40px!important;
    }

    .header{
        background: url('public/image/main_s2.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<div class="FixedHeightContainer">
    <div class="Content mb-5">
    <div class="header" style="height: 250px;"></div>
    <div class="playlist-content" style="padding-left: 70px; padding-right: 70px;">
    @foreach ($playlisttypes as $playlisttype)
        <h5 class="pt-4 px-auto">{{ $playlisttype->name }}</h5>
        @php $playlistIndex = $loop->index; @endphp
        @if ( $playlistIndex != 0) <hr> @else &nbsp; @endif
        <section class="variable {{ $playlistIndex == 0 ? '' : 'round'  }} slider mx-auto">    
            @foreach ($playlists as $playlist)
                @if ($playlist->type == $playlisttype->id)
                    @php
                        $url = url('/playlist/'.$playlist->playlistId);
                        $image = asset('storage/image/'.$playlist->image);
                    @endphp
                    
                    <div class="card playlist {{ $playlistIndex == 0 ? '' : 'round'  }} text-center" data-playlistid='{{ $playlist->playlistId }}'>
                        <div class="card-body" style="height:80px;"></div>
                        <div class="card-footer" style="background:transparent; border:none">
                            {{ $playlist->name }}
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
    @endforeach
    @if (count($histories) > 0)
        <h5 class="pt-4 px-auto">History</h5>
        <hr>
        <section class="variable slider mx-auto">    
            @foreach ($histories as $history)
                @php
                    $url = url('/playlist/'.$history->playlistId);
                    $image = asset('storage/image/'.$history->image);
                @endphp
               <div class="card playlist text-center" data-playlistid='{{ $history->playlistId }}'>
                    <div class="card-body" style="height:80px;"></div>
                    <div class="card-footer" style="background:transparent; border:none">
                        {{ $history->name }}
                    </div>
                </div>
            @endforeach
        </section>
    @endif
    </div>
    </div>
</div>   