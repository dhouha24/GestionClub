<?php
    include '../../controller/EmpolyeController.php';
    $emp = new EmpolyeController();
    $v=isset($_GET['v']) ? $_GET['v']:0;
    if ($v=='Delete')    
        {  
            if ($emp->delete()){
                header('Location:ListeEmployeur.php?delete=1');}
            else {
                header('Location:ListeEmployeur.php?delete=2');}
	    }
?>