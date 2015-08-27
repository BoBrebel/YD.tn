<?php
	include_once 'include/db_connect.php';
	include_once 'include/psl-config.php';
	require 'phpMailer/PHPMailerAutoload.php';
	function sendMail($name,$maill,$message)
	{
	    $mail = new PHPMailer;
	    $msg = wordwrap($message,70);
	    $mail->Debugoutput = 'html';
	    // Enable verbose debug output
	
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'unicornsesprit@gmail.com';                 // SMTP username
	    $mail->Password = 'unicorns_esprit';                           // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to
	    $mail->From = $maill;
	    $sujet=$name;
	    $mail->addAddress($maill);               // Name is optional
	    $mail->Subject = $sujet;
	    $mail->Body    = $message;
	    if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	    } else {
	        echo 'Message has been sent';
	    }
	}
	function getMeRandomPwd($length){
		    $a = str_split("abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXY0123456789"); 
		    shuffle($a);
		    return substr( implode($a), 0, $length );
		}

	//Start google Auth
	
	require 'google-api/src/Google/autoload.php';

	session_start();
	
	$service_account_name = "987694720165-oeqomp6saoe1q258ohn4kfg1h2erp2ih@developer.gserviceaccount.com";
	$key_file_location = "google-api/yd-tn.p12";
	
	$client = new Google_Client();
	
	$client->setApplicationName("Members");
	
	$directory = new Google_Service_Directory($client);
	
	if (isset($_SESSION['service_token']) && $_SESSION['service_token']) {
	  $client->setAccessToken($_SESSION['service_token']);
	}
	
	$key = file_get_contents($key_file_location);
	
	$cred = new Google_Auth_AssertionCredentials(
	  // Replace this with the email address from the client.
	  $service_account_name,
	  // Replace this with the scopes you are requesting.
	  array('https://www.googleapis.com/auth/admin.directory.user'),
	  $key
	);
	$cred->sub = "alaa@youthdecides.org";
	$client->setAssertionCredentials($cred);
	
	if ($client->getAuth()->isAccessTokenExpired()) {
	  $client->getAuth()->refreshTokenWithAssertion($cred);
	}
	$_SESSION['service_token'] = $client->getAccessToken();
	
	//end Auth
	
	
	require_once '../model/cardModel.php';
	$cardModel= new cardModel();
	$cardModel->setEtatOne($_GET['cin']);
	$user_info=$cardModel->Retrive($_GET['cin']);
	$id_user_1=$user_info[0]["id_card"];
	$prenom=$user_info[0]["prenom"];
	$nom=$user_info[0]['nom'];
	$yd_mail=$user_info[0]['yd_mail'];
	$email=$user_info[0]['email'];
	
	if ($yd_mail==0 || strpos($email, '@youthdecides.org')===FALSE){
		$new_nom=str_replace(" ","",strtolower($nom));
		$new_prenom=str_replace(" ","",strtolower($prenom));
		$password=getMeRandomPwd(8);
		$password_b_u=$password;
		//create an accout google
		// SET UP THE USER/USERNAME OBJECTS
		$user = new Google_Service_Directory_User();
		$name = new Google_Service_Directory_UserName();
		$new_person = array();
		// SET THE ATTRIBUTES
		$name->setGivenName(ucfirst($prenom));
		$name->setFamilyName(strtoupper($nom));
		$user->setName($name);
		$user->setHashFunction("SHA-1");
		$user->setPrimaryEmail("$new_prenom.$new_nom@youthdecides.org");
		$user->setPassword(hash("sha1",$password));
		// the JSON object shows us that externalIds is an array, so that's how we set it here
		echo "before insert:$new_prenom.$new_nom@youthdecides.org";
		$result = $directory->users->insert($user);
		echo "New user ".$result->primaryEmail."||".$password." created successfully.";
		$email_to_add="$new_prenom.$new_nom@youthdecides.org";
		$username="$new_prenom.$new_nom";
		//yd account creation
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		$password = hash('sha512', $password);
        	$h_password = hash('sha512', $password . $random_salt);
        	if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt, id_user) VALUES (?, ?, ?, ?, ?)")) {
            		$insert_stmt->bind_param('ssssi', $username, $email_to_add, $h_password, $random_salt, $id_user_1);
            		$insert_stmt->execute();
            	}
            	$msg="Bienvenu à Jeunesse Decide\n pour vous connecter à notre site veuillez utiliser ces coordonnées\n E-mail : $email_to-add\n Mot de passe : $password_b_u";
            	sendMail("Bienvenu à YD.tn", $email, $msg);
            	
		
	}
	else{
		$username="$new_prenom.$new_nom";
		$password=getMeRandomPwd(8);
		$password_b_u=$password;
		//yd account creation
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		$password = hash('sha512', $password);
        	$h_password = hash('sha512', $password . $random_salt);
        	if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt, id_user) VALUES (?, ?, ?, ?, ?)")) {
            		$insert_stmt->bind_param('ssssi', $username, $email, $h_password, $random_salt, $id_user_1);
            		$insert_stmt->execute();
            	}
            	$msg="Bienvenu à Jeunesse Decide\n pour vous connecter à notre site veuillez utiliser ces coordonnées\n E-mail : $email \n mot de passe : $password_b_u";
            	sendMail("Bienvenu à YD.tn", $email, $msg);
	}
	header('location:'.$_GET['carte']);
?>