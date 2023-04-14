<?php

// echo "Je suis dans action_page.php !!! ";
// echo "<br>";

// Verifier la longueur du tableau $_POST
//if (count($_POST) >0)
//	print "Le S_POST contient des donnees !";
if (count($_POST) >0) {
	$key = array_keys($_POST);
	$val = array_values($_POST);
	for ($i = 0; $i < count($_POST); $i++)
		${$key[$i]} = $val[$i];
}

// Verifier la longueur du tableau $_GET
//if (count($_GET) >0)
//	echo "Le S_GET contient des donnees !";
//echo "<br>";

if (count($_GET) >0) {
	$key = array_keys($_GET);
	$val = array_values($_GET);
	for ($i = 0; $i < count($_GET); $i++)
		${$key[$i]} = $val[$i];
}

//print $pseudo."\n";
//echo "<br>";
//print $message;
//echo "<br>";

$sql_insert = "INSERT INTO bts5 (pseudo,message) VALUES ('$pseudo','$message')\n";
insertToTable($sql_insert);
require_once('./index.php');
//require_once('index.php');	

//foreach($_POST as $key=>$val)
//	${$key} = $val;

$erreur = "";

/*if (isset($ENVOYER)) {
	if ( empty($pseudo) ) $erreur = "<li>Pseudo laisse vide ! </li>";
	if ( empty($message) ) $erreur. = "<li>message laisse vide ! </li>";
}
*/
///////////////////// print_r($_GET);

    function insertToTable($query){

        $connexion = new mysqli("localhost","root","","tp_db");
        if ($connexion->connect_error){
            exit("Erreur de connexion a la base");
        }
        // On insert les données...
        try{
			
            $connexion->query($query);
            //echo "Insert Ok - ", $connexion->insert_id.".\n";
        }catch(Exception $e){
            echo "Ereur d'insertion une erreur s'est produite ".$connexion->error;
            echo "Query => ".$query;
        }
        
        $connexion->close();
    }

?>
