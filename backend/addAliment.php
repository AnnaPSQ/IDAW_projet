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

            $services = $mysqli->query("SELECT * FROM aliments");

            if($services && $services->num_rows>0){
                $services->fetch_all(MYSQLI_ASSOC);
            }
            

?>