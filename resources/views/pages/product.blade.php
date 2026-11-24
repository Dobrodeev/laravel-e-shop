@extends('layouts.app')

@section('title', $product->name)

@section('content')
<main class="main">
		<section class="section product">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="product__img cart__img">
							<img src="{{ asset($product->image ?? 'img/cartmini.jpg') }}" alt="{{ $product->name }}">
							@if ($product->is_on_sale)
								<span>SALE</span>
							@endif
						</div>
						@if ($product->images->isNotEmpty())
							<div class="product__carousel owl-carousel">
								@foreach ($product->images as $image)
									<div class="item">
										<img src="{{ asset($image->path) }}" alt="{{ $product->name }}">
									</div>
								@endforeach
							</div>
						@endif
					</div>
					<div class="col-lg-6">
						<div class="product__title">
							{{ $product->name }}
						</div>
						<div class="product__price">
							@if ($product->is_on_sale)
								<div class="product__price-sell">
									${{ (float) $product->old_price }}
								</div>
							@endif
							<div class="product__price-last">
								${{ (float) $product->price }}
							</div>
						</div>
						@if ($product->is_on_sale)
							<div class="product__sale">
								Save Up To ${{ (float) $product->discount }}
							</div>
						@endif
						<div class="product__form">
							<div class="product__conter">
								<button>-</button>
								<span>1</span>
								<button>+</button>
							</div>
							<button class="btn btn__button" @disabled($product->stock < 1)>
								{{ $product->stock > 0 ? 'add to bag' : 'out of stock' }}
							</button>
						</div>
						<div class="wrapper">
							<div class="tabs_wrapp">
								<div class="tab active">description</div>
								<div class="tab">reviews</div>
							</div>
							<div class="tab_content">

								<div class="tab_item">
									@foreach (preg_split('/\R{2,}/', trim((string) $product->description)) as $paragraph)
										@if ($paragraph !== '')
											<p>{{ $paragraph }}</p>
										@endif
									@endforeach
								</div>
								<div class="tab_item">
									<iframe width="100%" height="372" src="https://www.youtube.com/embed/AqdAtTu8Aes" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		@if ($related->isNotEmpty())
			<section class="section productList">
				<div class="container">
					<div class="row">
						<div class="section__title col-12">
							You may also like
						</div>
						@foreach ($related as $item)
							<div class="col-lg-3">
								@include('partials.product-card', ['product' => $item])
							</div>
						@endforeach
					</div>
				</div>
			</section>
		@endif
	</main>
@endsection
