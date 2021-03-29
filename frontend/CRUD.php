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

            </tbody>
        </table>

        <form id="AddStudentForm" onsubmit="onFormSubmit();" autocomplete="off">
            <p>Nom de l'aliment <br id="contenu-nom"> <input type="text" id="IDnom" name="nom"></p>
            <p>Type <br> <input type="text" id="IDtype" name="prenom"></p>
            <p>Energie <br> <input type="text" id="IDenergie" name="date"> </p>
            <p>Protéines <br> <input type="text" id="IDproteines" name="date"> </p>
            <p>Glucides <br> <input type="text" id="IDglucides" name="date"> </p>
            <p>Lipides <br> <input type="text" id="IDlipides" name="date"> </p>
            <p>Cholestérol <br> <input type="text" id="IDcholesterol" name="date"> </p>
            <p>Calicum <br> <input type="text" id="IDcalcium" name="date"> </p>
            <p>Fer <br> <input type="text" id="IDfer" name="date"> </p>
            <p>Magnésium <br> <input type="text" id="IDmagnesium" name="date"> </p>
            <p>Phosphore <br> <input type="text" id="IDphosphore" name="date"> </p>
            <p>Potassium <br> <input type="text" id="IDpotassium" name="date"> </p>
            <p>Sodium <br> <input type="text" id="IDsodium" name="date"> </p>
            <p><button type="submit">Submit</button></p>
        </form>

        <script>
            let currentMaxId = 0;
            let students = [];
            let currentEditedStudentId =-1;



            function onForm(nom,prenom,date,message,aimeCours){
                $("#IDnom").val(nom);
                $("#IDprenom").val(prenom);
                $("#IDdate").val(date);
                $("#IDmessage").val(message);
                $("#Adore").val(aimeCours);
            }

            function edit(id){
                currentEditedStudentId = id;
                onForm(students[currentEditedStudentId].nom,
                        students[currentEditedStudentId].prenom,
                        students[currentEditedStudentId].date,
                        students[currentEditedStudentId].message,
                        students[currentEditedStudentId].aimeCours
                    );

            }

            function remove(id){
                students.splice(id,1);
                $("#student-"+id).empty();
            }
            
    

            function onFormSubmit(){
                event.preventDefault();
                let newStudent = {};
                newStudent.id = currentMaxId;
                newStudent.nom = $("#IDnom").val();
                newStudent.prenom = $("#IDprenom").val();
                newStudent.date = $("#IDdate").val();
                newStudent.message = $("#IDmessage").val();
                newStudent.aimeCours = "J'adore ce cours ouahhh";
                if  (!$("#Adore").prop("checked")){
                    newStudent.aimeCours = "Non, je déteste";
                }
                $("p").remove("#contenu-removable");
                if (newStudent.nom != ''){
                    if (currentEditedStudentId >= 0){
                        newStudent.id = currentEditedStudentId;
                        students[newStudent.id] = newStudent;
                        $("#student-"+newStudent.id).empty();
                        $("#student-"+newStudent.id).append(`<td> ${newStudent.nom}  </td> <td> 
                        ${newStudent.prenom}  </td> <td> 
                        ${newStudent.date}  </td> <td> 
                        ${newStudent.message}  </td> <td> 
                        ${newStudent.aimeCours}
                        </td> <td> <button onclick="edit(${newStudent.id})" style="color:blue">Edit</button>  <button onclick="remove(${newStudent.id})" style="color:blue">Remove</button> </td>`);
                        currentEditedStudentId = -1;
                        onForm("","","","","");
                    }
                    else{
                        newStudent.id = currentMaxId;
                        currentMaxId++;
                        students.push(newStudent);
                        $("#table-content").append
                        (`<tr id=student-${newStudent.id}> <td> ${newStudent.nom}  </td> <td> 
                        ${newStudent.prenom}  </td>  <td> 
                        ${newStudent.date}  </td>  <td> 
                        ${newStudent.message}  </td> <td> 
                        ${newStudent.aimeCours}
                        </td> <td> <button onclick="edit(${newStudent.id})" style="color:blue">Edit</button>  <button onclick="remove(${newStudent.id})" style="color:blue">Remove</button> </td> </tr>`);
                        onForm("","","","","");
                        addAliment()         
                    }
                }
                else{
                    $("#contenu-nom").before("<p id=\"contenu-removable\" style=\"color:red\"> Ce champ doit être renseigné </p>");
                }
            }


            
        </script>
            </div>
        </div>        
