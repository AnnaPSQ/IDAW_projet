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
            <p>Nom de l'aliment <br id="contenu-nom"> <input type="text" id="IDnom" name="nom"></p>
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

        <script>
            let currentMaxId = 1; 
            let aliments = [];
            let currentEditedFoodId =-1;
            let urlBackendPrefix = "http://localhost/IDAW_projet/IDAW_projet/backend/";

            function AjaxEnvoieAliment(aliment){
                $.ajax({
                        url: urlBackendPrefix+"api/aliments/addAliment.php",
                        method: "POST",
                        dataType : "json",
                        data : aliment
                    })
                    .done(function(response){
                        let data = JSON.stringify(response);
                        console.log(data);
                    });
            }
            
            function AjaxChangeAliment(aliment){
                $.ajax({
                        url: urlBackendPrefix+"api/aliments/editAliment.php",
                        method: "POST",
                        dataType : "json",
                        data : aliment
                    })
                    .always(function(response){
                        console.log(response);
                    });
            }

            function AjaxSupprimeAliment(id){
                $.ajax({
                        url: urlBackendPrefix+"api/aliments/deleteAliment.php",
                        method: "POST",
                        dataType : "json",
                        data : {'id': id}
                    })
                    .always(function(response){
                        console.log(response);
                    });
            }

            function onForm(nom,type,energie,proteines,glucides, lipides, sucres, cholesterol, calcium, fer, magnesium, phosphore, potassium, sodium){
                $("#IDnom").val(nom);
                $("#IDtype").val(type);
                $("#IDenergie").val(energie);
                $("#IDproteines").val(proteines);
                $("#IDglucides").val(glucides);
                $("#IDlipides").val(lipides);
                $("#IDsucres").val(sucres);
                $("#IDcholesterol").val(cholesterol);
                $("#IDcalcium").val(calcium);
                $("#IDfer").val(fer);
                $("#IDmagnesium").val(magnesium);
                $("#IDphosphore").val(phosphore);
                $("#IDpotassium").val(potassium);
                $("#IDsodium").val(sodium);

            }

            function edit(id){
                currentEditedFoodId = id;
                onForm(aliments[currentEditedFoodId-1].Nom,
                        aliments[currentEditedFoodId-1].Type,
                        aliments[currentEditedFoodId-1].Energie,
                        aliments[currentEditedFoodId-1].Proteines,
                        aliments[currentEditedFoodId-1].Glucides,
                        aliments[currentEditedFoodId-1].Lipides,
                        aliments[currentEditedFoodId-1].Sucres,
                        aliments[currentEditedFoodId-1].Cholesterol,
                        aliments[currentEditedFoodId-1].Calcium,
                        aliments[currentEditedFoodId-1].Fer,
                        aliments[currentEditedFoodId-1].Magnesium,
                        aliments[currentEditedFoodId-1].Phosphore,
                        aliments[currentEditedFoodId-1].Potassium,
                        aliments[currentEditedFoodId-1].Sodium,

                    );

            }

            function remove(id){
                currentMaxId = currentMaxId - 1;
                aliments.splice(id,1);
                $("#aliments-"+id).empty();
                AjaxSupprimeAliment(id);
            }
            
    

            function onFormSubmit(){
                event.preventDefault();
                let newFood = {};
                newFood.nom = $("#IDnom").val();
                newFood.type = $("#IDtype").val();
                newFood.energie = $("#IDenergie").val();
                newFood.proteines = $("#IDproteines").val();
                newFood.glucides = $("#IDglucides").val();
                newFood.lipides = $("#IDlipides").val();
                newFood.sucres = $("#IDsucres").val();
                newFood.cholesterol = $("#IDcholesterol").val();
                newFood.calcium = $("#IDcalcium").val();
                newFood.fer = $("#IDfer").val();
                newFood.magnesium = $("#IDmagnesium").val();
                newFood.phosphore = $("#IDphosphore").val();
                newFood.potassium = $("#IDpotassium").val();
                newFood.sodium = $("#IDsodium").val();
                $("p").remove("#contenu-removable");
                if (newFood.nom != ''){
                    if (currentEditedFoodId >= 0){
                        editAliment(newFood);
                        AjaxChangeAliment(newFood);
                        currentFoodId = -1;
                        onForm("","","","","","","","","","","","","","");
                    }
                    else{
                        aliments.push(newFood);
                        ajouteAliment(newFood);
                        AjaxEnvoieAliment(newFood);
                        onForm("","","","","","","","","","","","","","");
                    }
                }
                else{
                    $("#contenu-nom").before("<p id=\"contenu-removable\" style=\"color:red\"> Ce champ doit être renseigné </p>");
                }
            }
            
            

            function ajouteAliment(newFood){
                newFood.id = currentMaxId;
                $("#table-CRUD").append
                        (`<tr id=aliments-${newFood.id}> 
                        <td> ${newFood.nom}  </td> <td> 
                        ${newFood.type}  </td> <td> 
                        ${newFood.energie}  </td> <td> 
                        ${newFood.proteines}  </td> <td> 
                        ${newFood.glucides} </td> <td>
                        ${newFood.lipides}  </td> <td> 
                        ${newFood.sucres}  </td> <td> 
                        ${newFood.cholesterol}  </td> <td> 
                        ${newFood.calcium}  </td> <td> 
                        ${newFood.fer}  </td> <td> 
                        ${newFood.magnesium}  </td> <td> 
                        ${newFood.phosphore}  </td> <td> 
                        ${newFood.potassium}  </td> <td>
                        ${newFood.sodium}  </td> <td> `)
                if (newFood.id<114){
                    $("#aliments-"+newFood.id).append
                        (`</tr>`)
                }
                else{
                    $("#aliments-"+newFood.id).append(`<button onclick="edit(${newFood.id})" style="color:blue">Edit</button>  <button onclick="remove(${newFood.id})" style="color:blue">Remove</button> </td> </tr>`);
                }       
                currentMaxId++;
            }

            function editAliment(newFood){
                newFood.id = currentEditedFoodId;
                aliments[newFood.id-1] = newFood;
                $("#aliments-"+newFood.id).empty();
                $("#aliments-"+newFood.id).append(`<td> ${newFood.nom}  </td> <td> 
                        ${newFood.type}  </td> <td> 
                        ${newFood.energie}  </td> <td> 
                        ${newFood.proteines}  </td> <td> 
                        ${newFood.glucides} </td> <td>
                        ${newFood.lipides}  </td> <td> 
                        ${newFood.sucres}  </td> <td> 
                        ${newFood.cholesterol}  </td> <td> 
                        ${newFood.calcium}  </td> <td> 
                        ${newFood.fer}  </td> <td> 
                        ${newFood.magnesium}  </td> <td> 
                        ${newFood.phosphore}  </td> <td> 
                        ${newFood.potassium}  </td> <td> 
                        ${newFood.sodium}  </td> <td> 
                        <button onclick="edit(${newFood.id})" style="color:blue">Edit</button>  <button onclick="remove(${newFood.id})" style="color:blue">Remove</button> </td>`);
            }

                    
            $(document).ready(function(){
                $.getJSON(urlBackendPrefix+"api/aliments/afficheAliment.php", function(data){ 
                    aliments = data;
                    $.each(aliments, function(i, a){
                        let aliment = {};
                        aliment.nom = a.Nom;
                        aliment.type = a.Type; 
                        aliment.energie = a.Energie;
                        aliment.proteines = a.Proteines;
                        aliment.glucides = a.Glucides;
                        aliment.lipides = a.Lipides;
                        aliment.sucres = a.Sucres;
                        aliment.cholesterol = a.Cholesterol;
                        aliment.calcium = a.Calcium;
                        aliment.fer = a.Fer;
                        aliment.magnesium = a.Magnesium;
                        aliment.phosphore = a.Phosphore;
                        aliment.potassium = a.Potassium;
                        aliment.sodium = a.Sodium;
                        ajouteAliment(aliment);
                    });
                    $("#table-CRUD").DataTable();
                });
            });
       
        </script>
            </div>
        </div>        
