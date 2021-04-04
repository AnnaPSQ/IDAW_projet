        <?php
            $servname = "localhost"; $dbname = "projetidaw"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

                $sth = $dbco->prepare("SELECT Login FROM utilisateurs");
                $sth->execute();

                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>