<html>
<head>
<?php
	require_once '../model/cardModel.php';
	$cardModel= new cardModel();
	$listeU=0;
	$listeU = $cardModel->Afficher(0);
	
	if(isset($_POST['action']))
	{
	   if (count($listeU)!=0) {
	   	echo "<span class='new badge'>".count($listeU)."</span>";
	   }
	}

?>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">

	<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>

</head>
<body>
	<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>CIN</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Type</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php
    foreach ($listeU as $card) :
            
?>
	    <tr>
	        <td><?php echo $card->getid_card() ;?></td>
	        <td><?php echo $card->getcin() ; ?></td>
	        <td><?php echo $card->getprenom() ;?></td>
	        <td><?php echo $card->getnom() ;?></td>
	        <td><?php echo $card->getstatut() ;?></td>
	        <td><?php echo'<a class="waves-effect waves-teal btn" target="_blank" href="../controller/check.php?cin='.$card->getcin().'&carte='.$card->getc_image().'">Accept</a>';?></td>
	    </tr>

<?php
    endforeach;
?>
     
	</tbody>
	</table>

</body>
</html>