<?php
        print_r($_POST);
            // $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            
            // try{
            //     $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
            //     $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //     $query1 = $dbco->prepare(
            //         "INSERT INTO aliments (nom, type)
            //         VALUES(
            //         ".$_POST['nom'].",
            //         ".$_POST['type'].")";
            //     )
            //     $query1 -> execute();
                

            //     $query2 = $dbco->prepare(
            //     "INSERT INTO a_pour_apport(ID_apport, ID_aliments, Ratio)
            //     VALUES
            //     (1,(SELECT ID_aliments FROM aliments WHERE nom=".$_POST['nom']."),$_POST['energie']), 
            //     (3,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['proteines']),
            //     (4,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['glucides']), 
            //     (5,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['lipideds']), 
            //     (6,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['sucres']), 
            //     (7,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['cholesterol']), 
            //     (8,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['calcium']), 
            //     (9,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['fer']),
            //     (10,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['magnesium']), 
            //     (11,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['phosphore']),
            //     (12,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['potassium']), 
            //     (13,(SELECT ID_aliments FROM aliments WHERE nom=".$POST['nom']."),$POST['sodium']);  
            //     "
                
            //     $query2 -> execute();
            // }
            
            // catch(PDOException $e){
            //     echo "Erreur : " . $e->getMessage();
            // }
                
?>