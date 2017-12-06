

<div class="col-sm-8 payment-form">
	<div class="paypal"> 
		<img src="{{ asset('assets/img/checkout-logo-medium.png') }}">
	</div>
	<div class="or">
	Or
		 
	</div>
	<div class="shipping-head">
		<h4>Shipping Address</h4>
	</div>
	<div class="shipping-form">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group {{ $errors->first('first_name', ' has-error') }}">
					<label><span>First Name</span>
					</label>
					{!! Form::text('first_name',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group {{ $errors->first('last_name', ' has-error') }}">
					<label><span>Last Name</span>
					</label>
					{!! Form::text('last_name',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
				</div>
			</div>

		</div>
		<div class="row">
			 
			<div class="col-sm-9">
				<div class="form-group {{ $errors->first('address', ' has-error') }}">
					<label><span>Address</span>
					</label>
					{!! Form::text('address',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('address', ':message') }}</span>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<label><span>Apt/Unit (optional)</span></label>
					<input type="text" id=""  name ="apt_unit" class="ship-input">
				</div>
			</div>
		</div>
		<div class="row">
			 
			<div class="col-sm-4">
				<div class="form-group {{ $errors->first('city', ' has-error') }}">
					<label><span>City</span>
					</label>
					{!! Form::text('city',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('city', ':message') }}</span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group {{ $errors->first('state', ' has-error') }}">
					<label><span>State</span>
					</label>
					{!! Form::text('state',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('state', ':message') }}</span>
				</div>
			</div>
			 
			<div class="col-sm-4">
				<div class="form-group {{ $errors->first('postal_code', ' has-error') }}">
					<label><span>Postal Code</span>
					</label>
					{!! Form::text('postal_code',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('postal_code', ':message') }}</span>
				</div>
			</div>

		</div>
		
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group {{ $errors->first('country', ' has-error') }}">
					<label><span>Country</span>
					</label>
					{!! Form::text('country',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('country', ':message') }}</span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group {{ $errors->first('phone', ' has-error') }}">
					<label><span>Phone Number</span>
					</label>
					{!! Form::text('phone',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
				</div>
			</div>
		</div>
		
	</div>

	@if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{!! $error !!}</li>
          @endforeach
      </ul>
  </div>
@endif
		
	 		

	<div class="shipping-head">
		<h4>Billing Address</h4>
	</div>
	
	<div class="shipping-form">
		<div class="row">
			<div class="col-sm-12">
				<p id="renewal-disclaimer" style="display: block;">
					Plans automatically renew. You can cancel anytime.
			
				</p>
			</div>
		</div>
		<div class="row">
			 
			<div class="col-sm-6">
				<div class="form-group {{ $errors->first('credit_card_number', ' has-error') }}">
					<label><span>Credit Card Number</span>
					</label>
					{!! Form::number('credit_card_number',null, ['class' => 'ship-input','data-required'=>1,'maxlength'=>16])  !!} 
					  <span class="help-block">{{ $errors->first('credit_card_number', ':message') }}</span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<img src="{{ asset('assets/img/pay-iocn.jpg')}}">
				</div>
			</div>
		</div>
		<div class="row">
			 
			<div class="col-sm-3">
				<div class="form-group {{ $errors->first('cvv', ' has-error') }}">
					<label><span>CVV</span>
					</label>
					{!! Form::number('cvv',null, ['class' => 'ship-input','data-required'=>1,'maxlength'=>4,'min'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('cvv', ':message') }}</span>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label><span>Month</span></label>
					<select name="month" id="month">
						<option value="1">01 - Jan</option><option value="2">02 - Feb</option><option value="3">03 - Mar</option><option value="4">04 - Apr</option><option value="5">05 - May</option><option value="6">06 - Jun</option><option value="7">07 - Jul</option><option value="8">08 - Aug</option><option value="9">09 - Sep</option><option value="10">10 - Oct</option><option value="11">11 - Nov</option><option value="12">12 - Dec</option>
					</select>
				</div>
			</div>
			 
			<div class="col-sm-5">
				<div class="form-group {{ $errors->first('year', ' has-error') }}">
					<label><span>Year</span>
					</label>
					{!! Form::number('year',null, ['class' => 'ship-input','data-required'=>1,'maxlength'=>4,'min'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('year', ':message') }}</span>
				</div>
			</div>
		</div>
		<div class="row">
			 
			<div class="col-sm-3">
				<div class="form-group {{ $errors->first('billing_postal_code', ' has-error') }}">
					<label><span>Postel Code</span>
					</label>
					{!! Form::text('billing_postal_code',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('billing_postal_code', ':message') }}</span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label><span>Country</span></label>
					<select name="billing_country" id="billing_country">
						<option selected="" value="US">United States</option><option value=""></option><option value="AF">Afghanistan</option><option value="AX">Aland Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AG">Antigua And Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia And Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="MM">Burma</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CD">Congo, The Democratic Republic Of The</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CW">Curaçao</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="CI">Côte d'Ivoire</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island And Mcdonald Islands</option><option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran, Islamic Republic Of</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle Of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KP">Korea, Democratic People's Republic Of</option><option value="XK">Kosovo</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Lao People's Democratic Republic</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MK">Macedonia, Republic Of</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="MD">Moldova, Republic of</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territory, Occupied</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="QA">Qatar</option><option value="CM">Republic of Cameroon</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="BL">Saint Barthélemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts And Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin</option><option value="PM">Saint Pierre And Miquelon</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome And Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia And The South Sandwich Islands</option><option value="KR">South Korea</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="VC">St. Vincent</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard And Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania, United Republic Of</option><option value="TH">Thailand</option><option value="TL">Timor Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="VG">Virgin Islands, British</option><option value="WF">Wallis And Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option>
					</select>
				</div>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-sm-12">
			 	<h4>Create Account (required)</h4>
			</div>
			<div class="col-sm-6">
				<div class="form-group {{ $errors->first('email', ' has-error') }}">
					<label><span>Email Address</span>
					</label>
					{!! Form::text('email',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('email', ':message') }}</span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group {{ $errors->first('password', ' has-error') }}">
					<label><span>Password</span>
					</label>
					{!! Form::password('password',null, ['class' => 'ship-input','data-required'=>1])  !!} 
					  <span class="help-block">{{ $errors->first('password', ':message') }}</span>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<p>By clicking 'Checkout' you consent to us charging your card for the subscription level you have selected and you accept responsibility for all recurring charges prior to termination. You also understand and accept that all orders are non-refundable and subscriptions will automatically renew until stopped. You may cancel, edit or pause your subscription at any time from your account page. If you cancel a subscription after a payment has already been processed, you will still receive the number of boxes you have paid for. You also understand that there is a possibility that your next billing occurs before you receive your first box (while it's still in journey). Depending on your country, delivery may take up to 6 weeks (or more) after shipment. </p>
				<p><strong>PLEASE DOUBLE-TRIPLE-QUADRUPLE-CHECK your address. We charge a fee for any returned boxes that need to be re-shipped.</strong></p>
				<p>If you have any allergies please take extra caution. We recommend not to order if your allergic reaction is really bad. Most products may have been manufactured in an environment where nuts and other allergens are handled. If you are unsure, please seek professional advice from a doctor. Newborn is not liable for any adverse reactions caused by consuming the snacks, food, and anything we include in the boxes. Please consume at your own risk. </p>
				<p class="term-check-para"><span>
				<input type="checkbox" name="terms" class="check-term"></span> I agree to the <a href="#">Terms of Service</a></p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<button class="check-btn">CHECKOUT</button>
			</div>
		</div>
		
	</div>
	
</div>
