<?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            $mysqli = new mysqli($servername, $username, $password);
            
            //On vérifie la connexion
            if($mysqli->connect_error){
                die('Erreur : ' .$mysqli->connect_error);
            }

            $services = $mysqli->query("SELECT * FROM aliments JOIN a_pour_apport ON aliments.id_aliment = a_pour_apport");

            if($services && $services->num_rows>0){
                $services->fetch_all(MYSQLI_ASSOC);
            }
            

?>