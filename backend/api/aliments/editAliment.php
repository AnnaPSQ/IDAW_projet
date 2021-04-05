<?php
    $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
    print_r($_POST);
    try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query1 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[energie]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 1" ;
                $dbco -> exec($query1);
                
                $query2 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[proteines]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 3" ;
                $dbco -> exec($query2);
                
                $query3 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[glucides]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 4" ;
                $dbco -> exec($query3);
                
                $query4 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[lipides]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 5" ;
                $dbco -> exec($query4);
                
                $query5 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[sucres]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 6" ;
                $dbco -> exec($query5);
                
                $query6 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[cholesterol]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 7" ;
                $dbco -> exec($query6);
                
                $query7 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[calcium]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 8" ;
                $dbco -> exec($query7);
                
                $query8 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[fer]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 9" ;
                $dbco -> exec($query8);

                
                $query9 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[magnesium]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 10" ;
                $dbco -> exec($query9);
                
                $query10 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[phosphore]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 11" ;
                $dbco -> exec($query10);
                
                $query11 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[potassium]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 12" ;
                $dbco -> exec($query11);
                
                $query12 = "UPDATE a_pour_apport
                           SET Ratio = '$_POST[sodium]'
                           WHERE ID_aliments = '$_POST[id]' AND ID_apport = 13" ;
                $dbco -> exec($query12);

                
                $query13 = "UPDATE aliments
                           SET Nom = '$_POST[nom]' AND Type = '$_POST[type]'
                           WHERE ID_aliments = '$_POST[id]'" ;
                $dbco -> exec($query13);

                
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>