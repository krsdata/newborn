	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<a href="#" class="logo">
						<img src="img/logo.png" alt="">
					</a>
				</div>
				<div class="col-sm-10">
					<div class="top-bar">
						<a href="refer.html"><img src="{{ asset('assets/img/get-box.png') }}"></a>

						<ul>
							<li class="mega-menu"><a href="#">Pick a box</a>
								<ul class="sub-menu-top">
									<li><a href="{{url('box/mini')}}">Mini Box</a></li>
									<li><a href="{{url('box/smallBox')}}">Small Box world</a></li>
									<li><a href="{{url('box/largeBox')}}">Large Box</a></li>
								</ul>
							</li>
							<li class="mega-menu"><a href="#">Give a gift</a>
								<ul class="sub-menu-top">
									<li><a href="{{url('gift/box')}}">Gift Box</a></li>
									<li><a href="{{url('gift/card')}}">Gift Card</a></li>
									
								</ul>
							</li>
							<li><a href="login.html">Login</a></li>
							<li><a href="login.html">Signup</a></li>
						</ul>
						
					</div>
					
					<div class="main-menu">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="plan.html">Toys Boxes</a></li>
							<li><a href="plan.html">Offers</a></li>
							<li><a href="#">Blogs</a></li>
							<li><a href="login.html">Join Us</a></li>
							<li><a href="detail-page.html">Toys Shop</a></li>
							<li><a href="plan.html">Our Plan</a></li>
							<li><a href="plan.html">Pricing</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
						<ul style="float:right">
							<li><a href="{{url('checkout')}}"><img style="position: absolute; top: 73px; z-index: -10000;
    right: 25px;" src="{{ asset('assets/img/cart-ico.png') }}">
							<span style="color:#fff;background-color: red; font-weight: bold">{{
								(Cart::content()->count())							}}</span></a></li>
							 
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</div>
