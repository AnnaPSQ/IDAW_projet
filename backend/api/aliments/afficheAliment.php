<?php
    $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
    try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $infosAliments = $dbco->prepare("SELECT Nom, Type, En.Ratio AS Energie, Pro.Ratio AS Proteines, Glu.Ratio As Glucides, Lip.Ratio As Lipides, Suc.Ratio As Sucres, Cho.Ratio As Cholesterol, Cal.Ratio As Calcium, Fer.Ratio As Fer, Mag.Ratio As Magnesium, Pho.Ratio As Phosphore, Pot.Ratio As Potassium, Sod.Ratio As Sodium FROM `aliments` 
                LEFT JOIN a_pour_apport AS En ON aliments.ID_aliments = En.ID_aliments AND En.ID_apport=1 
                LEFT JOIN a_pour_apport AS Pro ON aliments.ID_aliments = Pro.ID_aliments AND Pro.ID_apport=3
                LEFT JOIN a_pour_apport AS Glu ON aliments.ID_aliments = Glu.ID_aliments AND Glu.ID_apport=4
                LEFT JOIN a_pour_apport AS Lip ON aliments.ID_aliments = Lip.ID_aliments AND Lip.ID_apport=5
                LEFT JOIN a_pour_apport AS Suc ON aliments.ID_aliments = Suc.ID_aliments AND Suc.ID_apport=6
                LEFT JOIN a_pour_apport AS Cho ON aliments.ID_aliments = Cho.ID_aliments AND Cho.ID_apport=7
                LEFT JOIN a_pour_apport AS Cal ON aliments.ID_aliments = Cal.ID_aliments AND Cal.ID_apport=8
                LEFT JOIN a_pour_apport AS Fer ON aliments.ID_aliments = Fer.ID_aliments AND Fer.ID_apport=9
                LEFT JOIN a_pour_apport AS Mag ON aliments.ID_aliments = Mag.ID_aliments AND Mag.ID_apport=10
                LEFT JOIN a_pour_apport AS Pho ON aliments.ID_aliments = Pho.ID_aliments AND Pho.ID_apport=11
                LEFT JOIN a_pour_apport AS Pot ON aliments.ID_aliments = Pot.ID_aliments AND Pot.ID_apport=12
                LEFT JOIN a_pour_apport AS Sod ON aliments.ID_aliments = Sod.ID_aliments AND Sod.ID_apport=13");
                $infosAliments->execute();
                

                $resultatinfosAliments = $infosAliments->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($resultatinfosAliments);
    }

            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }

            
?>


