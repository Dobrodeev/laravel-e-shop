{{-- Карточка товара. Параметры: $product, $class (доп. класс для .cart) --}}
<div class="cart {{ $class ?? '' }}">
	<div class="cart__img">
		<a href="{{ route('product', $product) }}"><img src="{{ asset($product->image ?? 'img/cartmini.jpg') }}" alt="{{ $product->name }}"></a>
		@if ($product->is_on_sale)
			<span>SALE</span>
		@endif
	</div>
	<div class="cart__title">
		<a href="{{ route('product', $product) }}" style="color: inherit; text-decoration: none;">{{ $product->name }}</a>
	</div>
	<div class="cart__price">
		<div class="cart__count">
			<div class="cart__sale">
				@if ($product->is_on_sale)
					<span>${{ (float) $product->old_price }}</span><span>${{ (float) $product->price }}</span>
				@else
					<span>${{ (float) $product->price }}</span>
				@endif
			</div>
			@if ($product->is_on_sale)
				<div class="cart__save">
					Save Up To ${{ (float) $product->discount }}
				</div>
			@endif
		</div>
		<div class="cart__bag">
			<img src="{{ asset('img/icon/plus.svg') }}" alt="">
			<span>Add To Bag</span>
		</div>
	</div>
</div>
