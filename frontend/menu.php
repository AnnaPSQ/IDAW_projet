<?php
    function renderMenuToHTML($currentPageId, $currentLangId) {

    $la = 0;
    $mymenu = array(
        // idPage titre
        'index' => array('Accueil', 'Welcome'),
        'repas' =>  array('Repas', 'Meal'),
        'journal' => array('Journal', 'Journal'),
        'CRUD' => array('CRUD', 'CRUD'),
        'profil' => array('¨Profil', 'Profil')
    );

    if ($currentLangId == 'en'){
        $la = 1;
        echo "<center> <button><a href= index.php?page=$currentPageId&lang=fr> Francais </button> </center>";
    }
    else{
        $la = 0;
        echo "<center> <button><a href= index.php?page=$currentPageId&lang=en> Anglais </button> </center>";
    }
    
    echo "<div class='conteneur-flexible ligne invisible'>";
    foreach($mymenu as $pageId => $pageParameters) {
        echo "<div class='element-flexible hw-menu'>";
        if ($currentPageId == $pageId){
            echo "<a id= 'currentpage' href= index.php?page=$pageId&lang=$currentLangId>";
            echo $pageParameters[$la];
            echo "</a></div>";
        }
        else{
            echo "<a href= index.php?page=$pageId&lang=$currentLangId>";
            echo $pageParameters[$la];
            echo "</a></div>";
        }            
    }
    echo "</div>";
 }
?>