<footer class="footer">
		<div class="container">
			<div class="footer__wrapper row">
				<div class="footer__edit col-lg-6 col-md-4 col-12">
					<span><b>© {{ date('Y') }} Goldberry Edition.</b></span>
					<span>All rights reserved</span>
				</div>
				<div class="col-lg-6 col-md-8 col-12">
					<nav class="footer__nav">
						<ul class="footer__nav-menu">
							<li class="footer__nav-item">
								<a href="{{ route('shipping') }}" class="footer__nav-link">Shipping and delivery</a>
							</li>
							<li class="footer__nav-item">
								<a href="{{ route('terms') }}" class="footer__nav-link">Terms of use</a>
							</li>
							<li class="footer__nav-item">
								<a href="{{ route('returns') }}" class="footer__nav-link">Returns & Exchanges</a>
							</li>
							<li class="footer__nav-item">
								<a href="#" class="footer__nav-link">Legal information</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</footer>

<form action="" class="searchForm" id="search">
		<div class="container"><input type="search" placeholder="search ..."></div>
	</form>
