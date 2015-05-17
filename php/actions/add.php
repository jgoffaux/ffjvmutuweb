<?php
if (isset($_POST['club'])) {
	$club = $_POST['club'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

	$regex_club = "/^[a-zA-Z0-9-]{1,}$/";
	if (preg_match($regex_club, $club)) {
	    if ($club == "admin") {
		$code_erreur="Erreur sur le nom du CLUB, ";
	    } else {
	      $code_erreur="";
            }
	} else {
    	    $code_erreur="Erreur sur le nom du CLUB, ";
	}

	if (preg_match("#^0[1-8]([-. ]?\d{2}){4}$#", $tel)) {
            $code_erreur="$code_erreur";
        } else {
            $code_erreur="$code_erreur Erreur sur le TEL, ";
        }


	if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
            $code_erreur="$code_erreur";
        } else {
            $code_erreur="$code_erreur Erreur sur le Mail, ";
        }

	$regex_nom = "/^[a-zA-Z- ]{1,}$/";
	if (preg_match($regex_nom, $nom)) {
	    $code_erreur="$code_erreur";
	} else {
    	    $code_erreur="$code_erreur Erreur sur le Nom, ";
	}
	if (preg_match($regex_nom, $prenom)) {
	    $code_erreur="$code_erreur";
	} else {
    	    $code_erreur="$code_erreur Erreur sur le Prenom, ";
	}

	if ( $code_erreur != '') {
		echo "$code_erreur";
	} else {
		// mysqli
		$mysqli = new mysqli("localhost", "user", "password", "ffjv");
		if ($mysqli->connect_errno) {
			intf("Echec de la connexion : %s\n", $mysqli->connect_error);
			exit();
		}	
		/* Requête "Select" retourne un jeu de résultats */
		echo "<br>Club : $club <br>";
		if ($result = $mysqli->query("select name from club where name = \"$club\";")) {
			$nbr=$result->num_rows;
    			$result->close();
		}
		echo "<br> Mail : $mail <br>";
		if ($result2 = $mysqli->query("select email from contact where email = \"$mail\";")) {
			$nbr2=$result2->num_rows;
    			$result2->close();
		}

		$mysqli->close();
		if ($nbr == "0") {
			if ($nbr2 == "0") { 
				include "add_club.php";
				include "club_contact.php";
			} else {
				echo "Email deja present";
			}
		} else {
			echo "Club deja present";
		}

        }


} else {
?>
<html>
 <head>
 </head>

 <body>
Merci de rentrer les informations suivantes :
 <form action="index.php?var=1" method="post">
  Nom du club : <input type="text" name="club" value="monclub"/><br>
  Mail : <input type="text" name="mail" value="aaa@sddddf.fr"/><br>
  Tel : <input type="text" name="tel" value="0123456789"/><br>
  Nom : <input type="Nom" name="nom" value="noom"/><br>
  Prenom : <input type="test" name="prenom" value="peppenom"/><br>
  <input type="submit" name="submit">
 </form>
 </body>
</html>
<?php
}
?>
