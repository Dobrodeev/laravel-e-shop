@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<main class="main">
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
