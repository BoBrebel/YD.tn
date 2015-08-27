<?php
	include_once '../controller/include/db_connect.php';
	include_once '../controller/include/functions.php';
	
	sec_session_start();
	if (login_check($mysqli) == true) :
	include 'navbar.php';
	require_once '../model/ticketModel.php';
	$ticketModel=new ticketModel();
	//if (isset($_SESSION['id_user'])) {
		//$ListeT= $ticketModel->displayTicketId_user($_SESSION['id_user']);	
	//}
?>

	<html>
	<title>Support</title>
<head>
	<link rel="shortcut icon" type="image/png" href="images/icon.png"/>
	<link rel="shortcut icon" type="image/png" href="images/icon.png"/>
	
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
	
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="https://yd.tn/view/style/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	
	
	<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		
</head>
<body style="display:block">
	
	<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
     	<!-- Compiled and minified JavaScript -->
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		  <script type="text/javascript">
		    $(document).ready(function() {
			    $('select').material_select();
			  });
		  </script>
	<div id="claim">
		<div class="container">
			<h4>Soumettre un ticket</h4>
			<form action="../controller/addTicketController.php" method="POST">
				<div class="row">
					<div class="input-field col s6 m6 l6">
							<input type="text" name="name" id="name" required>
							<label for="name">Name : </label>
					</div>
					<div class="input-field col s6 m6 l6">
							<input type="email" name="email" id="email" required>
							<label for="email">Email : </label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m12 l12">
						<select name="sujet" id="sujet">
							<option value="" disabled selected>Choisir un sujet</option>
							<option value="1">Problème de paiement</option>
							<option value="2">Problème relié au compte</option>
							<option value="3">Autre</option>
						</select>
						<label for="sujet">Sujet : </label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12 m12 l12">
							<textarea name="text" class="materialize-textarea"  id="message"required></textarea>
							<label for="message">Message : </label>
					</div>
				</div>
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['id_user'];?>">
				<div class="row">
					<div class="offset-s1 col s10">
						<div class="card cyan darken-4">
							<div class="card-content white-text">
								<span class="card-title">Please Note</span>
								<p>Make sure to check our FAQ before submitting your Ticket</p>
								<p>Youll be notified via email when our staff answers your request.</p>
								</div>
								<div class="card-action">
								<button class="btn waves" type="submit">Submit</button>
								<a href='#' target="_blank" class="btn">FAQ</a>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php else : ?>
<p>
<span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
</p>
<?php endif; ?>

</body>
</html>