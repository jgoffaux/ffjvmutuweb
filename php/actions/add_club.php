<?php

$date = date("Y-m-d");
$heure = date("H:i:s");

$mysqli = new mysqli("localhost", "user", "password", "ffjv");
if ($mysqli->connect_errno) {
	intf("Echec de la connexion : %s\n", $mysqli->connect_error);
	exit();
}

$sql = "INSERT INTO club VALUES ('', '$club')";

if ($mysqli->query($sql) === TRUE) {
    echo "Enregistrement Club: OK";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

$sql2 = "INSERT INTO contact VALUES('','$nom','$prenom','$mail','$date $heure')";
if ($mysqli->query($sql2) === TRUE) {
    echo "Enregistrement Contact: OK";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
