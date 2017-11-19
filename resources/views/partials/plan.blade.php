	<!--login section start-->
	
	<div class="plan-section">
		<div class="container">
			
			<div class="row">
				<div class="container">
									<div class="stepwizard">
				    <div class="stepwizard-row">
				        <div class="stepwizard-step">
				            <button type="button" class="btn btn-danger btn-circle">1</button>
				            <p>Toy Box Mini</p>
				        </div>
				        <div class="stepwizard-step">
				            <button type="button" class="btn btn-primary btn-circle" disabled="disabled">2</button>
				            <p>Monthly Plan</p>
				        </div>
				        <div class="stepwizard-step">
				            <button type="button" class="btn btn-primary btn-circle" disabled="disabled">3</button>
				            <p>Checkout</p>
				        </div> 
				    </div>
				</div>

				</div>
			</div>
			
		</div>
		
	</div>
	
	<div class="select-plan-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-12">
					<h3>Select Monthly Plan</h3>
					<p>
                           Plans <strong>automatically renew</strong>. You may cancel your renewal at any time from your account dashboard.sh.
                          
                      </p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="plan-card">
						<a href="{{url('checkout')}}"> 
						<img src="{{ asset('assets/img/box22.png') }}">
						<h4>$12.99/Box</h4>
						<p>Mini Toy Box</p>
						<p>plan-shipping-label</p>
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="plan-card">
						<a href="{{url('checkout')}}"> 
						<img src="{{ asset('assets/img/box22.png') }}">
						<h4>$12.99/Box</h4>
						<p>Small Toy Box</p>
						<p>plan-shipping-label</p>
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="plan-card">
						<a href="{{url('checkout')}}"> 
						<img src="{{ asset('assets/img/box22.png') }}">
						<h4>$12.99/Box</h4>
						<p>Large Toy Box</p>
						<p>plan-shipping-label</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>