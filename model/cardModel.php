<?php
require_once 'card.php';
require_once '../Configuration.php';

class cardModel {
    
    public function __construct() {
    }
    
    // public function getcard($id)
    // {
    //     $query = "SELECT * FROM card WHERE id_card = ".$id ;
    //     $resultat = mysql_query($query);
    //     $Fa = new card($resultat);
    //     return $Fa;       
    // }
    
    public function addCard($card)
    {
        $bdd = new Db();
        $requete="INSERT INTO card (prenom, nom, cin, sexe, date_naissance, adress, yd_mail, email, statut, photo, inclusion, newsletter, etat) VALUES ('".$card->getprenom()."','".$card->getnom()."','".$card->getcin()."','".$card->getsexe()."','".$card->getdate_naissance()."','".$card->getadress()."','".$card->getyd_mail()."','".$card->getemail()."','".$card->getstatut()."','".$card->getphoto()."','".$card->getinclusion()."','".$card->getnewsletter()."',0)";
        echo $requete;
        $bdd->query($requete);
    }
    
    public function activateCard($path, $cin)
    {
        $bdd = new Db();
        $query = "UPDATE card SET c_image='".$path."' WHERE cin = '".$cin."'";
        $result=$bdd->query($query);
    }

    public function setEtatOne($cin)
    {
        $bdd = new Db();
        $query = "UPDATE card SET etat=1 WHERE cin = '".$cin."'";
        $bdd->query($query);         
    }

    public function Afficher($etat)
    {
        $bdd = new Db();
        $tableau = array();
        $query = "SELECT * FROM card WHERE etat=".$etat;
        $result = $bdd->query($query);
        $i=0;
        while ($data = $result->fetch_assoc()) {
            $C = new card($data);
            $tableau[$i]=$C;
            $i++;
        }
        return $tableau;
    }
    public function Retrive($cin)
    {
    	$bdd= new Db();
    	$query = "SELECT * FROM card WHERE cin=".$cin;
    	$result = $bdd->select($query);
    	return $result;
    } 
   
}

