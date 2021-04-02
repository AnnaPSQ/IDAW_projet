<?php
    $currentPageId = 'index';
    $currentLangId = 'fr';
    $currentStyle = 'habillage1';

    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    
    if(isset($_GET['lang'])) {
        $currentLangId = $_GET['lang'];
    }

    require_once("header.php");

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
