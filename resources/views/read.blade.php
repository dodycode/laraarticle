@extends('layouts.app')
@section('content')
<div class="container wrapper">
	<div class="callout my2"></div>
	<div class="card post mt2">
		@if($post->image !== null)
		<div class="post__image">
			<img src="{{ secure_asset('images/post-img/'.$post->image) }}" alt="{{ $post->title }}">
		</div>
		@endif

		<div class="post__content clearfix">
			<div class="col lg-col-12">
				<header class="post__header">
					<span class="label">
						<a href="#">{{ $post->namaKategori->category }}</a>
						<span class="text--gray"> / </span>
						<span class="text--gray">{{ $post->created_at->format('j F, Y') }}</span>
					</span>
					<h1 class="post__title">{{ $post->title }}</h1>
				</header>
				{!! $post->content !!}
			</div>
		</div>

		<div class="post__footer">
			<div class="post__author">
				@if($post->namaPenulis->image !== null)
				<img class="author__image" src="{{ secure_asset('images/user-pp/'.$post->namaPenulis->image) }}">
				@else
				<img class="author__image" src="{{ secure_asset('images/user-pp/user.png') }}">
				@endif
				<div class="author__content">
					<h4 class="author__name">By <a href="#">{{ $post->namaPenulis->name }}</a></h4>
				</div>
			</div>
			<ul class="tags">
				@foreach($post->tags as $tag)
				<li class="tag">
					<a href="#" class="tag__link">{{ $tag->tag }}</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
<br><br>
@endsection