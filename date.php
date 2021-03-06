<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom-css-hotel.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="bootstrap-overrides">
 
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="media/images/logo.png">
      </a>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li> <!-- class="active" -->
            <a href="#">Home</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Hotel
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">
                Awards
              </li>
              <li>
                <a href="#">Gallery</a>
              </li>
              <li>
                <a href="#">Video</a>
              </li>
              <li>
                <a href="#">Sister Hotels</a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Rooms
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">
                Rooms And Suites
              </li>
              <li>
                <a href="#">Double Suite</a>
              </li>
              <li>
                <a href="#">LakeSide Suite</a>
              </li>
              <li>
                <a href="#">Suites</a>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </div> <!-- End oc class Container -->
  </nav>  <!-- End of nav -->

	
	

	<div id="mega-slider" class="carousel slide " data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#mega-slider" data-slide-to="0" class="active"></li>
        <li data-target="#mega-slider" data-slide-to="1"></li>
        <li data-target="#mega-slider" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active beactive">
          <img src="media/images/slide-2.png" alt="...">
          <div class="carousel-caption">
            <img src="images/stars.png" alt="">
            <h2>Welcome to Mega Hotel</h2>
            <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
          </div>
        </div>
        <div class="item">
          <img src="media/images/slide-4.png" alt="...">
          <div class="carousel-caption">
            <img src="images/stars.png" alt="">
            <h2>Feel Like Your Home</h2>
            <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
          </div>
        </div>
        <div class="item">
          <img src="media/images/slide-3.png" alt="...">
          <div class="carousel-caption">
            <img src="images/stars.png" alt="">
            <h2>Perfect Place for Dining</h2>
            <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
      </a>
      <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
      </a>
    </div><!-- end carousel -->

    <div class="custom-date">

		<div class="pick-dates">
			<h2>Search Rooms</h2>
			<span class="mg-bn-big">For rates & availability</span>

			<form>
		    <div class="row">
		      <div class="col-md-3 col-xs-6">
		        <div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				  <input type="text" class="form-control datepicker" placeholder="Check In" aria-describedby="basic-addon1"  aria-describedby="sizing-addon3">
				</div>
		      </div>
		      <div class="col-md-3 col-xs-6">
		        <div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				  <input type="text" class="form-control datepicker" placeholder="Check Out" aria-describedby="basic-addon1"  aria-describedby="sizing-addon3">
				</div>
		      </div>
		      <div class="col-md-3">
		        <div class="row">
		          <div class="col-xs-6">
		            <select class="cs-select cs-skin-elastic">
		              <option value="" disabled selected>Adult</option>
		              <option value="1">1</option>
		              <option value="2">2</option>
		              <option value="3">3</option>
		              <option value="4">4</option>
		            </select>
		          </div>
		          <div class="col-xs-6">
		            <select class="cs-select cs-skin-elastic">
		              <option value="" disabled selected>Child</option>
		              <option value="0">0</option>
		              <option value="1">1</option>
		              <option value="2">2</option>
		              <option value="3">3</option>
		            </select>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-3">
		        <button id="check" type="submit" class="btn btn-color btn-main btn-block">Check Now</button>
		      </div>
		    </div>
		    </form>
		</div>

	</div>
  </div><!-- date timer picker -->

  <div class="mg-best-rooms"> <!-- Rooms selection -->
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
		  <div class="mg-sec-title">
			<h2>Our Best Rooms</h2>
			<p>These best rooms chosen by our customers</p>
		  </div>
		  <div class="row">
			<div class="col-sm-4">
			  <figure class="mg-room">
			    <img src="media/images/gallery-07.png" alt="img11" class="img-responsive">
			   <figcaption>
				<h2>Super Deluxe</h2>
				<div class="mg-room-rating"><i class="fa fa-star"></i> 5.00</div>
				<div class="mg-room-price">$249<sup>.99/Night</sup></div>
				<p>adversantur probatum iudicante indicaverunt repugnantibus.</p>
				<a href="#" class="btn btn-link">View Details <i class="fa fa-angle-double-right"></i></a>
				<a href="#" class="btn btn-main">Book</a>
			    </figcaption>			
			   </figure>
			</div>
			<div class="col-sm-4">
			<figure class="mg-room">
				<img src="media/images/gallery-06.png" alt="img11" class="img-responsive">
				<figcaption>
					<h2>Super Deluxe</h2>
					<div class="mg-room-rating"><i class="fa fa-star"></i> 5.00</div>
					<div class="mg-room-price">$249<sup>.99/Night</sup></div>
					<p>adversantur probatum iudicante indicaverunt repugnantibus.</p>
					<a href="#" class="btn btn-link">View Details <i class="fa fa-angle-double-right"></i></a>
					<a href="#" class="btn btn-main">Book</a>
				</figcaption>			
			</figure>
			</div>
			<div class="col-sm-4">
				<figure class="mg-room">
				<img src="media/images/gallery-05.png" alt="img11" class="img-responsive">
				<figcaption>
					<h2>Super Deluxe</h2>
					<div class="mg-room-rating"><i class="fa fa-star"></i> 5.00</div>
					<div class="mg-room-price">$249<sup>.99/Night</sup></div>
					<p>adversantur probatum iudicante indicaverunt repugnantibus.</p>
					<a href="#" class="btn btn-link">View Details <i class="fa fa-angle-double-right"></i></a>
					<a href="#" class="btn btn-main">Book</a>
				</figcaption>			
				</figure>
			</div>
				</div>
			</div>
		</div>
	</div>
</div>


    
    <footer class="navbar navbar-inverse ">
      <div class="mg-footer-widget">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="widget">
                <h2 class="mg-widget-title">Contact US</h2>
                <address>
                  <strong>Envato</strong><br>
                  Level 13, 2 Elizabeth St, Melbourne<br>
                  Victoria 3000 Australia
                </address>
        
                <p>
                  +000-123-456-789<br>
                  +000-123-456-789
                </p>
        
                <p>
                  <a href="Darren.M.Moriarty@students.ittralee.ie">Darren.M.Moriarty@students.ittralee.ie</a>
                </p>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="widget">
                <h2 class="mg-widget-title">Instagram</h2>
                <ul class="mg-instagram">
                  <li>
                    <a href="#">
                      <img src="media/images/ins-01.png" alt="">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="media/images/ins-02.png" alt="">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="media/images/ins-03.png" alt="">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="media/images/ins-04.png" alt="">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="media/images/ins-05.png" alt="">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="media/images/ins-06.png" alt="">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="media/images/ins-07.png" alt="">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="media/images/ins-08.png" alt="">
                    </a>
                  </li>
                  <li>
                    <a href="#"><img src="media/images/ins-09.png" alt="">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="widget">
                <h2 class="mg-widget-title">Newsletter</h2>
                <p>Inbecilloque elegans errorem concedo coniuncta arare dicant etsi electram minimum.</p>
                <form>
                  <p>
                    <input type="email" class="form-control" placeholder="Your Email">
                  </p>
                  <input type="submit" class="btn btn-main" value="Subscribe">
                </form>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="widget">
                <h2 class="mg-widget-title">Social Media</h2>
                <p>Tibi alienus possimus nomini legendus pariatur, logikh assidua philosophis expectat occultarum accedit suscipit interrogari difficilius reddidisti.</p>
                <ul class="mg-footer-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mg-copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="mg-footer-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Rooms</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
            <div class="col-md-6">
              <p>&copy; 2016 <a href="#">Darren Moriarty</a>. All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>



    
      
      
      



 
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>