<?php
	include '../../controller/EmpolyeController.php';
    $emp = new EmpolyeController();     
	$v=isset($_GET['v']) ? $_GET['v']:0;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Liste Des Employeurs</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../../template/css/fontawesome.min.css" rel="stylesheet" type="text/css">    
    <link href="../../template/css/fontawesome.css" rel="stylesheet" type="text/css">
    <link href="../../template/css/all.min.css" rel="stylesheet" type="text/css">    
    <link href="../../template/css/all.css" rel="stylesheet" type="text/css">    
</head>

<body>
    <?php 	include '../navBar.php'; ?>
    <div class="container">
        <h1 class="text-center my-5">Liste des Employés</h1>
        <!-- Search form -->
        <form class="form-horizantal" action="?v=Search" method="POST">
            <div class="active-cyan-4 mb-4">
                <input type="text" name="search" placeholder="Rechercher un Employé" class="form-control "  autocomplete="off"/>
            </div>
        </form>

        <?php
            //verifer la modification
            if ( isset($_GET['update']) && $_GET['update'] == 1 ){echo "<div class='alert alert-success '>L'employeur a été modifier avec succès </div>"; }  
            else if  ( isset($_GET['update']) && $_GET['update'] == 2 ){echo "<div class='alert alert-danger '>L'employeur n'a pas modifier </div>"; }
            //verifer la suppression
            if ( isset($_GET['delete']) && $_GET['delete'] == 1 ){echo "<div class='alert alert-success '>L'employeur a été supprimer avec succès </div>"; } 
            else if  ( isset($_GET['delete']) && $_GET['delete'] == 2 ){echo "<div class='alert alert-danger '>L'employeur n'a pas supprimer </div>"; }
        ?>

        <div class="row">
            <div class="col-sm-8 text-secondary"><h2>Gestion <b>Employés</b></h2></div>
            <div class="col-sm-4 d-flex flex-row-reverse ">
                <?php 
                    echo"<a href='AjoutEmployeur.php' class='btn btn-outline-primary btn-lg' ><i class='fa fa-plus'></i> <span>Ajout un nouveau Employé </span></a>";
                ?>                 
            </div>
        </div>     
        <br>
        <table class="table table-striped table-bordered  table-hover">
            <thead class="text-center">
                <tr>					
                    <th>Cin</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Mail</th>
                    <th>Télephone</th>
                    <th>Fonction</th>
                    <th>Date Entré</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>    
                <?php 
                	if ($v=='affichage')   {   $emp->affiche(); }
                	else if     ($v=='Search') {   $emp->search(); }
                    ?>
            </tbody>
        </table>			
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