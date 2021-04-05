<script src = 'scripts/CRUD.js' ></script>
        
        <div class="conteneur-flexible ligne ">
            <div class="element-flexible bleu-clair element-hw-autres"> <center> <h2> CRUD <h2> </center>  
            
        <table id = "table-CRUD" class = "display" class="width:100%">
            <thead>
                <tr>
                    <th>Nom de l'aliment </th>
                    <th>Type </th>
                    <th>Energie (kcal/100g) </th>
                    <th>Protéines (g/100g) </th>
                    <th>Glucides (g/100g) </th>
                    <th>Lipides (g/100g)</th>
                    <th>Sucres (g/100g) </th>
                    <th>Cholestérol (g/100g)</th>
                    <th>Calcium (g/100g)</th>
                    <th>Fer (g/100g)</th>
                    <th>Magnésium (g/100g)</th>
                    <th>Phosphore (g/100g)</th>
                    <th>Potassium (g/100g)</th>
                    <th>Sodium (g/100g)</th>
                </tr>
            </thead>

            <tbody>

            </tbody>
        </table>

        <form id="AddFoodForm" onsubmit="onFormSubmit();" autocomplete="off">
            <p id = debut-form>Nom de l'aliment <br id="contenu-nom"> <input type="text" id="IDnom" name="nom"></p>
            <p>Type <br> <input type="text" id="IDtype" name="type"></p>
            <p>Energie (de type decimal: x.y) <br> <input type="text" id="IDenergie" name="energie"> </p>
            <p>Protéines (de type decimal: x.y) <br> <input type="text" id="IDproteines" name="proteines"> </p>
            <p>Glucides (de type decimal: x.y) <br> <input type="text" id="IDglucides" name="glucides"> </p>
            <p>Lipides (de type decimal: x.y) <br> <input type="text" id="IDlipides" name="lipides"> </p>
            <p>Sucres (de type decimal: x.y) <br> <input type="text" id="IDsucres" name="sucres"> </p>
            <p>Cholestérol (de type decimal: x.y) <br> <input type="text" id="IDcholesterol" name="cholesterol"> </p>
            <p>Calcium (de type decimal: x.y) <br> <input type="text" id="IDcalcium" name="calcium"> </p>
            <p>Fer (de type decimal: x.y) <br> <input type="text" id="IDfer" name="fer"> </p>
            <p>Magnésium (de type decimal: x.y) <br> <input type="text" id="IDmagnesium" name="magnesium"> </p>
            <p>Phosphore (de type decimal: x.y) <br> <input type="text" id="IDphosphore" name="phosphore"> </p>
            <p>Potassium (de type decimal: x.y) <br> <input type="text" id="IDpotassium" name="potassium"> </p>
            <p>Sodium (de type decimal: x.y) <br> <input type="text" id="IDsodium" name="sodium"> </p>
            <p><button type="submit">Submit</button></p>
        </form>

        
            </div>
        </div>        
