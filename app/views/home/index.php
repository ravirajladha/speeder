<?php require APPROOT . '/views/inc_home/header.php'; ?>
 
<style>
  html,
body {
    height: 100%;
}

.carousel,
.item,
.active {
    height: 100%;
}

.carousel-inner {
  height: 100%;
  background: #000;
}

.carousel-caption{padding-bottom:80px;}

h2{font-size: 60px;}
p{padding:10px}

/* Background images are set within the HTML using inline CSS, not here */

.fill {
    width: 100%;
    height: 100%;
    background-position: center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    opacity:0.6;
}




/**
 * Button
 */
.btn-transparent {
  background: transparent;
  color: #fff;
  border: 2px solid #fff;
}
.btn-transparent:hover {
  background-color: #fff;
}

.btn-rounded {
  border-radius: 70px;
}

.btn-large {
  padding: 11px 45px;
  font-size: 18px;
}

/**
 * Change animation duration
 */
.animated {
  -webkit-animation-duration: 1.5s;
  animation-duration: 1.5s;
}

@-webkit-keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100px, 0, 0);
    transform: translate3d(100px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100px, 0, 0);
    transform: translate3d(100px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

.fadeInRight {
  -webkit-animation-name: fadeInRight;
  animation-name: fadeInRight;
}



</style>
  
  <!-- Full Page Image Background Carousel Header -->
  <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo URLROOT; ?>/assets_home/images/1.jpg');"></div>
                <div class="carousel-caption">
                     <h2 class="animated fadeInLeft">Speeder Couriers</h2>
                     <p class="animated fadeInUp">Delivering happiness across India</p>
                     
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo URLROOT; ?>/assets_home/images/2.jpg');"></div>
                <div class="carousel-caption">
                     <h2 class="animated fadeInDown">Speeder Couriers</h2>
                     <p class="animated fadeInUp">Delivering happiness across India</p>
                     
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo URLROOT; ?>/assets_home/images/3.jpg');"></div>
                <div class="carousel-caption">
                     <h2 class="animated fadeInRight">Speeder Couriers</h2>
                     <p class="animated fadeInRight">Delivering happiness across India</p>
                  
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </div>


  <!-- Main Body Content Start -->
  <main id="body-content" style="overflow-y: inherit;">

    <!-- Welcome To Cargo Start -->
    <section class="wide-tb-100 pt-0 bg-white home-welcome">
      <div class="container">
        <div class="row">

          <!-- Icon Box 7 -->
          <div class="col-md-3">   
           <div class="icon-box-7">
              <img src="<?php echo URLROOT; ?>/assets_home/images/icon-box-six-1.jpg" alt="">
              <h3 class="h3-xs txt-blue">Domestic<br> Services</h3>
              
            </div>
            <p class="text-center">The domestic package of services is designed for the customer's time-sensitive needs. It includes the basic services for handling deliveries in express and cargo mode in India.</p>
          </div>
          <!-- Icon Box 7 -->

          <!-- Icon Box 7 -->
          <div class="col-md-3"> 
             <div class="icon-box-7">
              <img src="<?php echo URLROOT; ?>/assets_home/images/icon-box-six-2.jpg" alt="">
              <h3 class="h3-xs txt-blue">International<br> Services</h3>
              
            </div>
            <p class="text-center">Our dynamic range of products/services makes us one of the preferred service providers in the international space for both inbound and outbound movement of shipments.</p>
          </div>
          <!-- Icon Box 7 -->

          <!-- Icon Box 7 -->
          <div class="col-md-3">   
            <div class="icon-box-7">
              <img src="<?php echo URLROOT; ?>/assets_home/images/icon-box-six-3.jpg" alt="">
              <h3 class="h3-xs txt-blue">Premium<br> Express</h3>
              
            </div>
            <p class="text-center">Premium Express Product assures delivery to metropolitan and major cities. This provision is custom-made for the seamless delivery of urgent consignments.</p>
          </div>
          <!-- Icon Box 7 -->

          <!-- Icon Box 7 -->
          <div class="col-md-3">   
            <div class="icon-box-7">
              <img src="<?php echo URLROOT; ?>/assets_home/images/icon-box-six-4.jpg" alt="">
              <h3 class="h3-xs txt-blue">Priority<br> Services</h3>
              
            </div>
            <p class="text-center">Realizing the need to cater to a very niche client base that includes large corporate clients, multi-nationals, financial institutes, and banking and insurance companies.</p>
          </div>
          <!-- Icon Box 7 -->

        </div>
      </div>
    </section>
    <!-- Welcome To Cargo End -->

    <!-- What Makes Us Special Start -->
    <section class="bg-light-gray wide-tb-100">
      <div class="container pos-rel">
        <div class="row">
          <div class="img-business-man">
            <img src="<?php echo URLROOT; ?>/assets_home/images/courier-man.png" alt="">
          </div>          
          <div class="col-md-12 ml-auto">
              <!-- Heading Main -->
              <div class=" wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                <h1 class="heading-main text-left mb-5">
                  <span>WHO WE ARE</span>
                  About Us
                </h1>
              </div>
              <!-- Heading Main -->

              <p class="lead fw-5 txt-blue">Speeder Couriers is a India's fastest growing brand in the courier & logistics world. The launch of Speeder Couriers is exclusively designed to meet the commercial and personal shipment needs of our customers in both urban and rural destinations. We are emerging as a top destination for ‘same-day’ transportation and are continuously serving our customers 24/7/365. We constantly expand our resources to cater to our customer expectation addressing their unique market needs. <br><br><br>
</p>
</div><div class="col-md-6 ml-auto" style="margin-top:100px">
              <div class="mt-5">
                <ul class="nav nav-pills theme-tabbing mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">About us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Our Vision</a>
                  </li>
                </ul>
                <div class="tab-content theme-tabbing" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <p>Speeder is targeting exclusively the service & price conscious customers as its operations module is designed to meet the customer's expectations without pinching their budget and service expectations. Our Company has grown into many folds with currently operating with multiple Regional Offices & 100+ Franchisee outlets all over India.</p><p>
We endeavour to become the front runner in the logistics business matching the clients’ needs. We connect the length and breadth of our country through our committed delivery machinery with emphasis to urban and rural markets. We believe in sustainable solutions, friendly business approach and efficient performance establishing us as a leader in the logistics service industry.</p>
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <p>We are a reliable service partner endeavouring to exceed customer expectations and building a long-term bonding with client by offering bespoke solutions to meet their business and personal goals. We believe in mutual growth and take necessary steps to understand the customer needs before offering a solution. Motivated to offer reliable delivery solutions, we have built a trusted delivery mechanism adhering to strict deadlines.</p>
                  </div>
                </div>
              </div>
          </div>
        </div>
        
      </div>
    </section>
    <!-- What Makes Us Special End -->

    <!-- Our Features Start -->
    <section class="bg-white wide-tb-100">
      <div class="container pos-rel">
        <div class="row">
          <!-- Heading Main -->
          <div class="col-sm-12">
            <h1 class="heading-main wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
              <span>Our Features</span>
              Our Services
            </h1>
            <p>Having created a brand in the cargo industry we have ventured into the courier business with the same commitment. We offer flexible and faster delivery solutions. We have spread our footprints far and wide with our bouquet of products and services. We deliver promptly for all your time critical projects.</p><br><br>
          </div>
          <!-- Heading Main -->

          
          <div class="col-12 col-lg-4">              
            <!-- Icon Box 2 -->
            <div class="icon-box-2 mb-4">
              <div class="media">
                  <div class="service-icon">
                      <i class="icofont-check-circled"></i>
                  </div>
                  <div class="service-inner-content media-body">
                      <h4 class="h4-md">INTERNATIONAL EXPRESS</h4>
                      <p>

This product deals with overseas shipments of both documents and parcels of non-commercial in nature. The transit time depends upon the country and shipment nature.
</p>
                  </div>
              </div>
            </div>              
            <!-- Icon Box -->
            <!-- Icon Box 2 -->
            <div class="icon-box-2">
              <div class="media">
                  <div class="service-icon">
                      <i class="icofont-check-circled"></i>
                  </div>
                  <div class="service-inner-content media-body">
                      <h4 class="h4-md">PREMIUM EXPRESS [ DOCUMENTS ]</h4>
                      <p>
This product deals with all kinds of documents of non commercial in nature like, envelopes, letters, cheques, printing materials etc. This mode ensures next day delivery in all major parts of India. Rest of the locations are delivered in 48 to 72 hour transit time.</p>
                  </div>
              </div>
            </div>              
            <!-- Icon Box -->
          </div>

          <div class="col-12 col-lg-4"> 
            <img src="<?php echo URLROOT; ?>/assets_home/images/truck_front.jpg" alt="">
          </div>

          <div class="col-12 col-lg-4">              
            <!-- Icon Box 2 -->
            <div class="icon-box-2 mb-4">
              <div class="media">
                  <div class="service-icon">
                      <i class="icofont-check-circled"></i>
                  </div>
                  <div class="service-inner-content media-body">
                      <h4 class="h4-md">PREMIUM EXPRESS [ NON DOCUMENTS ]</h4>
                      <p>
This product deals with all kinds of non-documents of non commercial in nature like, samples, gift items, service spares etc. This mode ensures next day delivery in all major parts of India. Rest of the locations are delivered in 48 to 72 hour transit time.</p>
                  </div>
              </div>
            </div>              
            <!-- Icon Box -->
            <!-- Icon Box 2 -->
            <div class="icon-box-2">
              <div class="media">
                  <div class="service-icon">
                      <i class="icofont-check-circled"></i>
                  </div>
                  <div class="service-inner-content media-body">
                      <h4 class="h4-md">BUSINESS EXPRESS</h4>
                      <p>
This product deals with bulk shipments of commercial in nature. This is a multi-module product that involves both air and surface network. The delivery happens in 24 to 96 hour transit time.</p>
                  </div>
              </div>
            </div>              
            <!-- Icon Box -->
          </div>
        </div>
        
      </div>
    </section>
    <!-- Our Features End -->


    <!-- Free Quote End -->



    <!-- Fun Facts Start -->
    <section class="bg-sky-blue wide-tb-100 pb-5">
      <div class="container pos-rel">
        <div class="contact-map-bg">
          <img src="<?php echo URLROOT; ?>/assets_home/images/map-bg.png" alt="">
        </div>
        <div class="row piecharts" id="pie-charts">
          <!-- Heading Main -->
          <div class="col-sm-12 wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
            <h1 class="heading-main">
              <span>Number We love</span>
              Our Fun Facts
            </h1>
          </div>
          <!-- Heading Main -->
          <div class="col-sm-4 col-lg-2 col-md-4 col-6">
              <span class="chart" data-percent="90">
                  <span class="percent"></span>
              </span>
              <div class="skill-name">Road Transport</div>
          </div>

          <div class="col-sm-4 col-lg-2 col-md-4 col-6">
              <span class="chart" data-percent="90">
                  <span class="percent"></span>
              </span>
              <div class="skill-name">Logistics</div>
          </div>

          <div class="col-sm-4 col-lg-2 col-md-4 col-6">
              <div class="chart" data-percent="95">
                  <span class="percent"></span>                                        
              </div>
              <div class="skill-name">Truck Rental</div>
          </div>

          <div class="col-sm-4 col-lg-2 col-md-4 col-6">
              <span class="chart" data-percent="66">
                  <span class="percent"></span>                                        
              </span>
              <div class="skill-name">Courier</div>
          </div>
          <div class="col-sm-4 col-lg-2 col-md-4 col-6">
              <span class="chart" data-percent="85">
                  <span class="percent"></span>                                        
              </span>
              <div class="skill-name">Air Transport</div>
          </div>
          <div class="col-sm-4 col-lg-2 col-md-4 col-6">
              <span class="chart" data-percent="86">
                  <span class="percent"></span>                                        
              </span>
              <div class="skill-name">Support</div>
          </div>
      </div>
    </section>
    <!-- Fun Facts End -->

    <!-- Client Reviews Start -->
    <section class="wide-tb-100 mb-spacer-md">
      <div class="container">
        <div class="row">
            <!-- Heading Main -->
            <div class="col-sm-12 wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
              <h1 class="heading-main">
                <span>What Our</span>
                Customers Saying
              </h1>
            </div>
            <!-- Heading Main -->
            <div class="col-sm-12">
              <div class="owl-carousel owl-theme" id="home-client-testimonials">

                <!-- Client Testimonials Slider Item -->
                <div class="item">
                  <div class="client-testimonial bg-wave">
                    <div class="media">
                        <div class="client-testimonial-icon rounded-circle bg-navy-blue">
                            
                        </div>
                        <div class="client-inner-content media-body">
                            <p>
Thank you for your help and quick delivery which enable our customer to meet his deadline – excellent service. </p>
                            <footer class="blockquote-footer"><cite title="Source Title">Balanithya</cite></footer>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Client Testimonials Slider Item -->

                <!-- Client Testimonials Slider Item -->
                <div class="item">
                  <div class="client-testimonial bg-wave">
                    <div class="media">
                        <div class="client-testimonial-icon rounded-circle bg-navy-blue">
                          
                        </div>
                        <div class="client-inner-content media-body">
                            <p>This is best place for domestic and international Cargo logistics in my experience. </p>
                            <footer class="blockquote-footer"><cite title="Source Title">Pradeep  </cite></footer>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Client Testimonials Slider Item -->

              

              </div>
            </div>
        </div>
      </div>        
    </section>
    <!-- Client Reviews End -->

   



    <!-- Clients Start -->
    <section class="wide-tb-100 bg-fixed clients-bg pos-rel">
      <div class="bg-overlay blue opacity-80"></div>
      <div class="container">
        <div class="row">
            <!-- Heading Main -->
            <div class="col-sm-12 wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
              <h1 class="heading-main">
                <span>SOME OF OUR</span>
                Clients
              </h1>
            </div>
            <!-- Heading Main -->

            <div class="col-sm-12 wow fadeInUp" data-wow-duration="0" data-wow-delay="0.2s">
              <div class="owl-carousel owl-theme" id="home-clients">

                <!-- Client Logo -->
                <div class="item">
                  <img src="<?php echo URLROOT; ?>/assets_home/images/clients/client1.png" alt="">
                </div>
                <!-- Client Logo -->

                <!-- Client Logo -->
                <div class="item">
                  <img src="<?php echo URLROOT; ?>/assets_home/images/clients/client2.png" alt="">
                </div>
                <!-- Client Logo -->

                <!-- Client Logo -->
                <div class="item">
                  <img src="<?php echo URLROOT; ?>/assets_home/images/clients/client3.png" alt="">
                </div>
                <!-- Client Logo -->

                <!-- Client Logo -->
                <div class="item">
                  <img src="<?php echo URLROOT; ?>/assets_home/images/clients/client4.png" alt="">
                </div>
                <!-- Client Logo -->

                <!-- Client Logo -->
                <div class="item">
                  <img src="<?php echo URLROOT; ?>/assets_home/images/clients/client5.png" alt="">
                </div>
                <!-- Client Logo -->

                <!-- Client Logo -->
                <div class="item">
                  <img src="<?php echo URLROOT; ?>/assets_home/images/clients/client6.png" alt="">
                </div>
                <!-- Client Logo -->

              </div>
            </div>
        </div>
      </div>        
    </section>
    <!-- Clients End -->


    </main>
    
    <?php require APPROOT . '/views/inc_home/footer.php'; ?>