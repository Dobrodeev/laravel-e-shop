@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<main class="main">
		<section class="section product">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="product__img cart__img">
							<img src="{{ asset('img/slide3.jpg') }}" alt="">
							<span>SALE</span>
						</div>
						<div class="product__carousel owl-carousel">
							<div class="item">
								<img src="{{ asset('img/cartmini.jpg') }}" alt="">
							</div>
							<div class="item">
								<img src="{{ asset('img/cartmini.jpg') }}" alt="">
							</div>
							<div class="item">
								<img src="{{ asset('img/cartmini.jpg') }}" alt="">
							</div>
							<div class="item">
								<img src="{{ asset('img/cartmini.jpg') }}" alt="">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="product__title">
							Odette necklace from “Swan princess” cartoon inspired
						</div>
						<div class="product__price">
							<div class="product__price-sell">
								$31
							</div>
							<div class="product__price-last">
								$22
							</div>
						</div>
						<div class="product__sale">
							Save Up To $9
						</div>
						<div class="product__form">
							<div class="product__conter">
								<button>-</button>
								<span>1</span>
								<button>+</button>
							</div>
							<button class="btn btn__button">add to bag</button>
						</div>
						<div class="wrapper">
							<div class="tabs_wrapp">
								<div class="tab active">description</div>
								<div class="tab">reviews</div>
							</div>
							<div class="tab_content">
								
								<div class="tab_item">
								<p>Every princess deserves to have her own talisman that will bring her happiness. </p>

								<p>It doesn’t matter if you order this pendant for yourself or as a gift — it will be your best purchase either way! </p>

								<p>We’ve created this pendant with our love for this magical story from our childhood and with respect for our own history and legacy: the pendant was designed and created in Russia. </p>

								<p>From the cold and mysterious lands, it is eager to set out on a journey to its little princess for her to begin to live her true magical story in real life.</p>

								<p>Imagine taking it in your hand. What do you feel? Excitement? Joy? </p>
								
								<p>The only thing that is true is that fairy tales are real, and you can be a part of them. Because, you are that lost princess this pendant is meant for, right?</p>

								<p>This pendant looks absolutely amazing both as a prop item for a stunning cosplay and as a jewelry piece you can wear on a daily basis.  </p>

								<a href="#">...read more</a>

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
		<section class="section productList">
			<div class="container">
				<div class="row">
					<div class="section__title col-12">
						You may also like
					</div>
					<div class="col-lg-3">
						<div class="cart">
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
					<div class="col-lg-3">
						<div class="cart">
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
					<div class="col-lg-3">
						<div class="cart">
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
					<div class="col-lg-3">
						<div class="cart">
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
	</main>
@endsection
