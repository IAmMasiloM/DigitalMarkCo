<div class="row">
    
    <div class="col-md-6 col-lg-4 col-sm-6"><br><br>

        <h4 class="text-white">About Us</h4>

        
         <p class="text-white">Digital Market Company connects the people to the web one person at a time. </p>

    </div>
    <div class="col-md-6 col-lg-4 col-sm-6"><br><br>
        <h4 class="text-white">Get In Touch</h4>
        <p class="text-white"><strong>Email: </strong> info@digitalmarketco.co.za</p>
        <p class="text-white"><strong>Cell: 061 795 9369 / 074 626 3408 </strong></p>
       
        

    </div>
    <div class="col-md col-lg-4"><br><br>
        <h4 class="text-white">Newsletter</h4>
        <form action="{{url('/newsletter')}}" method="POST" id="form" data-parsley-validate>

            {{ csrf_field()}}
            
            <div class="form-group">
                <label for="newsletter" class="label-control text-white">You can trust us. We Only send offer, not a single spam.</label>
                {{ Form::email('newsletter',null,['class'=>'form-control','placeholder'=>'Enter Your Email Address Here...','required'])}}<br>

                {{ Form::submit('Submit',['class'=>'btn btn-success '])}}
            </div>

        </form>

    </div>

</div>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 "><br><br>
	<div class="text-center">
	<a href="https://www.facebook.com/OfficialDigitalMarketCo/" class="btn btn-social-icon btn-facebook bg-dark" style="color:#fff;background-color: #fff; border-radius: 100%;border:none;" target="_blank">
    <span class="fa fa-facebook" ></span>
    </a>
    <a href="https://twitter.com/_DMCo" class="btn btn-social-icon btn-twitter bg-dark" style="color:#fff;background-color: #fff; border-radius: 100%; border:none;" target="_blank">
    <span class="fa fa-twitter" ></span>
    </a>

    <a href="https://www.linkedin.com/company/digital-market-co/" class="btn btn-social-icon btn-linkedin bg-dark" style="color:#fff; border-radius: 100%; border:none;" target="_blank">
    <span class="fa fa-linkedin" ></span>
    </a>

     <a href="https://www.instagram.com/official_digitalmarketco/" class="btn btn-social-icon btn-instagram bg-dark" style="color:#fff;background-color: #fff; border-radius: 100%; border:none;" target="_blank">
    <span class="fa fa-instagram" ></span>
    </a>

    

    </div>
    </div>
    <div class="col-md-4"></div>
</div>

<div class="row">

	
	
<div class="col-md"> <br>

	
 <p class="text-center text-white"> Copyright &#169; 2019 All Rights Reserved | Digital Market Co. </p>



</div>

</div>