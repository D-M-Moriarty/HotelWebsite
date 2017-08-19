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

    <?php

      session_start();

      //Session Variables
      $occupancy = (int)$_SESSION['occupancy'];
      $smoking = $_SESSION['smoking'];
      $checkInDate = $_SESSION['checkInDate'];
      $checkOutDate = $_SESSION['checkOutDate'];

      $date1=date_create($checkOutDate);
      $date2=date_create($checkInDate);


      $numDaysStaying = date_diff($date2, $date1);
      $days = $numDaysStaying->format("%a");


      //The room id
      $roomId = $_GET['roomid'];
      $cost = (double)$_GET['cost']; 
      $cost *= (int)$days;

      $notComplete = "";

      if(isset($_POST['submit'])){

          //Payment form details
          $title = $_POST['title'];
          $firstname = $_POST['firstname'];
          $surname = $_POST['surname'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $postcode = $_POST['postcode'];
          $county = $_POST['county'];
          $country = $_POST['country'];
          $requests = $_POST['requests'];

          
          
          //Checking if the required fields were filled out
           if ($title == ''  or $firstname == '' or
           $surname == '' or $email =='' or 
           $phone =='' or $address =='' or 
           $city =='' or $postcode == '' or 
           $county == '' or $country == ''){

            //echo("You did not complete the insert form correctly <br>");
            //exit();
            $notComplete = "You did not complete the insert form correctly";

            }else {

              $dbcnx = mysqli_connect("localhost", "root", "", "hotel");
              // Check connection
              if (mysqli_connect_errno($dbcnx )) {

              echo "Failed to connect to MySQL: " .mysqli_connect_error();
              exit();

            }else{

              // trying to nest the query to find rooms not booked above
              $sql = "SELECT roomprice
                      FROM room
                      WHERE roomid = '$roomId'";

          
          $res = mysqli_query($dbcnx, $sql);

          if ( !$res ){
            echo('Query failed ' . $sql . ' Error:' . mysqli_error());
            exit();
          }else {

             if(mysqli_num_rows($res) < 1){
             
                echo "<p><em> No rooms</em></p>";
                exit();  

              }else {

                while ( $row = mysqli_fetch_array($res) ) {
                    
                  
                }
            }


            if ($_POST['submit'] == "Submit") {

              $title = mysqli_real_escape_string($dbcnx, $title);
              $firstname = mysqli_real_escape_string($dbcnx, $firstname);
              $surname = mysqli_real_escape_string($dbcnx, $surname);
              $email = mysqli_real_escape_string($dbcnx, $email);
              $phone = mysqli_real_escape_string($dbcnx, $phone);
              $address = mysqli_real_escape_string($dbcnx, $address);
              $city = mysqli_real_escape_string($dbcnx, $city);
              $postcode = mysqli_real_escape_string($dbcnx, $postcode);
              $county = mysqli_real_escape_string($dbcnx, $county);
              $country = mysqli_real_escape_string($dbcnx, $country);

              $sqlhotel = "INSERT INTO customer(title,firstname,surname,email,phone,address, city,postcode,county, country) VALUES('$title','$firstname','$surname','$email','$phone','$address', '$city','$postcode','$county', '$country')";

              $res = mysqli_query($dbcnx, $sqlhotel);
              $newcustomerID = mysqli_insert_id($dbcnx);

              $requests = mysqli_real_escape_string($dbcnx, $requests);

              $sqlhotel = "INSERT INTO booking(customerid,  checkindate, checkoutdate,  requests, cost) VALUES('$newcustomerID', '$checkInDate', '$checkOutDate', '$requests', $cost)";

              $res = mysqli_query($dbcnx, $sqlhotel);
              $newBookingID = mysqli_insert_id($dbcnx);

              $sqlhotel = "INSERT INTO bookingsroom(bookingId, roomId, occupancy)
              VALUES('$newBookingID','$roomId','$occupancy')";

              $res = mysqli_query($dbcnx, $sqlhotel);

              if ($res == 0) {

                    echo("<p>Error registering: " . mysqli_error() . "</p>");
              }
              else {
                    echo("<p>Customer added to Database</p>");
              }

            }   

            mysqli_close($dbcnx);
          }


      }

    }

  }

    ?>

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
                <a href="customerSearch.php">Customer Search</a>
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
            <form class="form-width" action="" method="POST">
            
            <p>
              <?php echo $notComplete; ?>
              <h1>Booker information</h1>
                Fields marked ( * ) are mandatory.</p>
                <h4>Room cost €<?php echo $cost; ?></h4>

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
            <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              <label for="Email">
                Email address
                <span>*</span>
              </label>
              <input name="email" type="email" class="form-control" id="Email" placeholder="Email">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="phoneNumber">
                Phone Number
                <span>*</span>
              </label>
              <input name="phone" type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
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
                <input name="address" type="text" class="form-control" id="address" placeholder="Address">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="exampleInputPassword1">
                  City
                  <span>*</span>
                </label>
                <input name="city" type="text" class="form-control" id="city" placeholder="City">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="postcode">
                  Postcode
                </label>
                <input name="postcode" type="text" class="form-control" id="postcode" placeholder="Postcode">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="county">
                  County
                </label>
                <input name="county" type="text" class="form-control" id="county" placeholder="County">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="country">
                  Country
                  <span>*</span>
                </label>
                  <select name="country" id="country" class="form-control">
                    <option value="*" selected="selected">--------------------------------------</option>
                    <option value="IEIE">Ireland</option>
                    <option value="XBXB">Northern Ireland</option>
                    <option value="GBGB">United Kingdom</option>
                    <option value="USUS">United States</option>
                    <option value="#allContries">--------------------------------------</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AX">Aland Islands</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua/Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia</option>
                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                    <option value="BA">Bosnia and Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BV">Bouvet Island</option>
                    <option value="BR">Brazil</option>
                    <option value="IO">British Indian Ocean Territory</option>
                    <option value="BN">Brunei Darussalam</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos (Keeling) Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo, the Democratic Republic</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="CI">Cote DIvoire</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CW">Curagao</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FO">Faeroe Islands</option>
                    <option value="FK">Falkland Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="PF">French Polynesia</option>
                    <option value="TF">French Southern Territories</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GD">Grenada</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GG">Guernsey</option>
                    <option value="GF">Guiana</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HM">Heard And Mcdonald Islands</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IM">Isle of Man</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JE">Jersey</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KR">Korea</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Laos</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macau</option>
                    <option value="MK">Macedonia</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia</option>
                    <option value="MD">Moldova</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="ME">Montenegro</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="AN">Netherlands Antilles</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="KP">North Korea</option>
                    <option value="XB">Northern Ireland</option>
                    <option value="MP">Northern Mariana Islands</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PS">Palestinian Territory, Occupied</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Reunion</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russia</option>
                    <option value="RW">Rwanda</option>
                    <option value="LC">Saint Lucia</option>
                    <option value="SM">San Marino</option>
                    <option value="ST">Sao Tome And Principe</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="WY">Scotland</option>
                    <option value="SN">Senegal</option>
                    <option value="RS">Serbia</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SX">Sint Maarten (Dutch part)</option>
                    <option value="SK">Slovak Republic</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="GS">South Georgia</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="BL">St. Barthilemy</option>
                    <option value="SH">St. Helena</option>
                    <option value="KN">St. Kitts and Nevis</option>
                    <option value="MF">St. Martin (French part)</option>
                    <option value="PM">St. Pierre</option>
                    <option value="VC">St. Vincent and The Grenadines</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SJ">Svalbard And Jan Mayen Islands</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syria</option>
                    <option value="TW">Taiwan</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania</option>
                    <option value="TH">Thailand</option>
                    <option value="TL">Timor-Leste</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad And Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TC">Turks And Caicos Islands</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UM">U.S. Minor Outlying Islands</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VA">Vatican City State</option>
                    <option value="VE">Venezuela</option>
                    <option value="VN">Viet Nam</option>
                    <option value="VG">Virgin Islands (British)</option>
                    <option value="VI">Virgin Islands (U.S.)</option>
                    <option value="WX">Wales</option>
                    <option value="WF">Wallis And Futuna Islands</option>
                    <option value="EH">Western Sahara</option>
                    <option value="WS">Western Samoa</option>
                    <option value="YE">Yemen</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
                  </select>
              </div>
            </div>
          </div>
    
            <!-- <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" id="exampleInputFile">
          <p class="help-block">Example block-level help text here.</p>
            </div> -->

            <div class="checkbox">
              <label>
                <input name="checkin" type="checkbox" value="y" disabled> Check me in
              </label>
            </div>
            <button value="Submit" name="submit" type="submit" class="btn btn-default">Submit</button>
            <textarea name="requests" class="form-control textArea" rows="3">Requests</textarea>
          </form>
          </div>
          <div class="col-md-6">
            <div class="complete-book">
              <h2>Complete your booking</h2>
              <p>
                Please enter the information required below to complete your booking
              </p>
              <img src="../media/images/gallery-07.png">
            </div>
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