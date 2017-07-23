@extends('layouts.app')
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