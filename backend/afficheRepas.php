<?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

                $infosRepas = $dbco->prepare
                ("SELECT  repas.ID_repas, repas.Date, repas.Type, aliments.Type, aliments.Nom, comporte.Quantite 
                FROM utilisateurs
                JOIN repas ON utilisateurs.Login = repas.Login 
                JOIN comporte ON comporte.ID_Repas = repas.ID_repas 
                JOIN aliments ON aliments.ID_aliments = comporte.ID_aliments
                WHERE utilisateurs.Login = '$_POST[login]'; ");
                $infosRepas->execute();
                

                $resultatinfosRepas = $infosRepas->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($resultatinfosRepas);
            }
            catch(PDOException $eRepas){
                echo "Erreur : " . $eRepas->getMessage();
            }
?>