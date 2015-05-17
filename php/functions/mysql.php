<?
function connection_sql() {
	// mysqli
	$mysqli = new mysqli("localhost", "user", "password", "ffjv");
	if ($mysqli->connect_errno) {
		intf("Echec de la connexion : %s\n", $mysqli->connect_error);
		exit();
	}	
	return $mysqli;
}

function close_sql($mysqli) {
	$mysqli->close();
}
?>
