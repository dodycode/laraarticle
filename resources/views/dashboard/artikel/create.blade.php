@extends('layouts.dashboard')

@section('plugin')
<style type="text/css">
  .modal-backdrop{display:none}.note-placeholder{position:absolute;top:90px;left:95px;font-size:34px;color:#e4e5e7;display:none;pointer-events:none}.note-editor .note-toolbar{background:#F5F5F5;border-bottom:1px solid #c2cad8}.summernote .panel-primary>.panel-heading{color:#333;background-color:#f5f5f5;border-color:#ddd}.summernote .btn-default{background:#fff!important}.summernote .btn-default:hover{background:#4285F4!important}.summernote .btn-default.active{background:#0B51C5!important}.summernote .btn{color:#000!important;background-color:#fff;border:1px solid #ccc;white-space:nowrap!important;padding:6px 12px;font-size:14px;line-height:1.42857;user-select:none;box-shadow:none!important}.summernote .btn:hover{cursor:pointer}
</style>
@endsection

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
        <div class="row">
            <div class="card col-12">
              <div class="card-block">
                <h4 class="card-title">Tambah Artikel</h4>
                <br>
                <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label class="form-control-label"><b>Judul Artikel</b></label>
                    <input type="text" class="form-control" placeholder="Ex: Seorang warga baru-baru ini telah dijemput oleh sang malaikat maut dalam perjalanan pulangnya" name="title" required>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label col-12" style="padding-left: 0"><b>Gambar Cover</b></label>
                    <img src="{{ secure_asset('images/post-img/noimg.png') }}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
                  </div>
                  <div class="form-group">
                    <input id="gambar_post" class="col-12" name="image" type="file" style="padding-left: 0" />
                    <small>Cover dapat dikosongkan kalau memang tidak ada gambar cover untuk post nya</small>
                  </div>
                  <div class="form-group summernote">
                    <label class="form-control-label"><b>Konten Artikel</b></label>
                    <textarea name="content" id="content" style="resize: none"></textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label"><b>Kategori Artikel</b></label>
                    <select name="category_id" class="form-control" required>
                      <option value="" hidden selected>Pilih Kategori</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label"><b>Tag Artikel</b></label>
                    <select multiple="multiple" name="tag_id[]" class="form-control" required>
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                        @endforeach
                    </select>
                    <small>Jika ingin memilih lebih dari 1 tag, silahkan pilih sambil ditekan tombol 'CTRL' di keyboard</small>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label col-12" style="padding-left: 0 !important"><b>Status Post</b></label>
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" name="aired" value="1" class="custom-control-input">
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description">Langsung Diterbitkan</span>
                    </label>
                    <br>
                    <small>Jika dicentang, maka post akan langsung diterbitkan di website setelah anda menyimpan post ini</small>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Tambahkan">
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pluginjs')
<!-- include summernote css/js-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#content').summernote({
      height: 500,
      minHeight: 300,
      maxHeight: 500,
      focus: true,
      airMode: false,
      fontNames: ['Roboto', 'Calibri', 'Times New Roman', 'Arial'],
      fontNamesIgnoreCheck: ['Roboto', 'Calibri'],
      dialogsInBody: true,
      dialogsFade: true,
      disableDragAndDrop: false,
      popover: {
          air: [
              ['color', ['color']],
              ['font', ['bold', 'underline', 'clear']]
          ]
      },
    });
  });
</script>

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
@stop
