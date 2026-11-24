@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<main class="main">
		<section class="section offer">
			<div class="offer__content">
				<div class="offer__title">
					Products <br>
					with a magical story <br>
					behind them <br>
				</div>
				<div class="offer__subtitle">
					It is a long established fact that a reader <br>
					will be distracted by the readable content <br>
					of a page when looking at its layout
				</div>
				<div class="offer__button">
					<a href="#" class="btn">Shop now</a>
				</div>
			</div>
			<div class="offer__slider owl-carousel">
				<div class="item">
					<img src="{{ asset('img/slide.jpg') }}" alt="">
				</div>
				<div class="item">
					<img src="{{ asset('img/slide.jpg') }}" alt="">
				</div>
				<div class="item">
					<img src="{{ asset('img/slide.jpg') }}" alt="">
				</div>
			</div>
		</section>
		<section class="section sale">
			<div class="container">
				<div class="row">
					<div class="section__title col-12">
						Sale
					</div>
				</div>
			</div>
			<div class="sale__slider owl-carousel">
				@foreach ($saleProducts as $product)
					<div class="sale__slider-item">
						@include('partials.product-card', ['product' => $product])
					</div>
				@endforeach
			</div>
		</section>
		<section class="section collections">
			<div class="container">
				<div class="row">
					<div class="section__title col-12">
						Collections
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-6">
						<div class="collections__cart">
							<img src="{{ asset('img/anastasia.jpg') }}" alt="">
							<div class="collections__title">
								Frozen
							</div>
							<div class="collections__wrapper">
								<div class="collections__hover">
									Frozen
								</div>
								<div class="collections__text">
									Morbi mattis nulla vitae eleifend dignissim. Sed non vulputate est. Ut a justo ut dui congue varius. Etiam rhoncus viverra velit, at elementum magna pellentesque vitae. 
								</div>
								<div class="collections__btn">
									<a href="#" class="btn">Shop now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="collections__cart">
							<img src="{{ asset('img/anastasia.jpg') }}" alt="">
							<div class="collections__title">
								Frozen
							</div>
							<div class="collections__wrapper">
								<div class="collections__hover">
									Frozen
								</div>
								<div class="collections__text">
									Morbi mattis nulla vitae eleifend dignissim. Sed non vulputate est. Ut a justo ut dui congue varius. Etiam rhoncus viverra velit, at elementum magna pellentesque vitae. 
								</div>
								<div class="collections__btn">
									<a href="#" class="btn">Shop now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="collections__cart">
							<img src="{{ asset('img/anastasia.jpg') }}" alt="">
							<div class="collections__title">
								Frozen
							</div>
							<div class="collections__wrapper">
								<div class="collections__hover">
									Frozen
								</div>
								<div class="collections__text">
									Morbi mattis nulla vitae eleifend dignissim. Sed non vulputate est. Ut a justo ut dui congue varius. Etiam rhoncus viverra velit, at elementum magna pellentesque vitae. 
								</div>
								<div class="collections__btn">
									<a href="#" class="btn">Shop now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="collections__cart">
							<img src="{{ asset('img/anastasia.jpg') }}" alt="">
							<div class="collections__title">
								Frozen
							</div>
							<div class="collections__wrapper">
								<div class="collections__hover">
									Frozen
								</div>
								<div class="collections__text">
									Morbi mattis nulla vitae eleifend dignissim. Sed non vulputate est. Ut a justo ut dui congue varius. Etiam rhoncus viverra velit, at elementum magna pellentesque vitae. 
								</div>
								<div class="collections__btn">
									<a href="#" class="btn">Shop now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="collections__cart">
							<img src="{{ asset('img/anastasia.jpg') }}" alt="">
							<div class="collections__title">
								Frozen
							</div>
							<div class="collections__wrapper">
								<div class="collections__hover">
									Frozen
								</div>
								<div class="collections__text">
									Morbi mattis nulla vitae eleifend dignissim. Sed non vulputate est. Ut a justo ut dui congue varius. Etiam rhoncus viverra velit, at elementum magna pellentesque vitae. 
								</div>
								<div class="collections__btn">
									<a href="#" class="btn">Shop now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="collections__cart">
							<img src="{{ asset('img/anastasia.jpg') }}" alt="">
							<div class="collections__title">
								Frozen
							</div>
							<div class="collections__wrapper">
								<div class="collections__hover">
									Frozen
								</div>
								<div class="collections__text">
									Morbi mattis nulla vitae eleifend dignissim. Sed non vulputate est. Ut a justo ut dui congue varius. Etiam rhoncus viverra velit, at elementum magna pellentesque vitae. 
								</div>
								<div class="collections__btn">
									<a href="#" class="btn">Shop now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="collections__cart">
							<img src="{{ asset('img/anastasia.jpg') }}" alt="">
							<div class="collections__title">
								Frozen
							</div>
							<div class="collections__wrapper">
								<div class="collections__hover">
									Frozen
								</div>
								<div class="collections__text">
									Morbi mattis nulla vitae eleifend dignissim. Sed non vulputate est. Ut a justo ut dui congue varius. Etiam rhoncus viverra velit, at elementum magna pellentesque vitae. 
								</div>
								<div class="collections__btn">
									<a href="#" class="btn">Shop now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12">
						<a href="#" class="btn">Shop now</a>
					</div>
				</div>
			</div>
		</section>
		<section class="section category">
			<div class="container">
				<div class="row">
					<div class="section__title col-12">
						Shop by Category
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-12">
						<a href="#" class="category__cart">
							<div class="img"><img src="{{ asset('img/all.jpg') }}" alt=""></div>
							<div class="category__title">
								necklaces
							</div>
						</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-12">
						<a href="#" class="category__cart">
							<div class="img"><img src="{{ asset('img/all2.jpg') }}" alt=""></div>
							<div class="category__title">
								pendants
							</div>
						</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-12">
						<a href="#" class="category__cart">
							<div class="img"><img src="{{ asset('img/all.jpg') }}" alt=""></div>
							<div class="category__title">
								rings
							</div>
						</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-12">
						<a href="#" class="category__cart">
							<div class="img"><img src="{{ asset('img/all.jpg') }}" alt=""></div>
							<div class="category__title">
								earrings
							</div>
						</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-12">
						<a href="#" class="category__cart">
							<div class="img"><img src="{{ asset('img/all.jpg') }}" alt=""></div>
							<div class="category__title">
								bracelets
							</div>
						</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-12">
						<a href="#" class="category__cart">
							<div class="img"><img src="{{ asset('img/all6.jpg') }}" alt=""></div>
							<div class="category__title">
								brooches
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<section class="section about">
			<img class="about__logo" src="{{ asset('img/logoabout.png') }}" alt="">
			<div class="container">
				<div class="row">
					<div class="about__wrapp col-lg-5 col-sm-6">
						<img class="about__flatgirl" src="{{ asset('img/flatgirl.jpg') }}" alt="">
						<img class="about__shiba" src="{{ asset('img/shiba.png') }}" alt="">
					</div>
					
					<div class="about__wrapper col-lg-6 col-sm-6">
						<div class="section__title">
							About Us
						</div>
						<div class="about__text">
							<p>
								A company with a magical story behind it. 	<br>
								It all started with a dog and her girl.<br>
								Meet Anna, the founder of Goldberry, and Goldberry herself, Anna’s dog who inspired the theme of the brand.
							</p>
							<p>Anna was born in Russia. She is a fairy tale writer and cosplayer. Anna never <br>
							 	stops believing in fairy tales and wants to share them with the whole world.
							</p>
						</div>
						<div class="about__btn">
							<a href="#" class="btn">Shop now</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="section instagram">
			<div class="container">
				<div class="row">
					<div class="section__title col-12">
						Follow us on Instagram
					</div>
					<div class="instagram__hash">
						#goldberryedition
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="instagram__slider owl-carousel">
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
			</div>
		</section>
		<section class="section contact">
			<div class="container">
				<div class="row">
					<div class="section__title col-12">Contact us</div>
					<div class="section__subtitle col-7">
						If you have any questions or suggestions – please write us on social networks, send us an email, or a message by filling out the contact form.
					</div>
				</div>
				<form action="" class="form">
					<div class="row">
						<div class="form__title col-md-4 col-12">
							<p>Email: contact@goldberry-edition.com</p>
							<span>MON-FRI 09:00 - 19:00, <br>SAT-SUN 10:00 - 14:00</span>
						</div>
						<div class="form__title col-md-4 col-12">
							<p>SP Veselkova Svetlana Vladimirovna</p>
							<span>OGRNP: 321602700005470 <br> INN: 602701274610</span>
						</div>
						<div class="form__title col-md-4 col-12">
							<p>Social networks</p>
							<div class="form__social">
								<a href="#"><img src="{{ asset('img/icon/pinterest.svg') }}" alt=""></a>
								<a href="#"><img src="{{ asset('img/icon/instagram.svg') }}" alt=""></a>
								<a href="#"><img src="{{ asset('img/icon/vk.svg') }}" alt=""></a>
								<a href="#"><img src="{{ asset('img/icon/facebook.svg') }}" alt=""></a>
							</div>
						</div>
						<div class="form__title col-md-12">
							<p>Write a message</p>
						</div>
						<div class="col-md-4">
							<input type="text" placeholder="Name" required="">
							<input type="text" placeholder="E-mail" required="">
						</div>
						<div class="col-md-8">
							<textarea placeholder="Message"></textarea>
						</div>
						<div class="col-12">
							<button class="form__btn btn">Shop now</button>
						</div>
					</div>
				</form>
			</div>
		</section>
	</main>
@endsection
