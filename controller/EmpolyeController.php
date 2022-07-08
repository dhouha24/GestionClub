<?php
include '../../model/Employeur.php';

Class EmpolyeController{

	public function ajoutEmploye()
	{			
	    $emp=new Employeur();
	    $emp->setCin($_POST['cin_employe']);
		$emp->setNom($_POST['nom_employe']);
		$emp->setPrenom($_POST['prenom_employe']);
		$emp->setAdresse($_POST['adresse_employe']);
		$emp->setSexe($_POST['sexe_employe']);
		$emp->setFonction($_POST['fonction_employe']);
		$emp->setEmail($_POST['mail_employe']);
		$emp->setTelephone($_POST['tel_employe']);
		$emp->setDateEntre($_POST['dateEntre_employe']);
		$row=$emp->cinSearch($emp->getCin());
		if ($emp->ajoutEmploye($emp)){return true;}
	    else {return false;}
	}

	function cinSearch() {		
	    $emp=new Employeur();
		$row=$emp->cinSearch($_POST['cin_employe']);
		
		if ($row==0){return true;}
		else{ return false;}
		
    }
	public function listRecent()
    {  
    	$database = new Connexion();
		$db = $database->getConnection();
	    $emp=new Employeur();
  		$rows=$emp->listRecent();
 		foreach ($rows as $row) 
			{   $e= new Employeur($row['cin'],$row['nom'],$row['prenom'],$row['adresse'],$row['sexe'],$row['fonction'],$row['email'],$row['telephone'],$row['dateEntre']);
				
				echo "<tr>";
				  echo "<td>".$e->getCin()."</td>";
				  echo "<td>".$e->getNom() ." ". $e->getPrenom()."</td>";
				  echo "<td>".$e->getEmail()."</td>";							 
				  echo "<td>".$e->getTelephone()."</td>";
				  echo "<td>".$e->getFonction()."</td>";							 							 
				  echo "<td class='text-center'>";
				  	echo"<a href='ModifierEmployeur.php?v=Edit&cin=". $row['cin']."'  ><i class='fa fa-edit text-warning'></i></a>&nbsp&nbsp";  
				  	echo"<a href='DeleteEmployeur.php?v=Delete&cin=". $row['cin']."' onclick='return supprimeEmploye();'><i class='fa fa-trash text-danger'></i></a> ";	
			  	  echo "</td>";
				echo "</tr>";   
			} 
    }

	public function affiche()
	{  		
	    $emp=new Employeur();
		$rows=$emp->affichage();
		foreach ($rows as $row) 
			{	    
    
				$e= new Employeur($row['cin'],$row['nom'],$row['prenom'],$row['adresse'],$row['sexe'],$row['fonction'],$row['email'],$row['telephone'],$row['dateEntre']);
				
				echo "<tr>";
				  echo "<td>".$e->getCin()."</td>";
				  echo "<td>".$e->getNom()."</td>";
				  echo "<td>".$e->getPrenom()."</td>";
				  echo "<td>".$e->getAdresse()."</td>";
				  echo "<td>".$e->getEmail()."</td>";
				  echo "<td>".$e->getTelephone()."</td>";
				  echo "<td>".$e->getFonction()."</td>";	 
				  echo "<td>".$e->getDateEntre()."</td>";							 
				  echo "<td class='text-center'>";
				  	echo"<a href='ModifierEmployeur.php?v=Edit&cin=". $row['cin']."'  ><i class='fa fa-edit text-warning'></i></a>&nbsp&nbsp";  
				  	echo"<a href='DeleteEmployeur.php?v=Delete&cin=". $row['cin']."' onclick='return supprimeEmploye();'><i class='fa fa-trash text-danger'></i></a> ";	
				  echo "</td>";
				echo "</tr>";  
			} 
	}

	public function search()
	{  
		
	    $emp=new Employeur();
		$rows=$emp->search($_POST['search']);
		foreach ($rows as $row) 
			{
				$e= new Employeur($row['cin'],$row['nom'],$row['prenom'],$row['adresse'],$row['sexe'],$row['fonction'],$row['email'],$row['telephone'],$row['dateEntre']);
				
				echo "<tr>";
				  echo "<td>".$e->getCin()."</td>";
				  echo "<td>".$e->getNom()."</td>";
				  echo "<td>".$e->getPrenom()."</td>";
				  echo "<td>".$e->getAdresse()."</td>";
				  echo "<td>".$e->getEmail()."</td>";
				  echo "<td>".$e->getTelephone()."</td>";
				  echo "<td>".$e->getFonction()."</td>";	 
				  echo "<td>".$e->getDateEntre()."</td>";							 
				  echo "<td class='text-center'>";
				  	echo"<a href='ModifierEmployeur.php?v=Edit&cin=". $row['cin']."'  ><i class='fa fa-edit text-warning'></i></a>&nbsp&nbsp";  
				  	echo"<a href='DeleteEmployeur.php?v=Delete&cin=". $row['cin']."' onclick='return supprimeEmploye();'><i class='fa fa-trash text-danger'></i></a> ";	
			  	  echo "</td>";
				echo "</tr>";    
			}
	}

	public function cinModifier()
	{  	
		
	    $emp=new Employeur();
		$cin=isset($_GET['cin']) && is_numeric($_GET['cin']) ?  intval($_GET['cin']):0;
 		$row=$emp->cinModifie($cin);
		return $row;
    }

	public function modifierEmploye()
	{
    	$emp=new Employeur(); 
	 	$emp->setCin($_POST['cin_employe']);
		$emp->setNom($_POST['nom_employe']);
		$emp->setPrenom($_POST['prenom_employe']);
		$emp->setAdresse($_POST['adresse_employe']);
		$emp->setSexe($_POST['sexe_employe']);
		$emp->setFonction($_POST['fonction_employe']);
		$emp->setEmail($_POST['mail_employe']);
		$emp->setTelephone($_POST['tel_employe']);
		$emp->setDateEntre($_POST['dateEntre_employe']);
		if ($emp->modifierEmploye($emp)){return true;}
	    else {return false;}
	}

	public function delete()
	{ 		
		$emp=new Employeur();
		$cin=$_GET['cin'];
		if ($emp->delete($cin)){return true;}
	    else {return false;}
    }     
}
?>