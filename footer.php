<?php
if (isset($_POST['btnPostMe1'])) {
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if (empty($_POST['email'])) {
    $emailError = 'Email is empty';
  } else {
    $email = $_POST['email'];

    // validating the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = 'Invalid email';
    }
  }
  if (empty($_POST['message'])) {
    $messageError = 'Message is empty';
  } else {
    $message = $_POST['message'];
  }

  if (empty($_POST['platform'])) {
    $messageError = 'platform is empty';
  } else {
    $platform = $_POST['platform'];
  }

  if (empty($_POST['username'])) {
    $messageError = 'username is empty';
  } else {
    $username = $_POST['username'];
  }
  if (empty($emailError) && empty($messageError)) {
    $date = date('j, F Y h:i A');

    $emailBody = "
      <html>
      <head>
        <title>$email is contacting you</title>
      </head>
      <body style=\"background-color:#fafafa;\">
        <div style=\"padding:20px;\">
          Date: <span style=\"color:#888\">$date</span>
          <br>
          Email: <span style=\"color:#888\">$email</span>
          <br>
          Username: <span style=\"color:#888\">$username</span>
          <br>
          Platform: <span style=\"color:#888\">$platform</span>
          <br>
          Message: <span style=\"color:#888\">$message</span>

        </div>
      </body>
      </html>
    ";

    $headers =  'From: Contact Form <contact@mydomain.com>' . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            "MIME-Version: 1.0\r\n" . 
          "Content-Type: text/html; charset=iso-8859-1\r\n";

    $to = 'iamkrishnadev1999@gmail.com';
    $subject = 'Influencers form';

    if (mail($to, $subject, $emailBody, $headers)) {
      $sent = true; 
    }
  }
}
}

if(isset($_POST['submit11'])){
    $to = "iamkrishnadev1999@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Brand Form";
    $subject2 = "Copy of your form submission";
    $message = "Name : " . $first_name . "\n\n" ."Email Address: ". $_POST['email']. "\n\n" ."Website: ". $last_name . "\n\n" ."Message: ". $_POST['message'];
    $message2 = "Name : " . $first_name . "\n\n" ."Email Address: ". $_POST['email']. "\n\n" ."Website: ". $last_name . "\n\n" ."Message: ". $_POST['message'];
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }


if (isset($_POST['submit'])) {
  $statusMsg='';
if(isset($_FILES["file"]["name"])){
   $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
$fromemail =  $email;
$subject="Uploaded file attachment";
$email_message = '<h2>Contact Request Submitted</h2>
                    <p><b>Name:</b> '.$name.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>Subject:</b> '.$subject.'</p>
                    <p><b>Message:</b><br/>'.$message.'</p>';
$email_message.="Please find the attachment";
$semi_rand = md5(uniqid(time()));
$headers = "From: ".$fromemail;
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
 
    $headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=\"{$mime_boundary}\"";
 
if($_FILES["file"]["name"]!= ""){  
 $strFilesName = $_FILES["file"]["name"];  
 $strContent = chunk_split(base64_encode(file_get_contents($_FILES["file"]["tmp_name"])));  
 
 
    $email_message .= "This is a multi-part message in MIME format.\n\n" .
    "--{$mime_boundary}\n" .
    "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" .
    $email_message .= "\n\n";
 
 
    $email_message .= "--{$mime_boundary}\n" .
    "Content-Type: application/octet-stream;\n" .
    " name=\"{$strFilesName}\"\n" .
    //"Content-Disposition: attachment;\n" .
    //" filename=\"{$fileatt_name}\"\n" .
    "Content-Transfer-Encoding: base64\n\n" .
    $strContent  .= "\n\n" .
    "--{$mime_boundary}--\n";
}
$toemail="iamkrishnadev1999@gmail.com"; 
 
if(mail($toemail, $subject, $email_message, $headers)){
   $statusMsg= "Email send successfully with attachment";
}else{
   $statusMsg= "Not sent";
}
}
}

?>
<div class="main-myfooter">
                    <div class="myfooter-container">
                        <div class="row"><img src="assets/images/logofoot.svg" class="Foot-logo " alt="logo"></div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="container">
                                    <h2 class="white ttu">Let’s Connect!</h2><br>
                                    <p class="white">When there are great ideas at stake, it’s always a good idea to share. Tell us how can we make it happen for you!</p>
                                    <p style="color: rgb(255, 255, 255);">Fill the form below or mail us at <span style="text-decoration: underline; cursor: pointer; color: cornflowerblue;">brands@monk-e.in</span></p>

                                    <div class="tab">
                                        <button class="tablinks" onclick="openCity(event, 'BRANDS')" id="defaultOpen">BRANDS</button>
                                        <button class="tablinks" onclick="openCity(event, 'INFLUENCERS')">INFLUENCERS</button>
                                        <button class="tablinks" onclick="openCity(event, 'CAREER')">CAREER</button>
                                      </div>

                            
                                      
                                      <div id="BRANDS" class="tabcontent">
                                        <form action="" id="brandform" method="post">
                                         <input class="my-input-padding footerinput" type="text" placeholder="Name" name="first_name">
                                         <input class="my-input-padding footerinput" type="text" placeholder="Email Address" name="email">
                                         <input class="my-input-padding footerinput" type="text" placeholder="Website" name="last_name">
                                         <input class="my-input-padding footerinput" placeholder="Message" name="message" >
                                         <button class="myform-submite2"  type="submit" name="submit11" value="Submit" >Submit</button>
                                        </form>

                                    <!--     <form role="form" action="" method="POST">
                                        <input class="my-input-padding footerinput" name="name" required="required" type="text" placeholder="Name" />
                                        <input class="my-input-padding footerinput" name="email" required="required" type="email" placeholder="Email Address"/>
                                        <input class="my-input-padding footerinput" name="mobile"  type="text" placeholder="Website"/>
                                        <input class="my-input-padding footerinput" name="message" placeholder="Message"/>
                                        <button class="myform-submite2"  name="submit11" value="Submit" type="submit" >Submit</button>
                                        </form> -->

                                   
                                      </div>
                                      
                                      <div id="INFLUENCERS" class="tabcontent" style="display:none">
                                       <form method="POST" id="influencer-form" action=""> 
                                        <input type="hidden" name="form1submission" value="yes" >
                                          <input type="email" class="my-input-padding footerinput" placeholder="Email" name="email" required="">
                                          <input  class="my-input-padding footerinput" placeholder="Message" name="message" required="">
                                          <input  class="my-input-padding footerinput" placeholder="Username" name="username" required="">
                                          <select class="my-input-padding footerinput" name="platform"  class="my-input-padding footerinput" required="">
                                            <option>Choose a Platform</option>
                                            <option value="instagram">Instagram</option>
                                            <option value="youTube">YouTube</option>
                                            <option value="tiktok">Tiktok</option>
                                            <option value="linkedIn">LinkedIn</option>
                                            <option value="facebook">Facebook</option>
                                          </select>
                                          <button class="myform-submite2"   name="btnPostMe1" value="Submit" type="submit"  >Submit</button> 
                                        </form>
                                    
                                        
                                
                                      </div>
                                      
                                      <div id="CAREER" class="tabcontent" style="display:none">
                                          
                                             
                                            <!-- Display contact form -->
                                            <form method="post" action="" id="career-form" enctype="multipart/form-data">
                                              
                                                <input type="text" name="name" class="my-input-padding footerinput"  placeholder="Name" required="">
                                                
                                               
                                                    <input type="email" name="email" class="my-input-padding footerinput"  placeholder="Email address" required="">
                                               
                                                
                                                    <input type="text" name="subject" class="my-input-padding footerinput"  placeholder="Subject" required="">
                                               
                                                
                                                    <textarea name="message" class="my-input-padding footerinput" placeholder="Write your message here" required=""></textarea>
                                             
                                                
                                                    <input type="file" name="file" class="form-control2ds">
                                               
                                            
                                                    <button type="submit" class="myform-submite2" name="submit" value="SEND MESSAGE">Submit</button>>
                                              
                                            </form>
                                        
                                     
                                       <!--    <input type="hidden" name="form1submission" value="yes" >
                                          <input type="email" class="my-input-padding footerinput" placeholder="Email" name="email">
                                          <input  class="my-input-padding footerinput" placeholder="Message" name="message">
                                          <button class="myform-submite2"   name="btnPostMe1" value="Submit" type="submit"  >Submit</button>  -->
                                  
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="container-fluid  subscrbetite">
                                    <div class="desktop-only">
                                        <h2 class="white">SUBSCRIBE</h2><br>
                                        <p class="white">Sign up for our weekly newsletter and discover what’s brewing in the world of digital media. </p><input class="my-input-padding" type="text" placeholder="Email Address" style="width: 100%; background: black; border-top: none; border-right: none; border-bottom: thin solid white; border-left: none; border-image: initial; color: white;"><br> <br>
                                    </div>
                                    <p class="white mobile-add">22, 2nd Floor, Kamat Industrial Estate<br>Opposite Siddhivinayak Mandir, SVS Road, Prabhadevi, Mumbai 400025</p>
                                    <div class="social-md">
                                        <div><a href="https://twitter.com/monketweets" target="_blank" class="twitter social"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16 fa-2x " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                                                </svg></a><a href="https://www.instagram.com/monkentertainment" target="_blank" class="instagram social"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14 fa-2x " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                                </svg></a><a href="https://www.linkedin.com/company/monk-entertainment/about/" target="_blank" class="linkedin social"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin" class="svg-inline--fa fa-linkedin fa-w-14 fa-2x " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                                </svg></a></div>
                                    </div>
                                    <div class="desktop-only"><br></div>
                                    <p class="white" style="font-size: 10px; margin-top: 3%;">© 2020 Monk-Entertainment. All Rights Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function openCity(evt, cityName) {
                      var i, tabcontent, tablinks;
                      tabcontent = document.getElementsByClassName("tabcontent");
                      for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                      }
                      tablinks = document.getElementsByClassName("tablinks");
                      for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                      }
                      document.getElementById(cityName).style.display = "block";
                      evt.currentTarget.className += " active";
                    }
                    
                    // Get the element with id="defaultOpen" and click on it
                    document.getElementById("defaultOpen").click();


                    var form = document.getElementById("brandform");
                    var form1 = document.getElementById("career-form");
                    var form2 = document.getElementById("influencer-form");
                      function handleForm(event) { event.preventDefault(); } 
                      form.addEventListener('submit', handleForm);
                      form1.addEventListener('submit', handleForm);
                      form2.addEventListener('submit', handleForm);
                    </script>

                    