        <div class="conteneur-flexible ligne ">
            <div class="element-flexible bleu-clair element-hw-autres"> <center> <h2> CRUD <h2> </center>  
            
            <table class = "tableau-formulaire">
            <thead>
                <tr>
                    <th>Nom de l'aliment </th>
                    <th>Type </th>
                    <th>Energie (kcal/100g) </th>
                    <th>Protéines (g/100g) </th>
                    <th>Glucides (g/100g) </th>
                    <th>Lipides (g/100g)</th>
                    <th>Cholestérol (g/100g)</th>
                    <th>Calcium (g/100g)</th>
                    <th>Fer (g/100g)</th>
                    <th>Magnésium (g/100g)</th>
                    <th>Phosphore (g/100g)</th>
                    <th>Potassium (g/100g)</th>
                    <th>Sodium (g/100g)</th>
                </tr>
            </thead>

            <tbody id="table-content">
                <?php
                    require_once("../backend/afficheAliment.php");
                    $increment = 0;
                    foreach($resultatnom as $numbers => $informationsNom){
                        echo "<tr id=aliments-$increment> <td> 
                        $informationsNom[Nom] </td> <td> 
                        $informationsNom[Type]  </td>";
                        for ($i = 0; $i< 11; $i++){
                            $numero = 11*$increment + $i;
                            echo "<td>". $resultatratio[$numero]['ratio'] ."</td>";
                            }
                        echo "</td> <td>  <button onclick=\"edit($informationsNom[ID_aliments]-1)\" style=\"color:blue\">Edit</button>  <button onclick=\"remove($informationsNom[ID_aliments]-1)\" style=\"color:blue\">Remove</button> </td> </tr>";
                        $increment++;
                    }
                ?>
            </tbody>
        </table>

        <form id="AddFoodForm" onsubmit="onFormSubmit();" autocomplete="off" method="POST">
            <p>Nom de l'aliment <br id="contenu-nom"> <input type="text" id="IDnom" name="nom"></p>
            <p>Type <br> <input type="text" id="IDtype" name="type"></p>
            <p>Energie <br> <input type="text" id="IDenergie" name="energie"> </p>
            <p>Protéines <br> <input type="text" id="IDproteines" name="proteines"> </p>
            <p>Glucides <br> <input type="text" id="IDglucides" name="glucides"> </p>
            <p>Lipides <br> <input type="text" id="IDlipides" name="lipides"> </p>
            <p>Cholestérol <br> <input type="text" id="IDcholesterol" name="cholesterol"> </p>
            <p>Calcium <br> <input type="text" id="IDcalcium" name="calcium"> </p>
            <p>Fer <br> <input type="text" id="IDfer" name="fer"> </p>
            <p>Magnésium <br> <input type="text" id="IDmagnesium" name="magnesium"> </p>
            <p>Phosphore <br> <input type="text" id="IDphosphore" name="phosphore"> </p>
            <p>Potassium <br> <input type="text" id="IDpotassium" name="potassium"> </p>
            <p>Sodium <br> <input type="text" id="IDsodium" name="sodium"> </p>
            <p><button type="submit">Submit</button></p>
        </form>

        <script>
            var currentMaxId = <?php echo json_encode($increment); ?>; 
            let aliments = [];
            let currentEditedFoodId =-1;



            function onForm(nom,type,energie,proteines,glucides, lipides, cholestérol, calcium, fer, magnesium, phosphore, potassium, sodium){
                $("#IDnom").val(nom);
                $("#IDtype").val(type);
                $("#IDenergie").val(energie);
                $("#IDproteines").val(proteines);
                $("#IDglucides").val(glucides);
                $("#IDlipides").val(lipides);
                $("#IDcholestrerol").val(cholestérol);
                $("#IDcalcium").val(calcium);
                $("#IDfer").val(fer);
                $("#IDmagnesium").val(magnesium);
                $("#IDphosphore").val(phosphore);
                $("#IDpotassium").val(potassium);
                $("#IDsodium").val(sodium);

            }

            function edit(id){
                currentEditedFoodId = id;
                onForm(aliments[currentEditedFoodId].nom,
                        aliments[currentEditedFoodId].type,
                        aliments[currentEditedFoodId].energie,
                        aliments[currentEditedFoodId].proteines,
                        aliments[currentEditedFoodId].glucides,
                        aliments[currentEditedFoodId].lipides,
                        aliments[currentEditedFoodId].cholesterol,
                        aliments[currentEditedFoodId].calcium,
                        aliments[currentEditedFoodId].fer,
                        aliments[currentEditedFoodId].magnesium,
                        aliments[currentEditedFoodId].phosphore,
                        aliments[currentEditedFoodId].potassium,
                        aliments[currentEditedFoodId].sodium,

                    );

            }

            function remove(id){
                aliments.splice(id,1);
                $("#aliments-"+id).empty();
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
                newFood.cholestrérol = $("#IDcholestrerol").val();
                newFood.calcium = $("#IDcalcium").val();
                newFood.fer = $("#IDfer").val();
                newFood.magnesium = $("#IDmagnesium").val();
                newFood.phosphore = $("#IDphosphore").val();
                newFood.potassium = $("#IDpotassium").val();
                newFood.sodium = $("#IDsodium").val();
                $("p").remove("#contenu-removable");
                if (newFood.nom != ''){
                    if (currentEditedFoodId >= 0){
                        newFood.id = currentEditedFoodId;
                        aliments[newFood.id] = newFood;
                        $("#aliments-"+newFood.id).empty();
                        $("#aliments-"+newFood.id).append(`<td> ${newFood.nom}  </td> <td> 
                        ${newFood.type}  </td> <td> 
                        ${newFood.energie}  </td> <td> 
                        ${newFood.proteines}  </td> <td> 
                        ${newFood.glucides} </td> <td>
                        ${newFood.lipides}  </td> <td> 
                        ${newFood.cholesterol}  </td> <td> 
                        ${newFood.calcium}  </td> <td> 
                        ${newFood.fer}  </td> <td> 
                        ${newFood.magnesium}  </td> <td> 
                        ${newFood.phosphore}  </td> <td> 
                        ${newFood.potassium}  </td> <td> 
                        ${newFood.sodium}  </td> <td> 
                        <button onclick="edit(${newFood.id})" style="color:blue">Edit</button>  <button onclick="remove(${newFood.id})" style="color:blue">Remove</button> </td>`);
                        currentFoodId = -1;
                        onForm("","","","","","","","","","","","","");
                    }
                    else{
                        newFood.id = currentMaxId;
                        currentMaxId++;
                        aliments.push(newFood);
                        $("#table-content").append
                        (`<tr id=aliments-${newFood.id}> 
                        <td> ${newFood.nom}  </td> <td> 
                        ${newFood.type}  </td> <td> 
                        ${newFood.energie}  </td> <td> 
                        ${newFood.proteines}  </td> <td> 
                        ${newFood.glucides} </td> <td>
                        ${newFood.lipides}  </td> <td> 
                        ${newFood.cholesterol}  </td> <td> 
                        ${newFood.calcium}  </td> <td> 
                        ${newFood.fer}  </td> <td> 
                        ${newFood.magnesium}  </td> <td> 
                        ${newFood.phosphore}  </td> <td> 
                        ${newFood.potassium}  </td> <td> 
                        ${newFood.sodium}  </td> <td>  <button onclick="edit(${newFood.id})" style="color:blue">Edit</button>  <button onclick="remove(${newFood.id})" style="color:blue">Remove</button> </td> </tr>`);
                        onForm("","","","","","","","","","","","","");    
                        <?php require_once("../backend/addAliment.php"); ?>;     
                    }
                }
                else{
                    $("#contenu-nom").before("<p id=\"contenu-removable\" style=\"color:red\"> Ce champ doit être renseigné </p>");
                }
            }


            
        </script>
            </div>
        </div>        
