@extends('layouts.app')
@section('content')
<div class="container wrapper">
	<div class="callout my1"></div>
	<div class="gutter">
		<div class="md-col md-col-7 lg-col-8">
			@if(count($posts) > 0)
				@foreach($posts as $post)
				<div class="card card--post mt0 mb3">
					<div class="post__image">
						<a href="{{ route('home.read', ['slug' => $post->slug]) }}">
							@if($post->image !== null)
							<img src="{{ asset('images/post-img/'.$post->image) }}" alt="{{ $post->title }}">
							@endif
						</a>
					</div>
					<div class="post__content truncate">
						<span class="label">
							<a href="{{ route('home.category', ['category' => $post->namaKategori->category]) }}">
								{{ $post->namaKategori->category }}
							</a>

							<span class="text--gray"> / </span>
							<span class="text--gray">{{ $post->created_at->format('j F, Y') }}</span>
						</span>
						<h2>
							<a href="{{ route('home.read', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
						</h2>
						<p>
							<?php
				                //tinymce sub-string in grid view list
				                $konten = $post->content;
				                $konten = strip_tags(html_entity_decode($konten));
				                $panjangkata = 100;
				                if (mb_strlen($konten,'UTF-8')>$panjangkata)
				                {
				                   $konten = mb_substr($konten, 0, $panjangkata-3, 'UTF-8').'...';
				                };
				                echo "$konten";
				            ?>
						</p>
						<a class="truncate__link" href="{{ route('home.read', ['slug' => $post->slug]) }}">Baca Selengkapnya..</a>
					</div>
					<div class="post__footer">
						<div class="post__author">
							<img class="author__image" src="{{ asset('images/user-pp/user.png') }}">
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
				@endforeach
			@else
			<div class="alert alert--danger">
				<h4 class="alert__text center mt2">Tidak ada post yang berkategori ini!</h4>
			</div>
			@endif

			{{ $posts->links('vendor.pagination.simple-default') }}
		</div>
		<div class="md-col md-col-5 lg-col-4 sidebar">
			<!-- Latest Post Widget -->
			<div class="widget-wrapper" style="margin-top: 0">
				<h3 class="widget-title">Latest Post</h3>
				<div class="widget">
					<ul id="recent-post" style="margin-left: -15px">
						@if(count($widgetPost) > 0)
							@foreach($widgetPost as $post)
							<li>
								<div class="item-thumbnail">
									<a href="{{ route('home.read', ['slug' => $post->slug]) }}" class="thumbnail">
										@if($post->image !== null)
										<span class="thumbnail-image" style="background-image: url('{{ asset('images/post-img/'.$post->image) }}')"></span>
										@else
										<span class="thumbnail-image" style="background-image: url('{{ asset('images/post-img/noimg.png') }}')"></span>
										@endif
									</a>
								</div>
								<div class="item-inner">
									<p class="item-category" style="margin-bottom: 4px">
										<a class="article-link" href="{{ route('home.read', ['slug' => $post->slug]) }}">
											<i class="fa fa-folder" style="color: #999"></i> {{ $post->namaKategori->category }}
										</a>
									</p>
									<p class="item-title">
										<a href="{{ route('home.read', ['slug' => $post->slug]) }}" class="title">
											{{ $post->title }}
										</a>
									</p>
								</div>
							</li>
							@endforeach
						@else
							<div class="alert alert--danger">
								<h4 class="alert__text center mt2">Tidak ada Post akhir-akhir ini</h4>
							</div>
						@endif
					</ul>
				</div>
			</div>

			<!-- Categories Widget -->
			<div class="widget-wrapper">
				<h3 class="widget-title">Categories</h3>
				<div class="widget" style="padding-left: 20px; padding-right: 20px">
					<ul class="category-list" style="margin-left: -15px">
						@foreach($widgetCat as $category)
						<li class="category-list-item" style="padding: 10px; width: 100%; border-bottom: 1px solid #f5f5f5">
							<a href="{{ route('home.category', ['category' => $category->category]) }}">
								{{ $category->category }}
							</a>
							<span class="category-list-count">
								{{ $category->posts_count }}
							</span>
						</li>
						@endforeach
					</ul>
					<br>
					<div class="center">
						<a href="{{ route('home.listcat') }}" class="btn btn-primary small" role="button">Lihat Kategori Lainnya</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection