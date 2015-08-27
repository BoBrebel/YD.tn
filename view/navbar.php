	<?php
	include_once '../controller/include/db_connect.php';
	include_once '../controller/include/functions.php';
 
	sec_session_start();
 
	if (login_check($mysqli) == true) {
	    $logged = 'in';
	} else {
	    $logged = 'out';
	}
	?>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <script type="text/Javascript">
		$(document).ready(function(){
		$('.collapsible').collapsible({
		accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		});
		});
        </script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
        
<div class="navbar-fixed">
	<nav>
		    <div class="nav-wrapper ">
		      <a href="#!" class="brand-logo"><img src="images/Youth Decides.png" height="100%"></a>
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		      
		      <ul class="right hide-on-med-and-down">
		        <li><a href="Search.php">Find</a></li>
		        <li><a class="modal-trigger waves-effect waves-light" href="#modal1">Connect</a></li>
		        <li><a href="http://www.youthdecides.org/">Youthdecides.org</a></li>
		      </ul>
		      <ul class="side-nav" id="mobile-demo">
		        <li><a href="Search.php">Find</a></li>
		        <li>
		        <ul class="collapsible" data-collapsible="accordion">
				<li>
				<div class="collapsible-header"><i class="material-icons">filter_drama</i>Connect</div>
				<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
				</li>
			</ul>
		        </li>
		        <li><a href="http://www.youthdecides.org/">Youthdecides.org</a></li>
		      </ul>
		    </div>
		    
	</nav>
</div>
			<div id="modal1" class="modal modal-fixed-footer">
			    <form action="../controller/include/process_login.php" method="post" name="login_form">
  				<div class="row">
  				<center><h4>Login</h4></center>
			            <div class="input-field col s12">
			                    <i class="mdi-action-account-circle prefix"></i>
			                    <input id="icon_prefix" type="text" name="email" class="validate" required>
			                    <label for="icon_prefix">Username</label>
			            </div>
			            <div class="input-field col s12">
			                <i class="mdi-action-lock prefix"></i>
			                <input id="icon_password" type="password" name="password" id="password" class="validate" required>
			                <label for="icon_password">Password</label>
			                <center>
			                        <a class="tooltipped btn-floating btn-medium" data-position="bottom" data-delay="50" data-tooltip="Forgot your Password?" 			href="forgotPassword.php"><i class="mdi-action-help"></i></a>
			                </center>
			            </div>
			  				</div>
			  				<br>
			  				<br>
			  				<div class="row">
			  					<center>
							                <input type="button" class="btn" value="Login" onclick="formhash(this.form, this.form.password);" />
			  					</center>
			  				</div>
			  	</form>
			</div>
			</div>