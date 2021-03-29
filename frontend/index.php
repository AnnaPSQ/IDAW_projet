<?php
    $currentPageId = 'index';
    $currentLangId = 'fr';
    $currentStyle = 'habillage';

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

<center>
<form id="style_form" action="index.php" method="GET">
    <select name="css">
        <option value="habillage">Bleu Gris sympa</option>
        <option value="habillage2">Le prochain est à voir</option>
    </select>
    <input type="submit" value="Appliquer" />
</form>
</center>

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
