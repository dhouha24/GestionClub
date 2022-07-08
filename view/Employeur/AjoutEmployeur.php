<?php
    include '../../controller/EmpolyeController.php';
    $emp = new EmpolyeController();
    $v=isset($_GET['v']) ? $_GET['v']:0;
?>
<!DOCTYPE html>
<html lang="fr">

<head>    
    <meta charset="utf-8">
    <title>Ajout Employeur</title>
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
      <h1 class="text-center mt-3">Ajouté un Employé </h1>
      <?php 
        if($v=='Insert') {   
          if(isset($_POST['cin_employe'])) 
          { 
            if ($emp->cinSearch())
            {
              if ($emp->ajoutEmploye())echo "<div class='alert alert-success '>L'employeur a été ajouté avec succès </div>"; 
            }
            else {
              echo "<div class='alert alert-danger'>Cin déja existe</div>";
            }
          }
        }
      ?>
      <div class="row">
        <div class="col-7 p-2 m-3">
          <form class="form mb-2" NAME="formulaire" action="?v=Insert" method="POST">  
            <div class="form-row">
              <div class="form-group ">
                <label style="color:red;" id="testCin" ></label>
                <input type="number" class="form-control" onblur="cin(this)" required id="cin_employe" name="cin_employe" placeholder="Cin .."  >
              </div>

              <div class="row "> 
                <div class="col-6 form-group">
                  <label style="color:red;" id="testNom" ></label>
                  <input type="text" class="form-control" id="nom_employe" onblur="nom(this)"  name ="nom_employe" required placeholder="Nom employé .." >
                </div>

                <div class="col-6 form-group">
                  <label style="color:red;" id="testPrenom" ></label>
                  <input type="text" class="form-control" name="prenom_employe" onblur="prenom(this)" id="prenom_employe" placeholder="Prénom employé .."  required>             
                </div>                
              </div>

              <div class="row "> 
                <div class="col-6 form-group">
                  <label style="color:red;" id="testSexe" ></label>
                  <select id="sexe_employe" class="form-select"  onblur="sexe(this)" name="sexe_employe" required >
                    <option>Sexe</option>
                    <option>Femme </option>
                    <option>Homme</option>
                  </select> 
                </div>

                <div class="col-6 form-group">
                  <label style="color:red;" id="testAdr" ></label>
                  <input type="text" class="form-control" name="adresse_employe" onblur="adr(this)" required id="Adresse_employe" placeholder="Adresse employé ..">
                </div>                
              </div>

              <div class="row "> 
                <div class="col-6 form-group">
                  <label style="color:red;" id="testEmail" ></label>
                  <input type="email" class="form-control" id="mail_employe" onblur="email(this)" name="mail_employe" placeholder="mail employé .." required  >
                </div>

                <div class="col-6 form-group">
                  <label style="color:red;" id="testTel" ></label>
                  <input type="number" class="form-control" name="tel_employe" onblur="tel(this)" id="tel_employe" placeholder="Numéro de Télephone client .." required>
                </div>                
              </div>

              <div class="row">
                <div class="col-6 form-group ">
                  <label>Fonction : </label>
                  <label style="color:red;" id="testFonction" ></label>
                  <select id="fonction_employe" class="form-select" onblur="fonction(this)" name="fonction_employe" required >
                    <option></option>
                    <option>Administrateur </option>
                    <option>Commercial</option>
                    <option>Responsable RH</option>
                    <option>Comptable</option>
                  </select>
                </div>
                          
                <div class=" col-6 form-group ">
                  <label>Date Entré</label>
                  <label style="color:red;" id="testDate" ></label>
                  <input type="date" class="form-control" id="dateEntre_employe" onblur="date(this)"  name="dateEntre_employe" placeholder="Numéro de Télephone client .." required >
                </div>
                <div class="text-center my-2"> 
                  <button type="submit" class="btn btn-primary  px-5" >Enregistrer</button>
                  <button type="reset"class="btn btn-primary  px-5"> Annuler</button> 
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-4 my-5"><img src="../../template/img/e.JPG" width="500" /></div>
      </div>
      <div class="card card-default">
        <div class="card-header text-center">  <h5> Employés récemment ajoutés</h5>   </div>
        <div class="card-body">
          <table  class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th> Cin  </th>
                    <th> Nom & Prénom </th>
                    <th >Mail </th> 
                    <th>Telephone </th>
                    <th>Fonction </th>   
                    <th></th>                          
                </tr>
            </thead>
            <tbody><?php $emp->listRecent(); ?></tbody>
          </table>
        </div>
      </div>   
      <br>                 
      <br>                 
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