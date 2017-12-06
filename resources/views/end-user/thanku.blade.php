@extends('layouts.master')
    @section('title', 'BOX')
        
        @section('header')
        <h1>BOX</h1>
        @stop

        @section('content') 

            @include('partials.nav')
            <!-- Left side column. contains the logo and sidebar -->
           
            <div class="breadcrumb">
                <div class="container">
                    <div class="breadcrumb-inner">
                        <ul class="list-inline list-unstyled">
                            <li><a href="{{url('myaccount')}}">My Account</a></li>
                            <li class="active">Order Status</li>
                        </ul>
                    </div><!-- /.breadcrumb-inner -->
                </div><!-- /.container -->
            </div>
            <div class="checkout-box faq-page" style="height: 500px">
            <div class="row">
                <div class="col-md-12">
                <center>
                    <h2 class="heading-title">Thank you for placed order!</h2>
                    <span class="title-tag">Your order will processed shortly..!</span>
                    
                      </center>
                         
                        
                    </div><!-- /.checkout-steps -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        @stop