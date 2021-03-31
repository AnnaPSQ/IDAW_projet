<?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            print_r($_POST);
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query1 = "INSERT INTO aliments (ID_aliments, Nom, Type) VALUES('$_POST[id]', '$_POST[nom]', '$_POST[type]')";
                $dbco -> exec($query1);
                

                $query2 =
                "INSERT INTO a_pour_apport(ID_apport, ID_aliments, Ratio)
                VALUES
                (1,'$_POST[id]','$_POST[energie]'), 
                (3,'$_POST[id]','$_POST[proteines]'),
                (4,'$_POST[id]','$_POST[glucides]'), 
                (5,'$_POST[id]','$_POST[lipides]'), 
                (6,'$_POST[id]','$_POST[sucres]'), 
                (7,'$_POST[id]','$_POST[cholesterol]'), 
                (8,'$_POST[id]','$_POST[calcium]'), 
                (9,'$_POST[id]','$_POST[fer]'),
                (10,'$_POST[id]','$_POST[magnesium]'), 
                (11,'$_POST[id]','$_POST[phosphore]'),
                (12,'$_POST[id]','$_POST[potassium]'), 
                (13,'$_POST[id]','$_POST[sodium]');  
                ";
                
                $dbco -> exec($query2);
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>