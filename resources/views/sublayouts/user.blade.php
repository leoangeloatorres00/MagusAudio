@extends('admin')

@section('content')
    @php
        $view = 'admin.index';
        switch (Route::current()->getName()) {
            case 'admin/user':
            case 'admin/user/edit':
                $view = 'admin.admin';
                break;
        }
    @endphp
    @include($view) 
@stop