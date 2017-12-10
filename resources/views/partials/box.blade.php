	<div class="banner-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
						    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
						    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
			                <div class="item active">
			                    <img src="{{ asset('assets/img/toy1.png')}}" alt="...">
			                
			                </div>
			                <div class="item">
			                    <img src="{{ asset('assets/img/toy1.png')}}" alt="...">
			                </div>
			              <div class="item">
			                    <img src="{{ asset('assets/img/toy1.png')}}" alt="...">
			                </div>
			              </div> 

						  <!-- Controls -->
						  
						</div>
				</div>
				
				<div class="col-sm-4 detail-plan-option">
					<div class="banner-heading">
						<h2>Newborn Express Toy Box</h1>
						<h3>The box that started it all.</h3>
						<h4>As low as $11.99/Box + S/H
							SUPPLIES ARE LIMITED</h4>
													
							<div class="select-plan-option">
								<select> 

									@foreach($boxTypes as $key => $box)
										<li><a href="{{asset('box/'.camel_case($box->category_name))}}?id={{$box->id}}">

										<option {{(isset($boxDetail) && $box->id==$boxDetail->id)?'selected':''}}>
											{{$box->category_name}}
										</option>
										
										</a></li>		
									@endforeach



								</select>
							</div>
							<div class="get-start">
								<a href="{{ url('plan/'.camel_case($boxDetail->name.'/'.$boxDetail->id)) }}">Get Started</a>
							</div>

					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!--end banner-->
	
	
	
	
	
	<!--start detail-content-->
		<div class="detail-page-detail">
			<div class="container">
		        <div class="row">
		            <div class="col-md-9 col-sm-6 col-xs-12">
		              	<div class="prod-description">
		              	{!!$boxDetail->description !!}
		                </div>
		            </div>
		          
		        </div>
		    </div>
		</div>
	<!--end detail-content-->
	
		<div class="other-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						 
						<img src="{{ asset('assets/img/pro1.jpg')}}">
					</div>
					<div class="col-sm-3">
						<img src="{{ asset('assets/img/pro3.jpg')}}">
					</div>
					<div class="col-sm-3">
						<img src="{{ asset('assets/img/pro3.jpg')}}">
					</div>
					<div class="col-sm-3">
						<img src="{{ asset('assets/img/pro4.jpg')}}">
					</div>
				</div>
			</div>
		</div>
