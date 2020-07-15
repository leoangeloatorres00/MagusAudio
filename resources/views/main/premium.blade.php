@extends('layouts.app')

@section('content')
    <div class="premium">
        <section>
            @php
                $slides = ['Stress Relief', 'Look Younger', 'Body Image'];
                $tag = array("&nbsp;", "Most Popular!", "Best Deal!");
                $tag_color = array("", "#faa22a", "#f5527e");
                $plan = array("Pro", "Premium", "Platinum");
                $price = array("350", "950", "2450");
                $no_custom_playlist = array("5", "20", "Unlimited");
            @endphp
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @for ($i = 0; $i < count($slides); $i++)
                        <div class="carousel-item {{ $i == 0 ?  'active' : '' }}" style="background-image: url({{ asset('public/image/premium_s1_bg'.($i+1).'.png') }})">
                            <div class="container h-100">
                                <div class="row h-100">    
                                    <div class="col-12 my-auto">
                                        <div class="row">
                                            <div class="col-12 text-light text-center mt-0 pb-5">
                                                <h2>Featured Contents</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12 text-center text-light">
                                                <img src="{{ asset('public/image/premium_s1_image'.($i+1).'.png') }}" class="img-fluid" >
                                            </div>
                                            <div class="col-md-6 col-12 text-md-left text-center text-light my-auto p-5">
                                                <h1>{{ $slides[$i] }}</h1>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum corporis aperiam adipisci quia?</p>
                                                <a href="javascript:void(0)" class="text-light mb-2">Click here to view more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <section>
            <div class="container py-5">
                <div class="row text-center text-light">
                    <div class="col-12">
                        <h1>Select Your Plan</h1>
                        <p>Get the best deals and start your subscription now.</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-12 mx-auto">
                        <div class="row text-center">
                            @for ($i = 0; $i < count($plan); $i++)
                                <div class="col-lg-4 col-12 mx-auto" style="justify-content: center!important">
                                    <div class="card m-auto {{ $i!=1 ? 'scale-down' : ''}}">
                                        <div class="col-7 offset-5 p-0">
                                            <p class="text-light" style="background: {{ $tag_color[$i] }}">{{ $tag[$i] }}</p>
                                        </div>
                                    
                                        <h4 class="card-title">{{ $plan[$i] }}</h4>
                                        <h3 class="card-title"><label for="">PHP&nbsp;</label>{{ $price[$i] }}</h3>
                                        <span class="card-text mb-4">Monthly</span>
                                        <dl class="dl-horizontal">
                                            @if ($i == 0)
                                            <dd><b>5</b> Custom Playlists</dd>
                                            <dd><b>Limited</b> Book Summary Sub</dd>
                                            <dd><b>Limited</b> Health Sub</dd>
                                            <dd>Audio Book Summaries</dd>
                                            <dd>&nbsp;</dd>
                                            <dd>&nbsp;</dd>
                                            <dd>&nbsp;</dd>
                                            @elseif($i == 1)
                                            <dd><b>20</b> Custom Playlists</dd>
                                            <dd><b>Download Offline</b></dd>
                                            <dd>Audio Book Summaries</dd>
                                            <dd>Premium Titles</dd>
                                            <dd>&nbsp;</dd>
                                            <dd>&nbsp;</dd>
                                            <dd>&nbsp;</dd>
                                            @else
                                            <dd><b>Unlimited</b> Custom Playlists</dd>
                                            <dd><b>Download Offline</b></dd>
                                            <dd>Audio Book Summaries</dd>
                                            <dd>Premium Titles</dd>
                                            <dd>Diamond Titles</dd>
                                            <dd>Advances Updates</dd>
                                            <dd>Exclusive Title Releases</dd>
                                            @endif
                                        </dl>
                                        <div class="row">
                                            <div class="col-md-12 mx-auto mb-3">
                                            <button class="btn btn-primary btn-inline-block px-4" style="border-radius: 25px">Get Started</button>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container p-5">
                <div class="row text-center">
                    <div class="col-12">
                        <h1>Experience Ultimate</h1>
                        <p>Insert description here</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="col-lg-12 col-md-12 col-12 my-auto">
                            <div class="card text-light">
                                <div class="card-body">
                                    <form action="{{ url('premium/register') }}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <label>First Name*</label>
                                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname">
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name*</label>
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Company / School Email*</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Phone / Mobile</label>
                                            <input type="number" name="phone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Company / School Size</label>
                                            <input type="number" name="population" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Position*</label>
                                            <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position">
                                            @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tell us more what you want to achieve with Magus</label>
                                            <textarea type="text" name="comment" class="form-control" rows="4"></textarea>
                                        </div>
                                        <button class="btn btn-block" type="submit" >Submit Form</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <h2 class="ml-3 mb-5">Bring magus to your <br> Company / School</h2>
                        <div class="col-md-12 my-auto">
                            <p><b>Unlimited</b> Custom Playlists</p>
                            <p><b>Download Offline</b></p>
                            <p>Audio Book Summaries</p>
                            <p><b>Premium Titles</b></p>
                            <p><b>Diamond Titles</b></p>
                            <p><b>Exclusive Title Releases</b></p>
                            <p>Dedicated Research Team for <b>Highly Advanced Updates</b></p>
                            <p><b>EXCLUSIVE</b> Special Title Releases</p>
                            <p><b>Custom Content Exclusively for YOU</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection