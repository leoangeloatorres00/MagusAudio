<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .card {
            background: transparent;
            border: none;
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center flex-column vh-100 text-center">
        <div class="p-2">
            <h2>Magus for <b>FREE</b></h2>
            <h2>Enjoy free content with us</h2>
        </div>
        <div class="py-2">
            <div class="card text-left px-3" style="width: 35rem;">
                <hr>
                <div class="px-3">
                    <div class="row px-3">
                        <span class="lead">Included on your free membership</span>    
                    </div>
                    <dl style="line-height: 2.5rem">
                        <dt><i class="fa fa-check-circle" style="font-size: 16px;"></i> Limited Access for Content</dt>
                    </dl>
                </div>
                <hr>
                <div class="px-3">
                    <div class="row px-3">
                        <span class="lead">Premium membership includes</span>    
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl style="line-height: 2.5rem">
                                <dt><i class="fa fa-check-circle text-primary" style="font-size: 16px;"></i> Unlimited Access for Content</dt>
                                <dt><i class="fa fa-check-circle text-primary" style="font-size: 16px;"></i> Audiobook Summaries</dt>
                                <dt><i class="fa fa-check-circle text-primary" style="font-size: 16px;"></i> Exclusive Audio Content</dt>
                            </dl>
                        </div>
                        <div class="col-lg-6">
                            <dl style="line-height: 2.5rem">
                                <dt><i class="fa fa-check-circle text-primary" style="font-size: 16px;"></i> Custom Playlists</dt>
                                <dt><i class="fa fa-check-circle text-primary" style="font-size: 16px;"></i> Permanent Subs</dt>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-auto p-2">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="btn-group">
                        <a href="{{ url('/initial/membership') }}"  onclick="event.preventDefault(); document.getElementById('membership-form').submit();"  class="btn btn-lg btn-block font-weight-bold">I want to use Magus for FREE</a>
                        <form id="logout-form" action="{{ url('/initial/membership') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <div class="btn-group">
                        <a href="{{ url('/initial/membership') }}"  onclick="event.preventDefault(); document.getElementById('membership-form').submit();"  class="btn btn-lg btn-block font-weight-bold text-primary">Subscribe to Premium</a>
                        <form id="membership-form" action="{{ url('/initial/membership') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <img src="{{ asset('public/image/magus_logo.png') }}" alt="" width="100" height="100">
                </div>
            </div>
        </div>
    </div>
</body>
</html>