<header class="header">
		<div class="container">
			<div class="row">
				<div class="mobile__mnu">
					<a href="{{ route('home') }}"><img src="{{ asset('img/logoh.png') }}" alt=""></a>
					<div class="wrap_mnu">
						<div class="toggle_mnu">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
				<div class="header__wrapper col-12">
					<div class="header__about">
						<a href="{{ route('about') }}" class="header__about-link">about us</a>
						<a href="{{ route('contact') }}" class="header__about-link">contacts</a>
						<ul class="header__about-list">
							<li><a href="#"><img src="{{ asset('img/icon/pinterest.svg') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('img/icon/instagram.svg') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('img/icon/vk.svg') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('img/icon/facebook.svg') }}" alt=""></a></li>
						</ul>
					</div>
					<div class="header__logo">
						<a href="{{ route('home') }}"><img src="{{ asset('img/logoh.png') }}" alt=""></a>
					</div>
					<ul class="header__bar">
						<li><a class="header__bar-link" href="#">USD<img class="chevron" src="{{ asset('img/icon/chevron-down.svg') }}" alt=""></a></li>
						<li><a href="#search" class="fancybox"><img src="{{ asset('img/icon/search.svg') }}" alt=""></a></li>
						<li><a href="{{ route('bag') }}"><img src="{{ asset('img/icon/shopping-cart.svg') }}" alt=""></a></li>
						<li><a href="#"><img src="{{ asset('img/icon/globe.svg') }}" alt=""><img class="chevron" src="{{ asset('img/icon/chevron-down.svg') }}" alt=""></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header__wrapp">
			<div class="container">
				<div class="row">
					<div class="col-9">
						<nav class="header__nav">
							<ul class="header__list">
								@foreach ($navCollections as $navItem)
									<li class="header__list-item">
										<a class="header__list-link" href="{{ route('category', $navItem) }}">{{ $navItem->name }}</a>
									</li>
								@endforeach
								<li class="header__list-item">
									<a class="header__list-link" href="{{ route('sale') }}">sale</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="header__wrapp-btn col-3">
						<a href="{{ route('collection') }}" class="header__btn">shop by category <img src="{{ asset('img/icon/chevron-down.svg') }}" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</header>
