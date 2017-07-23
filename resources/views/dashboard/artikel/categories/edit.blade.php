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
            <div class="card col-lg-8 offset-lg-2 col-sm-12 col-xs-12">
              <div class="card-block">
                <h4 class="card-title">Edit Category</h4>
                <form action="{{ route('admin.category.storeEdit', ['id' => $category->id]) }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput">Nama Kategori</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" value="{{ $category->category }}" name="category" required>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Edit">
                    <input type="reset" class="btn btn-danger pull-right" value="Batal">
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
