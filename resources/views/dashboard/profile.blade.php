@extends('layouts.dashboard')
@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Home</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="card col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12" style="padding: 0 !important">
               <div class="card-block">
           	   	<h4 class="card-title">Profil {{ $admin->name }}</h4>
           		<form action="#" method="POST">
                  {{ csrf_field() }}
                  <small style="margin-bottom: 20px">Catatan: Lewatkan saja / kosongkan bagian yang tidak ingin diedit</small>
                  <div class="form-group">
                    <label class="form-control-label">Nama Akun</label>
                    <input type="text" class="form-control" value="{{ $admin->name }}" name="name" required>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Email Akun</label>
                    <input type="text" class="form-control" value="{{ $admin->email }}" name="name" required>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Password Akun</label>
                    <input type="password" class="form-control" value="{{ $admin->password }}" name="name" required>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label col-12" style="padding-left: 0"><b>Foto Profil</b></label>
                    <img src="{{ secure_asset('images/user-pp/user.png') }}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
                  </div>
                  <div class="form-group">
                    <input id="gambar_post" class="col-12" name="image" type="file" style="padding-left: 0" />
                  </div>
                  <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary btn-lg" value="Edit Profil">
                  </div>
                </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pluginjs')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#gambar_post").change(function () {
        readURL(this);
    });
</script>
@endsection