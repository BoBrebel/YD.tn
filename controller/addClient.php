<?php
	require_once '../model/cardModel.php';
	$card= new card();
	$cardModel= new cardModel();
	$prenom=$_POST['prenom'];
	$nom=$_POST['nom'];
	$cin=$_POST['cin'];
	$sexe=$_POST['sexe'];
	$date_naissance=$_POST['date_naissance_submit'];
	$adress=$_POST['adresse'].' '.$_POST['zipcode'].' '.$_POST['delegation'].' '.$_POST['gouvernorat'];
	$yd_mail=$_POST['yd_mail'];
	$email=$_POST['email'];
	$statut=$_POST['statut'];
	$target_dir = "../view/images/Resources/photo/";
	$target_file = $target_dir.basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["file"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["file"]["size"] > 1000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
	    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} 
	else {
	    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
	$inclusion='';
	$newsletter='non';
	foreach ($_POST['inclusion'] as $selected) {
		$inclusion.=$selected.' ';
	}
	if (!empty($_POST['newsletter'])) {
		$newsletter=$_POST['newsletter'];
	}
	$card->setprenom($prenom);
	$card->setnom($nom);
	$card->setcin($cin);
	$card->setsexe($sexe);
	$card->setdate_naissance($date_naissance);
	$card->setyd_mail($yd_mail);
	$card->setadress($adress);
	$card->setemail($email);
	$card->setstatut($statut);
	$card->setphoto($target_file);
	$card->setinclusion($inclusion);
	$card->setnewsletter($newsletter);
	$cardModel->addCard($card);

	header('location:qrgen.php?prenom='.$prenom.'&nom='.$nom.'&cin='.$cin.'&sexe='.$sexe.'&date_naissance='.$date_naissance.'&adresse='.$adress.'&email='.$email.'&statut='.$statut);

?>