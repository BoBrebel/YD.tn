<?php
include_once '../controller/includes/db_connect.php';
include_once '../controller/includes/functions.php';
 
sec_session_start();
?>
<html>
<head>
	<?php
	if (login_check($mysqli) == true) : 
		
	?>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
		
		<link rel="stylesheet" type="text/css" href="../view/Style/Style_admin.css">
    
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
		
		<script src="js/users.js"></script>
		<script type="text/javascript" src="js/ticket.js"></script>
		
		

</head>
<body>
	<div class="navigation_bars">
		<nav class="top-nav">
	        <div class="container">
	          <div class="nav-wrapper">
	          	<a class="page-title">Administrator Panel</a>
                        <a class="right" href="../controller/includes/logout.php">Log out</a>
	          </div>
	        </div>
	    </nav>
	  	<ul id="nav-mobil" class="side-nav fixed left">
		    <li class="bold"><a href="" class="waves-effect waves-teal">Home</a></li>
                    <li class="bold"><a class="waves-effect waves-teal" onclick="loadUser();">Users<span id="us"></span></a></li>
                    <li class="bold"><a class="waves-effect waves-teal" onclick="loadTicket();" >Tickets<span id="tick"></span></a></li>

		</ul>
	  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
	</div>
	<div id="show">
		<br>
		<br>
		<br>
                
	</div>
	
	<?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
    <?php endif; ?>


</body>
</html>