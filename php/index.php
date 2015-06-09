<?php

if (isset($_GET['var'])) {
	$action = $_GET['var'];
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
		case "4":
			include 'actions/listing.php';
			break;
                default:
                        include 'accueil.html';
        endswitch;
} else {
	include 'accueil.html';
}
?>

<center><a href='index.php'>Retour a l'accueil</a></center>
