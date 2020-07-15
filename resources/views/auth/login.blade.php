<div class="login">
    <div class="row h-100 d-none my-auto">
        <div class="col-12">
            <h1>Create an account and <br> enjoy thousands of content.</h1> 
            <div class="row">
                <div class="col-md-12 mt-6 col-12 px-3">
                    <a href="login/google" class="btn btn-outline-dark btn-block"><img src="{{ asset('public/image/google_logo.png') }}" height="22" class="float-left pt-1">Sign up with Google</a>
                    <a href="login/facebook" class="btn btn-outline-dark btn-block"><img src="{{ asset('public/image/facebook_logo.png') }}" height="20" class="float-left pt-1">Sign up with Facebook</a>
                    <button class="btn btn-block btnSignupwithemail">Sign up with Email</button>
                    <span class="small">Already signed up? <a href="javascript:void(0)" class="btnLogin">Log in</a></span>        
                </div>
            </div>
        </div>
    </div>  
    
    <div class="row h-100 d-none my-auto">
        <div class="col-12">
            <h1><i class="fa fa-chevron-left backsignup" style="font-size: 1.2rem; padding-right: 0.5rem; cursor: pointer"></i>Create an account</h1> 
            <div class="row">
                <div class="{{ (request()->is('home')) ? 'col-md-8 col-8' : 'col-md-12 col-12' }} px-3 ">
                    <form method="POST" action="{{ url('register') }}">
                        @csrf
                        <input id="name" type="text" class="form-control bg-transparent my-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name"  autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="email" class="form-control bg-transparent my-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="form-control bg-transparent my-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        <input id="password-confirm" type="password" class="form-control bg-transparent my-2" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">    
                        <button type="submit" class="btn btn-block">Sign up with Email</button>
                    </form>
                    <span class="small text-light">By signing up, you are agree to Magus <u>Terms of use</u> and <u>Privacy Policy</u></span>
                </div>
            </div>
        </div>
    </div>  
    
    <div class="row h-100 d-none m-auto">
        <div class="col-12">
            <h1>Login in to your account</h1> 
            <div class="row">
                <div class="col-md-12 col-12 px-3">
                    <a href="login/google" class="btn btn-outline-dark btn-block"><img src="{{ asset('public/image/google_logo.png') }}" height="22" class="float-left pt-1">Log in with Google</a>
                    <a href="login/facebook" class="btn btn-outline-dark btn-block"><img src="{{ asset('public/image/facebook_logo.png') }}" height="20" class="float-left pt-1">Log in with Facebook</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2 col-12 px-3">
                    <span class="line-through">or</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12 px-3">
                    <form method="POST" action="{{ url('login') }}">
                    @csrf
                        <input id="email" type="email" class="form-control bg-transparent border-dark my-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="form-control bg-transparent border-dark my-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <button type="submit" class="btn btn-block">
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>