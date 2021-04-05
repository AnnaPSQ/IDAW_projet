<script src='scripts/repas.js'></script>

<div class="conteneur-flexible bleu ligne ">
    <div class="element-flexible element-hw-autres"> 
        <center> <h2> Repas <h2> </center> 
        <center> <p> Renseignez vos repas ici ! </p>
            

        <form id="AddMealForm" onsubmit="onFormSubmit();" autocomplete="off" method="POST">
            <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
            <p>Date du repas <br id="contenu-date"> <input type="datetime-local" id="IDdate" name="date"></p>
            <p>Type (Petit déjeuner, déjeuner, goûter, diner) <br id="contenu-type"> <input type="text" id="IDtype_repas" name="type_repas"></p>
            <p>Aliment 1 (id)<br id="contenu-conso1"> <input type="text" id="IDconsommation1" name="consommation1"> </p>
            <p>Quantité consommée 1 (en g) <br id="contenu-quantite1"> <input type="text" id="IDquantite1" name="quantite1"> </p>
            <p>Aliment 2 (id)<br> <input type="text" id="IDconsommation2" name="consommation2"> </p>
            <p>Quantité consommée 2 (en g) <br> <input type="text" id="IDquantite2" name="quantite2"> </p>
            <p>Aliment 3 (id)<br> <input type="text" id="IDconsommation3" name="consommation3"> </p>
            <p>Quantité consommée 3 (en g) <br> <input type="text" id="IDquantite3" name="quantite3"> </p>
            <p>Aliment 4 (id)<br> <input type="text" id="IDconsommation4" name="consommation4"> </p>
            <p>Quantité consommée 4 (en g) <br> <input type="text" id="IDquantite4" name="quantite4"> </p>
            <p><button type="submit">Submit</button></p>
        </form>
    </div>
</div>  