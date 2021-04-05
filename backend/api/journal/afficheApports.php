<?php
//On prend ici toutes les informations qui apparaîtront par défaut dans le journal
// on s'intéresse en particulier aux apports énergétiques consommés

    // header('Content-Type: application/json; charset=UTF-8');
    
    require_once("../databaseConnection.php");

    function getApports($login, $apport, $periode){
        $dbco=databaseConnection();
        
        $infosApports = $dbco -> prepare
        ("SELECT *, (a_pour_apport.Ratio/100) * comporte.Quantite AS 'ApportTotal'
        FROM `apport` 
        JOIN a_pour_apport ON apport.ID_apport = a_pour_apport.ID_apport
        JOIN aliments ON a_pour_apport.ID_aliments = aliments.ID_aliments
        JOIN comporte ON aliments.ID_aliments = comporte.ID_aliments
        JOIN repas ON comporte.ID_repas = repas.ID_repas
        WHERE repas.Login = ".$login. "AND apport.Apport =". $apport. "AND repas.Date BETWEEN CURDATE() - INTERVAL". $periode." DAY AND CURDATE()";)
        $infosApports->execute();
        return($infosApports);
    }


    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (isset($_GET['id_login'])){
          $resultat=getRepas($_GET['id_login']);
          $retour = $resultat->fetchAll(PDO::FETCH_ASSOC);
          echo json_encode($retour);
        }
    }