@extends('layouts.app')

@section('title', 'Checkout')


@section('content')
<main class="main">
		<section class="section">
			<div class="container">
				<div class="row">
					<div class="breadcrumb col-12">
						<a href="{{ route('bag') }}">
							<svg width="4" height="6" viewBox="0 0 4 6" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M3.59857 5.86126C3.78355 5.67628 3.78355 5.37636 3.59857 5.19137L1.4072 3L3.59857 0.80863C3.78355 0.623644 3.78355 0.323724 3.59857 0.138739C3.41358 -0.0462461 3.11366 -0.0462461 2.92868 0.138739L0.402359 2.66505C0.217374 2.85004 0.217374 3.14996 0.402359 3.33495L2.92868 5.86126C3.11366 6.04625 3.41358 6.04625 3.59857 5.86126Z" fill="#666666"/>
							</svg>
 							Shopping Bag</a>
					</div>
					<div class="section__title col-12">
						Checkout
					</div>
				</div>
			</div>
		</section>
		<section class="section checkout bag">
			<div class="container">
				@if ($errors->has('cart'))
					<div class="flash flash--error checkout-errors">
						@foreach ($errors->get('cart') as $message)
							<div>{{ $message }}</div>
						@endforeach
						<a href="{{ route('bag') }}">Update your bag</a>
					</div>
				@endif
				<form class="row" action="{{ route('checkout.store') }}" method="POST" novalidate>
					@csrf
					<div class="col-lg-6">
						<div class="checkout_address">
							Shipping address
						</div>
						<div class="checkout_inputs">
							<div class="checkout_inputs-item">
								@include('partials.checkout-field', ['name' => 'first_name', 'label' => 'First Name', 'placeholder' => 'Marina'])
								@include('partials.checkout-field', ['name' => 'last_name', 'label' => 'Last Name', 'placeholder' => 'Ivanova'])
							</div>
							<div class="checkout_inputs-item">
								@include('partials.checkout-field', ['name' => 'address', 'label' => 'Street address', 'placeholder' => 'House number and street name', 'class' => 'w-100'])
							</div>
							<div class="checkout_inputs-item">
								<div class="input_custom">
									<span>Country<b>*</b></span>
									<select name="country" required>
										@foreach ($countries as $country)
											<option value="{{ $country }}" @selected(old('country') === $country)>{{ $country }}</option>
										@endforeach
									</select>
									@error('country')<small class="field-error">{{ $message }}</small>@enderror
								</div>
								@include('partials.checkout-field', ['name' => 'city', 'label' => 'City / Town', 'placeholder' => 'Moscow'])
							</div>
							<div class="checkout_inputs-item">
								@include('partials.checkout-field', ['name' => 'postcode', 'label' => 'Postcode / ZIP', 'placeholder' => '101000'])
								@include('partials.checkout-field', ['name' => 'phone', 'label' => 'Phone', 'placeholder' => '+7 900 000-00-00', 'type' => 'tel'])
							</div>
							<div class="checkout_inputs-item">
								@include('partials.checkout-field', ['name' => 'email', 'label' => 'Email', 'placeholder' => 'you@example.com', 'type' => 'email', 'class' => 'w-100'])
							</div>
							<div class="checkout_inputs-item">
								<div class="input_custom w-100">
									<span>Order notes</span>
									<textarea name="notes" maxlength="1000">{{ old('notes') }}</textarea>
									@error('notes')<small class="field-error">{{ $message }}</small>@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-9 col-12">
						<div class="total total--checkout">
							<div class="total_top">
								your order
							</div>
							@foreach ($items as $item)
								<div class="total_item">
									<div class="total_left total_name">
										{{ $item->product->name }}
									</div>
									<div class="total_center total_rate">
										x{{ $item->qty }}
									</div>
									<div class="total_right total_sub">
										${{ $item->total + 0 }}
									</div>
								</div>
							@endforeach
							<div class="total_item">
								<div class="total_left total_name">
									Subtotal
								</div>
								<div class="total_right total_sub">
									${{ $subtotal + 0 }}
								</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">
									Shipping
								</div>
								<div class="total_right total_sub">
									${{ $shipping + 0 }}
								</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">
									Total
								</div>
								<div class="total_right total_sub">
									${{ $total + 0 }}
								</div>
							</div>
							<div class="total_pay">
								@foreach ($paymentMethods as $key => $label)
									<div class="total_pay-item">
										<label for="pay_{{ $key }}" class="total_pay-item">
											<input type="radio" name="payment_method" id="pay_{{ $key }}" value="{{ $key }}"
												@checked(old('payment_method', array_key_first($paymentMethods)) === $key)>
											<span>{{ $label }}</span>
										</label>
									</div>
								@endforeach
								@error('payment_method')<small class="field-error">{{ $message }}</small>@enderror
								<label class="total_check" for="terms">
									<input type="checkbox" id="terms" name="terms" value="1" @checked(old('terms'))>
									<span>I have read and agree to the website <a href="{{ route('terms') }}" target="_blank">terms and conditions</a><b>*</b></span>
								</label>
								@error('terms')<small class="field-error">{{ $message }}</small>@enderror
							</div>
							<div class="total_bottom">
								<div class="total_btn">
									<button type="submit" class="btn btn__button">confirm order</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</main>
@endsection
