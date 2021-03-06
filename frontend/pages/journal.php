<script src='scripts/journal.js'></script>

<div class="conteneur-flexible bleu ligne ">
    <center>
    <div class="conteneur-flexible ligne ">
        <div class="element-flexible bleu-clair element-hw-autres"> 
            <h2> Journal <h2>  
            <p> Vous trouverez ici toutes les informations sur votre alimentation ! </p>

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

            <table class = "tableau-formulaire" >
                <thead>
                    <tr>
                        <th>Energie (kcal)</th>
                        <th>Protéines (g) </th>
                        <th>Glucides (g) </th>
                        <th>Lipides (g) </th>
                        <th>Sucres (g) </th>
                        <th>Cholestérol (mg)</th>
                        <th>Calcium (mg)</th>
                        <th>Fer (mg)</th>
                        <th>Magnésium (mg)</th>
                        <th>Phosphore (mg)</th>
                        <th>Potassium (mg)</th>
                        <th>Sodium (mg)</th>
                    </tr>
                </thead>

                <tbody id="table-content-apports">

                </tbody>
            </table>


            <h2> Affichez vos repas ! </h2>
            <form id="AfficheRepas"  autocomplete="off" method="GET">
            <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
            <p>Date (optionnel) <br id="contenu-date"> <input type="date" id="IDdate" name="date"></p>
            <p><button onClick="onFormSubmitRepas();">Submit</button></p>
            </form>
            
            <h2> Affichez vos apports ! </h2>
            <form id="AfficheApports" autocomplete="off" method="GET">
                <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin2" name="login2"> </p>
                <label >Période</label>
                    <select id="IDperiode" name="IDperiode">
                        <option value="jour">Jour</option>
                        <option value="semaine">Semaine</option>
                        <option value="mois">Mois</option>
                    <select>
                <p><button onClick = "onFormSubmitApports();">Submit</button></p>
            </form>
            
        </div>
    </div>  
    </center>
</div>