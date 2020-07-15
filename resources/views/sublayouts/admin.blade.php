@extends('admin')

@section('content')
    @php
        $view = '';
        switch (Route::current()->getName()) {
            case 'admin/user':
            case 'admin/user/edit':
                $view = 'admin.usercontainer';
                break;
        }
    @endphp
    @include($view) 
@stop