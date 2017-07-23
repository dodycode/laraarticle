@extends('layouts.dashboard')

@section('plugin')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=51qdgatrhg12dd08hwx6cimh1e3259d96howla0dkh628pf7"></script>
@stop

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
            <div class="card col-lg-12">
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
                    <img src="{{secure_asset('images/post-img/'.$artikel->image)}}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
                    @else
                    <img src="{{secure_asset('images/post-img/noimg.png')}}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
                    @endif
                  </div>
                  <div class="form-group">
                    <input id="gambar_post" class="col-12" name="image" type="file" style="padding-left: 0" />
                    <small><b>Lewatkan saja bagian ini jika tidak ada perubahan pada cover</b></small>
                  </div>
                  <div class="form-group">
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
<script type="text/javascript">
  tinymce.init({
    selector: '#content',
    height: 500,
    theme: 'modern',
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc responsivefilemanager'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
    image_advtab: true,
    relative_urls: false,
    external_filemanager_path:"{!! str_finish(secure_asset('/filemanager'),'/') !!}",
    filemanager_title        :"Responsive File Manager" , 
    external_plugins         : { "filemanager" : "{{ secure_asset('/filemanager/plugin.min.js') }}"},

    content_css: [
      '//fonts.googleapis.com/css?family=Miriam+Libre:400,700|Source+Sans+Pro:400,700,600,400italic,700italic',
      '{{ secure_asset("css/tinymce.min.css") }}'
    ]
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
