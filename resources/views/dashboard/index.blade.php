@extends('layouts.dashboard')

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Home</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="card col-lg-6 offset-lg-3 col-sm-12 col-xs-12" style="padding: 0 !important">
               <h4 class="card-header text-center">Welcome</h4>
               <div class="card-block text-center">
                   <h5>Selamat datang Admin, {{ Auth::user()->name }}!</h5>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
