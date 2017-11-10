<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Newborn Express</title>

    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{{ asset('public/assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('public/assets/frontend/css/style.css') }}" rel="stylesheet">
     <link href="{{ asset('public/assets/frontend/css/responsive.css') }}" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--header section start-->
    <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          <a href="#" class="logo">
            <img src="{{ asset('public/assets/frontend/img/logo.png') }}" alt="newborn express">
          </a>
        </div>
        <div class="col-sm-10">
          <div class="top-bar">
            <a href="#"><img src="{{ asset('public/assets/frontend/img/get-box.png') }}"></a>
            <ul>
              <li class="mega-menu"><a href="#">Pick a box</a>
                <ul class="sub-menu-top">
                  <li><a href="#">hello world</a></li>
                  <li><a href="#">hello world</a></li>
                  <li><a href="#">hello world</a></li>
                  <li><a href="#">hello world</a></li>
                </ul>
              </li>
              <li class="mega-menu"><a href="#">Give a gift</a>
                <ul class="sub-menu-top">
                  <li><a href="#">hello world</a></li>
                  <li><a href="#">hello world</a></li>
                  
                </ul>
              </li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Signup</a></li>
            </ul>
            
          </div>
          
          <div class="main-menu">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Toys Boxes</a></li>
              <li><a href="#">Offers</a></li>
              <li><a href="#">Blogs</a></li>
              <li><a href="#">Join Us</a></li>
              <li><a href="#">Toys Shop</a></li>
              <li><a href="#">Our Plan</a></li>
              <li><a href="#">Pricing</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
            <ul style="float:right">
              <li><a href="#"><img src="{{ asset('public/assets/frontend/img/cart-ico.png') }}"></a></li>
              <li style="padding-right:0px;"><a href="#"><img src="{{ asset('public/assets/frontend/img/wish-list.png') }}"></a></li>
            </ul>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!--header section end-->