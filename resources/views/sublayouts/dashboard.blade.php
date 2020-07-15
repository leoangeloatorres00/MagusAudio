@extends('admin')

@section('content')
    @php
        $view = 'admin.index';
        switch (Route::current()->getName()) {
            case 'admin/dashboard':
                $view = 'admin.dashboard';
                break;
        }
    @endphp
    @include($view) 
@stop