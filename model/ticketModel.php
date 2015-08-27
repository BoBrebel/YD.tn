<?php
	include_once 'ticket.php';
	require_once '../Configuration.php';

	class ticketModel{
		public function __construct()
		{
		}

		public function afficherTicket($id)
		{
			$bdd = new Db();
			$query = "SELECT * FROM ticket WHERE id_ticket=".$id;
			$result = $bdd->query($query);
			$data = $result -> fetch_assoc();	
			$Tc = new ticket($data);
			return $Tc;
			
		}

		public function displayTicket($state)
		{
			$bdd = new Db();
			$tableau = array();
			$query = "SELECT * FROM ticket WHERE state=".$state;
			$result = $bdd->query($query);
			$i = 0 ;
			while ($data = $result -> fetch_assoc()) {
				$Tc = new ticket($data);
				$tableau[$i] = $Tc;
				$i++;
			}
			return $tableau;
		}
		public function displayTicketId_user($id_user)
		{
			$bdd = new Db();
			$tableau = array();
			$query = "SELECT * FROM ticket WHERE id_user=".$id_user;
			$result = $bdd->query($query);
			$i = 0 ;
            if($result){
                while ($data = $result->fetch_assoc()) {
					$Tc = new ticket($data);
					$tableau[$i] = $Tc;
					$i++;
                    }
                return $tableau;
                }
            else{
                    return 0;
                }
			
		}

		public function ajouterTicket($ticket)
		{
			$bdd = new Db();
			$requete="INSERT INTO ticket (name, id_user, email, text, state) VALUES ('".$ticket->getname()."','".$ticket->getid_user()."','".$ticket->getemail()."','".$ticket->gettext()."',1)";
			$bdd->query($requete);
		}

		public function modifierTicket($id)
		{
			$bdd = new Db();
			$query="UPDATE ticket SET state = 0 WHERE id_ticket = ".$id;
			$bdd->query($query);
		}

		public function countRow()
		{
			$bdd = new Db();
			$query="SELECT * FROM ticket WHERE state=1";
			$result = $bdd->query($query);
			$i = 0 ;
			while ($data = $result -> fetch_assoc()) {
				$i++;
			}
			return $i;
		}

		public function deleteTicket($id)
		{
			$bdd = new Db();
			$query = "DELETE FROM ticket WHERE id_ticket = ".$id;
			$result=$bdd->query($query);
		}
	}

?>