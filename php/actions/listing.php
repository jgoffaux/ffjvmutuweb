<?php 

echo "<br>listing : ";

$mysqli = new mysqli("localhost", "user", "password", "ffjv");
if ($mysqli->connect_errno) {
	intf("Echec de la connexion : %s\n", $mysqli->connect_error);
	exit();
}

if ($result = $mysqli->query("SELECT A.email, B.name FROM club_contact INNER JOIN club AS B ON B.id = club_contact.club_id INNER JOIN contact AS A ON A.id = club_contact.club_id;")) {
	$nbr=$result->num_rows;
	echo "$nbr Sites actif<br>";
	echo "<table align=center border=1><tr><td>Adresse Email</td><td>Email</td></tr>";
     while ($row = $result->fetch_assoc()) {
	echo "<tr><td>";
        printf ("%s </td><td>%s\n", $row["email"], $row["name"]);
	echo "</td></tr>";
    }
    echo "</table>";
	$result->close();
}

$mysqli->close();

?>
