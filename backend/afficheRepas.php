<?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

                $infosRepas = $dbco->prepare("SELECT repas.ID_repas, comporte.ID_aliments, comporte.Quantite 
                FROM repas JOIN comporte ON repas.ID_repas=comporte.ID_repas 
                WHERE repas.ID_repas = 7 ");
                $infosRepas->execute();
                

                $resultatinfosRepas = $infosRepas->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($resultatinfosRepas);
            }
            catch(PDOException $eRepas){
                echo "Erreur : " . $eRepas->getMessage();
            }