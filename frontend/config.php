        <div class="conteneur-flexible ligne ">
            <div class="element-flexible bleu-clair element-hw-autres"> <center> <h2> Accueil <h2> </center>  
            
            <table class = "tableau-formulaire">
            <thead>
                <tr>
                    <th>Nom </th>
                    <th>Prenom </th>
                    <th>Date de naissance </th>
                    <th>Message </th>
                    <th>Adore le cours </th>
                    <th>CRUD</th>
                </tr>
            </thead>

            <tbody id="table-content">

            </tbody>
        </table>

        <form id="AddStudentForm" onsubmit="onFormSubmit();" autocomplete="off">
            <p>Nom* <br id="contenu-nom"> <input type="text" id="IDnom" name="nom"></p>
            <p>Prenom <br> <input type="text" id="IDprenom" name="prenom"></p>
            <p>Date de naissance <br> <input type="date" id="IDdate" name="date"> </p>
            <p>Message: <br><textarea id="IDmessage" name="message"></textarea></p>
            <input type="checkbox" id="Adore" name="question"> <label for="Adore">Adorez-vous le cours?</label>
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
                    }
                }
                else{
                    $("#contenu-nom").before("<p id=\"contenu-removable\" style=\"color:red\"> Ce champ doit être renseigné </p>");
                }
            }


            onForm('','','','','');
        </script>
            </div>
        </div>        


<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php require_once('')
        ?>
    </body>
</html>
