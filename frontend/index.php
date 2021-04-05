<?php
    session_start();
    $currentPageId = 'index';
    $currentLangId = 'fr';
    $currentStyle = 'habillage1';

    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    
    if(isset($_GET['lang'])) {
        $currentLangId = $_GET['lang'];
    }

    require_once("../backend/ConnexionSession/connected.php");
    require_once("header.php");

    
    if ($_SESSION == array()){
        require_once("../backend/ConnexionSession/login.php");
    }
    else{
        $currentLogin = $_SESSION['Login'];
        echo "<center> Vous êtes connecté en tant que $currentLogin <br>";
        echo "<a href=\"../backend/ConnexionSession/deconnexion.php\"><button type=\"button\">Déconnexion</button></a></center> <br><br>";
    }

    require_once("menu.php");

    renderMenuToHTML($currentPageId, $currentLangId);

?>
<section class="corps">

<?php   
    $pageToInclude = "$currentPageId.php";
    if(is_readable($pageToInclude)){
        require_once($pageToInclude);
    }
    else{
        require_once("error.php");
    }
?>

</section>
<?php
    require_once("footer.php");
?>
