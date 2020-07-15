@extends('layouts.master')

@section('content')
    @php
        $view = 'home.index';
        switch (Route::current()->getName()) {
            case 'playlist':
                $view = 'home.playlist';
                break;
        }
    @endphp
    @include($view) 
@stop