 <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="footer-logo">
            <img src="{{ asset('assets/img/logo.png')}}">
            <p></p><p></p>
            <p>Lorem ipsum dolor sit amet is dummy text for describing the website content. this content is used for website mockup</p>
            <br/>
            <p class="contact-text"><img src="{{ asset('assets/img/loc.png') }}"> Lorem ipsum dolor sit amet is dummy text</p>
            
            <p class="contact-text"><img src="{{ asset('assets/img/phone.png') }}"> +1 914526446542</p>
            <p class="contact-text"><img src="{{ asset('assets/img/msg.png') }}"> info@newbornexpress.com</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="quick-link">
            <h3>Quick Links</h3>
            <ul>
              <li><a href="#">Get Gift</a></li>
              <li><a href="#">Pick Gift</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Toys</a></li>
              <li><a href="#">Signup</a></li>
              <li><a href="#">Accessories</a></li>
            </ul>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Shop</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <div class="quick-link" style="float:right; width:32%">
            <h3>Customer Care</h3>
            <ul>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Order Tracking</a></li>
              <li><a href="#">Wish List</a></li>
              <li><a href="#">Customer Service</a></li>
              <li><a href="#">Returns / Exchange</a></li>
              <li><a href="#">Faq</a></li>
              <li><a href="#">Product Support</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script type="text/javascript">
        
        var url= "{{ url('/') }}";

    </script>
    <!-- ============================================================= FOOTER : END============================================================= --> 
 
    <!-- JavaScripts placed at the end of the document so the pages load faster --> 
    <script src="{{ asset('public/enduser/assets/js/jquery-1.11.1.min.js') }}"></script> 
   <script type="text/javascript">
      
      $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
      });
    </script>

   

   </body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/da2c0416db.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
 
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('public/assets/js/bootbox.js') }}"></script>
    <script src="{{ asset('public/assets/js/common.js') }}"></script> 
</html>