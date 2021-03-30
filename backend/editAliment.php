<?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query1 = "UPDATE aliment
                           SET ID_aliments = $_POST";
                $dbco -> exec($query1);
                

                $query2 =
                "INSERT INTO a_pour_apport(ID_apport, ID_aliments, Ratio)
                VALUES
                (1,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[energie]'), 
                (3,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[proteines]'),
                (4,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[glucides]'), 
                (5,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[lipides]'), 
                (6,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[sucres]'), 
                (7,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[cholesterol]'), 
                (8,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[calcium]'), 
                (9,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[fer]'),
                (10,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[magnesium]'), 
                (11,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[phosphore]'),
                (12,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[potassium]'), 
                (13,(SELECT ID_aliments FROM aliments WHERE nom='$_POST[nom]'),'$_POST[sodium]');  
                ";
                
                $dbco -> exec($query2);
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>