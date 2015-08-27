<?php
require 'src/Google/autoload.php';

session_start();

$service_account_name = "987694720165-oeqomp6saoe1q258ohn4kfg1h2erp2ih@developer.gserviceaccount.com";
$key_file_location = "yd-tn.p12";

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
$param = array();
$param['domain'] = "youthdecides.org";

$email = "alaa@youthdecides.org";
$r = $directory->users->get($_GET['keyword']);
if($r->getThumbnailPhotoUrl())
{
	$photo = $directory->users_photos->get($_GET['keyword']);
	$photo_exists = true;
} else {
	$photo_exists = false;
}

if(isset($photo['photoData'])){
    $imgData = strtr($photo['photoData'], '-_*', '+/=');
}

$tab=array();
if($photo_exists){

        $tab['pic']= "data:image/jpeg;base64, $imgData";
}
else{
        $tab['pic']= "../../view/images/default_image.png";
}
$tab['name'] = $r->getName()->getFullName();
$tab['mail'] = $r->getPrimaryEmail();
echo json_encode($tab);

		  	
