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
        $retour = $resultat->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($retour);
        print_r($retour);
    }