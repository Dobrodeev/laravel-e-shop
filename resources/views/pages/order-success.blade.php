@extends('layouts.app')

@section('title', 'Order ' . $order->number)

@section('content')
<main class="main">
		<section class="section">
			<div class="container">
				<div class="row">
					<div class="section__title col-12">
						Thank you!
					</div>
				</div>
			</div>
		</section>
		<section class="section bag">
			<div class="container">
				<div class="row">
					<div class="col-12 order-success">
						<p>Your order <b>{{ $order->number }}</b> has been received.
							We will contact you at <b>{{ $order->email }}</b> to confirm it.</p>
						<p>Payment method: {{ $order->paymentMethodLabel() }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-7 col-md-9 col-12">
						<div class="total total--checkout">
							<div class="total_top">
								your order
							</div>
							@foreach ($order->items as $item)
								<div class="total_item">
									<div class="total_left total_name">{{ $item->name }}</div>
									<div class="total_center total_rate">x{{ $item->qty }}</div>
									<div class="total_right total_sub">${{ (float) $item->total }}</div>
								</div>
							@endforeach
							<div class="total_item">
								<div class="total_left total_name">Subtotal</div>
								<div class="total_right total_sub">${{ (float) $order->subtotal }}</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">Shipping</div>
								<div class="total_right total_sub">${{ (float) $order->shipping }}</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">Total</div>
								<div class="total_right total_sub">${{ (float) $order->total }}</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">Ship to</div>
								<div class="total_right">
									{{ $order->first_name }} {{ $order->last_name }}<br>
									{{ $order->address }}, {{ $order->city }}, {{ $order->postcode }}, {{ $order->country }}
								</div>
							</div>
							<div class="total_bottom">
								<div class="total_btn">
									<a href="{{ route('collection') }}" class="btn btn__button">continue shopping</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection
