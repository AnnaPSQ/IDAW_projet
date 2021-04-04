<?php
require_once("testConnexion.php");
    // on simule une base de données
    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;
    if(isset($_POST['Login'])) {
        $tryLogin=$_POST['Login'];
    // si login existe et password correspond
        foreach($resultat as $numbers => $informations){
            if( $informations['Login']==$tryLogin) {
                $successfullyLogged = true;
                $login = $tryLogin;
                $_SESSION['Login'] = $tryLogin;
            }
        }
        if(!$successfullyLogged) {
            echo "<center> Erreur login/password </center>"; 
        }
    }
?>