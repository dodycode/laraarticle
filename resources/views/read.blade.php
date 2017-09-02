@extends('layouts.app')

@section('title_and_meta')
	<?php
		$konten = $post->content;
		$konten = strip_tags(str_replace("&nbsp;","",$konten));
	?>

	<title>{{ $post->title }} | {{ config('app.name', 'Laravel') }}</title>
	<meta name="description" content="{{ $konten }}" />

	<!-- Social Meta Tags -->
  	<meta property="og:title" content="{{ $post->title }} | {{ config('app.name', 'Laravel') }}"/>
  	<meta property="og:type" content="article"/>
  	<meta property="og:url" content="{{ url()->current() }}" />
  	<meta property="og:description" content="{{ $konten }}" />
  	@if($post->image !== null)
  	<meta property="og:image" content="{{ asset('images/post-image/'.$post->image) }}" />
  	@endif

  	<!-- Twitter Meta Cards -->
  	<meta name="twitter:card" content="summary" />
  	<meta name="twitter:url" content="{{ url()->current() }}" />
  	<meta name="twitter:title" content="{{ $post->title }} | {{ config('app.name', 'Laravel') }}" />
  	<meta name="twitter:description" content="{{ $konten }}" />
  	@if($post->image !== null)
  	<meta name="twitter:image" content="{{ asset('images/post-image/'.$post->image) }}" />
  	@endif 
@endsection

@section('fb-comment')
	@if($post->aired == 1)
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=1831643150498888";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	@endif
@endsection

@section('content')
<div class="container wrapper">
	<div class="callout my2"></div>
	<div class="card post mt2">
		@if($post->image !== null)
		<div class="post__image">
			<img src="{{ asset('images/post-img/'.$post->image) }}" alt="{{ $post->title }}">
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
				<img class="author__image" src="{{ asset('images/user-pp/'.$post->namaPenulis->image) }}">
				@else
				<img class="author__image" src="{{ asset('images/user-pp/user.png') }}">
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
@if($post->aired == 1)
<div class="wrapper bg--white mt4 pt6 pb6">
	<div class="container">
		<div class="fb-comments" data-href="{{ route('home.read', ['slug' => $post->slug]) }}" data-width="100%" data-numposts="5"></div>
	</div>
</div>
@else
<br><br>
@endif
@endsection