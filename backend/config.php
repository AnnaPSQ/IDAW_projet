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

            $table_aliments = mysqli_query($mysqli, "SELECT * FROM aliments");
            printf("Select returned %d rows.\n", mysqli_num_rows($table_aliments));

?>