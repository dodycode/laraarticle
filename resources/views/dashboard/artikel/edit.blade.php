@extends('layouts.dashboard')

@section('plugin')
<style type="text/css">
  .modal-backdrop{display:none}.note-placeholder{position:absolute;top:90px;left:95px;font-size:34px;color:#e4e5e7;display:none;pointer-events:none}.note-editor .note-toolbar{background:#F5F5F5;border-bottom:1px solid #c2cad8}.summernote .panel-primary>.panel-heading{color:#333;background-color:#f5f5f5;border-color:#ddd}.summernote .btn-default{background:#fff!important}.summernote .btn-default:hover{background:#4285F4!important}.summernote .btn-default.active{background:#0B51C5!important}.summernote .btn{color:#000!important;background-color:#fff;border:1px solid #ccc;white-space:nowrap!important;padding:6px 12px;font-size:14px;line-height:1.42857;user-select:none;box-shadow:none!important}.summernote .btn:hover{cursor:pointer}
</style>

<style type="text/css">
  #progress-wrp{border:1px solid #09C;padding:1px;position:relative;border-radius:3px;margin:10px;text-align:left;background:#fff;box-shadow:inset 1px 3px 6px rgba(0,0,0,.12)}#progress-wrp .progress-bar{height:20px;border-radius:3px;background-color:#f39ac7;width:0;box-shadow:inset 1px 1px 10px rgba(0,0,0,.11)}#progress-wrp .status{top:3px;left:50%;position:absolute;display:inline-block;color:#000}
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
        <div class="row">
            <div class="card col-12">
              <div class="card-block">
                <h4 class="card-title">Edit Artikel</h4>
                <form action="{{ route('admin.artikel.storeEdit', ['id' => $artikel->id]) }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label class="form-control-label"><b>Judul Artikel</b></label>
                    <input type="text" class="form-control" placeholder="Judul Artikel" value="{{ $artikel->title }}" name="title" required>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label col-12" style="padding-left: 0"><b>Gambar Cover</b></label>
                    @if($artikel->image !== null)
                    <img src="{{asset('images/post-img/'.$artikel->image)}}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
                    @else
                    <img src="{{asset('images/post-img/noimg.png')}}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
                    @endif
                  </div>
                  <div class="form-group">
                    <input id="gambar_post" class="col-12" name="image" type="file" style="padding-left: 0" />
                    <small><b>Lewatkan saja bagian ini jika tidak ada perubahan pada cover</b></small>
                  </div>
                  <div class="form-group">
                    <div id="progress-wrp" style="display: none"><div class="progress-bar"></div ><div class="status">0%</div></div>
                  </div>
                  <div class="form-group summernote">
                    <label class="form-control-label"><b>Konten Artikel</b></label>
                    <textarea name="content" id="content" class="form-control" style="resize: none">{!! $artikel->content !!}</textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label"><b>Kategori Artikel</b></label>
                    <select name="category_id" class="form-control" required>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}" <?php if($category->id == $artikel->category_id){echo "selected";}else{echo "";} ?> >{{ $category->category }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label col-12" style="padding-left: 0 !important"><b>Status Post</b></label>
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" name="aired" value="1" class="custom-control-input" <?php if ($artikel->aired == 1){echo "checked";} ?>>
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description">Langsung Diterbitkan</span>
                    </label>
                    <br>
                    <small>Jika dicentang, maka post akan langsung diterbitkan di website setelah anda menyimpan post ini</small>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Edit">
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
      callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        }
      },
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

  function uploadImage(image) {
      var data = new FormData();
      data.append("image", image);
      $.ajax({
        url: '/ajaximage',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        xhr: function(){
            //upload Progress
            var xhr = $.ajaxSettings.xhr();
            if (xhr.upload) {
                xhr.upload.addEventListener('progress', function(event) {
                    var percent = 0;
                    var position = event.loaded || event.position;
                    var total = event.total;
                    if (event.lengthComputable) {
                        percent = Math.ceil(position / total * 100);
                    }
                    //update progressbar
                    $("#progress-wrp").show().delay(2000).fadeOut();
                    $('#progress-wrp' +" .progress-bar").css("width", + percent +"%");
                    $('#progress-wrp' + " .status").text(percent +"%");

                    if (percent == 100) {
                      percent = 0;
                      $('#progress-wrp').hide();
                    }
                }, true);
            }
            return xhr;
        },
        success: function(url) {
            var image = $('<img>').attr('src', url);
            $('#content').summernote("insertNode", image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
  }
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
