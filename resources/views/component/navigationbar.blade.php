@guest
<div class="navbar-container">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-0" style="{{ (request()->is('premium')) ? 'background:white' : '' }}">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{ asset('public/image/magus_logo.png') }}" class="img-fluid" width="70">
      </a>
      <button class="navbar-toggler my-auto" type="button" data-trigger="#navigationBar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse" id="navigationBar">
        <a class="nav-link btn-close text-right d-lg-none" href="javascript:void(0)" style="font-size: 35px;">&times</a>  
        @guest
          <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">Home </a> 
          <a class="nav-link {{ (request()->is('science')) ? 'active' : '' }}" href="{{ url('/science') }}"> The Science </a>
          <a class="nav-link {{ (request()->is('premium')) ? 'active' : '' }}" href="{{ url('/premium') }}"> Premium Access </a>
        @endguest
    
        <ul class="navbar-nav ml-auto {{ (request()->is('dashboard')) ? 'dashboardNavigationButton' : 'mainNavigationButton' }}">
          @guest
            <li class="nav-item">
              <button type="button" class="btn btn-outline-dark btn-md btn-block btnLogin" data-toggle="modal">Log in</button>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-primary btn-md btn-block btnSignup" data-toggle="modal">Sign up</button>
            </li>
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </nav>
  </div>    
@endguest

@auth 
    @if (auth()->user()->is_admin)
    <div class="navbar-container ">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top py-0" style="{{ (request()->is('premium')) ? 'background:white' : '' }}">
          <a class="navbar-brand" href="javascript:void(0)">
            <img src="{{ asset('public/image/magus_logo.png') }}" class="img-fluid" width="70">
          </a>
          <button class="navbar-toggler my-auto" type="button" data-trigger="#navigationBar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse" id="navigationBar">
            <a class="nav-link btn-close text-right d-lg-none" href="javascript:void(0)" style="font-size: 35px;">&times</a>  
            @guest
              <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">Home </a> 
              <a class="nav-link {{ (request()->is('science')) ? 'active' : '' }}" href="{{ url('/science') }}"> The Science </a>
              <a class="nav-link {{ (request()->is('premium')) ? 'active' : '' }}" href="{{ url('/premium') }}"> Premium Access </a>
            @endguest
        
            <ul class="navbar-nav ml-auto {{ (request()->is('dashboard')) ? 'dashboardNavigationButton' : 'mainNavigationButton' }}">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
          </div>
        </nav>
      </div>   
    @endif
@endauth