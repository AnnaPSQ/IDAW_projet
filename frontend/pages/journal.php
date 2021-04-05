<script src='scripts/journal.js'></script>

<center>
<div class="conteneur-flexible ligne ">
<!-- page affichant son journal avec possibilité d’ajouter une entrée (repas)
 résumé des repas, formulaire renseignement repas et comporte -->
    <div class="element-flexible bleu-clair element-hw-autres"> 
        <h2> Journal <h2>  
        <p> Vous trouverez ici toutes les informations sur votre alimentations ! </p>

        <table class = "tableau-formulaire">
            <thead>
                <tr>
                    <th>ID Repas </th>
                    <th>Date </th>
                    <th>Type de repas </th>
                    <th>Type d'Aliment </th>
                    <th>Aliment (g/100g) </th>
                    <th>Quantité (en g)</th>
                </tr>
            </thead>

            <tbody id="table-content">

            </tbody>
        </table>


        <h2> Afficher vos repas ! </h2>
        <form id="AfficheRepas"  autocomplete="off" method="GET">
        <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
        <p>Date (optionnel) <br id="contenu-date"> <input type="date" id="IDdate" name="date"></p>
        <p><button onClick="onFormSubmitRepas();">Submit</button></p>
        </form>
        
        <h2> Afficher vos apport ! </h2>
        <form id="AfficheApports"  autocomplete="off" method="GET">
            <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
            <input type="checkbox" id="IDjour" name="jour"> <label for="Jour">Du jour</label>
            <input type="checkbox" id="IDsemaine" name="semaine"> <label for="Semaine">De la semaine</label>
            <input type="checkbox" id="IDmois" name="mois"> <label for="Mois">Du mois</label>
            <p><button onClick="onFormSubmitApports();">Submit</button></p>
        </form>


            
            

        
    </div>
</div>  
</center>
