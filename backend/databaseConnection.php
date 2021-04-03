<?php

  function databaseConnection(){
    $servname = 'localhost';
    $dbname='projetidaw';
    $user = 'root';
    $pass = '';
    $dbco = '';
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