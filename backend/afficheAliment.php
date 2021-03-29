<?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

                $ratio = $dbco->prepare("SELECT ratio FROM aliments JOIN a_pour_apport ON aliments.id_aliments = a_pour_apport.id_aliments ORDER BY aliments.id_aliments ASC");
                $ratio->execute();

                $nom = $dbco->prepare("SELECT * FROM aliments ");
                $nom->execute();
                

                $resultatratio = $ratio->fetchAll(PDO::FETCH_ASSOC);
                $resultatnom = $nom->fetchAll(PDO::FETCH_ASSOC);

            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }

            
?>


