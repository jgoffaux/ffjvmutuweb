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
    echo "<br>Enregistrement Club: OK";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

$sql2 = "INSERT INTO contact VALUES('','$nom','$prenom','$mail','$date $heure')";
if ($mysqli->query($sql2) === TRUE) {
    echo "<br>Enregistrement Contact: OK";
} else {
    echo "<br>Error: " . $sql . "<br>" . $mysqli->error;
}

// Initialisation des variables
//$i=0;
//$backend_all="";
//$type =  $parsed_json->{'type'} ;
//if ( $type == "ipvs" ) {
        // On recupere les champs pour la partie publique
  //      $name_cluster = $parsed_json->{'frontal'}->{'name_cluster'};
  //      $ip_pub = $parsed_json->{'frontal'}->{'ip_pub'};
   //     $port_pub = $parsed_json->{'frontal'}->{'port'};
	// On initie le fichier VHOST


	$conf_vhost = "<VirtualHost *:80>\n";
        // On genere le vhost
        $conf_vhost = $conf_vhost . "   ServerName $club.ffjv.club\n";
	$conf_vhost = $conf_vhost . "   DocumentRoot /var/www/mutu/$club.ffjv.club/www\n";
	$conf_vhost = $conf_vhost . "   <Directory /var/www/mutu/$club.ffjv.club/www>\n";
        $conf_vhost = $conf_vhost . "      Options Indexes FollowSymLinks MultiViews\n";
        $conf_vhost = $conf_vhost . "      AllowOverride All\n";
        $conf_vhost = $conf_vhost . "      Order allow,deny\n";
        $conf_vhost = $conf_vhost . "      allow from all\n";
        $conf_vhost = $conf_vhost . "   </Directory>\n";
        $conf_vhost = $conf_vhost . "   <IfModule mpm_itk_module>\n";
        $conf_vhost = $conf_vhost . "      AssignUserId $club.ffjv.club $club.ffjv.club\n";
        $conf_vhost = $conf_vhost . "   </IfModule>\n";
        $conf_vhost = $conf_vhost . "   CustomLog \"|/usr/bin/cronolog /var/log/apache2/%m/$club.ffjv.club-access.%Y.%m.%d.log\" combined\n";
        $conf_vhost = $conf_vhost . "   ErrorLog \"|/usr/bin/cronolog /var/log/apache2/%m/$club.ffjv.club-error.%Y.%m.%d.log\"\n";
        $conf_vhost = $conf_vhost . "</VirtualHost>";
        $handle = fopen("/var/www/depots/$club.ffjv.club.conf", "w");
        fwrite($handle,$conf_vhost);
        fclose($handle);
        echo "Success";


?>
