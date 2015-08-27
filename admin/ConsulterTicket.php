<?php

require_once("../model/ticketModel.php");
$id_ticket = htmlspecialchars($_GET["IdTicket"]);
$ticket = new ticket();
$ticketModel = new ticketModel();
$ticket=$ticketModel->afficherTicket($id_ticket);
?>
<html>
<head>
	<title>Consulter Ticket</title>
</head>
<body>
	<div class="row">
		<div class="col s6">
			<table class="hoverable">
				<tr>
					<td>ID :</td>
					<td><?php echo $ticket->getid_ticket(); ?></td>
				</tr>
				<tr>
					<td>Name :</td>
					<td><?php echo $ticket->getname();?></td>
				</tr>
				<tr>
					<td>EMail : </td>
					<td><?php echo $ticket->getemail();?></td>
				</tr>
				<tr>
					<td>Text :</td>
					<td><?php echo $ticket->gettext();?></td>
				</tr>
			</table>
		</div>

		<div class="col s6">
			<form action="../controller/mailController.php" method="POST">
				<input type="hidden" value="<?php echo $ticket->getid_ticket();?>" name="id_ticket">
				<input type="text" name="sujet" placeholder="sujet">
				<br>
				<input type="text" name="mail" value="<?php echo $ticket->getemail();?>">
				<br>
				<textarea class="materialize-textarea" placeholder="type message here" name="msg"></textarea>
				<button type="submit" name="action" class="btn">submit</button>	
			</form>
		</div>
	</div>

</body>
</html>