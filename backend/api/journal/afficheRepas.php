<?php
    // header('Content-Type: application/json; charset=UTF-8');
    
    require_once("../databaseConnection.php");

    function getRepas($login){
        $dbco=databaseConnection();

        $infosRepas = $dbco->prepare
        ("SELECT  repas.ID_repas, repas.Date, repas.Type_repas, aliments.Type, aliments.Nom, comporte.Quantite 
        FROM utilisateurs
        JOIN repas ON utilisateurs.Login = repas.Login 
        JOIN comporte ON comporte.ID_Repas = repas.ID_repas 
        JOIN aliments ON aliments.ID_aliments = comporte.ID_aliments
        WHERE utilisateurs.Login = ".$login);
        $infosRepas->execute();
        return($infosRepas);
    }


    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (isset($_GET['id_login'])){
          $resultat=getRepas($_GET['id_login']);
          $retour = $resultat->fetchAll(PDO::FETCH_ASSOC);
          echo json_encode($retour);
        }
    }

