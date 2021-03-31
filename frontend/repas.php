<div class="conteneur-flexible ligne ">
            <div class="element-flexible bleu-clair element-hw-autres"> <center> <h2> Repas <h2> </center>  
            
            <table class = "tableau-formulaire">
            <thead>
                <tr>
                    <th>Date </th>
                    <th>Type de repas</th>
                    <th>Login </th>
                    <th>Consommation 1 </th>
                    <th>Quantité 1 </th>
                    <th>Consommation 2</th>
                    <th>Quantité 2 </th>
                    <th>Consommation 3</th>
                    <th>Quantité 3</th>
                    <th>Consommation 4</th>
                    <th>Quantité 4</th>
                </tr>
            </thead>

            <tbody id="table-content">

            </tbody>
        </table>

        <form id="AddMealForm" onsubmit="onFormSubmit();" autocomplete="off" method="POST">
            <p>Date du repas <br id="contenu-nom"> <input type="datetime" id="IDdate" name="date"></p>
            <p>Type <br> <input type="text" id="IDtype_repas" name="type_repas"></p>
            <p>Login (email)<br> <input type="text" id="IDlogin" name="login"> </p>
            <p>Consommation 1 <br> <input type="text" id="IDconsommation1" name="consommation1"> </p>
            <p>Quantité consommée (1) <br> <input type="text" id="IDquantite1" name="quantite1"> </p>
            <p>Consommation 2 <br> <input type="text" id="IDconsommation2" name="consommation2"> </p>
            <p>Quantité consommée (2) <br> <input type="text" id="IDquantite2" name="quantite2"> </p>
            <p>Consommation 3 <br> <input type="text" id="IDconsommation3" name="consommation3"> </p>
            <p>Quantité consommée (3) <br> <input type="text" id="IDquantite3" name="quantite3"> </p>
            <p>Consommation 4<br> <input type="text" id="IDconsommation4" name="consommation4"> </p>
            <p>Quantité consommée (4) <br> <input type="text" id="IDquantite4" name="quantite4"> </p>
            <p><button type="submit">Submit</button></p>
        </form>

        <script>
            let currentMaxIdRepas = 0; 
            let repas = [];
            let currentEditedMealId =-1;
            let urlBackendPrefix = "http://localhost/IDAW_projet/IDAW_projet/backend/";
            
            // $(document).ready(function(){
            //     $.getJSON(urlBackendPrefix+"afficheAliment.php", function(dataMeal){ 
            //         repas = dataMeal;
            //         $.each(repas, function(i, r){
            //             let mon_repas = {};
            //             repas.id = r.ID_repas;
            //             repas.date = r.Date
            //             repas.type_repas = r.Type;
            //             repas.login= r.Login;
            //             repas.consommation1 = r.
            //             aliment.type = a.Type; 
            //             aliment.energie = a.Energie;
            //             aliment.proteines = a.Proteines;
            //             aliment.glucides = a.Glucides;
            //             aliment.lipides = a.Lipides;
            //             aliment.sucres = a.Sucres;
            //             aliment.cholesterol = a.Cholesterol;
            //             aliment.calcium = a.Calcium;
            //             aliment.fer = a.Fer;
            //             aliment.magnesium = a.Magnesium;
            //             aliment.phosphore = a.Phosphore;
            //             aliment.potassium = a.Potassium;
            //             aliment.sodium = a.Sodium;
            //             ajouteAliment(aliment);
            //         });
            //     });
            // });



            function AjaxEnvoieRepas(repas){
                $.ajax({
                        //L'URL de la requête 
                        url: urlBackendPrefix+"addRepas.php",

                        //La méthode d'envoi (type de requête)
                        method: "POST",

                        //Le format de réponse attendu
                        dataType : "json",
                        data : repas
                    })
                    //Ce code sera exécuté en cas de succès - La réponse du serveur est passée à done()
                    /*On peut par exemple convertir cette réponse en chaine JSON et insérer
                    * cette chaine dans un div id="res"*/
                    .always(function(response){
                        //let data = JSON.stringify(response);
                        console.log(response);
                    });
            }
            

            function onForm(date,type_repas,login,consommation1,quatite1,consommation2,quantite2,consommation3,quantite3,consommation4,quantite4){
                $("#IDdate").val(date);
                $("#IDtype_repas").val(type_repas);
                $("#IDlogin").val(login);
                $("#IDconsommation1").val(consommation1);
                $("#IDquantite1").val(quantite1);
                $("#IDconsommation2").val(consommation2);
                $("#IDquantite2").val(quantite2);
                $("#IDconsommation3").val(consommation3);
                $("#IDquantite3").val(quantite3);
                $("#IDconsommation4").val(consommation4);
                $("#IDquantite4").val(quantite4);

            }

            // function edit(id){
            //     currentEditedFoodId = id;
            //     onForm(aliments[currentEditedFoodId].Nom,
            //             aliments[currentEditedFoodId].Type,
            //             aliments[currentEditedFoodId].Energie,
            //             aliments[currentEditedFoodId].Proteines,
            //             aliments[currentEditedFoodId].Glucides,
            //             aliments[currentEditedFoodId].Lipides,
            //             aliments[currentEditedFoodId].Sucres,
            //             aliments[currentEditedFoodId].Cholesterol,
            //             aliments[currentEditedFoodId].Calcium,
            //             aliments[currentEditedFoodId].Fer,
            //             aliments[currentEditedFoodId].Magnesium,
            //             aliments[currentEditedFoodId].Phosphore,
            //             aliments[currentEditedFoodId].Potassium,
            //             aliments[currentEditedFoodId].Sodium,

            //         );

            }

            // function remove(id){
            //     aliments.splice(id,1);
            //     $("#aliments-"+id).empty();
            // }
            
    

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
                        AjaxChangeAliment();
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
                $("#table-content").append
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
                        ${newFood.sodium}  </td> <td>  <button onclick="edit(${newFood.id})" style="color:blue">Edit</button>  <button onclick="remove(${newFood.id})" style="color:blue">Remove</button> </td> </tr>`);
                currentMaxId++;
            }

            // function editAliment(newFood){
            //     newFood.id = currentEditedFoodId;
            //     aliments[newFood.id] = newFood;
            //     $("#aliments-"+newFood.id).empty();
            //     $("#aliments-"+newFood.id).append(`<td> ${newFood.nom}  </td> <td> 
            //             ${newFood.type}  </td> <td> 
            //             ${newFood.energie}  </td> <td> 
            //             ${newFood.proteines}  </td> <td> 
            //             ${newFood.glucides} </td> <td>
            //             ${newFood.lipides}  </td> <td> 
            //             ${newFood.sucres}  </td> <td> 
            //             ${newFood.cholesterol}  </td> <td> 
            //             ${newFood.calcium}  </td> <td> 
            //             ${newFood.fer}  </td> <td> 
            //             ${newFood.magnesium}  </td> <td> 
            //             ${newFood.phosphore}  </td> <td> 
            //             ${newFood.potassium}  </td> <td> 
            //             ${newFood.sodium}  </td> <td> 
            //             <button onclick="edit(${newFood.id})" style="color:blue">Edit</button>  <button onclick="remove(${newFood.id})" style="color:blue">Remove</button> </td>`);
            // }

            
        </script>
            </div>
        </div>  