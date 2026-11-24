@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<main class="main">
		<section class="section sale">
			<div class="container">
				<div class="row">
					<div class="section__title col-lg-6 col-12">
						Anastasia
					</div>
					<div class="sale__wrapper col-lg-6 col-12">

						<div class="toggle">
							<div class="toggle__wrapp">
								<span>category</span>
								<img class="work_arrow" src="{{ asset('img/icon/chevron-down.svg') }}" alt="">
							</div>
							<div class="toggle__wrapper" >
								<span>Anastasia</span>
								<span>Anastasia</span>
								<span>Anastasia</span>
							</div>
						</div>

						<div class="toggle">
							<div class="toggle__wrapp">
								<span>sort by</span>
								<img class="work_arrow" src="{{ asset('img/icon/chevron-down.svg') }}" alt="">
							</div>
							<div class="toggle__wrapper" >
								<span>New</span>
								<span>Price: low to high</span>
								<span>Price: high to low</span>
							</div>
						</div>
					</div>
				</div>
				<div class=" row">
					<div class="col-lg-4 col-md-6 col-12 sale__slider-item">
						<div class="cart cart__middle">
							<div class="cart__img">
								<img src="{{ asset('img/cartmini.jpg') }}" alt="">
								<span>SALE</span>
							</div>
							<div class="cart__title">
								Necklace “Together in Paris” classic version
							</div>
							<div class="cart__price">
								<div class="cart__count">
									<div class="cart__sale">
										<span>$51</span><span>$36</span>
									</div>
									<div class="cart__save">
										Save Up To $15
									</div>
								</div>
								<div class="cart__bag">
									<img src="{{ asset('img/icon/plus.svg') }}" alt="">
									<span>Add To Bag</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-12 sale__slider-item">
						<div class="cart cart__middle">
							<div class="cart__img">
								<img src="{{ asset('img/cartmini.jpg') }}" alt="">
								<span>SALE</span>
							</div>
							<div class="cart__title">
								Necklace “Together in Paris” classic version
							</div>
							<div class="cart__price">
								<div class="cart__count">
									<div class="cart__sale">
										<span>$51</span><span>$36</span>
									</div>
									<div class="cart__save">
										Save Up To $15
									</div>
								</div>
								<div class="cart__bag">
									<img src="{{ asset('img/icon/plus.svg') }}" alt="">
									<span>Add To Bag</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-12 sale__slider-item">
						<div class="cart cart__middle">
							<div class="cart__img">
								<img src="{{ asset('img/cartmini.jpg') }}" alt="">
								<span>SALE</span>
							</div>
							<div class="cart__title">
								Necklace “Together in Paris” classic version
							</div>
							<div class="cart__price">
								<div class="cart__count">
									<div class="cart__sale">
										<span>$51</span><span>$36</span>
									</div>
									<div class="cart__save">
										Save Up To $15
									</div>
								</div>
								<div class="cart__bag">
									<img src="{{ asset('img/icon/plus.svg') }}" alt="">
									<span>Add To Bag</span>
								</div>
							</div>
						</div>
					</div>

				</div>
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
