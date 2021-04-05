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

            function AjaxAfficheAliment(){
                $.ajax({
                type: 'GET',
                url: urlBackendPrefix+"api/aliments/afficheAliment.php",
                mimeType: 'json',
                success: function(data) {
                    $.each(data, function(i, data) {
                        var body = "<tr id = aliments-" + data.ID + ">";
                        body    += "<td>" + data.Nom + "</td>";
                        body    += "<td>" + data.Type + "</td>";
                        body    += "<td>" + data.Energie + "</td>";
                        body    += "<td>" + data.Proteines + "</td>";
                        body    += "<td>" + data.Glucides + "</td>";
                        body    += "<td>" + data.Lipides + "</td>";
                        body    += "<td>" + data.Sucres + "</td>";
                        body    += "<td>" + data.Cholesterol + "</td>";
                        body    += "<td>" + data.Calcium + "</td>";
                        body    += "<td>" + data.Fer + "</td>";
                        body    += "<td>" + data.Magnesium + "</td>";
                        body    += "<td>" + data.Phosphore + "</td>";
                        body    += "<td>" + data.Potassium + "</td>";
                        body    += "<td>" + data.Sodium + "</td>";
                        if (data.ID > 113){
                            body += "<td> <button onclick=\"edit("+data.ID+")\" style=\"color:blue\">Edit</button>  <button onclick=\"remove("+data.ID+")\" style=\"color:blue\">Remove</button> </td>";
                        }
                        body    += "</tr>";
                        $( "#table-CRUD tbody" ).append(body);
                        currentMaxId++;
                        let newFood = {};
                        newFood.id = data.ID;
                        newFood.nom = data.Nom;
                        newFood.type = data.Type;
                        newFood.energie = data.Energie;     
                        newFood.proteines = data.Proteines;
                        newFood.glucides = data.Glucides;
                        newFood.lipides = data.Lipides;
                        newFood.sucres = data.Sucres;
                        newFood.cholesterol = data.Cholesterol;
                        newFood.calcium = data.Calcium;
                        newFood.fer = data.Fer;
                        newFood.magnesium = data.Magnesium;
                        newFood.phosphore = data.Phosphore;
                        newFood.potassium = data.Potassium;
                        newFood.sodium = data.Sodium;
                        aliments.push(newFood);
                    });
                    $( "#table-CRUD" ).DataTable();
                },
                error: function() {
                    alert('Fail!');
                }
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
                onForm(aliments[currentEditedFoodId-1].nom,
                        aliments[currentEditedFoodId-1].type,
                        aliments[currentEditedFoodId-1].energie,
                        aliments[currentEditedFoodId-1].proteines,
                        aliments[currentEditedFoodId-1].glucides,
                        aliments[currentEditedFoodId-1].lipides,
                        aliments[currentEditedFoodId-1].sucres,
                        aliments[currentEditedFoodId-1].cholesterol,
                        aliments[currentEditedFoodId-1].calcium,
                        aliments[currentEditedFoodId-1].fer,
                        aliments[currentEditedFoodId-1].magnesium,
                        aliments[currentEditedFoodId-1].phosphore,
                        aliments[currentEditedFoodId-1].potassium,
                        aliments[currentEditedFoodId-1].sodium,

                    );

            }

            function remove(id){
                currentMaxId = currentMaxId - 1;
                aliments.splice(id,1);
                $("#aliments-"+id).empty();
                AjaxSupprimeAliment(id);
            }
            
            

            function ajouteAliment(newFood){
                newFood.id = currentMaxId;
                $("#table-CRUD tbody").append
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
                if (newFood.nom != '' && newFood.type != '' && newFood.energie != '' && newFood.proteines != '' && newFood.glucides != '' && newFood.lipides != '' && newFood.sucres != '' && newFood.cholesterol != '' && newFood.calcium != ''  && newFood.fer != '' && newFood.magnesium != '' && newFood.phosphore != '' && newFood.potassium != '' && newFood.sodium != ''){
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
                    $("#debut-form").before("<p id=\"contenu-removable\" style=\"color:red\"> Tous les champs doivent être renseignés </p>");
                }
            }

                    
            $(document).ready(function(){
                AjaxAfficheAliment();
            });
       