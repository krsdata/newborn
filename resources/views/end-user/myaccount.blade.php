@extends('layouts.master')
    @section('title', 'BOX')
        
        @section('header')
        <h1>BOX</h1>
        @stop

        @section('content') 

            @include('partials.nav')
            <!-- Left side column. contains the logo and sidebar --> 

            <!-- Left side column. contains the logo and sidebar -->
<div style="
    padding: 50px;
    border: 1px solid #ccc;
">
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
     
                         <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->
                                <div class="panel-heading">
                                <h4 class="unicase-checkout-title"> 
                                    <a  data-toggle="collapse" class="{{ ($tab==0)?'':'collapse'}}"  data-parent="#accordion" href="index.htm#collapseOne">
                                      <span></span>My Profile
                                    </a>
                                 </h4>
                            </div>
                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse {{ ($tab==0)?'in':''}}">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">   
                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            
                                               
                                               <div class="form-control1">
                                                <label class="info-title" for="exampleInputEmail1"> Name <span> :</span> {{ Auth::user()->first_name.' '.Auth::user()->last_name }}</label>
                                                 
                                              </div>
                                              <div class="form-control1">
                                                <label class="info-title" for="exampleInputEmail1"> Email <span> :</span> {{ Auth::user()->email}}</label>
                                                 
                                              </div> 
                                             
                                        </div>  
                                        <!-- already-registered-login -->       

                                    </div>          
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>

     
                <div class="panel panel-default checkout-step-02">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="{{($tab==1)?'':'collapsed'}}"  id="" data-parent="#accordion" href="#collapseTwo" id="collapsed_biling">
                                        <span></span>Billing Information  
                                    </a>
                                </h4> 
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse {{($tab==1)?'in':''}}">
                                <div class="panel-body">
                                         <div class="col-md-6 col-sm-6 already-registered-login"> 
                                            <form method="post" class="register-form" role="form" id="billing" action="{{route('billing')}}"> 
                                                  {!! csrf_field() !!}
                                                  <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="name" placeholder="" value="{{$billing->name or ''}}" type="text" name="name" required="required">
                                                </div> 

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" value="{{$billing->email or ''}}" type="email" name="email" required="required">
                                                </div>
                                              <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">Phone/Mobile <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" name="mobile" id="mobile" placeholder="" value="{{$billing->mobile or ''}}" type="text">
                                                 
                                              </div> 

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputPassword1"> Address
                                                    <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="" value="{{$billing->address1 or ''}}"  name="address1" type="text"> 
                                                </div>
                                                        
                                            </form>
                                        </div>  
                                </div>
                            </div>
                        </div> 

                            <!-- checkout-step-02  -->

                            <!-- checkout-step-03  -->
                            <div class="panel panel-default checkout-step-03">
                                <div class="panel-heading">
                                  <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="{{($tab==2)?'':'collapsed'}}" id="collapse_three" data-parent="#accordion" href="index.htm#collapseThree">
                                        <span></span>Shipping Information
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse {{($tab==2)?'in':''}}">
                                  <div class="panel-body">
                                       <div class="col-md-6 col-sm-6 already-registered-login" id="shopping"> 
                                            <form method="post" class="register-form" role="form" id="billing" action="{{route('shipping')}}">  
                                                {!! csrf_field() !!}
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="name" placeholder="" value="{{$shipping->name or ''}}" type="text" name="name" required="required">
                                                </div> 

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" value="{{$shipping->email or ''}}" type="email" name="email" required="required">
                                                </div>
                                              <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">Phone/Mobile <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" name="mobile" id="mobile" placeholder="" value="{{$shipping->mobile or ''}} "type="text">
                                                 
                                              </div>

                                                <div class="form-group">
                                                    <label class="info-title" for="zip_code"> Pin Code
                                                    <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="zip_code" placeholder=""  value="{{$shipping->zip_code or '' }}" name="zip_code" type="text">  
                                                </div>


                                                <div class="form-group">
                                                    <label class="info-title" for="city"> City
                                                    <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="city" placeholder="" type="text" name="city" value="{{$shipping->city or '' }}"> 
                                                </div>
     

                                                <div class="form-group">
                                                    <label class="info-title" for="state"> State
                                                    <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="state" placeholder="state" value="{{$shipping->state or ''}}" name="state" type="password"> 
                                                </div>


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputPassword1"> Address1
                                                    <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="" value="{{$shipping->address1 or '' }}"" type="text" name="address1"> 
                                                </div>

                                                   <div class="form-group">
                                                    <label class="info-title" for="exampleInputPassword1"> Address2
                                                    <span>*</span></label>
                                                    <input class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="" value="{{$shipping->address2 or '' }}"" type="text" name="address2"> 
                                                </div>
                                         
                                            </form>
                                        </div>  
                                  </div>
                                </div>
                            </div>
                            <!-- checkout-step-03  -->

                            <!-- checkout-step-04  -->
                            <div class="panel panel-default checkout-step-04">
                                <div class="panel-heading">
                                  <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="{{($tab==3)?'':'collapsed'}}" data-parent="#accordion" href="index.htm#collapseFour">
                                        <span></span>Shipping Method
                                    </a>
                                  </h4> 
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse {{($tab==3)?'in':''}}">
                                    <div class="panel-body">
                                      <div class="col-md-6 col-sm-6 already-registered-login"> 
                                            <form method="post" class="register-form" role="form" id="billing" action="{{route('shippingMethod')}}">  
                                                {!! csrf_field() !!}
                                                
                                                <div class="form-group"> 
                                                    <input class="form-control  " id="cod" placeholder="" type="hidden" value="cod">Cash On delivery
                                                </div> 
                                               
                                            </form>
                                        </div>  
                                    </div>
                                </div>
                            </div> 

                            <!-- checkout-step-06  -->
                            <div class="panel panel-default checkout-step-06">
                                <div class="panel-heading">
                                  <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="index.htm#collapseSix">
                                        <span></span>My Order 
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse">
                                    <div class="panel-body">
                                                <div class="">
                            <div class="shopping-cart">
                                <div class="shopping-cart-table ">
                                    <div class="table-responsive">
                                     @if(count($transaction))
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="cart-product-name item">Product Name</th>
                                                <th class="cart-edit item">Price</th>   
                                                <th class="cart-sub-total item">Date</th> 
                                                 <th class="cart-sub-total item">Payment Method</th> 
                                            </tr>
                                            </thead><!-- /thead -->
                                  
                                         <tbody>
                                            @foreach($transaction as  $item)
                                            <tr> 
                                                <th class="cart_description">
                                                        <h4><a href="">{{$item->product_name}}</a></h4> 
                                                </th>
                                                <th class="cart_price">
                                                    <p>Rs {{$item->total_price}}</p>
                                                </th>
                                               
                                               
                                                 <th class="cart_total">
                                                    <p class=""> {{ $item->created_at }}</p>
                                                </th> 
                                                <th> COD </th>
                                            </tr> 
                                            @endforeach
                                        @else
                                    <p>You have no items in the shopping cart</p>
                                    @endif
                                    </tbody>
                                </table><!-- /table -->
                            </div>
                            <hr>
                        </div><!-- /.shopping-cart-table -->                
                       
     

                                
                        </div><!-- /.shopping-cart -->
                    </div> <!-- /.row -->
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-06  -->
                            
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar " style="
    border: 1px solid #ccc;
    padding: 10px;
">
                        <div class="panel-group">
                            <div class="panel panel-default1">    
                                <div class="panel-heading1">
                                    <h4 class="unicase-checkout-title">Welcome : {{ $userData->first_name or ''}} 
                                    </h4>
                                </div> 
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                      
                                    </ul>  
                                     <a href="{{url('/')}}" class="btn btn-success">Continue Shopping</a> 
                                      <a href="{{url('plan')}}" class="btn btn-primary">Place an Order</a>   
                                            
                                </div>
                            </div>
                        </div>
                    </div> 
    <!-- checkout-progress-sidebar -->              
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        </div><!-- /.container -->
    </div>
</div>

            
    @stop