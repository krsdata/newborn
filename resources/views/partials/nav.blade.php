	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<a href="{{url('/')}}" class="logo">
						<img src="{{ asset('assets/img/logo.png')}}" alt="">
					</a>
				</div>

				<div class="col-sm-10">
					<div class="top-bar">
						<a href="#"><img src="{{ asset('assets/img/get-box.png') }}"></a>
						 
						<ul>
							<li class="mega-menu"><a href="#">Pick a box</a>
								<ul class="sub-menu-top"> 
									@foreach($boxTypes as $key => $box)
									<li><a href="{{asset('box/'.camel_case($box->category_name))}}?id={{$box->id}}">
									{{$box->category_name}}
									</a></li>		
									@endforeach
								 

								</ul>
							</li>
							<li class="mega-menu"><a href="#">Give a gift</a>
								<ul class="sub-menu-top">
									<li><a href="{{url('gift/box')}}">Gift Box</a></li>
									<li><a href="{{url('gift/card')}}">Gift Card</a></li>
									
								</ul>
							</li>

							@if(Auth::user()!=null)
							<li><a href="{{url('myaccount')}}">MyAccount</a></li>
							@else
							<li><a href="{{url('login')}}">Login</a></li>
							@endif


							@if(Auth::user()!=null)
							<li><a href="{{url('auth/logout')}}">Logout</a></li>
							@else
							<li><a href="{{url('signup')}}">Signup</a></li>
							@endif
							
						</ul>
						
					</div>
					
					<div class="main-menu">
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="plan">Toys Boxes</a></li>
							<li><a href="plan">Offers</a></li>
							<li><a href="#">Blogs</a></li>
							<li><a href="login">Join Us</a></li>
							<li><a href="plan">Toys Shop</a></li>
							<li><a href="plan">Our Plan</a></li>
							<li><a href="plan">Pricing</a></li>
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
