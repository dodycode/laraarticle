@extends('layouts.app')

@section('content')
<!-- Featured Post -->
<div class="wrapper py4 md-py4 bg--white">
	<div class="container">
		<div class="gutter masonry js-masonry">
			@if(count($posts) > 0)
				<div class="col md-col-1 masonry-sizer"></div>
				@foreach($posts as $post)
					@if($loop->first)
					<div class="col md-col-7 lg-col-8 card card--black card--lg my1">
					@else
					<div class="col md-col-5 lg-col-4 card card--black my1">
					@endif

						<a href="{{ route('home.read', ['slug' => $post->slug]) }}" class="card__image">
							@if($post->image !== null)
							<img src="{{ asset('images/post-img/'.$post->image) }}" alt="{{ $post->title }}">
							@else
							<img src="{{ asset('images/post-img/noimg.png') }}" alt="{{ $post->title }}">
							@endif
						</a>

						<div class="card__content">
							<span class="label">{{ $post->namaKategori->category }}</span>
							@if($loop->first)
							<h3 class="text-2">
							@else
							<h3 class="text-4">
							@endif
								<a href="{{ route('home.read', ['slug' => $post->slug]) }}" class="link--white">{{ $post->title }}</a>
							</h3>
						</div>
					</div>
				@endforeach
			@else
				<div class="col col-12">
					<div class="alert alert--danger">
						<h3 class="alert__text center mt2">Belum ada Post!</h3>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>

<!-- Post per category -->
<div class="container wrapper py4 md-py6">
	<!-- Entertainment -->
	<div class="category mb4">
		<header class="category__header">
			<h2 class="category__title">Entertainment</h2>
			<a class="category__link link--black" href="{{ route('home.category', ['category' => 'Entertainment']) }}">Lihat Artikel Entertainment lainnya</a>
		</header>
		@if(count($entertains) > 0)
		<div class="gutter grid--2-col lg-grid--3-col grid--left">
			@foreach($entertains as $post)
			<a href="{{ route('home.read', ['slug' => $post->slug]) }}" class="card col mb1 sm-mb2">
				<div class="card__image">
					@if($post->image !== null)
					<img src="{{ asset('images/post-img/'.$post->image) }}" alt="{{ $post->title }}">
					@else
					<img src="{{ asset('images/post-img/noimg.png') }}" alt="{{ $post->title }}">
					@endif
				</div>
				<div class="card__content">
					<span class="label">{{ $post->created_at->format('j F, Y') }}</span>
					<h4>{{ $post->title }}</h4>
				</div>
			</a>
			@endforeach
		</div>
		@else
		<div class="col col-12">
			<div class="alert alert--danger">
				<h4 class="alert__text center mt2">Tidak ada post yang berkategori ini!</h4>
			</div>
		</div>
		@endif
	</div>


	<!-- News -->
	<div class="category mb4">
		<header class="category__header">
			<h2 class="category__title">News</h2>
			<a class="category__link link--black" href="{{ route('home.category', ['category' => 'News']) }}">Lihat Artikel News lainnya</a>
		</header>
		@if(count($news) > 0)
		<div class="gutter grid--2-col lg-grid--3-col grid--left">
			@foreach($news as $post)
			<a href="{{ route('home.read', ['slug' => $post->slug]) }}" class="card col mb1 sm-mb2">
				<div class="card__image">
					@if($post->image !== null)
					<img src="{{ asset('images/post-img/'.$post->image) }}" alt="{{ $post->title }}">
					@else
					<img src="{{ asset('images/post-img/noimg.png') }}" alt="{{ $post->title }}">
					@endif
				</div>
				<div class="card__content">
					<span class="label">{{ $post->created_at->format('j F, Y') }}</span>
					<h4>{{ $post->title }}</h4>
				</div>
			</a>
			@endforeach
		</div>
		@else
		<div class="col col-12">
			<div class="alert alert--danger">
				<h4 class="alert__text center mt2">Tidak ada post yang berkategori ini!</h4>
			</div>
		</div>
		@endif
	</div>


	<!-- Celebrity -->
	<div class="category mb4">
		<header class="category__header">
			<h2 class="category__title">Celebrity</h2>
			<a class="category__link link--black" href="{{ route('home.category', ['category' => 'Celebrity']) }}">Lihat Artikel Selebriti lainnya</a>
		</header>
		@if(count($celebs) > 0)
		<div class="gutter grid--2-col lg-grid--3-col grid--left">
			@foreach($celebs as $post)
			<a href="{{ route('home.read', ['slug' => $post->slug]) }}" class="card col mb1 sm-mb2">
				<div class="card__image">
					@if($post->image !== null)
					<img src="{{ asset('images/post-img/'.$post->image) }}" alt="{{ $post->title }}">
					@else
					<img src="{{ asset('images/post-img/noimg.png') }}" alt="{{ $post->title }}">
					@endif
				</div>
				<div class="card__content">
					<span class="label">{{ $post->created_at->format('j F, Y') }}</span>
					<h4>{{ $post->title }}</h4>
				</div>
			</a>
			@endforeach
		</div>
		@else
		<div class="col col-12">
			<div class="alert alert--danger">
				<h4 class="alert__text center mt2">Tidak ada post yang berkategori ini!</h4>
			</div>
		</div>
		@endif
	</div>
</div>
@endsection
