@extends('layouts.dashboard')
@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Home</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
    	@if(Session::get('Error'))
          <div class="row">
              <div class="alert alert-danger col-12 text-center" role="alert">
                {{ Session::get('Error') }}
              </div>
          </div>
        @endif
        <div class="row">
            <div class="card col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12" style="padding: 0 !important">
               <div class="card-block">
           	   	<h4 class="card-title">Profil {{ $admin->name }}</h4>
           		<form action="{{ route('admin.profil.post') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <small style="margin-bottom: 20px">Catatan: Lewatkan saja bagian yang tidak ingin diedit</small>
                  <div class="form-group">
                    <label class="form-control-label">Nama Akun</label>
                    <input type="text" class="form-control" value="{{ $admin->name }}" name="name" required>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Email Akun</label>
                    <input type="text" class="form-control" value="{{ $admin->email }}" name="email" required>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Password Akun</label>
                    <input type="password" class="form-control" placeholder="ISI JIKA MEMANG MAU DIGANTI, JIKA TIDAK BIARIN KOSONG!" name="password">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label col-12" style="padding-left: 0"><b>Foto Profil</b></label>
                    @if($admin->image !== null)
                    <img src="{{ asset('images/user-pp/'.$admin->image) }}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
                    @else
                    <img src="{{ asset('images/user-pp/user.png') }}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
                    @endif
                  </div>
                  <div class="form-group">
                    <input id="gambar_post" class="col-12" name="image" type="file" style="padding-left: 0" />
                  </div>
                  <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary btn-block" value="Edit Profil">
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