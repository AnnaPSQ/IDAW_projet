<?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query1 =
                    "INSERT INTO aliments (nom, type)
                    VALUES(
                    ".$POST['nom'].",
                    ".$POST['type'].")";
                $dbco -> exec($query1);
                

                $query2 = 
                    "INSERT INTO a_pour_apport(ID_apport, ID_aliments, Ratio)
                    VALUES(1,SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom'].",".$POST['energie'].") 
                    ";
                $dbco -> exec($query2);
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }             
?>