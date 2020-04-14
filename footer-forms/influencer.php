<?php
//index.php

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
	if(empty($_POST["name"]))
	{
		$error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
	}
	else
	{
		$name = clean_text($_POST["name"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
		}
	}
	if(empty($_POST["email"]))
	{
		$error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
	}
	else
	{
		$email = clean_text($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
		}
	}
	if(empty($_POST["subject"]))
	{
		$error .= '<p><label class="text-danger">Subject is required</label></p>';
	}
	else
	{
		$subject = clean_text($_POST["subject"]);
	}
	if(empty($_POST["message"]))
	{
		$error .= '<p><label class="text-danger">Message is required</label></p>';
	}
	else
	{
		$message = clean_text($_POST["message"]);
	}
	if($error == '')
	{
		require 'class/class.phpmailer.php';
		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '587';								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'iamkrishnadev1999@gmail.com';					//Sets SMTP username
		$mail->Password = 'uownvuosvwwrafzu';					//Sets SMTP password
		$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = $_POST["email"];					//Sets the From email address for the message
		$mail->FromName = $_POST["name"];				//Sets the From name of the message
		$mail->AddAddress('iamkrishnadev1999@gmail.com', 'Name');		//Adds a "To" address
		$mail->AddCC($_POST["iamkrishnadev1999@gmail.com"], $_POST["name"]);	//Adds a "Cc" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML				
		$mail->Subject = $_POST["subject"];				//Sets the Subject of the message
		$mail->Body ="message :" . $_POST["message"]
		. "<br />" .
		"Email: ". $_POST["email"]
		;				//An HTML or plain text message body
		if($mail->Send())								//Send an Email. Return true on success or false on error
		{
			$error = '<label class="text-success">Thank you for contacting us</label>';
		}
		else
		{
			$error = '<label class="text-danger">There is an Error</label>';
		}
		$name = '';
		$email = '';
		$subject = '';
		$message = '';
	}
}

?>

	

					<?php echo $error; ?>
					<form method="post" >
							
							<input type="text" name="name" placeholder="Name" class="my-input-padding footerinput" value="<?php echo $name; ?>" />
						
							
							<input type="text" name="email" class="my-input-padding footerinput" placeholder="Email" value="<?php echo $email; ?>" />
					
							
							<input type="text" name="subject" class="my-input-padding footerinput" placeholder="Subject" value="<?php echo $subject; ?>" />
				
							
							<input name="message" class="my-input-padding footerinput" placeholder="Message"><?php echo $message; ?></input>
				
						
							<input type="submit" name="submit" value="Submit" class="btn btn-info" />
					
					</form>
				




<!-- 
<form id="brand-form" method="POST">
                                            <input class="my-input-padding footerinput " type="text" placeholder="Name" id="name" name="name" >
                                            <input class="my-input-padding footerinput " type="email" placeholder="Email Address" id="email" name="email" >
                                            <input class="my-input-padding footerinput " type="text" rows="5" placeholder="Website" id="website" name="message" >
                                            <input class="my-input-padding footerinput " type="text" rows="5" placeholder="Message" id="message" name="message" >
                                            <button class="myform-submite" type="submit">SUBMIT</button>
                                        </form> -->