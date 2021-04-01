<?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query1 = 
                    "DELETE FROM a_pour_apport
                     WHERE ID_aliments = ".$_POST['id'];
                $dbco -> exec($query1);

                $query3 = 
                    "DELETE FROM est_compose_de
                     WHERE ID_plat = ".$_POST['id'];
                $dbco -> exec($query3);


                $query2 = 
                    "DELETE FROM aliments
                    WHERE ID_aliments = ".$_POST['id'];
                $dbco -> exec($query2);
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>