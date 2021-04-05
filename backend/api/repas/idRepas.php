<?php
    // header('Content-Type: application/json; charset=UTF-8');
    
    require_once("../databaseConnection.php");

    function getIdRepas(){
        $dbco=databaseConnection();

        $idRepas = $dbco->prepare
        ("SELECT COUNT(*) FROM repas;");
        $idRepas->execute();
        return($idRepas);
    }


    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $resultat=getIdRepas();
        $retour = $resultat->fetchColumn();
        echo json_encode($retour);
    }