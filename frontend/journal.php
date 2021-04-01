<div class="conteneur-flexible ligne ">
<!-- page affichant son journal avec possibilité d’ajouter une entrée (repas)
 résumé des repas, formulaire renseignement repas et comporte -->
    <div class="element-flexible bleu-clair element-hw-autres"> <center> <h2> Journal <h2> </center>  
            

        <form id="AfficheRepas" onsubmit="onFormSubmit();" autocomplete="off" method="POST">
            <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
            <p>Date du repas <br id="contenu-date"> <input type="datetime-local" id="IDdate" name="date"></p>
        </form>
    </div>
</div>  
