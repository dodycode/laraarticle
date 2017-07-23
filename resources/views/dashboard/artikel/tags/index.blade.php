@extends('layouts.dashboard')

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Home</li>
</ol>
@if(count($tags) > 0)
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="card col-lg-10 offset-lg-1 col-sm-12 col-xs-12 pl-0 pr-0">
        <h4 class="card-header text-center">Tags</h4>
        <div class="card-block">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Tag</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tags as $tag)
              <tr>
                <td scope="row">{{ $loop->iteration }}</td> <!-- No. index table (start from 1), bukan id -->
                <td>{{ $tag->tag }}</td>
                <td class="text-center">
                	<small>
			            <a href="{{ route('admin.tag.edit', ['id' => $tag->id]) }}" class="btn btn-default btn-md">
			            	<i class="fa fa-pencil" aria-hidden="true"></i>
			            </a>
			            <button role="button" class="btn btn-default btn-md btn-nobg" data-href="{{ route('admin.tag.delete', ['id' => $tag->id]) }}" data-toggle="modal" data-target="#konfirmasiHapus">
			            	<i class="fa fa-trash-o" aria-hidden="true"></i>
			            </button>
		            </small>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="{{ route('admin.tag.add') }}"><button class="btn btn-primary">Add New Tag</button></a>
        </div>
      </div>
      <br>
      <div class="text-center">
          {{ $tags->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </div>
</div>
@else
<div class="container-fluid">
	<div class="animated fadeIn">
		<div class="row">
			<div class="alert alert-danger col-12" role="alert">
			  Tidak ada satupun tag terdaftar
			</div>
			<br>
			<a href="{{ route('admin.tag.add') }}"><button class="btn btn-primary">Add New Tag</button></a>
		</div>
	</div>
</div>
@endif
@endsection

@section('pluginjs')
<!-- Delete Modal -->
<div class="modal fade" id="konfirmasiHapus" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Hapus</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
			</div>

			<div class="modal-body">
				Apakah anda yakin ingin menghapus ini?
			</div>

			<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        	<a class="btn btn-primary btn-ok">Iya</a>
	    	</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $('#konfirmasiHapus').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
@stop
