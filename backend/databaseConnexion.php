<?php

  function databaseConnexion(){
    $servername = 'localhost';
    $db_name='projetidaw';
    $username = 'root';
    $password = '';
    //On établit la connexion
    try{
        $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

    return($dbco);
  }