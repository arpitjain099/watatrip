@extends('users.layouts.default')

@section('header')

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script> 
  <link rel="stylesheet" href="/resources/demos/style.css"> 
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      numberOfMonths: 1,
      showButtonPanel: true
    });
  });


</script>
<script>
 
    $(document).ready(function(){
        var data = ["Delhi","Mumbai","Ahmedabad","Kolkata","Chennai","Bangalore","Srinagar","Mangalore","Bagdogra","Bengaluru","Bhubaneswar","Goa","Guwahati","Jaisalmer","Jammu","Leh","Lucknow","Patna","Pune","Ranchi","Agra","Allahabad","Amritsar","Aurangabad","Bhopal","Chandigarh","Dehra Dun","Dharamshala","Gaya","Indore","Jabalpur","Jaipur","Jodhpur","Kochi","Kullu","Leh","Nagpur","Pantnagar","Surat","Udaipur","Vadodara","Varanasi","Vishakhapatnam"];
        $(".search").autocomplete({ source: data,
           autoFocus: true
        });
    });

</script>

@stop
 

 

@section('content')

<div class="banner-content">
      <div class="container">
        <div class="row">
          <!-- Start Header Text -->
          <div class="col-md-6 col-sm-6">
          <br><br><br>
            <h2> Introducing Waitlisted Airline Tickets </h2>
            <h2> with upto 60% lower prices </h2>
            <ul class="banner-list">
              <li><i class="fa fa-check"></i>Compare retail and waitlist prices prior to booking</li>
              <li><i class="fa fa-check"></i>Receive confirmation 24 hours prior to travel </li>
              <li><i class="fa fa-check"></i>Refund for unconfirmed tickets</li>
            
            </ul>
            <button type="submit" class="btn btn-default btn-submit" style="width:50%; float: left;">See How it Works</button>
          </div>
          <!-- End Header Text -->
          <!-- Start Banner Optin Form-->
          <div class="col-lg-5 col-md-5 col-md-offset-1 col-sm-5">
            <div class="banner-form">
              <div class="form-title">
                <h2>Search Flights</h2>
              </div>
              <div class="form-body">
                <table>
                <tr><td>
                <?php $cities = Cities::lists('city','city'); ?>


                {{ Form::open(array('url' => '/flights')); }}
                {{ Form::label('from1', 'From',array('class' => 'white-text')); }}
                {{ Form::text('from1','',array('class' => 'form-control search','width' => '40%', 'id' => 'tags')); }} </td>

                <td width="10%"></td>
                <td>
                {{ Form::label('to1', 'To',array('class' => 'white-text')); }}
                {{ Form::text('to1','',array('class' => 'form-control search', 'width' => '40%', 'id' => 'tags')); }}

                <!-- {{ Form::label('datepicker', 'Date'); }}
                {{ Form::text('datepicker', '', 
                array('class' => 'form-control','data-datepicker' => 'datepicker')) }} -->
                </td>

        
                </tr>
                <tr><td>
                

                {{ Form::label('date1', 'Date' ,array('class' => 'white-text')); }}
                {{ Form::text( 'datepicker', '', array(
                    'id' => 'datepicker',
                    'class' => 'form-control',
                     'required' => true,
                ) ) }}

                </td>
                
                

                </tr>
                <tr><td> {{ Form::label('no1', 'Passengers',array('class' => 'white-text')); }}
                {{ Form::select('no1', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), '1',array('class' => 'form-control', 'width' => '20px')); }}</td></tr>

                <tr>
                <td colspan="3"> 
                

                {{ Form::submit('Search',array('class' => 'btn btn-default btn-submit')) }}
                {{ Form::close(); }}
                </td></tr></table>
 
              </div>
            </div>
          </div>
          <!-- End Banner Optin Form -->
        </div>
      </div>
    </div>
    </div>
  <!-- End Banner -->
  
  <!-- Clients Logo -->
  <div id="clients" class="padding40 bg-grey hidden-xs">
    <div class="container">

      <ul class="list-inline clients-logo text-center">
      
        <li><img src="app/views/users/img/logo0.png" alt="" title="" /></li><!--Image path of logo -->
        <li><img src="app/views/users/img/logo1.png" alt="" title="" /></li>
        <li><img src="app/views/users/img/logo2.png" alt="" title="" /></li>
        <li><img src="app/views/users/img/logo3.png" alt="" title="" /></li>
        <li><img src="app/views/users/img/logo4.png" alt="" title="" /></li>
      </ul>
    </div>
  </div>
  <!-- End Clients Logo -->
 
  
  <!-- Three Main Points -->
  <section id="hiw" class="section bg-blue-pattern white-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="headline">
            <h2>How it Works</h2>
            <h4>Every year over 2 crore seats go empty in Indian flights. We bring you these seats at highly dicounted prices.</h4>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <div class="main-point"><!-- Main Point -->
            <i class="line-font icon-briefcase"></i><!-- Main Point Icon -->
            <h3>What is WAT</h3><!-- Main Point Title -->
            <p>WAT = Waitlisted Airline Ticket. A WAT makes you join a priority queue of passengers for highly discounted airline tickets.   </p><!-- Main Point Text -->
          </div><!-- End Main Point -->
        </div>
        <div class="col-md-4">
          <div class="main-point">
            <i class="line-font icon-graph"></i>
            <h3>Availability</h3>
            <p>On an average about 40 seats go empty in each flight in India. These seats will be used to issue tickets to passengers holdings WATs 24 hour prior to travel. </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="main-point">
            <i class="line-font icon-globe"></i>
            <h3>No Monetary Risk</h3>
            <p>Full refund of the WAT Ticket price (sans the transaction fee of Rs. 99) is provided to customers in case a WAT is not confirmed.  </p>
          </div>
        </div>        
      </div>
    </div>
  </section>
  <!--End Three Main Points -->
  
  <!--Testimonials -->
  <section id="testimonials" class="section bg-testimonial cover border-bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="headline">
            <h2>Testimonials</h2>
            <p>See what some industry stalwarts have to say about us</p>
          </div>
        </div>
      </div>  
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <!-- Start Testimonial Slider -->
          <div class="carousel slide carousel-mod" data-ride="carousel" id="testimonial">
            <div class="carousel-inner">
              <!-- Testimonial #1  -->
              <div class="item active">
                <div class="testimonial-inner">
                  <img src="app/views/users/img/testi.jpg" alt="" title="" /><!-- Testimonial Image  -->
                  <p> WATaTRIP can revolutionalise the airline industry in India </p><!-- Tesimonial  -->
                  <small>ABC Airlines</small><!-- Testimonial Author  -->
                </div>
              </div>
              <!-- End Testimonial #1  -->
              <div class="item">
                <div class="testimonial-inner">
                  <img src="app/views/users/img/testi.jpg" alt="" title="" /><!-- Testimonial Image  -->
                  <p>We are very happy to be associated with this new concept</p><!-- Tesimonial  -->
                  <small>XYZ Airlines </small><!-- Testimonial Author  -->
                </div>
              </div>        
              <div class="item">
                <div class="testimonial-inner">
                  <img src="app/views/users/img/testi.jpg" alt="" title="" /><!-- Testimonial Image  -->
                  <p>Flying empty seats is a crime! This is an excellent solution for the end user and the airline industry</p><!-- Tesimonial  -->
                  <small>Noted Consultant</small><!-- Testimonial Author  -->
                </div>
              </div>          
            </div>
            <!-- Testimonial Navigation  -->
            <ol class="carousel-indicators">
              <li data-target="#testimonial" data-slide-to="0" class="active"></li>
              <li data-target="#testimonial" data-slide-to="1"></li>
              <li data-target="#testimonial" data-slide-to="2"></li>
            </ol>
            <!-- End Testimonial Navigation  -->
          </div>
        </div>
      </div>
    </div>
  </section>
<!--   End Testimonials -->
  
  
  
  <!-- FAQ -->
  <section id="faq" class="section bg-grey  arrow-bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="headline">
            <h2>Frequently Asked Questions</h2>
            <p> Here are the answers!</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="faq-body"><!-- FAQ -->
            <i class="line-font blue icon-question"></i><!-- Question Mark Icon -->
            <h4> How soon will I come to know about my ticket confirmation? </h4><!-- Question -->
            <div class="answer"><!-- Answer -->
              <p>Ticket confirmation can happen anytime from your time of booking to upto 1 day prior to travel</p>
              <p>Constant updates on your ticket status will be sent to your mobile.</p>
            </div>
          </div><!-- End FAQ -->
          <div class="faq-body"><!-- FAQ -->
            <i class="line-font blue icon-question"></i><!-- Question Mark Icon -->
            <h4> Can I cancel a WAT?</h4><!-- Question -->
            <div class="answer"><!-- Answer -->
              <p>Yes you can cancel a WAT. </p>
              <p>A transaction charge of Rs. 49 will be levied on cancellations.</p>
            </div>
          </div><!-- End FAQ -->
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="faq-body"><!-- FAQ -->
            <i class="line-font blue icon-question"></i><!-- Question Mark Icon -->
            <h4>How will refund for unconfirmed tickets be processed?</h4><!-- Question -->
            <div class="answer"><!-- Answer -->
              <p><strong>Auto refund will be provided for unconfirmed tickets.</strong></p>
              <p> It is a completely hassle-free process, wherein the refund will automatically be credited in 3-5 working days without any action required on your front.</p>
            </div><!-- End FAQ -->
          </div>
          <div class="faq-body"><!-- FAQ -->
            <i class="line-font blue icon-question"></i><!-- Question Mark Icon -->
            <h4> Will the entire WAT price be refunded for unconfirmed tickets?</h4><!-- Question -->
            <div class="answer"><!-- Answer -->
              <p> Well, almost!  </p>
              <p> The entire WAT Price minus a transaction fee of Rs. 99 will be refunded incase of unconfirmed tickets </p>
            </div><!-- End FAQ -->
          </div>
        </div>
      </div>
    </div>
  </section>  
  <!-- End FAQ -->
    
  
  <!-- Footer Top -->
  <section class="footer footer-top" id="contact">
    <div class="container">
      <div class="row">
        <!-- Footer Intro  -->
        <div class="col-md-4">
          <h3>About Us</h3>
          <p>WATaTRIP brings forth a unique model of discounted waitlisted pricing which aims to make air travel available to the common masses.</p>
          
        </div>
        <!-- End Footer Intro  -->
        <!-- Contact Details  -->
        <div class="col-md-3">
          <div class="contact-info">
            <h3>Reach Us</h3>
            <ul class="contact-list">
              <li><i class="icon-directions"></i> DLF Phase 1, Gurgaon</li>
              <li><i class="icon-call-in"></i> 1800 180 1800</li>
              <li><i class="icon-envelope-open"></i><a href="mailto:contact@simplesphere.net.com">contact@watatrip.com</a></li>
            </ul>
          </div>
        </div>  
        <!-- End Contact Details  -->
        <!-- Quick Links -->
        <div class="col-md-2">        
          <h3>Quick Links</h3>
          <ul class="quick-links">
          
            <li><a href="#">Disclaimer</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
        <!-- End Quick links -->
        <!-- Social Links -->
        <div class="col-sm-3">
          <h3>Stay in Touch!</h3>
          <p>Follow us on our social networks!</p>
          <ul class="social">
            <li class="facebook"> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
            <li class="twitter"> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
            <li class="google-plus"> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
            <li class="linkedin"> <a href="#"> <i class="fa fa-linkedin"></i> </a> </li>
            <li class="youtube"> <a href="#"> <i class="fa fa-youtube-play"></i> </a> </li>
          </ul>
        </div>
        <!--End Social Links  -->
      </div>
    </div>
  </section>
  <!-- End Footer Top -->
  <!-- Footer Bottom -->  
  <footer class="footer footer-sub">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <p>&copy; WATaTRIP. All Rights Reserved</p>
        </div>
        
      </div>
    </div>
  </footer>
  <!-- End Footer Bottom -->


@stop
