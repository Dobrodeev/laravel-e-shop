@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<main class="main">
		<section class="section section__page about">
			<img class="about__logo" src="{{ asset('img/logoabout.png') }}" alt="">
			<div class="container">
				<div class="row">
					<div class="about__wrapp col-lg-5 col-sm-6">
						<img class="about__flatgirl" src="{{ asset('img/flatgirl.jpg') }}" alt="">
						<img class="about__shiba" src="{{ asset('img/logoabout2.png') }}" alt="">
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
							<p><span>Goldberry</span> (Zolotinka in Russian) is an Alaskan Malamute. She is five years old and she is the sweetest dog in the world (at least that’s what we think here). Goldberry is incredibly kind and affectionate. How can one not to fall in love with her? We hope you’ll love her too, and every purchase you make with us will feed her friends at dog shelters.</p>
							<p>A part of our proceeds received from each order goes to homeless animal shelter funds. When you get any of our fairy tale jewelry pieces, a little puppy somewhere on the other side of the world is fed a warm meal thanks to you.</p>
							<p>Isn’t that magical?</p>
						</div>
					</div>
				</div>
				<div class="about__gallery row">
					<div class="col-lg-4"><img src="{{ asset('img/aboutGallery.jpg') }}" alt=""></div>
					<div class="col-lg-4"><img src="{{ asset('img/aboutGallery.jpg') }}" alt=""></div>
					<div class="col-lg-4"><img src="{{ asset('img/aboutGallery.jpg') }}" alt=""></div>
				</div>
			</div>
		</section>
	</main>
@endsection
