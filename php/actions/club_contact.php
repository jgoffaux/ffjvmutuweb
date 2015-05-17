<?php

// mysqli
$mysqli = new mysqli("localhost", "user", "password", "ffjv");
if ($mysqli->connect_errno) {
	intf("Echec de la connexion : %s\n", $mysqli->connect_error);
	exit();
}
/* Requête "Select" retourne un jeu de résultats */
/*$data = mysql_fetch_assoc($req))*/
if ($result = $mysqli->query("select id from club where name = \"$club\";")) {
 while ($row = mysqli_fetch_assoc($result)) {
        printf ("test : %s \n", $row["id"]);
    }
#	$data = mysql_fetch_assoc($result);
#	echo '<br> result : ' . $data['id'] .' <br>';
#	$nbr=$result->num_rows;
	$result->close();
}
if ($result2 = $mysqli->query("select id from contact where email = \"$mail\";")) {
	echo "<br> result2 : $result2";
	$nbr2=$result2->num_rows;
	$result2->close();
}

$sql = "INSERT INTO club_contact VALUES ('', '$nbr','$nbr2')";

if ($mysqli->query($sql) === TRUE) {
    echo "Enregistrement Club<->Contact: OK";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


$mysqli->close();


?>
