<?php

    function connexionBaseDeDonnees(){

        $connexion = new mysqli("localhost","root","","tp_db");
        if ($connexion->connect_error){
            printf("Erreur de connexion a la base");
            return FALSE;
        }

        return $connexion;
    }

    function getMessage(){
        
        $connexion = connexionBaseDeDonnees();
        // Si la connexion est UP alors
        if($connexion !== FALSE){

            $query = "SELECT * FROM bts5";
            $resultat = $connexion->query($query); // Je récupere mon resultat depuis ma base de données et je le transforme en un tableau associatif..
            $messages = array();
            while($mess = $resultat->fetch_assoc()){
                array_push($messages, $mess);
            }
            $connexion->close();
            return $messages;

        }else{
            // Ma connexion est DOWN
            return FALSE;
        }
    } 

?>