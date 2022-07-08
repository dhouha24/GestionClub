<?php
  include '../../controller/EmpolyeController.php';
  $emp = new EmpolyeController();
  $v=isset($_GET['v']) ? $_GET['v']:0;
	if ($v=='Edit') {
    $row=$emp->cinModifier();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Modification <?php echo $row['nom']." ".$row['prenom']; ?></title>
  <!-- Bootstrap Core CSS -->
  <link href="../../template/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="../../template/css/fontawesome.min.css" rel="stylesheet" type="text/css">    
  <link href="../../template/css/fontawesome.css" rel="stylesheet" type="text/css">
  <link href="../../template/css/all.min.css" rel="stylesheet" type="text/css">    
  <link href="../../template/css/all.css" rel="stylesheet" type="text/css">    
  <script src="../../template/js/test.js"></script>
</head>

<body>
  <?php 	include '../navBar.php'; ?>
  <div class="container-fluid">
    <h1 class="text-center mt-5">Modification d'un employeur </h1>    
    <?php
    }   if ($v=='Update') {   

          if($emp->modifierEmploye()){
                header('Location:ListeEmployeur.php?update=1');
          }else{
              header('Location:ListeEmployeur.php?update=2');
          }  		
    }
    ?>
    <div class="row">
        <div class="col-7 p-2 m-3">
          <form class="form mb-2" NAME="formulaire" action="?v=Update" method="POST">  
            <div class="form-row">
              <div class="form-group ">
                <label for="inputEmail4">Cin</label><br>
                <label style="font-size: 20px !important; color: blue;" ><?php  echo $row['cin'] ?></label>
                <input type="hidden" name="cin_employe" value="<?php  echo $row['cin'] ?>"/>
              </div>

              <div class="row "> 
                <div class="col-6 form-group">
                  <label style="color:red;" id="testNom" ></label>
                  <input type="text" class="form-control" id="nom_employe" onblur="nom(this)"  value="<?php  echo $row['nom'] ?>" name ="nom_employe" required placeholder="Nom employé .." >
                </div>

                <div class="col-6 form-group">
                  <label style="color:red;" id="testPrenom" ></label>
                  <input type="text" class="form-control" name="prenom_employe" onblur="prenom(this)" value="<?php  echo $row['prenom'] ?>" id="prenom_employe" placeholder="Prénom employé .."  required>             
                </div>                
              </div>

              <div class="row "> 
                <div class="col-6 form-group">
                  <label style="color:red;" id="testSexe" ></label>
                  <select id="sexe_employe" class="form-select"  onblur="sexe(this)" name="sexe_employe" required >
                  <option><?php  echo $row['sexe'] ?></option>
                    <option>Sexe</option>
                    <option>Femme </option>
                    <option>Homme</option>
                  </select> 
                </div>

                <div class="col-6 form-group">
                  <label style="color:red;" id="testAdr" ></label>
                  <input type="text" class="form-control" name="adresse_employe"  onblur="adr(this)" required value="<?php  echo $row['adresse'] ?>" id="Adresse_employe" placeholder="Adresse employé ..">
                </div>                
              </div>

              <div class="row "> 
                <div class="col-6 form-group">
                  <label style="color:red;" id="testEmail" ></label>
                  <input type="email" class="form-control" value="<?php  echo $row['email'] ?>" id="mail_employe" onblur="email(this)" name="mail_employe" placeholder="mail employé .." required  >
                </div>

                <div class="col-6 form-group">
                  <label style="color:red;" id="testTel" ></label>
                  <input type="number" class="form-control" value="<?php  echo $row['telephone'] ?>" name="tel_employe" onblur="tel(this)" id="tel_employe" placeholder="Numéro de Télephone client .." required>
                </div>                
              </div>

              <div class="row">
                <div class="col-6 form-group ">
                  <label>Fonction : </label>
                  <label style="color:red;" id="testFonction" ></label>
                  <select id="fonction_employe" class="form-select" onblur="fonction(this)" name="fonction_employe" required >
                    <option><?php  echo $row['fonction'] ?></option>
                    <option></option>
                    <option>Administrateur </option>
                    <option>Commercial</option>
                    <option>Responsable RH</option>
                    <option>Comptable</option>
                  </select>
                </div>
                          
                <div class=" col-6 form-group ">
                  <label style="color:red;" id="testDate" ></label>
                  <input  value="<?php  echo $row['dateEntre'] ?>"type="date" class="form-control" id="dateEntre_employe" onblur="date(this)"  name="dateEntre_employe" required >
                </div>
                <div class="text-center my-5"> 
                  <button type="submit" class="btn btn-primary px-5 "  onclick='return modifierEmploye();'>Modifier</button>
                  <button type="reset"class="btn btn-primary  px-5"> Annuler</button> 
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-4 my-5"><img src="../../template/img/e.JPG" width="500" /></div>
      </div>
  </div>   
  <!-- Bootstrap Core JavaScript -->
  <script src="../template/js/bootstrap.min.js"></script>
  <!-- font awesome JavaScript -->
  <script src="../../template/js/fontawesome.min.js"></script>
  <script src="../../template/js/fontawesome.js"></script>
  <script src="../../template/js/all.min.js"></script>
  <script src="../../template/js/all.js"></script> 
  <!-- alert Suppression -->
  <script src="../../template/js/alertSuppression.js"></script>   
</body>

</html>