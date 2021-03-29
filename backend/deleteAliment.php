<?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query1 = $dbco->prepare(
                    "DELETE FROM 'a_pour_apport' WHERE ID_aliments = (SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom'].")"
                )
                $query1 -> execute();
                

                $query2 = $dbco->prepare(
                "DELETE FROM 'aliment' WHERE ID_aliments = (SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom'].")
                "
                
                $query2 -> execute();
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>