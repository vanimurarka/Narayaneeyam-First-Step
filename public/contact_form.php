<?php

	// --------- CONFIG SETTINGS ---------------
	$_to = "ashamurarka@gmail.com";
	$_subject = "Narayaneeyam First Step Feedback";
	$_redirectTo = 'feedback_thankyou.shtml';
	$_appendToFile = true;
	$_fileToAddTo = 'collected_feedback.txt';
	$_addInBeginning = true;
	// ---------- END CONFIG --------------------

	$name = $_POST["name"];
	$email = $_POST["email"];
	// $city = $_POST["city"];
	// $country = $_POST["country"];
	$comment = $_POST["comments"];

	// verifying captcha
	$captcha_url = "https://www.google.com/recaptcha/api/siteverify";

	// This is the data to POST to the form. The KEY of the array is the name of the field. The value is the value posted.
	$params = array();
	$params['secret'] = '6LeKPhYTAAAAAMErVME-KhpSvWuo4TOz_ttC3iT9';
	$params['response'] = $_POST['g-recaptcha-response'];

	$postData = 'secret='.$params['secret'].'&response='.$params['response'];
	$output = file_get_contents($captcha_url."?".$postData);
    $json = json_decode($output);
    if ($json->success == 1)
    {
    	// ---------- MAIL THE FEEDBACK -------------
		$from = $name . " <" . $email . ">";
		$body = "From the Feedback form - \nName: " . $name . "\n";
		$body = $body . "Email: " . $email . "\n";
		// $body = $body . "City: " . $city . "\n";
		// $body = $body . "Country: " . $country . "\n";
		$body = $body . "Comments: \n" . $comment . "\n";
		
		mail($_to, $_subject, $body, "From:".$from);
		// ---------- ---------------- -------------

		// ------------ APPEND TO SERVER FILE ----------------
		if ($_appendToFile)
		{
			$fileContents = file_get_contents($_fileToAddTo);
			$fileNewContents = "<div id='feedback'>.<span id='name'>Name: ".$name."</span><span id='date'>".date('l jS \of F Y')."</span><br><br>".$comment." </div>".$fileContents;
			file_put_contents($_fileToAddTo, $fileNewContents);
		}

		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: http://".$host.$uri."/".$_redirectTo);
    }

		
?>