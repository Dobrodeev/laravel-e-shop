@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<main class="main">
		<section class="section shipping returns">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-12">
						<div class="row">
							<div class="section__title col-12">
								Returns & Exchanges
							</div>
							<div class="col-12">
								<p>If you place an order and then change your mind, can cancel it. However, you are only able to cancel your order if the items ordered have not been shipped to your address yet.</p>
								<p>
								Please be careful when selecting a product and filling out the shipping information. The store is not responsible for the incorrect info submitted by the buyer.</p>
								<p>
								You can return or exchange items that do not suit you for whatever reason, be it the design, size, or color, withinspan	<span> 7 consecutive days</span> after receiving your order. The return of items is possible only if the items ordered were not in use and their initial appearance, characteristics, original packaging and documents confirming the purchase have been preserved.
																</p> <br> <br>	
							</div>
							<div class="col-12">
								<div class="work">
									<div class="work_head">
										<div class="work_nav">
											<div class="work_title">How much does shipping cost?</div>
											<div class="work_arrow"><img src="{{ asset('img/icon/chevron-down2.svg') }}" alt=""></div>
										</div>
										
											<span class="toggle-text" style="display: none;">
												<p>To do a return or an exchange, please contact us at support.goldberry@gmail.com.</p>
												<p>
												We will email you all the necessary instructions.
												</p><p>
												Upon the receipt of your returned package, we will check the condition of the items before sending you replacements in the case of the exchange or issuing you a refund in the case of the return.</p>
										</span>
									
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="work">
									<div class="work_head">
										<div class="work_nav">
											<div class="work_title">How much does shipping cost?</div>
											<div class="work_arrow"><img src="{{ asset('img/icon/chevron-down2.svg') }}" alt=""></div>
										</div>
										
											<span class="toggle-text" style="display: none;">
											<p>If you have any questions or are experiencing an issue with placing your order, please feel free to contact us. We are always glad to help you.</p> 	
											Email: <p class="grn">support.goldberry@gmail.com</p></span>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5 col-12">
						<img src="{{ asset('img/ShippingDelivery2.jpg') }}" alt="">
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection
