@extends('layouts.app')
@section('content')
<div class="container">
    @if(\Session::has('error'))
    <div class="alert alert-danger">
        {{\Session::get('error')}}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <?php if(auth()->user()->isAdmin == 1){?>
                <div class="panel-body">
                <a href="{{url('adminview')}}">AdminPage</a>
                </div>
                <?php };?> 
                <?php if(auth()->user()->isAdmin != 1){?>
                <div class="panel-body">
                <a href="{{url('userview')}}">UserPage</a>
                </div>
                <?php };?> 
            </div>
        </div>
    </div>
</div>
@endsection


