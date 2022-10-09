<?php 
Class Student{
	public $id, $email,$nom,$adresse;
	private $serveur,$utilisateur,$mdp,$base,$cnx;
	//connexion à la base de données
	public function __construct($serv,$user,$pwd,$db){
		$this->serveur=$serv;
		$this->utilisateur=$user;
		$this->mdp=$pwd;
		$this->base=$db;
		try{
			$this->cnx = new PDO('mysql:host='.$this->serveur.';dbname='.$this->base,$this->utilisateur,$this->mdp);
		}
		catch(PDOException $e){
			print 'Erreur : '.$e->getMessage().'<br />';	
			print 'Erreur : '.$e->getCode();	
		}
	}
	public function Create(){
		$sql="INSERT INTO students(id, nom, email, adresse) VALUES ('','$this->nom','$this->email','$this->adresse')";
		if($this->cnx->exec($sql)) return true; 
	}
	public function Retreive(){
		$sql="select * from students";
		$students=$this->cnx->query($sql); 
		$students->setFetchMode(PDO::FETCH_OBJ);
		//onditqu'onveutquelerésultatsoitrécupérablesousformed'objet
		print '<table border="1">';
		print '<tr><th>ID</th><th>Nom</th><th>Email</th><th>Adresse</th><th colspan="2">Actions</th></tr>';
		foreach($students as $student):
		print '<tr>';
			print '<td>'.$student->id.'</td>';
			print '<td>'.$student->nom.'</td>';
			print '<td>'.$student->email.'</td>';
			print '<td>'.$student->adresse.'</td>';
			print '<td><a href="delete_st.php?id='.$student->id.'"> Supprimer </a></td>';
			print '<td><a href="update_st.php?id='.$student->id.'
			&nom='.$student->nom.'
			&email='.$student->email.'
			&adresse='.$student->adresse.'"> Modifier </a></td>';
		print '</tr>';

		endforeach;
		print '</table>';
	}

	public function findStudentbyId($id){
		$sql="SELECT * from students where id='$id'";
		$student=$this->cnx->query($sql); 
		$student->setFetchMode(PDO::FETCH_OBJ);

		return $student;
	}


	public function Update(){
		$sql="Update students SET nom='$this->nom',email='$this->email',adresse='$this->adresse' where id=$this->id";
		if($this->cnx->exec($sql))
		 return true; 
	}
	public function Delete(){
		$sql="delete from students where id=$this->id";
		if($this->cnx->exec($sql)) return true; 
	}
	
}

?>