<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex align-items-center flex-column vh-100 text-center">
        <div class="p-2">
            <h1>Welcome to Magus</h1>
            <h5>Let us know your preferences</h5>
        </div>
        <div class="p-5">
            <div class="row">
                <div class="col-lg-4 p-3">
                    <a class="btn btn-lg btn-block preference">Increase Happiness</a>
                </div>
                <div class="col-lg-4 p-3">
                    <a class="btn btn-lg btn-block preference">Better Sleep</a>
                </div>
                <div class="col-lg-4 p-3">
                    <a class="btn btn-lg btn-block preference">I want to look good</a>
                </div>
                <div class="col-lg-4 p-3">
                    <a class="btn btn-lg btn-block preference">Reduce my stress</a>
                </div>
                <div class="col-lg-4 p-3">
                    <a class="btn btn-lg btn-block preference">Self Development</a>
                </div>
                <div class="col-lg-4 p-3">
                    <a class="btn btn-lg btn-block preference">Career Development</a>
                </div>
            </div>
        </div>
        <div class="mt-auto p-2">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="btn-group">
                        <a href="{{ url('/initial/membership') }}" class="btn btn-lg btn-block font-weight-bold">Skip</a>
                    </div>
                    <div class="btn-group">
                        <a href="{{ url('/initial/membership') }}" class="btn btn-lg btn-block font-weight-bold text-primary" >Continue</a>
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
    <style>
        .preference.active,
        .preference.active:hover{
            background: #227DC7!important;
            font-weight: bold;
            color: white;
        }
    </style>
    <script>
        $('.preference').on('click', function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
            }else{
                $(this).addClass('active');
            }
        });
    </script>
    
</body>
</html>