@extends('layouts.app')

@section('content')
    <div class="main">
        <section>
            <div class="h-100" style="padding-left: 60px;padding-right: 60px;">
                <div class="row h-100">
                    <div class="col-lg-10 my-auto main-s1">
                        <h1>BEAT COVID-19</h1>
                        <p>Listen to our latest products to boost your <br> immune system against COVID-19</p>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <button class="btn btn-lg btn-block btn-primary">Click here for more info</button>
                            </div>
                        </div>
                    </div>
                    @include('auth.login')
                </div>
            </div>
        </section>
        <section>
            <div class="h-100" style="padding-left: 60px;padding-right: 60px;">
                <div class="row h-100">
                    <div class="col-lg-10 my-auto">
                        <h1>Unlock Exclusive Content</h1>
                        <p>Play your favorite audio offline with premium access</p>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <button class="btn btn-lg btn-block btn-primary">Get Premium Access</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container p-5">
                <div class="row  m-auto text-center">
                    <div class="col-lg-12">
                        <h2>Discover the New  <i>"</i> YOU<i>"</i></h2>
                        <span>Enjoy thousands of powerful audios with fresh new contents every week.</span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row m-auto">
                    <div class="col-lg-4 col-md-12 col-12 my-auto text-lg-left text-md-center order-lg-1 order-md-2 order-2">
                    <div class="card m-auto bg-transparent border-0">
                        @php 
                            $title = ['Custom Playlist for you', 'Listening Redefined', 'Discover Titles'];
                            $icon = ['main_s3_playlist.png', 'main_s3_frequency.png', 'main_s3_album.png'];
                            $description = [
                            'Create your own playlist with configurable loops per audio', 
                            'Empowers your listening experience with multi-track volume controls and rich',
                            'Discover titles bases on your needs and preferences.'
                            ];
                        @endphp 
                    
                        @for ($i = 0; $i < count($description); $i++)
                            <div class="row my-3">
                                <div class="col-lg-4 col-md-4 col-12 m-auto text-lg-left text-md-right text-center">
                                    <img src="{{ asset('public/image/'.$icon[$i]) }}" class="img-fluid" width="90" height="90"/>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12 m-auto text-lg-left text-md-left text-center">
                                    <span class="s3-col1-title">{{ $title[$i] }}</span>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <span class="s3-col1-description">{{ $description[$i] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                    <div class="col-lg-4 col-md-12 col-12 my-auto text-lg-center text-md-center order-lg-2 order-md-1 order-1">
                        <div class="card m-5 bg-transparent border-0">
                            <img src="{{ asset('public/image/main_s3_phone.png') }}" class="card-img-top img-fluid">
                        </div>  
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 my-auto text-lg-left text-md-center text-center order-lg-3 order-md-3 order-3">
                        <div class="card m-auto bg-transparent border-0">
                            <h3>Listen anytime and anywhere with Magus</h3>
                            <div class="row mb-3">
                                <div class="col-md-6 col-6">
                                    <img src="{{ asset('public/image/apple_store.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-6 col-6">
                                    <img src="{{ asset('public/image/google_store.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12 col-md-12 col-12 my-auto text-center">
                        <div class="carousel slide" id="commentSlider" data-ride="carousel">
                            @php 
                                $qoutes = [
                                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, officiis?', 
                                    'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                                    'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel quas.'
                                ];
                                $titles = ['Book1', 'Book2', 'Book3'];
                                $authors = ['Juan', 'John', 'Peter'];
                            @endphp
            
                            <div class="carousel-inner p-5"> 
                                @for ($i = 0; $i < count($qoutes); $i++)
                                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                        <blockquote class="blockquote">
                                            <div class="col-md-8 col-sm-12 col-12 mx-auto">
                                                <span class="qoute"> 
                                                    <img src="{{ asset('public/image/quotation_upper.png') }}" alt="" class="img-fluid">   
                                                    {{ $qoutes[$i] }} 
                                                    <img src="{{ asset('public/image/quotation_lower.png') }}" alt="" class="img-fluid">
                                                </span>
                                            </div>    
                                            <footer class="blockquote-footer">{{ $authors[$i].' in '.$titles[$i] }}</footer>
                                        </blockquote>
                                    </div>
                                @endfor
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection