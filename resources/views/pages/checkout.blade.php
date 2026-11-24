@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<main class="main">
		<section class="section">
			<div class="container">
				<div class="row">
					<div class="breadcrumb col-12">
						<a href="#">
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
				<div class="row">
					<div class="col-12">
						<div class="checkout_top">
							Have a coupon? <a href="">Click here to enter your code</a>
						</div>
					</div>
					<div class="checkout_code col-lg-7 col-md-9 col-12">
						<div class="checkout_input">
							<div class="input_custom">
								<input type="text" placeholder="Coupon Code">
							</div>
						</div>
						<div class="checkout_btn">
							<a href="" class="btn btn__button">Apply coupon</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="checkout_address">
							Shipping address
						</div>
						<div class="checkout_inputs">
							<div class="checkout_inputs-item">
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
							</div>
							<div class="checkout_inputs-item">
								<div class="input_custom w-100">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
							</div>
							<div class="checkout_inputs-item">
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
							</div>
							<div class="checkout_inputs-item">
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
							</div>
							<div class="checkout_inputs-item">
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
							</div>
							<div class="checkout_inputs-item">
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
								<div class="input_custom">
									<span>First Name<b>*</b></span>
									<input type="text" placeholder="Marina">
								</div>
							</div>
							<div class="checkout_inputs-item">
								<div class="input_custom w-100">
									<span>First Name<b>*</b></span>
									<textarea></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-9 col-12">
						<div class="total total--checkout">
							<div class="total_top">
								your order
							</div>
							<div class="total_item">
								<div class="total_left total_name">
									Subtotal
								</div>
								<div class="total_center total_rate">
									x1
								</div>
								<div class="total_right total_sub">
									$97
								</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">
									Subtotal
								</div>
								<div class="total_center total_rate">
									x1
								</div>
								<div class="total_right total_sub">
									$97
								</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">
									Subtotal
								</div>
								<div class="total_right total_sub">
									$97
								</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">
									Subtotal
								</div>
								<div class="total_right total_sub">
									$97
								</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">
									Subtotal
								</div>
								<div class="total_right total_sub">
									$97
								</div>
							</div>
							<div class="total_pay">
								<div class="total_pay-item">
									<label for="check1" class="total_pay-item">
										<input type="radio" name="checkoutpay" id="check1">
										<span>QIWI Кошелек</span>
									</label>
								</div>
								<div class="total_pay-item">
									<label for="check2" class="total_pay-item">
										<input type="radio" name="checkoutpay" id="check2">
										<span>QIWI Кошелек</span>
									</label>
								</div>
								<div class="total_pay-item">
									<label for="check3" class="total_pay-item">
										<input type="radio" name="checkoutpay" id="check3">
										<span>QIWI Кошелек</span>
									</label>
								</div>
								<div class="total_pay-item">
									<label for="check4" class="total_pay-item">
										<input type="radio" name="checkoutpay" id="check4">
										<span>QIWI Кошелек</span>
									</label>
								</div>
								<div class="total_pay-item">
									<label for="check5" class="total_pay-item">
										<input type="radio" name="checkoutpay" id="check5">
										<span>QIWI Кошелек</span>
									</label>
								</div>
								<div class="total_pay-item">
									<label for="check6" class="total_pay-item">
										<input type="radio" name="checkoutpay" id="check6">
										<span>QIWI Кошелек</span>
									</label>
								</div>
								<label class="total_check" for="check7">
									<input type="checkbox" id="check7">
									<span>I have read and agree to the website <a href="">terms and conditions</a><b>*</b></span>
								</label>
							</div>
							<div class="total_bottom">
								<div class="total_btn">
									<a href="" class="btn btn__button">confirm order</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection
