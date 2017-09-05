<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <!--- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
  	<title>Nairobi Innovation Week</title>
  	<meta name="description" content="">
  	<meta name="author" content="">
     <!-- Mobile Specific Metas
     ================================================== -->
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  	<!-- CSS
      ================================================== -->
    <link rel="stylesheet" href="css/default.css">
  	<link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/media-queries.css">    
     <!-- Script
     ================================================== -->
  	<script src="js/modernizr.js"></script>
  	<script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <!-- Favicons
  	================================================== -->
  	<link rel="shortcut icon" href="images/log.jpg" >
  </head>

  <body>
    <!-- Intro Section
    ================================================== -->
    <section id="intro" style="min-height: 300px !important">

     	<header class="row">	 

  			<div id="logo" >
  				<a href="http://innovationweek.co.ke" class="niwlog">
            <img src="images/niw.png">                  
          </a>					
  			</div>

        <nav id="nav-wrap">
          <a class="menu-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
          <a class="menu-btn" href="#" title="Hide navigation">Hide navigation</a>

          <ul id="nav" class="nav">
            <li><a href="http://innovationweek.co.ke/">Home</a></li>
            <li><a href="http://2016.innovationweek.co.ke/" target="_blank">2016 Chapter</a></li>
            <li><a href="http://2017.innovationweek.co.ke/" target="_blank">2017 Chapter</a></li>	
  		    </ul> <!-- end #nav -->
        </nav> <!-- end #nav-wrap --> 	        

     	</header> <!-- Header End -->   	

     	<div  id="main" class="row">
  	   	<div class="twelve columns">	   			
  	   		<h1>NAIROBI INNOVATION WEEK 2018</h1>
  	   		<h2>CONTACT US</h2>
        </div>
      </div> <!-- main end -->    	

    </section> <!-- end intro section -->


    <!-- Contact Section
    ================================================== -->
    <section id="contact">
      <div class="contacts">
        <div>
          <?php
            if(isset($_POST['email'])) {
             
                $email_to = "hello@innovationweek.co.ke";
                $email_subject = "NIW18 Contact Us";
             
                function died($error) {
                    // error code
                    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
                    echo "These errors appear below.<br /><br />";
                    echo $error."<br /><br />";
                    echo "Please go back and fix these errors.<br /><br />";
                    die();
                } 
             
                // validation expected data exists
                if(!isset($_POST['name']) ||
                    !isset($_POST['email']) ||
                    !isset($_POST['message'])) {
                    died('We are sorry, but there appears to be a problem with the form you submitted.');       
                }              
             
                $name = $_POST['name']; // required
                $email_from = $_POST['email']; // required
                $message = $_POST['message']; // required
             
                $error_message = "";
                $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
             
              if(!preg_match($email_exp,$email_from)) {
                $error_message .= 'The email address you entered does not appear to be valid.<br />';
              }
             
                $string_exp = "/^[A-Za-z .'-]+$/";
             
              if(!preg_match($string_exp,$name)) {
                $error_message .= 'The name you entered does not appear to be valid.<br />';
              }
             
              if(strlen($message) < 2) {
                $error_message .= 'The message you entered do not appear to be valid.<br />';
              }
             
              if(strlen($error_message) > 0) {
                died($error_message);
              }
             
                $email_message = "Form details below.\n\n";
             
                 
                function clean_string($string) {
                  $bad = array("content-type","bcc:","to:","cc:","href");
                  return str_replace($bad,"",$string);
                } 
                 
             
                $email_message .= "Name: ".clean_string($name)."\n";
                $email_message .= "Email: ".clean_string($email_from)."\n";
                $email_message .= "Message: ".clean_string($message)."\n";
             
            // create email headers
            $headers = 'From: '.$email_from."\r\n".
            'Reply-To: '.$email_from."\r\n" .
            'X-Mailer: PHP/' . phpversion();

            if (@mail($email_to, $email_subject, $email_message, $headers)){
              $success = "Thanks for contacting us. We'll be in touch soon";
            }
            else{
              $success = "Message Sending Failed, try again";
            }  
          ?>
          <?php
            }
          ?>    
        </div>

        <div class="contact">
          <?php
          if (isset($success)){ 
            echo "<div class='success'>" . $success . "</div>";
          }
          ?>

          <form action="" method="POST">
            <h3>Please fill in the form below</h3>
            <input type="text" name="name" placeholder="Your name" required="">
            <input type="email" name="email" placeholder="Your email" required="">        
            <textarea name="message" placeholder="Your message" required=""></textarea>
            <input style="text-transform: uppercase !important;" type="submit" value="Submit">
          </form>
        </div>

        <div id="map">
          <p class="map-error">Oh Snap... Unable to load map...</p>       
        </div>
      </div>

    </section> <!-- end contact section-->    

    <!-- footer
    ================================================== -->
    <footer style="padding: 30px 0 5px 0!important">
      <div class="row">
        <div class="twelve columns">
          <div class="six columns">
            <div class="footer-agile">
              <div class="col-md-6 footer-w3-1">
                <p><i class="fa fa-lg fa-map-marker"></i> |
                Great Court, University of Nairobi</p>
              </div>
              <div class="col-md-6 footer-w3l-1">
                <p><i class="fa fa-lg fa-phone"></i> |
                 +254-705 047432</p>
              </div>
            </div>
            <ul class="social">Follow us  |
              <li><a href="https://www.facebook.com/nairobiinnovationweek/" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/search?q=nairobi%20innovation%20week&src=typd" target="_blank"><i class="fa fa-lg fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/in/nairobi-innovation-week-bb3327137/" target="_blank"><i class="fa fa-lg fa-linkedin"></i></a></li>
            </ul>            
          </div>
          <div class="six columns" style="border-left: 1px solid #fff">
            <div class="footer-w3-agile">
              <div class="col-md-6 w3l-footer-top">
                <h3 style="text-transform: uppercase !important; color: #fff !important">Subscribe to our Newsletter</h3>
                <form action="#" method="post" class="newsletter" >
                  <input class="email" type="email" placeholder="johndoe@abc.com" required="">
                  <input style="text-transform: uppercase !important;" type="submit" class="submit"  value="Subscribe">
                </form>
              </div>
            </div>
          </div>
          <ul class="copyright1" style="padding-top: 10px!important">
            <li>&copy; Copyright C4DLab, University of Nairobi</li>          
          </ul>
        </div>          

      </div>

      <div id="go-top">
        <a class="smoothscroll" title="Back to Top" href="#intro"><i class="icon-up-open"></i></a>
      </div>
    </footer> <!-- Footer End-->   

    <!-- Java Script
    ================================================== -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

    <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
    <script src="js/gmaps.js"></script>
    <script src="js/waypoints.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/backstretch.js"></script>  
    <script src="js/init.js"></script>

  </body>

</html>