<?php
include_once '../controller/include/db_connect.php';
include_once '../controller/include/functions.php';

sec_session_start();
if (login_check($mysqli) == true) :
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="image/png" href="images/icon.png"/>
<link rel="shortcut icon" type="image/png" href="images/icon.png"/>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<link rel="stylesheet" type="text/css" href="https://yd.tn/view/style/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
<script type="text/javascript" src="js/Script.js"></script>

<script type="text/javascript">
	$( document ).ready(function(){
		$("#pre").hide();
		$("#back").hide();
		$('.modal-trigger').leanModal({
			dismissible: true, // Modal can be dismissed by clicking outside of the modal
			opacity: .5, // Opacity of modal background
			in_duration: 300, // Transition in duration
			out_duration: 200, // Transition out duration
			complete: function() {  $('#profile_pic').attr( "src", "" );
						$('#name').html("");
						$('#email').html(""); 
						$("#back").hide();
					     } // Callback for Modal close
		});
		$.ajax({
			url : "../controller/google-api/updateList.php",
			method : 'POST',
			success : function(html){
			$("#collection-container").html(html);
			}
		});
		$("#keyword").keyup(function(){
		var str = $(this).val() ;
		$.ajax({
			url : "../controller/google-api/searchController.php",
			method : 'POST',
			data : {action : 'hint', string : str},
			success : function(html){
			$("#collection-container").html(html);
			}
		});
		});

	});
</script>
<section id="search">
<div class="container">
<img src="images/Youth Decides-search.png" id="logo">
<input type="text" placeholder="Search for member" name="keyword" id="keyword">

<div id="collection-container">

</div>
<center>
<a class="btn waves-effect modal-trigger" href="#modal2" id="search" onclick="Search();">Search</a>
</center>
</div>

<div id="modal2" class="modal">
	<div class="modal-content">
		<img src="" id="profile_pic">
		<img src="images/search-back.png" id="back">
		<h2 id="name" class="white-text"></h2>
		<p id="email" class="flow-text white-text"> </p>
	</div>
	<div class="modal-footer">
		<center>
			<div class="preloader-wrapper big active" id="pre">
				<div class="spinner-layer spinner-blue-only">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
		</center>
	</div>

</div>
</section>
<input type="hidden" id="mail">
<a href="../controller/include/logout.php">Log out</a>
	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a class="btn-floating btn-large" id="float-btn" href="support.php">
		<i class="large material-icons">announcement</i>
		</a>
	</div>
</body>
</html>

<?php else : ?>
<p>
<span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
</p>
<?php endif; ?>