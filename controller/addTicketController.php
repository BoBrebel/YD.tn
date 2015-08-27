<?php

require_once '../model/ticketModel.php';
$ticket = new ticket();
$ticketModel = new ticketModel();
$name=$email=$id_user="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name=$_POST['name'];
$email=$_POST['email'];
$id_user=$_POST['user_id'];
}

$ticket->setid_user($id_user);
$ticket->setname($name);
$ticket->setemail($email);
$text= '<b>'.$_POST['sujet'].'</b><br> ' .$_POST['text'];
$ticket->settext($text);

$ticketModel->ajouterTicket($ticket);
$url = $_SERVER['HTTP_REFERER'];
header('location:'.$url);
?>