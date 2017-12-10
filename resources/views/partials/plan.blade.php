	<!--login section start-->
	
	<div class="plan-section">
		<div class="container">
			
			<div class="row">
				<div class="container">
									<div class="stepwizard">
				    <div class="stepwizard-row">
				        <div class="stepwizard-step">
				            <button type="button" class="btn btn-danger btn-circle">1</button>
				            <p>{{$boxName->name}}</p>
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

				@foreach($product as $key => $result)
				<div class="col-sm-4">
					<div class="plan-card">
						<a href="{{url('addToCart/'.$result->id)}}"> 
						<img src="{{ asset('assets/img/box22.png') }}">
						<h4>${!! $result->price !!}/Box</h4>
						<p>{{$boxName->name	}} Toy </p>
						<p>{{$result->plan}} Month </p>
						<p>{{$result->product_title	}}</p>
						</a>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>