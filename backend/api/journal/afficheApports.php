<?php
//On prend ici toutes les informations qui apparaîtront par défaut dans le journal
// on s'intéresse en particulier aux apports énergétiques consommés

    // header('Content-Type: application/json; charset=UTF-8');
    
    require_once("../databaseConnection.php");

    function getApports($login, $apport, $periode){
        $dbco=databaseConnection();

        $infosApports = $dbco -> prepare
        ("SELECT SUM((a_pour_apport.Ratio/100) * comporte.Quantite) AS 'ApportTotal'
        FROM apport 
        JOIN a_pour_apport ON apport.ID_apport = a_pour_apport.ID_apport
        JOIN aliments ON a_pour_apport.ID_aliments = aliments.ID_aliments
        JOIN comporte ON aliments.ID_aliments = comporte.ID_aliments
        JOIN repas ON comporte.ID_repas = repas.ID_repas
        WHERE repas.Login = $login AND apport.Apport = '$apport' AND repas.Date BETWEEN CURDATE() - INTERVAL $periode DAY AND CURDATE()");
        $infosApports->execute();
        return($infosApports);
    }


    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
    //     // variables GET: $_GET['id_periode'] et $_GET['id_login']
        if (isset($_GET['id_login'])){
            if (isset($_GET['jour'])){
                $resultat["Energie"]=getApports($_GET['id_login'],'Energie',1);
                $resultat["Proteines"]=getApports($_GET['id_login'],'Protéines',1);
                $resultat["Glucides"]=getApports($_GET['id_login'],'Glucides',1);
                $resultat["Lipides"]=getApports($_GET['id_login'],'Lipides',1);
                $resultat["Sucres"]=getApports($_GET['id_login'],'Sucres',1);
                $resultat["Cholesterol"]=getApports($_GET['id_login'],'Cholestérol',1);
                $resultat["Calcium"]=getApports($_GET['id_login'],'Calcium',1);
                $resultat["Fer"]=getApports($_GET['id_login'],'Fer',1);
                $resultat["Magnesium"]=getApports($_GET['id_login'],'Magnésium',1);
                $resultat["Phosphore"]=getApports($_GET['id_login'],'Phosphore',1);
                $resultat["Potassium"]=getApports($_GET['id_login'],'Potassium',1);
                $resultat["Sodium"]=getApports($_GET['id_login'],'Sodium',1);

                $retour["Energie"] = $resultat["Energie"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Proteines"] = $resultat["Proteines"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Glucides"] = $resultat["Glucides"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Lipides"] = $resultat["Lipides"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Sucres"] = $resultat["Sucres"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Cholesterol"] = $resultat["Cholesterol"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Calcium"] = $resultat["Calcium"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Fer"] = $resultat["Fer"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Magnesium"] = $resultat["Magnesium"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Phosphore"] = $resultat["Phosphore"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Potassium"] = $resultat["Potassium"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Sodium"] = $resultat["Sodium"]->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($retour);
                
            }
            else if (isset($_GET['semaine'])){
                $resultat["Energie"]=getApports($_GET['id_login'],'Energie',7);
                $resultat["Proteines"]=getApports($_GET['id_login'],'Protéines',7);
                $resultat["Glucides"]=getApports($_GET['id_login'],'Glucides',7);
                $resultat["Lipides"]=getApports($_GET['id_login'],'Lipides',7);
                $resultat["Sucres"]=getApports($_GET['id_login'],'Sucres',7);
                $resultat["Cholesterol"]=getApports($_GET['id_login'],'Cholestérol',7);
                $resultat["Calcium"]=getApports($_GET['id_login'],'Calcium',7);
                $resultat["Fer"]=getApports($_GET['id_login'],'Fer',7);
                $resultat["Magnesium"]=getApports($_GET['id_login'],'Magnésium',7);
                $resultat["Phosphore"]=getApports($_GET['id_login'],'Phosphore',7);
                $resultat["Potassium"]=getApports($_GET['id_login'],'Potassium',7);
                $resultat["Sodium"]=getApports($_GET['id_login'],'Sodium',7);

                $retour["Energie"] = $resultat["Energie"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Proteines"] = $resultat["Proteines"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Glucides"] = $resultat["Glucides"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Lipides"] = $resultat["Lipides"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Sucres"] = $resultat["Sucres"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Cholesterol"] = $resultat["Cholesterol"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Calcium"] = $resultat["Calcium"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Fer"] = $resultat["Fer"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Magnesium"] = $resultat["Magnesium"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Phosphore"] = $resultat["Phosphore"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Potassium"] = $resultat["Potassium"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Sodium"] = $resultat["Sodium"]->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($retour);
            }

            else if (isset($_GET['mois'])){
                $resultat["Energie"]=getApports($_GET['id_login'],'Energie',30);
                $resultat["Proteines"]=getApports($_GET['id_login'],'Protéines',30);
                $resultat["Glucides"]=getApports($_GET['id_login'],'Glucides',30);
                $resultat["Lipides"]=getApports($_GET['id_login'],'Lipides',30);
                $resultat["Sucres"]=getApports($_GET['id_login'],'Sucres',30);
                $resultat["Cholesterol"]=getApports($_GET['id_login'],'Cholestérol',30);
                $resultat["Calcium"]=getApports($_GET['id_login'],'Calcium',30);
                $resultat["Fer"]=getApports($_GET['id_login'],'Fer',30);
                $resultat["Magnesium"]=getApports($_GET['id_login'],'Magnésium',30);
                $resultat["Phosphore"]=getApports($_GET['id_login'],'Phosphore',30);
                $resultat["Potassium"]=getApports($_GET['id_login'],'Potassium',30);
                $resultat["Sodium"]=getApports($_GET['id_login'],'Sodium',30);

                $retour["Energie"] = $resultat["Energie"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Proteines"] = $resultat["Proteines"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Glucides"] = $resultat["Glucides"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Lipides"] = $resultat["Lipides"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Sucres"] = $resultat["Sucres"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Cholesterol"] = $resultat["Cholesterol"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Calcium"] = $resultat["Calcium"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Fer"] = $resultat["Fer"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Magnesium"] = $resultat["Magnesium"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Phosphore"] = $resultat["Phosphore"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Potassium"] = $resultat["Potassium"]->fetchAll(PDO::FETCH_ASSOC);
                $retour["Sodium"] = $resultat["Sodium"]->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($retour);
            }



        }
    }
    