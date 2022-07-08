<?php
include_once '../../connect/connexion.php';

class Employeur
{
    //variable connexion
    public $con;
    //variables employer
    private $cin;
    private $nom;
    private $prenom;
    private $adresse;
    private $sexe;
    private $fonction;
    private $email;
    private $telephone;
    private $dateEntre;

    //constructeur
    public function __construct($cin="",$nom="",$prenom="",$adresse="",$sexe="",$fonction="",$email="",$telephone="",$dateEntre="")
    {
        $this->cin = $cin;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->sexe = $sexe;
        $this->fonction = $fonction;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->dateEntre = $dateEntre;
    }    
    //function get() 
    public function getCin() { return $this->cin; }
    public function getPrenom() { return $this->prenom; }
    public function getNom() { return $this->nom; }
    public function getAdresse() { return $this->adresse; }
    public function getSexe() { return $this->sexe; }
    public function getFonction() { return $this->fonction; }
    public function getEmail() { return $this->email; }
    public function getTelephone() { return $this->telephone; }
    public function getDateEntre() { return $this->dateEntre; }
    //function set() 
    public function setCin($cin){$this->cin =  $cin; }      
    public function setPrenom($prenom){$this->prenom = $prenom; }  
    public function setNom($nom){$this->nom = $nom; }
    public function setAdresse($adresse) {  $this->adresse=$adresse; }
    public function setSexe($sexe) {  $this->sexe=$sexe; }
    public function setFonction($fonction) { return $this->fonction=$fonction; }
    public function setEmail($email) {  $this->email=$email; }
    public function setTelephone($telephone) {  $this->telephone=$telephone; }
    public function setDateEntre($dateEntre) {  $this->dateEntre=$dateEntre; }

    //function addEmploye 
    function ajoutEmploye($emp) {
        $this->con = Connexion::getConnection();   
        $cin=$this->getCin();
        $nom=$this->getNom();
        $prenom=$this->getPrenom();
        $adresse=$this->getAdresse();
        $sexe=$this->getSexe();
        $fonction=$this->getFonction();
        $email=$this->getEmail();
        $telephone=$this->getTelephone();
        $dateEntre=$this->getDateEntre();

        $stmt= $this->con->prepare("INSERT INTO employeur            
                VALUES   (:cin,:nom,:prenom,:adresse,:sexe,:fonction,:email,:telephone,:dateEntre)");
        $stmt->execute(
            array(
                  ':cin'=>$cin,
                  ':nom'=>$nom,
                  ':prenom'=>$prenom,
                  ':adresse'=>$adresse,
                  ':sexe'=>$sexe,
                  ':fonction'=>$fonction,
                  ':email'=>$email,
                  ':telephone'=>$telephone,
                  ':dateEntre'=>$dateEntre 
            )
        );        
        if ($stmt) return true;
        else return false;
      }
    //function List of employer added in this day
    public function listRecent()
    {
        $this->con = Connexion::getConnection();   

        $stmt= $this->con->prepare("SELECT *
                              FROM   employeur
                              where dateEntre=DATE( NOW() )
                               ");
          $stmt->execute();
          $rows =$stmt->fetchAll();
          return $rows;
    }
    //function of List of all employers
    public function affichage(){
        $this->con = Connexion::getConnection(); 
        $stmt= $this->con->prepare("SELECT * FROM   employeur ");
        $stmt->execute();
        $rows =$stmt->fetchAll();
        return $rows;
    }

    //search function 
    public function search($recherche){
        $this->con = Connexion::getConnection();   
        $stmt= $this->con->prepare("SELECT *
                            FROM   employeur
                            where  prenom LIKE '%" . $recherche . "%' 
                            OR nom LIKE '%" . $recherche . "%'
                            OR     cin LIKE '%" . $recherche . "%'
                            OR     fonction LIKE '%" . $recherche . "%'
                            OR     sexe LIKE '%" . $recherche . "%'                  
                          ");
      $stmt->execute();
      $rows =$stmt->fetchAll();
      return $rows;
    }

    //get employer by cin function 
    function cinModifie($cin) {
        $this->con = Connexion::getConnection(); 
        $stmt= $this->con->prepare("SELECT *
                                FROM   employeur
                                WHERE  cin =?
                                LIMIT  1");
        $stmt->execute(array($cin ));
        $row =$stmt->fetch();
        $count=$stmt->rowCount();
        if ($count >0) {
            return $row;
        }
    }
   
   //get employer by cin function
   function cinSearch($cin) {
            $this->con = Connexion::getConnection();   

    $emp=new Employeur();
    $stmt= $this->con->prepare("SELECT *
                            FROM   employeur
                            WHERE  cin =?
                            LIMIT  1");
    $stmt->execute(array($cin ));
    $row =$stmt->fetch();
    $count=$stmt->rowCount();
    return $count;
    }
    //updated employer function 
    function modifierEmploye($emp) {
        $this->con = Connexion::getConnection(); 
        $cin=$this->getCin();
        $nom=$this->getNom();
        $prenom=$this->getPrenom();
        $adresse=$this->getAdresse();
        $sexe=$this->getSexe();
        $fonction=$this->getFonction();
        $email=$this->getEmail();
        $telephone=$this->getTelephone();
        $dateEntre=$this->getDateEntre();

        $stmt= $this->con->prepare("UPDATE employeur
                          SET  nom = :nom ,
                               prenom = :prenom ,
                               adresse = :adresse ,
                               sexe = :sexe ,
                               fonction = :fonction ,
                               email = :email ,
                               telephone = :telephone ,
                               dateEntre = :dateEntre 
                          WHERE  cin =:cin
                          ");
        $stmt->execute(array(
                        ':nom'=>$nom,
                        ':prenom'=>$prenom,
                        ':adresse'=>$adresse,
                        ':sexe'=>$sexe,
                        ':fonction'=>$fonction,
                        ':email'=>$email,
                        ':telephone'=>$telephone,
                        ':dateEntre'=>$dateEntre,   
                        ':cin'=>$cin
        ));
        if ($stmt) return true;
          else return false;   
    }
    //deleted employer function 
    public function delete($cin)
    {
        $this->con = Connexion::getConnection();   
        $stmt= $this->con->prepare("DELETE FROM employeur
                                    WHERE      cin=:cin");
        $stmt->bindParam(":cin",$cin);
        $stmt->execute(); 
        if ($stmt){return true;}
      else {return false;}         
    }   

}
   

?>