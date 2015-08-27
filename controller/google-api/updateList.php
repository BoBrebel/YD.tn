<?php

$file = 'userList.json';
$expire = time() - 900;

if(file_exists($file) &&  $expire > filemtime($file)){
    
    unlink($file);
}

if(!(file_exists($file))){
    $data = json_encode(getTheList());
    file_put_contents($file,$data);
}


function getTheList(){
    
    require 'src/Google/autoload.php';
    
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
    $list = $directory->users->listUsers($param);
    $tab = array();
    $i = 0;
    foreach ($list as $user){
        $tab[$i]['nom'] = strtolower($user->getName()->getFullName());
        $tab[$i]['mail'] = $user->getPrimaryEmail();
        $i++;
    }
    //echo json_encode($tab);
    return $tab;
    
}