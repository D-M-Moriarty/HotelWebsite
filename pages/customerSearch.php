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
            <a href="../hotel.php">Home</a>
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
  </nav>  
  <!-- End of nav -->

 

  <div class="white-background">
    
  </div>

  <div class="custom-date lower-mg-top">
    	<div class="container">



        <div class="row white-background">
          <div class="col-md-6">
            <form class="form-width" action="" method="POST" action="customerSearch.php">
            
            <p>
              <h1>Search Bookings</h1>
                Fields marked ( * ) are mandatory.</p>

            <button id="sign-in" type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sign in
            </button>

            <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="Title">
                Title
                <span>*</span>
              </label>
              <input name="title" type="text" class="form-control datepicker" id="title" placeholder="Title">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="FirstName">
                FirstName
                <span>*</span>
              </label>
              <input name="firstname" type="text" class="form-control" id="FirstName" placeholder="First Name">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="Surname">
                Surname
                <span>*</span>
              </label>
              <input name="surname" type="text" class="form-control" id="Surname" placeholder="Surname">
            </div>
          </div>
            </div>

            <button value="Submit" name="submit" type="submit" class="btn btn-default">Submit</button>


          <!-- The search Heading -->
          <div class='row SearchHeading'>
            <div class='col-md-3'>Customer Id</div>
            <div class='col-md-2'>Firstname</div>
            <div class='col-md-3'>Surname</div>
            <div class='col-md-4'>Email</div>             
          </div>

          <div class="scrollable">
          
            <?php 

            //session_start();

          if (isset($_POST['submit'])) {
            # code...
          

          


          //$dbcnx = mysqli_connect("eu-cdbr-azure-west-d.cloudapp.net", "bcfb6c448ab634", "fd0e93c4", "hotel");
          $dbcnx = mysqli_connect("localhost", "root", "", "hotel");
          if (mysqli_connect_errno($dbcnx )) {
             echo "Failed to connect to MySQL: " .mysqli_connect_error();
             exit();
          }else {

            $firstname = mysqli_real_escape_string($dbcnx ,$_POST['firstname']);
            $title = mysqli_real_escape_string($dbcnx ,$_POST['title']);
            $surname = mysqli_real_escape_string($dbcnx ,$_POST['surname']);

            // Customer query
            $sql = "SELECT *
                    FROM customer
                    WHERE firstname LIKE '%$firstname%'
                    AND title LIKE '%$title%'
                    AND surname LIKE '%$surname%'";

            //SELECT * from room WHERE breakfast = 1 AND $_POST['dateFrom'] ORDER BY roomprice"; // TODO: Filters
            $res = mysqli_query($dbcnx, $sql);
            if ( !$res ){
              echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
              exit();
            }else {
               if(mysqli_num_rows($res)< 1){
               //there are no rooms
                  echo "<p><em>No Records with that name</em></p>";
                  //exit();  
                }else {

                    
                      while ($row = mysqli_fetch_array($res)) {

                        $customerId = $row['customerId'];

                        $_SESSION['updateID'] = $row['customerId'];

                        $title = stripcslashes($row['title']);
                        $firstname = stripcslashes($row ['firstname']);
                        $surname = stripcslashes($row['surname']);
                        $email = stripcslashes($row['email']);
                        $phone = stripcslashes($row['phone']);
                        $address = stripcslashes($row['address']);
                        $city = stripcslashes($row['city']);
                        $postcode = stripcslashes($row['postcode']);
                        $county = stripcslashes($row['county']);
                        $country = stripcslashes($row['country']);


                        
                      
                      echo "<div class='searchQuery'>";
                        echo "<a href='customerSearch.php?id=$customerId'><div class='row'>";
                          echo "<div class='col-md-3'>".$row['customerId']."</div>";
                          echo "<div class='col-md-2'>".stripcslashes($row['firstname'])."</div>";
                          echo "<div class='col-md-3'>".stripcslashes($row['surname'])."</div>";
                          echo "<div class='col-md-4'>".stripcslashes($row['email'])."</div>";
                        echo "</div></a>";
                      echo "</div>";


                      } 
                      

                    //echo("<p>". $row['custid']. ' '. stripslashes($row['name']). ' '. $row['address'] .  ' ' . "</p>");
                  }
               
            }
          }
          //free results
          mysqli_free_result($res);
          mysqli_close($dbcnx);

        }



        ?>
        </div><!-- End of scrollable -->

        </form>
       </div>

          

<!-- The seperation of forms -->

          <div class="col-md-6">
              <form class="form-width  formRight" action="" method="POST" name="UpdateForm.php">

              <?php

                $custid = "";
                $title = "";
                $firstname = "";
                $surname = "";
                $email = "";
                $phone = "";
                $address = "";
                $city = "";
                $postcode = "";
                $county = "";
                $country = "";

                if (isset($_GET["id"])) {

                  $custid = $_GET["id"];

                  $dbcnx = mysqli_connect("eu-cdbr-azure-west-d.cloudapp.net", "bcfb6c448ab634", "fd0e93c4", "hotel");
          if (mysqli_connect_errno($dbcnx )) {
             echo "Failed to connect to MySQL: " .mysqli_connect_error();
             exit();
          }else {

            // trying to nest the query to find rooms not booked above
            $sql = "SELECT *
                    FROM customer
                    WHERE customer.customerId = $custid";

            $res = mysqli_query($dbcnx, $sql);
            if ( !$res ){
              echo('Query failed ' . $sql . ' Error:' . mysqli_error());
              exit();
            }else {
               if(mysqli_num_rows($res)< 1){
               //there are no rooms
                  //echo "<p><em> No Records with that name Query two</em></p>";

                  //exit();  

                }else {

                    
                      while ($row = mysqli_fetch_array($res)) {

                        $customerId = $row['customerId'];

                        $_SESSION['updateID'] = $row['customerId'];

                        $title = stripcslashes($row ['title']);
                        $firstname = stripcslashes($row ['firstname']);
                        $surname = stripcslashes($row['surname']);
                        $email = stripcslashes($row['email']);
                        $phone = stripcslashes($row['phone']);
                        $address = stripcslashes($row['address']);
                        $city = stripcslashes($row['city']);
                        $postcode = stripcslashes($row['postcode']);
                        $county = stripcslashes($row['county']);
                        $country = stripcslashes($row['country']);


                      } 
                   
                      

                  }
               
            }
          }
          //free results
          mysqli_free_result($res);
          mysqli_close($dbcnx);

        }
                
              ?>


            <p>
              <h1>Manage Bookings</h1>
                Fields marked ( * ) are mandatory.</p>


            <div class="row">
            <input type="hidden" name="customer_id" value="<?php echo $custid; ?>">
          <div class="col-md-2">
            <div class="form-group">
              <label for="Title">
                Title
                <span>*</span>
              </label>
              <input value="<?php echo $title; ?>" id="disabledInput" name="updatedTitle" type="text" class="form-control datepicker" id="title" placeholder="Title">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="FirstName">
                FirstName
                <span>*</span>
              </label>
              <input value="<?php echo $firstname ?>"  id="disabledInput" name="updatedFirstname" type="text" class="form-control" id="FirstName" placeholder="First Name">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="Surname">
                Surname
                <span>*</span>
              </label>
              <input value="<?php echo $surname; ?>"  id="disabledInput" name="updatedSurname" type="text" class="form-control" id="Surname" placeholder="Surname">
            </div>
          </div>
            </div>
            <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              <label for="Email">
                Email address
                <span>*</span>
              </label>
              <input value="<?php echo $email; ?>"  id="disabledInput" name="updatedEmail" type="email" class="form-control" id="Email" placeholder="Email" >
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="phoneNumber">
                Phone Number
                <span>*</span>
              </label>
              <input value="<?php echo $phone; ?>"  id="disabledInput" name="updatedPhone" type="text" class="form-control" id="phoneNumber" placeholder="Phone Number" >
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="address">
                  Address
                  <span>*</span>
                </label>
                <input value="<?php echo $address; ?>"  id="disabledInput" name="updatedAddress" type="text" class="form-control" id="address" placeholder="Address" >
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="exampleInputPassword1">
                  City
                  <span>*</span>
                </label>
                <input value="<?php echo $city; ?>"  id="disabledInput" name="updatedCity" type="text" class="form-control" id="city" placeholder="City" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="postcode">
                  Postcode
                </label>
                <input value="<?php echo $postcode; ?>"  id="disabledInput" name="updatedPostcode" type="text" class="form-control" id="postcode" placeholder="Postcode" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="county">
                  County
                </label>
                <input value="<?php echo $county; ?>"  id="disabledInput" name="updatedCounty" type="text" class="form-control" id="county" placeholder="County" >
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="country">
                  Country
                  <span>*</span>
                </label>
                  
              </div>
            </div>
          </div>
    
            <?php 

            //session_start();


            // If the Update Button is pressed
            if (isset($_POST['update'])) {
             
            
                $dbcnx = mysqli_connect("eu-cdbr-azure-west-d.cloudapp.net", "bcfb6c448ab634", "fd0e93c4", "hotel");

                if (mysqli_connect_errno($dbcnx)) {
                  echo "Failed to connect to Mysql: " . mysqli_connect_error();
                  exit();
                }

                

               
            if (isset($_GET['id'])) {
                  $updateID = $_GET['id'];

                  $updatedTitle = mysqli_real_escape_string($dbcnx ,$_POST['updatedTitle']);
                  $updatedFirstname = mysqli_real_escape_string($dbcnx ,$_POST['updatedFirstname']);
                  $updatedSurname = mysqli_real_escape_string($dbcnx ,$_POST['updatedSurname']);
                  $updatedEmail = mysqli_real_escape_string($dbcnx ,$_POST['updatedEmail']);
                  $updatedPhone = mysqli_real_escape_string($dbcnx ,$_POST['updatedPhone']);
                  $updatedAddress = mysqli_real_escape_string($dbcnx ,$_POST['updatedAddress']);
                  $updatedCity = mysqli_real_escape_string($dbcnx ,$_POST['updatedCity']);
                  $updatedPostcode = mysqli_real_escape_string($dbcnx ,$_POST['updatedPostcode']);
                  $updatedCounty = mysqli_real_escape_string($dbcnx ,$_POST['updatedCounty']);
                }else{
                  $updateID = "";
                }
                

               // $Updatedfirstname = $_POST['Updatedfirstname'];

              if($updateID != ""){
                $sql = "UPDATE customer
                        SET title = 'updatedTitle',
                        firstname = '$updatedFirstname', 
                        surname = '$updatedSurname',
                        email = '$updatedEmail',
                        phone  = '$updatedPhone',
                        address = '$updatedAddress',
                        city = '$updatedCity',
                        postcode = '$updatedPostcode',
                        county = '$updatedCounty'
                        WHERE customerId = $updateID";


                $res = mysqli_query($dbcnx, $sql);

                if (!$res) {
                  echo 'Query failed ' . $sql . ' Error:' . mysqli_error();
                  exit();
                }else{
                  echo $res;
                  if (mysqli_affected_rows($dbcnx) < 1) {
                    echo "<p><em> No updates</em></p>";
                  }else{
                    echo "Record Updated";
                    // $title = mysqli_real_escape_string($dbcnx ,$_POST['updatedTitle']);
                    // $firstname = mysqli_real_escape_string($dbcnx ,$_POST['updatedFirstname']);
                    // $surname = mysqli_real_escape_string($dbcnx ,$_POST['updatedSurname']);
                    // $email = mysqli_real_escape_string($dbcnx ,$_POST['updatedEmail']);
                    // $phone = mysqli_real_escape_string($dbcnx ,$_POST['updatedPhone']);
                    // $address = mysqli_real_escape_string($dbcnx ,$_POST['updatedAddress']);
                    // $city = mysqli_real_escape_string($dbcnx ,$_POST['updatedCity']);
                    // $postcode = mysqli_real_escape_string($dbcnx ,$_POST['updatedPostcode']);
                    // $county = mysqli_real_escape_string($dbcnx ,$_POST['updatedCounty']);
                  }
                  mysqli_close($dbcnx);
                }

            }// End of update
          }else{
            //echo "Nothing to update";
          }//end of if

            // If the Delete Button is pressed
            if (isset($_POST['delete'])) {
             
            
                $dbcnx = mysqli_connect("eu-cdbr-azure-west-d.cloudapp.net", "bcfb6c448ab634", "fd0e93c4", "hotel");

                if (mysqli_connect_errno($dbcnx)) {
                  echo "Failed to connect to Mysql: " . mysqli_connect_error();
                  exit();
                }

                if (isset($_GET['id'])) {
                  $updateID = $_GET['id'];
                }else{
                  $updateID = "";
                }
                

               // $Updatedfirstname = $_POST['Updatedfirstname'];

                if($updateID != ""){

                  $deleteID = $updateID;

                  $sql = "DELETE 
                          FROM bookingsroom BR
                          WHERE BR.bookingId = (SELECT B.bookingId
                                                FROM booking B
                                                WHERE B.customerid = $updateID";

                  $sql = "DELETE 
                          FROM customer
                          WHERE customerId = $updateID";


                 $res = mysqli_query($dbcnx, $sql);

                      if (!$res) {
                        echo 'Query failed ' . $sql . ' Error:' . mysqli_error();
                        exit();
                      }else{
                        echo $res;
                        if (mysqli_affected_rows($dbcnx) < 1) {
                          echo "<p><em> No updates</em></p>";
                        }else{
                          echo "Record dELETED";

                        }
                        mysqli_close($dbcnx);
                      }

                  }else{
                    //echo "Nothing to delete";
                    } // End of delete
                }
                
               

             ?>

            <div class="checkbox">
              <label>
                <input name="checkin" type="checkbox" value="y"> Check me in
              </label>
            </div>
            <button  value="Submit" name="update" type="submit" class="btn btn-default">Update</button>
            <button value="Submit" name="delete" type="submit" class="btn btn-default">Delete</button>
            <textarea id="disabled" name="requests" class="form-control textArea" rows="3" disabled>Requests</textarea>
          </form>
            <!-- <div class="complete-book">
              <h2>Complete your booking</h2>
              <p>
                Please enter the information required below to complete your booking
              </p>
              <img src="../media/images/gallery-07.png">
            </div> -->
          </div>
          

        </div><!-- end of row -->

    
      </div>
  </div>


    
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
                 <!--  <li>
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
                  </li> -->
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