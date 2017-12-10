
	<!--box content start-->
	<div class="box-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2>Gift or get a Newborn Express baby toy box</h2>
					<p>Lorem ipsum dolor sit amet is the dummy text for describing web content Lorem ipsum dolor sit amet is the dummy text for describing web content Lorem ipsum dolor sit amet is the dummy text for describing web content</p>
				</div>
			</div>
			<div class="row">
				
				@foreach($products as $key => $result)
				<div class="col-sm-4">
					<div class="gift-box">
						<a href="{{url('addToCart/'.$result->id)}}"> 
							<div class="gift-img text-center">
								<img src="{{ asset('assets/img/box22.png')}}" alt="">
							</div>
							<div class="gift-box-content">
								<p>{{$boxName->name	}} Toy </p>
									<h4>${!! $result->price !!}/Box</h4>
 						<!-- 	<p>{{$result->plan}} Month </p> -->
						<p>{{$result->product_title	}}</p>
						</a>
						<p class="get-btn"><a href="{{url('addToCart/'.$result->id)}}">{{$boxName->name	}}  Toy Box</a></p>
							</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>
	<!--end box-content-->
	
	
	<!--start frequently ask Question-->
	
	<div class="faq-section">
		<div class="container">
			<div class="row">
				<h2 class="text-center">Frequently Asked Questions</h2>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="integration-list">
    <ul>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <div>
                    <h2><b>When do Newborn Boxes ship? How long does it take?</b></h2>
                </div>
            </a>

            <div class="detail">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2><b>Can I buy a one-time box?</b></h2>
            </a>

             <div class="detail">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2><b>How do I pause/skip my subscription?</b></h2>
            </a>

              <div class="detail">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2><b>How do I cancel my subscription?</b></h2>
            </a>

            <div class="detail">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </li>
        

    </ul>
</div>
				</div>
			</div>
		</div>
	</div>
					             