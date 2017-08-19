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

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/custom-css-hotel.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
    <script type="text/javascript">
      $(document).ready(function() {
    var showChar = 170;  
    var ellipsestext = "...";
    var moretext = "read more";
    var lesstext = "Show less";


    $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

      $(".morelink").click(function(){
          if($(this).hasClass("less")) {
              $(this).removeClass("less");
              $(this).html(moretext);
          } else {
              $(this).addClass("less");
              $(this).html(lesstext);
          }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
          });
      });
    </script>

    <?php

        session_start();

        $_SESSION['occupancy'] = $_POST['occupancy'];
        $_SESSION['smoking'] = $_POST['smoking'];
        $_SESSION['checkInDate'] = $_POST['checkInDate'];
        $_SESSION['checkOutDate'] = $_POST['checkOutDate'];
        

    ?>


</head>
<body id="bootstrap-overrides">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../hotel.php">
        <img src="../media/images/logo-2.png">
      </a>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li> <!-- class="active" -->
            <a class="nava" href="#">Home</a>
          </li>
          <li class="dropdown">
            <a class="nava" href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                <a href="customerSearch.php">Customer Search</a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle nava" data-toggle="dropdown">
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

  <div class="container">

    <div class="available-rooms">
      <div class="available-rooms-header">
        <img src="../media/images/room1.jpg">
        <!-- http://fe.avvio.com/convert/site/Gresham%20Dublin/en/results.php?checkin=2016-11-7&nights=1&currency=EUR&_ga=1.228901020.1422830983.1478549255 -->
        <h1>Best Available Rate Room Only</h1>
        <span>Taxes Included, </span>
        <span>Free Wi-Fi, </span>
        <span>No Deposit</span>
        <p class="more">
          Stay in one of Dublin's most iconic hotels on a Room Only baisis. Complimentary Wi-Fi is available on all devices. Right in the heart of the city and so close
           to all shopping and business districts. LUAS (tram) line close-by and easy access to and from Dublin Airport. Close to Croke Park, Three Arena and Convention Centre (CCD)
        </p>
        <button class="btn show btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Show Rooms
        </button>
        <div class="collapse" id="collapseExample">
          <div class="available-rooms-container">

        <?php

        $checkInDate = $_POST['checkInDate'];
        $checkOutDate = $_POST['checkOutDate'];

        $dbcnx = mysqli_connect("localhost", "root", "", "hotel");

        if (mysqli_connect_errno($dbcnx )) {

           echo "Failed to connect to MySQL: " .mysqli_connect_error();
           exit();

        }else {


        if(isset($_POST['smoking'])){
          $_SESSION['smoking'] = $_POST['smoking'];
          $Smoking = $_POST['smoking'];
        }else{
          $_SESSION['smoking'] = '';
          $Smoking = $_POST['smoking'];
        }


          // if nothing was selected show all te rooms
          if($Smoking == ""){
            $sql = "SELECT DISTINCT room.*
                  FROM room
                  LEFT JOIN bookingsroom
                  ON bookingsroom.roomId = room.roomid
                  LEFT JOIN booking
                  ON booking.bookingId = bookingsroom.bookingId
                  WHERE room.roomId NOT IN (
                      SELECT room.roomid
                      FROM room
                      LEFT JOIN bookingsroom
                      ON bookingsroom.roomId = room.roomid
                      LEFT JOIN booking
                      ON booking.bookingId = bookingsroom.bookingId
                      WHERE '$checkInDate' BETWEEN booking.checkindate AND booking.checkoutdate
                      OR '$checkOutDate' BETWEEN booking.checkindate AND booking.checkoutdate
                      or booking.checkindate BETWEEN '$checkInDate' AND '$checkOutDate'  
                      or booking.checkoutdate BETWEEN '$checkInDate' AND '$checkOutDate'  
                      )
                  AND breakfast = 0
                  ORDER BY roomprice";

                }else{

                  // if Yes or no was selected
                  $sql = "SELECT DISTINCT room.*
                  FROM room
                  LEFT JOIN bookingsroom
                  ON bookingsroom.roomId = room.roomid
                  LEFT JOIN booking
                  ON booking.bookingId = bookingsroom.bookingId
                  WHERE room.roomId NOT IN (
                      SELECT room.roomid
                      FROM room
                      LEFT JOIN bookingsroom
                      ON bookingsroom.roomId = room.roomid
                      LEFT JOIN booking
                      ON booking.bookingId = bookingsroom.bookingId
                      WHERE '$checkInDate' BETWEEN booking.checkindate AND booking.checkoutdate
                      OR '$checkOutDate' BETWEEN booking.checkindate AND booking.checkoutdate
                      or booking.checkindate BETWEEN '$checkInDate' AND '$checkOutDate'  
                      or booking.checkoutdate BETWEEN '$checkInDate' AND '$checkOutDate'  
                      )
                  AND breakfast = 0
                  AND smoking = '$Smoking'
                  ORDER BY roomprice";
                }



          


          
          $res = mysqli_query($dbcnx, $sql);

          if ( !$res ){
            echo('Query failed ' . $sql . ' Error:' . mysqli_error());
            exit();
          }else {
             if(mysqli_num_rows($res)< 1){
             //there are no rooms
                echo "<p><em> No rooms available between these dates</em></p>";
                //exit();  

              }else {
                echo '<form method="GET" action="payment-form.php">';
                
                while ( $row = mysqli_fetch_array($res) ) {
                    echo '<div class="available-rooms-selections">';
                    $pictures = $row['pictpaths'];
                    echo "<img src='$pictures'>";
                    echo '<div class="surround">';
                    $_SESSION['roomid'] = $row['roomid'];
                    echo "<span>" . $row['roomtype'] . "</span><br>";
                    echo '<i class="occicon adultocctiny fa fa-male"></i>';
                    echo '<i class="occicon adultocctiny fa fa-female"></i>';
                    if ($row['smoking'] == 'Y') {
                      echo "Smoking<br>";
                    }
                    echo '<span class="avail-span">Available</span>';
                    echo '</div>';
                    $desc = $row['description'];
                    echo "<div data-toggle='tooltip' data-placement='left' title='$desc' class='available-rooms-selections-price'>";
                    echo "<span>&euro;" . $row['roomprice'] . "</span>";
                    $roomid=$row['roomid'];
                    $cost = $row['roomprice'];

                    echo "<a href='payment-form.php?roomid=$roomid&cost=$cost'><div class=\"bookButton\"><span class='middle'>Book Now<span></div></a>";
                    
                     echo '</div>';
                    echo '</div>'; //End Available rooms selection 

                }

                echo '</form>';

             }
          }
        }
        //free results
        mysqli_free_result($res);
        mysqli_close($dbcnx);
?>

      </div><!-- End Available rooms-container -->
      </div><!-- End Collapse -->
    </div><!-- End Available rooms Header -->

    </div><!-- End Available Rooms -->

    <div class="available-rooms with-breakfast">
      <div class="available-rooms-header">
        <img src="../media/images/breakfast.jpg">
        <!-- http://fe.avvio.com/convert/site/Gresham%20Dublin/en/results.php?checkin=2016-11-7&nights=1&currency=EUR&_ga=1.228901020.1422830983.1478549255 -->
        <h2>Accommodation with Breakfast</h2>
        <span>Taxes Included, </span>
        <span>Free Wi-Fi, </span>
        <span>No Deposit, </span>
        <span>Breakfast included</span>
        <p class="more">
          Treat yourself to a stay with us which includes our renowned Full Buffet Breakfast. Complimentary Wi-Fi on all devices. Very close to all shopping and business districts. LUAS (tram) line close-by and easy access to and from Dublin Airport. Close to Croke Park, Three Arena and Convention Centre
        </p>
        <button class="btn show btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
          Show Rooms
        </button>
        <div class="collapse" id="collapseExample2">
        <div class="available-rooms-container">

        <?php

        $checkInDate = $_POST['checkInDate'];
        $checkOutDate = $_POST['checkOutDate'];

        $dbcnx = mysqli_connect("localhost", "root", "", "hotel");

        if (mysqli_connect_errno($dbcnx )) {

           echo "Failed to connect to MySQL: " .mysqli_connect_error();
           exit();

        }else {


        if(isset($_POST['smoking'])){
          $_SESSION['smoking'] = $_POST['smoking'];
          $Smoking = $_POST['smoking'];
        }else{
          $_SESSION['smoking'] = '';
          $Smoking = $_POST['smoking'];
        }


          // if nothing was selected show all te rooms
          if($Smoking == ""){
            $sql = "SELECT DISTINCT room.*
                    FROM room
                    LEFT JOIN bookingsroom
                    ON bookingsroom.roomId = room.roomid
                    LEFT JOIN booking
                    ON booking.bookingId = bookingsroom.bookingId
                    WHERE room.roomId NOT IN (
                        SELECT room.roomid
                        FROM room
                        LEFT JOIN bookingsroom
                        ON bookingsroom.roomId = room.roomid
                        LEFT JOIN booking
                        ON booking.bookingId = bookingsroom.bookingId
                        WHERE '$checkInDate' BETWEEN booking.checkindate AND booking.checkoutdate
                        OR '$checkOutDate' BETWEEN booking.checkindate AND booking.checkoutdate
                        or booking.checkindate BETWEEN '$checkInDate' AND '$checkOutDate'  
                        or booking.checkoutdate BETWEEN '$checkInDate' AND '$checkOutDate'  
                        )
                    AND breakfast = 1
                    ORDER BY roomprice";

                }else{

                  // if Yes or no was selected
                  $sql = "SELECT DISTINCT room.*
                          FROM room
                          LEFT JOIN bookingsroom
                          ON bookingsroom.roomId = room.roomid
                          LEFT JOIN booking
                          ON booking.bookingId = bookingsroom.bookingId
                          WHERE room.roomId NOT IN (
                              SELECT room.roomid
                              FROM room
                              LEFT JOIN bookingsroom
                              ON bookingsroom.roomId = room.roomid
                              LEFT JOIN booking
                              ON booking.bookingId = bookingsroom.bookingId
                              WHERE '$checkInDate' BETWEEN booking.checkindate AND booking.checkoutdate
                              OR '$checkOutDate' BETWEEN booking.checkindate AND booking.checkoutdate
                              or booking.checkindate BETWEEN '$checkInDate' AND '$checkOutDate'  
                              or booking.checkoutdate BETWEEN '$checkInDate' AND '$checkOutDate'  
                              )
                          AND breakfast = 1
                          AND smoking = '$Smoking'
                          ORDER BY roomprice";
                }



          


          
          $res = mysqli_query($dbcnx, $sql);

          if ( !$res ){
            echo('Query failed ' . $sql . ' Error:' . mysqli_error());
            exit();
          }else {
             if(mysqli_num_rows($res)< 1){
             //there are no rooms
                echo "<p><em> No rooms available between these dates</em></p>";
                //exit();  
              }else {
                echo '<form method="GET" action="payment-form.php">';
                
                while ( $row = mysqli_fetch_array($res) ) {
                    echo '<div class="available-rooms-selections">';
                    $pictures = $row['pictpaths'];
                    echo "<img src='$pictures'>";
                    echo '<div class="surround">';
                    // echo '<input type="hidden" disabled name="lblroomID">' . $row['roomid'] . '</label>';
                    $_SESSION['roomid'] = $row['roomid'];
                    echo "<span>" . $row['roomtype'] . "</span><br>";
                    echo '<i class="occicon adultocctiny fa fa-male"></i>';
                    echo '<i class="occicon adultocctiny fa fa-female"></i>';
                    if ($row['smoking'] == 'Y') {
                      echo "Smoking<br>";
                    }
                    echo '<span class="avail-span">Available</span>';
                    echo '</div>';
                    $desc = $row['description'];
                    echo "<div data-toggle='tooltip' data-placement='left' title='$desc' class='available-rooms-selections-price'>";
                    echo "<span>&euro;" . $row['roomprice'] . "</span>";
                    $roomid=$row['roomid'];
                    $cost = $row['roomprice'];

                    echo "<a href='payment-form.php?roomid=$roomid&cost=$cost'><div class=\"bookButton\"><span class='middle'>Book Now<span></div></a>";
                    
                     echo '</div>';
                    echo '</div>'; //End Available rooms selection 

                }

                echo '</form>';

             }
          }
        }
        //free results
        mysqli_free_result($res);
        mysqli_close($dbcnx);
?>


        </div><!-- End Available rooms-container -->
        </div><!-- End Collapse 2-->

      </div><!-- end of available-rooms-header -->
    </div><!-- End Available Rooms with breakfast -->



    </div><!-- End of Container -->



    <footer class="navbar navbar-inverse ">
      <div class="mg-footer-widget">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div style="color: #fff;" class="widget">
                <h2 class="mg-widget-title">Contact US</h2>
                <address>
                  <strong>Darren Moriarty</strong><br>
                  IT Tralee,<br>
                  Co,Kerry Ireland
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
              <div style="color: #fff;" class="widget">
                <h2 class="mg-widget-title">Instagram</h2>
                <ul class="mg-instagram">
                  <li>
                    <a href="#">
                      <img src="../media/images/ins-01.png" alt="">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div style="color: #fff;" class="widget">
                <h2 class="mg-widget-title">Newsletter</h2>
                <p>To subscribe to our weekly newsletter please enter your email below</p>
                <form>
                  <p>
                    <input type="email" class="form-control" placeholder="Your Email">
                  </p>
                  <input type="submit" class="btn btn-main" value="Subscribe">
                </form>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div style="color: #fff;" class="widget">
                <h2 class="mg-widget-title">Social Media</h2>
                <p>To view our social media for current news, events and offers, visit the our pages with the icons below</p>
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
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<!-- <div class="available-rooms-selections">
          <img src="../media/images/college.jpg">
          <div class="surround">
            <span>Standard Twin</span><br>
            <i class="occicon adultocctiny fa fa-male"></i>
            <i class="occicon adultocctiny fa fa-female"></i><br>
            <span class="avail-span">Available</span>
          </div>
            <div class="available-rooms-selections-price">
              <span>&euro;104.00</span>
              <button type="submit" class="btn btn-default">
                Book Now
              </button>
            </div>
        </div>

        <div class="available-rooms-selections">
          <img src="../media/images/small.jpg">
          <div class="surround">
            <span>Standard Studio</span><br>
            <i class="occicon adultocctiny fa fa-male"></i>
            <i class="occicon adultocctiny fa fa-female"></i><br>
            <span class="avail-span">Available</span>
          </div>
            <div class="available-rooms-selections-price">
              <span>&euro;104.00</span>
              <button type="submit" class="btn btn-default">
                Book Now
              </button>
            </div>
        </div>

        <div class="available-rooms-selections">
          <img src="../media/images/small.jpg">
          <div class="surround">
            <span>Lavery Double</span><br>
            <i class="occicon adultocctiny fa fa-male"></i>
            <i class="occicon adultocctiny fa fa-female"></i><br>
            <span class="avail-span">Available</span>
          </div>
            <div class="available-rooms-selections-price">
              <span>&euro;104.00</span>
              <button type="submit" class="btn btn-default">
                Book Now
              </button>
            </div>
        </div> -->
