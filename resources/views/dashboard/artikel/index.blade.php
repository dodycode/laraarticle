@extends('layouts.dashboard')

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Home</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
  @if(count($tags) < 1 && count($categories) > 0)
    <div class="row">
        <div class="alert alert-warning col-12" role="alert">
          Anda belum mendaftarkan satupun tag, diharapkan mengisi terlebih dahulu karna akan dibutuhkan dalam pembuatan artikel
        </div>
    </div>
  @endif

  @if(count($categories) < 1 && count($tags) > 0)
    <div class="row">
        <div class="alert alert-warning col-12" role="alert">
          Anda belum mendaftarkan satupun category, diharapkan mengisi terlebih dahulu karna akan dibutuhkan dalam pembuatan artikel
        </div>
    </div>
  @endif

  @if(count($categories) < 1 && count($tags) < 1)
    <div class="row">
        <div class="alert alert-warning col-12" role="alert">
          Anda belum mendaftarkan satupun category dan tag, diharapkan mengisi terlebih dahulu karna akan dibutuhkan dalam pembuatan artikel
        </div>
    </div>
  @endif

  @if(count($artikels) > 0)
    <div class="row">
      <div class="card col-lg-10 offset-lg-1 col-sm-12 col-xs-12 pl-0 pr-0">
        <h4 class="card-header text-center">Artikel Fanclub</h4>
        <div class="card-block">
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Title</th>
                <th class="text-center">Category</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($artikels as $artikel)
              <tr>
                <td scope="row" class="text-center">{{ $loop->iteration }}</td> <!-- No. index table (start from 1), bukan id -->
                <td class="text-center">{{ $artikel->title }}</td>
                <td class="text-center">{{ $artikel->namaKategori->category }}</td>
                <td class="text-center">
                  <small>
                    <a href="{{ route('admin.artikel.view', ['id' => $artikel->id]) }}" target="_blank" class="btn btn-default btn-md">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('admin.artikel.edit', ['id' => $artikel->id]) }}" class="btn btn-default btn-md">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    @if($artikel->aired !== 1)
                    <button class="btn btn-default btn-md btn-nobg" data-href="{{ route('admin.artikel.publish', ['id' => $artikel->id]) }}" data-toggle="modal" data-target="#konfirmasiTerbit">
                      <i class="fa fa-globe" aria-hidden="true"></i>
                    </button>
                    @endif
                    <button class="btn btn-default btn-md btn-nobg" data-href="{{ route('admin.artikel.delete', ['id' => $artikel->id]) }}" data-toggle="modal" data-target="#konfirmasiHapus">
                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                  </small>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <br>
      <div class="justify-content-center">
        {{ $artikels->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  @else
    <div class="row">
      <div class="alert alert-danger col-12" role="alert">
        Tidak ada satupun post terdaftar
      </div>
    </div>
  @endif
    <div class="row">
      <a href="{{ route('admin.artikel.add') }}"><button class="btn btn-primary">Tambahkan Post Baru</button></a>
    </div>
  </div>
</div>
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

<!-- Terbit Post Modal -->
<div class="modal fade" id="konfirmasiTerbit" tabindex="-1" role="dialog" aria-labelledby="terbit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Dulu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>

      <div class="modal-body">
        Apakah anda yakin ingin menerbitkan post ini?
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

    $('#konfirmasiTerbit').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
@stop
