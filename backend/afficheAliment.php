<?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

                $ratio = $dbco->prepare("SELECT ratio FROM aliments JOIN a_pour_apport ON aliments.id_aliments = a_pour_apport.id_aliments");
                $ratio->execute();

                $nom = $dbco->prepare("SELECT * FROM aliments ");
                $nom->execute();
                

                $resultatratio = $ratio->fetchAll(PDO::FETCH_ASSOC);
                $resultatnom = $nom->fetchAll(PDO::FETCH_ASSOC);

                $increment = 0;
                foreach($resultatnom as $numbers => $informationsNom){
                    echo "<tr> <td> 
                    $informationsNom['Nom'] </td> <td> 
                    $informationsNom['Type']  </td>";
                    for ($i = 0, i< 11, $i++){
                        $numero = 11*$increment + $i;
                        echo "<td> $resultatratio[$numero] </td>";
                        }
                    echo "</td> <td>  <button onclick=\"edit(${newFood.id})\" style=\"color:blue\">Edit</button>  <button onclick=\"remove(${newFood.id})\" style=\"color:blue\">Remove</button> </td> </tr>";
                    $increment++;
                    }
                }
                
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }

            
?>


