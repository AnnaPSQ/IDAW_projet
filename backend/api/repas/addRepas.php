<?php
    
    $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";

    try{
        $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query1 = 
        "INSERT INTO repas (ID_repas, Date, Type_repas, Login) 
        VALUES('$_POST[IDrepas]', '$_POST[date]', '$_POST[type_repas]', '$_POST[login]')";
        $dbco -> exec($query1);

        $query2 = 
        "INSERT INTO comporte (ID_aliments, ID_repas, Quantite)
        VALUES('$_POST[consommation1]', '$_POST[IDrepas]', '$_POST[quantite1]')";
        $dbco -> exec($query2);

        if ($_POST['consommation2'] !='' && $_POST['quantite2'] !=''){
            $query3 = 
            "INSERT INTO comporte (ID_aliments, ID_repas, Quantite)
            VALUES('$_POST[consommation2]', '$_POST[IDrepas]', '$_POST[quantite2]')";
            $dbco -> exec($query3);
        }

        if ($_POST['consommation3'] !='' && $_POST['quantite3'] !=''){
            $query4 = 
            "INSERT INTO comporte (ID_aliments, ID_repas, Quantite)
            VALUES('$_POST[consommation3]', '$_POST[IDrepas]', '$_POST[quantite3]')";
            $dbco -> exec($query4);
        }

        if ($_POST['consommation4'] !='' && $_POST['quantite4'] !=''){
            $query5 = 
            "INSERT INTO comporte (ID_aliments, ID_repas, Quantite)
            VALUES('$_POST[consommation4]', '$_POST[IDrepas]', '$_POST[quantite4]')";
            $dbco -> exec($query5);
        }


    }
            
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
?>
