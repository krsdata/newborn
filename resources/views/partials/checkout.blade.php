

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
					            <button type="button" class="btn btn-danger btn-circle">2</button>
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
	
	<div class="checkout-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="summary">
						<p><strong>Important!</strong> Boxes start shipping on/around November 13th and will (typically) arrive between 11/20 ~ 12/15. PLEASE do NOT use any non-English characters on the name or address (e.g. no accents) :).</p>
						<div class="order-summary">
							<h4>Order Summary</h4>
							
 
							<table width="100%" border="1">
							@if(count($cart)==0)
								<p style="font-size: large; color: brown;margin-top: 10px;" class="cartEmpty">Your cart is empty! </p>
							@endif
								@foreach($cart as  $item)
									<tr>
									    <td><a href="{{ url('removeItem/'.$item->id) }}"><i class="icon-remove-circle fa fa-trash-o"></i></a></td>
									    <td>
									    	<div class="product-name"> Newborn {{$item->name}}</div>
											<div class="subscription-plan">Month To Month Plan @ {{$item->price}}/mo
											<div class="subscription-autorenew">
											<strong>1 delivery<span class="auto-renew-cart">, auto-renewing</span></strong>
											</div>
											</div>
										</td> 
									    <td>{{$item->qty}}x{{money_format('%!i', $item->price)}} </td>
								  	</tr>
							  	@endforeach
							</table>
							
								<table width="100%" border="1" class="total-pay">
								  <tr>
								    <td><strong>Estimated Shipping:</strong></td>
								    <td>$-.--</td>
								  </tr>
								  <tr>
								    <td><strong>Estimated Tax:</strong></td>
								    <td>$-.--</td>
								  </tr>
								  <tr>
								    <td><strong>Total</strong></td>
								    <td><strong>${{ money_format('%!i', isset($sub_total)?$sub_total:0) }}	 USD</strong></td>
								  </tr>
								</table>

							<div class="input-group">
							<input type="text" placeholder="Coupon or Gift Code" id="id_coupon_code" name="coupon_code" required="">
							<span class="input-group-btn">
							<button class="btn btn-primary" id="add_coupon_code">Apply</button>
							</span>
							</div>


						</div>
					</div>
				</div>


				 {!! Form::open(['url' => 'makePayment', 'method' => 'post','class'=>'users_form']) !!}
				
					 @include('checkout.form')
				  {!! Form::close() !!}
			</div>
		</div>
	</div> 