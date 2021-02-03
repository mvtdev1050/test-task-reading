@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:20%;">
                <div class="card-header login">{{ __('User') }} <span class="pull-right"><a href="{{url('logout')}}">Logout</a></span></div>

                <div class="card-body">
                    <center>User Role type</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
