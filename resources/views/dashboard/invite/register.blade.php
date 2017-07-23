@extends('layouts.app')

@section('addons')
<!-- Form Template Inline Style -->
<style type="text/css">
	.form-basic .form-radio-buttons,.form-basic .form-row>label span{display:inline-block;vertical-align:top}body{background-color:#f3f3f3}.form-basic{max-width:640px;margin:0 auto;padding:55px;box-sizing:border-box;background-color:#fff;box-shadow:0 1px 3px 0 rgba(0,0,0,.1);font:700 14px sans-serif;text-align:center}.form-basic .form-row{text-align:left;margin-bottom:22px}.form-basic .form-title-row{text-align:center;margin-bottom:55px}.form-basic h1{display:inline-block;box-sizing:border-box;color:#4c565e;font-size:24px;padding:0 10px 15px;border-bottom:2px solid #6caee0;margin:0}.form-basic input,.form-basic select,.form-basic textarea{box-sizing:border-box;border:1px solid #dbdbdb}.form-basic .form-row>label span{box-sizing:border-box;color:#5F5F5F;width:180px;text-align:right;padding:12px 25px}.form-basic input{color:#5f5f5f;width:240px;box-shadow:1px 2px 4px 0 rgba(0,0,0,.08);padding:12px}.form-basic input[type=checkbox],.form-basic input[type=radio]{box-shadow:none;width:auto}.form-basic button,.form-basic select,.form-basic textarea{box-shadow:1px 2px 4px 0 rgba(0,0,0,.08)}.form-basic input[type=checkbox]{margin-top:13px}.form-basic select{background-color:#fff;color:#5f5f5f;max-width:240px;padding:12px 8px}.form-basic textarea{color:#5f5f5f;width:240px;height:80px;font:400 13px sans-serif;padding:12px;resize:vertical}.form-basic .form-radio-buttons>div{margin-top:10px}.form-basic .form-radio-buttons label span{margin-left:8px;color:#5f5f5f;font-weight:400}.form-basic .form-radio-buttons input{width:auto}.form-basic button{display:block;border-radius:2px;background-color:#6caee0;color:#fff;font-weight:700;padding:14px 22px;border:0;margin:40px 183px 0}@media (max-width:600px){.form-basic{padding:30px;max-width:480px}.form-basic .form-row{max-width:300px;margin:25px auto;text-align:left}.form-basic .form-title-row{margin-bottom:50px}.form-basic .form-row>label span{display:block;text-align:left;padding:0 0 15px}.form-basic select{width:240px}.form-basic input[type=checkbox]{margin-top:0}.form-basic .form-radio-buttons>div{margin:0 0 10px}.form-basic button{margin:0}}
</style>

<style type="text/css">
	.form-basic input{
		width: 293px !important;
	}

	.input, .select, .textarea, input, select, textarea{
		display: inherit;
		width: inherit;
	}
</style>
@endsection

@section('content')
<div class="container wrapper py5">
	<form action="{{ route('invite.store', ['token' => $invite->token]) }}" method="POST" class="form-basic">
		{!! csrf_field() !!}
		<div class="form-title-row">
		    <h1>Pendaftaran Staff Anime Fanclub</h1>
		</div>

		<div class="form-row">
		    <label>
		        <span>Name</span>
		        <input type="text" name="name" placeholder="Nama Penulismu" required />
		    </label>
		</div>
		<div class="form-row">
		    <label>
		        <span>Password</span>
		        <input type="password" placeholder="Password akunmu" name="password">
		    </label>
		</div>

		<div class="form-row">
		    <button type="submit">Submit Form</button>
		</div>
	</form>
</div>
@endsection