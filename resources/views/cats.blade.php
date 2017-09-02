@extends('layouts.app')
@section('title_and_meta')
	<title>Kategori Artikel | {{ config('app.name', 'Laravel') }}</title>
	<meta name="description" content="Gudangnya informasi seputar jejepangan" />

	<!-- Social Meta Tags -->
  	<meta property="og:title" content="Kategori Artikel | {{ config('app.name', 'Laravel') }}"/>
  	<meta property="og:type" content="article"/>
  	<meta property="og:url" content="{{ url()->current() }}" />
  	<meta property="og:description" content="Gudangnya informasi seputar jejepangan" />
  	<meta property="og:image" content="https://s-media-cache-ak0.pinimg.com/originals/5a/52/62/5a526234a7d818d68b2e12b432afe007.jpg" />
  	
  	<!-- Twitter Meta Cards -->
  	<meta name="twitter:card" content="summary" />
  	<meta name="twitter:url" content="{{ url()->current() }}" />
  	<meta name="twitter:title" content="Kategori Artikel | {{ config('app.name', 'Laravel') }}" />
  	<meta name="twitter:description" content="Gudangnya informasi seputar jejepangan" />
  	<meta name="twitter:image" content="https://s-media-cache-ak0.pinimg.com/originals/5a/52/62/5a526234a7d818d68b2e12b432afe007.jpg" />
@endsection

@section('content')
<div class="container wrapper py5 tab__container">
	<div class="category mb4">
		<header class="category__header">
			<h2 class="category__title">Kategori Artikel</h2>
		</header>
		<div class="gutter grid--2-col lg-grid--3-col grid--left">
			@foreach($categories as $category)
			<a class="card col mb1 sm-mb2" href="{{ route('home.category', ['category' => $category->category]) }}">
				<div class="card__content" style="padding: 0; padding-top: 48px; text-align: center">
					<h4>{{ $category->category }}</h4>
				</div>
			</a>
			@endforeach
		</div>
	</div>
	{{ $categories->links('vendor.pagination.simple-cat-page') }}
</div>
@endsection