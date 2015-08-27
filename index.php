<?php
function redirectToHTTPS()
{
  if($_SERVER['HTTPS']!="on")
  {
     $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
     header("Location:$redirect");
  }
}
redirectToHTTPS();
?>
<html>
	<head>
		<title>
			Youth Decides - Commandez votre carte
		</title>
		<meta name="keywords" content="youthdecides, jeunessedecide, youth, decides, decide, decider, chebeb, chabeb, you9arer, youkarer, jeunesse, card, carte, yd, tunisie, tunisia, tounes, yd tn, youthdecide tn, community, communoté, association, coallition, organisme, culture, politique, technologie, social, technology, تونس , شباب ,الشباب ,يقرر">
		<meta name="description" content="Youth decides Discount Card">
		<meta name="robots" content="index,follow"/>
	</head>
	<body>
		<h1>Jeunesse Decide - Youth Decides</h1>
	</body>
</html>
<?php
header("location:view/index.php");
?>