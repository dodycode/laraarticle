@extends('layouts.dashboard')

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Home</li>
</ol>
@if(count($inviteList) > 0)
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="card col-lg-10 offset-lg-1 col-sm-12 col-xs-12 pl-0 pr-0">
        <h4 class="card-header text-center">Daftar Menunggu Persetujuan</h4>
        <div class="card-block">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>User Email</th>
              </tr>
            </thead>
            <tbody>
              @foreach($inviteList as $inviteUser)
              <tr>
                <td scope="row">{{ $loop->iteration }}</td> <!-- No. index table (start from 1), bukan id -->
                <td>{{ $inviteUser->email }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="{{ route('admin.invite.add') }}"><button class="btn btn-primary">Undang Admin Baru</button></a>
        </div>
      </div>
      <br>
      <div class="text-center">
          {{ $inviteList->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </div>
</div>
@else
<div class="container-fluid">
	<div class="animated fadeIn">
		<div class="row">
			<div class="alert alert-success col-12" role="alert">
			  Untuk saat ini, tidak ada daftar undangan admin yang masih menunggu persetujuan
			</div>
			<br>
			<a href="{{ route('admin.invite.add') }}"><button class="btn btn-primary">Undang Admin Baru</button></a>
		</div>
	</div>
</div>
@endif
@endsection
