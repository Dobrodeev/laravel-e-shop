@extends('layouts.app')

@section('title', $title)

@section('content')
<main class="main">
		<section class="section sale">
			<div class="container">
				<div class="row">
					<div class="section__title col-lg-6 col-12">
						{{ $title }}
					</div>
					<div class="sale__wrapper col-lg-6 col-12">

						<div class="toggle">
							<div class="toggle__wrapp">
								<span>category</span>
								<img class="work_arrow" src="{{ asset('img/icon/chevron-down.svg') }}" alt="">
							</div>
							<div class="toggle__wrapper" >
								<span><a href="{{ route('collection', request()->only('sort')) }}">All</a></span>
								@foreach ($navCategories->concat($navCollections) as $navItem)
									<span><a href="{{ route('category', [$navItem, ...request()->only('sort')]) }}">{{ $navItem->name }}</a></span>
								@endforeach
							</div>
						</div>

						<div class="toggle">
							<div class="toggle__wrapp">
								<span>sort by</span>
								<img class="work_arrow" src="{{ asset('img/icon/chevron-down.svg') }}" alt="">
							</div>
							<div class="toggle__wrapper" >
								@foreach ($sorts as $key => [$label])
									<span><a href="{{ request()->fullUrlWithQuery(['sort' => $key, 'page' => null]) }}">{{ $label }}</a></span>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class=" row">
					@forelse ($products as $product)
						<div class="col-lg-4 col-md-6 col-12 sale__slider-item">
							@include('partials.product-card', ['product' => $product, 'class' => 'cart__middle'])
						</div>
					@empty
						<div class="col-12">No products yet.</div>
					@endforelse
				</div>
				@if ($products->hasPages())
					<div class="row">
						<div class="col-12">
							{{ $products->links('pagination::bootstrap-4') }}
						</div>
					</div>
				@endif
			</div>
		</section>
		<section class="section instagram inspiration">
			<div class="container">
				<div class="row">
					<div class="section__title col-12">
						Collection
					</div>
					<div class="instagram__hash">
						inspiration
					</div>
				</div>
			</div>
			<div class="inspiration__slider owl-carousel">
				<div class="item">
					<img src="{{ asset('img/instagram2.jpg') }}" alt="">
				</div>
				<div class="item">
					<img src="{{ asset('img/instagram.jpg') }}" alt="">
				</div>
				<div class="item">
					<img src="{{ asset('img/instagram2.jpg') }}" alt="">
				</div>
				<div class="item">
					<img src="{{ asset('img/instagram.jpg') }}" alt="">
				</div>
				<div class="item">
					<img src="{{ asset('img/instagram2.jpg') }}" alt="">
				</div>
				<div class="item">
					<img src="{{ asset('img/instagram.jpg') }}" alt="">
				</div>
				<div class="item">
					<img src="{{ asset('img/instagram2.jpg') }}" alt="">
				</div>
			</div>
		</section>
	</main>
@endsection
