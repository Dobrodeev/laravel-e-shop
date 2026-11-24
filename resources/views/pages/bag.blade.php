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
 							Continue shopping</a>
					</div>
					<div class="section__title col-12">
						Shopping Bag
					</div>
				</div>
			</div>
		</section>
		<section class="section bag">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-9 col-12">
						<div class="total">
							<div class="total_top">
								Order summary
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
									Shipping
								</div>
								<div class="total_right total_choose">
									<div class="total_choose-text">
										<span>Flat rate: <b>5 $</b></span>
										<span>Shipping options will be updated during checkout</span>
									</div>
									<div class="total_choose-title">
										Calculate shipping
									</div>
									<div class="total_choose-inputs">
										<div class="total_choose-input">
											<div class="input_custom">
												<select name="" id="">
													<option value="">Russia</option>
													<option value="">Germany</option>
												</select>
											</div>
										</div>
										<div class="total_choose-input">
											<div class="input_custom">
												<select name="" id="">
													<option value="">Russia</option>
													<option value="">Germany</option>
												</select>
											</div>
										</div>
										<div class="total_choose-input">
											<div class="input_custom">
												<input type="text" placeholder="City / Town">
											</div>
										</div>
										<div class="total_choose-input">
											<div class="input_custom">
												<input type="text" placeholder="Pastcode / ZIP">
											</div>
										</div>
									</div>
									<div class="total_choose-reload">
										<svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M22.2699 15.2579C22.1224 14.8059 21.6344 14.5588 21.1801 14.7054L20.0554 15.069C20.7444 13.6512 21.1052 12.0921 21.1052 10.5C21.1052 4.71027 16.3714 0 10.5526 0C4.73387 0 0 4.71027 0 10.5C0 16.2897 4.73387 21 10.5526 21C11.0303 21 11.4176 20.6146 11.4176 20.1393C11.4176 19.6641 11.0303 19.2787 10.5526 19.2787C5.68775 19.2787 1.72994 15.3407 1.72994 10.5C1.72994 5.6594 5.68775 1.72131 10.5526 1.72131C15.4175 1.72131 19.3753 5.6594 19.3753 10.5C19.3753 11.8338 19.0728 13.1396 18.4949 14.326L18.1106 13.1489C17.963 12.6969 17.475 12.4496 17.0208 12.5964C16.5664 12.7433 16.3177 13.2288 16.4653 13.6808L17.4853 16.8045C17.604 17.1683 17.943 17.3996 18.3077 17.3996C18.3962 17.3996 18.4864 17.3859 18.5752 17.3573L21.7146 16.3425C22.1688 16.1956 22.4175 15.7101 22.2699 15.2579Z" fill="#2F5846"/>
										</svg>
									</div>
								</div>
							</div>
							<div class="total_item">
								<div class="total_left total_name">
									Total
								</div>
								<div class="total_right total_sub">
									$102
								</div>
							</div>
							<div class="total_bottom">
								<div class="total_btn">
									<a href="" class="btn btn__button">checkout</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection
