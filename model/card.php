<?php

class card {

    private $id_card;
	private $prenom;
	private $nom;
	private $cin;
	private $sexe;
	private $date_naissance;
	private $adress;
	private $yd_mail;
	private $email;
    private $statut;
	private $photo;
	private $inclusion;
    private $c_image;
	private $newsletter;
    private $etat;
	
	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) {
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	public function __construct()
	{
		$ctp = func_num_args();
		$args= func_get_args();
		if ($ctp == 0) {
	
		}
		else{
			$this->hydrate($args[0]);
		}
	}

	/*getters*/
    public function getid_card(){
        return $this->id_card;
    }
    public function getprenom(){
        return $this->prenom;
    }
    public function getnom(){
        return $this->nom;
    }
    public function getcin(){
        return $this->cin;
    }
    public function getsexe(){
        return $this->sexe;
    }
    public function getdate_naissance(){
        return $this->date_naissance;
    }
    public function getadress(){
        return $this->adress;
    }
    public function getyd_mail(){
        return $this->yd_mail;
    }
    public function getemail(){
        return $this->email;
    }
    public function getstatut()
    {
        return $this->statut;
    }
    public function getphoto(){
        return $this->photo;
    }
    public function getinclusion(){
    	return $this->inclusion;
    }
    public function getc_image()
    {
        return $this->c_image;
    }
    public function getnewsletter(){
    	return $this->newsletter;
    }
    public function getetat()
    {
        return $this->etat;
    }
    

    /*setters*/
    public function setid_card($id_card){
        $this->id_card = $id_card;
    }
    public function setprenom($prenom){
        $this->prenom = $prenom;
    }
    public function setnom($nom){
        $this->nom = $nom;
    }
    public function setcin($cin)
    {
    	$this->cin=$cin;
    }
    public function setsexe($sexe)
    {
    	$this->sexe=$sexe;
    }
    public function setdate_naissance($date_naissance)
    {
    	$this->date_naissance=$date_naissance;
    }
    public function setadress($adress)
    {
    	$this->adress=$adress;
    }
    public function setyd_mail($yd_mail)
    {
    	$this->yd_mail=$yd_mail;
    }
    public function setemail($email)
    {
    	$this->email=$email;
    }
    public function setstatut($statut)
    {
        $this->statut=$statut;
    }
    public function setphoto($photo)
    {
    	$this->photo=$photo;
    }
    public function setinclusion($inclusion)
    {
    	$this->inclusion=$inclusion;
    }
    public function setc_image($c_image)
    {
        $this->c_image=$c_image;
    }
    public function setnewsletter($newsletter)
    {
    	$this->newsletter=$newsletter;
    }
    public function setetat($etat)
    {
        $this->etat=$etat;
    }
    
}

?>