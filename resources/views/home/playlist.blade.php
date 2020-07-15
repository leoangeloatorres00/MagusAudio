<style>
      .FixedHeightContainer
    {
        height: 500px;;
        width: 100%;
    }
  
    .Content
    {
        /* height: 560px; */
        height: 300px;
        padding-bottom: 60px;
        overflow-y:auto;
        overflow-x:hidden;
        background:#fff;
    }

</style>

<div class="background-image offset-2"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-2" style="border: 1px solid gray"></div>
                    <div class="col-md-4 col-sm-4 col-2">
                        <h3 class="font-weight-bold mt-5">  {!! $playlists[0]->name !!} </h3>
                        <span>by: Magus Audio</span><br>
                       
                        <ul class="nav nav-tabs" id="myTab" style="border: 0!important">
                            <li class="nav-item">
                                <a href="#home" class="nav-link p-0 pr-1 active" data-toggle="tab" style="border: 0!important">PLAYLIST</a>
                            </li>
                            <li class="nav-item">
                                <a href="#about" class="nav-link p-0 pl-1" data-toggle="tab" style="border: 0!important">ABOUT</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 mt-5 text-right">
                        <button class="btn btn-playlist btn-primary px-md-5 px-4 mt-5" style="border-radius: 30px;">PLAY</button>
                        <a href="#home" class="btn mt-5" data-toggle="tab"><i class="fa fa-heart-o"></i></a>
                        <a href="#about" class="btn mt-5" data-toggle="tab"><i class="fa fa-ellipsis-h"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="FixedHeightContainer">
                <div class="Content mb-5">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home">
                            <table class="table table-hover m-2" id="playlistTable">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">PROGRESS</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Download</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($playlists as $playlist)
                                    <tr class="clickable-row songs" data-songid={{ $playlist->songId }} data-playlistid={{ $playlist->playlistId }}>
                                        <td>{{ $playlist->title }}</td>
                                        <td>{{ $playlist->description }}</td>
                                        <td></td>
                                        <td></td>
                                        <td><i class="fa fa-download download"></i></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade text-justify px-5 py-3" id="about">
                            <div>
                                <p>{{ $playlists[0]->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#playlistTable').on('click', '.clickable-row', function(event) {
        $(this).addClass('bg-light').siblings().removeClass('bg-light');
    });

    $('.download').on('click', function(){
        
    })
</script>