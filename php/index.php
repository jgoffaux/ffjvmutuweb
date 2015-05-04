<?php
if (isset($_POST['var'])) {
	$action = $_POST['var'];
}	
        switch ($action):
                // Ajoute un parametre
                case "1":
                        include 'actions/add.php';
                        break;
                case "2":
                        include 'actions/modify.php';
                        break;
                case "3":
                        include 'actions/delete.php';
                        break;
                default:
                        include 'accueil.html';
        endswitch;
?>

<center><a href='index.php'>Retour a l'accueil</a></center>
