<div class="conteneur-flexible bleu ligne ">
    <div class="element-flexible element-hw-autres"> 
        <center> <h2> Repas <h2> </center> 
        <center> <p> Renseignez vos repas ici ! </p>
            

        <form id="AddMealForm" onsubmit="onFormSubmit();" autocomplete="off" method="POST">
            <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
            <p>Date du repas <br id="contenu-date"> <input type="datetime-local" id="IDdate" name="date"></p>
            <p>Type (Petit déjeuner, déjeuner, goûter, dinner) <br id="contenu-type"> <input type="text" id="IDtype_repas" name="type_repas"></p>
            <p>Aliment 1 (id)<br id="contenu-conso1"> <input type="text" id="IDconsommation1" name="consommation1"> </p>
            <p>Quantité consommée 1 (en g) <br id="contenu-quantite1"> <input type="text" id="IDquantite1" name="quantite1"> </p>
            <p>Aliment 2 (id)<br> <input type="text" id="IDconsommation2" name="consommation2"> </p>
            <p>Quantité consommée 2 (en g) <br> <input type="text" id="IDquantite2" name="quantite2"> </p>
            <p>Aliment 3 (id)<br> <input type="text" id="IDconsommation3" name="consommation3"> </p>
            <p>Quantité consommée 3 (en g) <br> <input type="text" id="IDquantite3" name="quantite3"> </p>
            <p>Aliment 4 (id)<br> <input type="text" id="IDconsommation4" name="consommation4"> </p>
            <p>Quantité consommée 4 (en g) <br> <input type="text" id="IDquantite4" name="quantite4"> </p>
            <p><button type="submit">Submit</button></p>
        </form>

        <script>
            let currentMaxIdRepas = 21; 
            let repas = [];
            let currentEditedMealId =-1;
            let urlBackendPrefix = "http://localhost/IDAW_projet/IDAW_projet/backend/";


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
            
            function onFormSubmit(){
                event.preventDefault();
                let newMeal = {};
                newMeal.IDrepas = currentMaxIdRepas ;
                newMeal.login = $("#IDlogin").val();
                newMeal.date = $("#IDdate").val();
                newMeal.type_repas = $("#IDtype_repas").val();
                newMeal.consommation1 = $("#IDconsommation1").val();
                newMeal.quantite1 = $("#IDquantite1").val();
                newMeal.consommation2 = $("#IDconsommation2").val();
                newMeal.quantite2 = $("#IDquantite2").val();
                newMeal.consommation3 = $("#IDconsommation3").val();
                newMeal.quantite3 = $("#IDquantite3").val();
                newMeal.consommation4 = $("#IDconsommation4").val();
                newMeal.quantite4 = $("#IDquantite4").val();
                $("p").remove("#contenu-removable0");
                $("p").remove("#contenu-removable1");
                if (newMeal.login !='' && newMeal.date != '' && newMeal.type_repas !='' &&  newMeal.consommation1 !='' && newMeal.quantite1 !=''){
                        if((newMeal.consommation2 !='' && newMeal.quantite2 =='') || (newMeal.consommation3 !='' && newMeal.quantite3 =='') || (newMeal.consommation4 !='' && newMeal.quantite4 =='')){
                            $("#AddMealForm").before("<p id=\"contenu-removable0\" style=\"color:red\"> Vous devez renseigner la quantite des aliments consommés </p>");
                        }
                        else{
                            //aliments.push(newFood);
                            //ajouteAliment(newFood);
                            AjaxEnvoieRepas(newMeal);
                            onForm("","","","","","","","","","","");
                            $("#AddMealForm").before("<p id=\"contenu-removable0\" style=\"color:green\"> Votre repas a bien été ajouté à la base </p>");
                        }  
                }
                else{
                    $("#contenu-login").before("<p id=\"contenu-removable1\" style=\"color:red\"> Vous devez renseigner au moins les 5 premiers champs pour valider votre repas </p>");
                }

                currentMaxIdRepas++;
            }

            
        </script>
    </div>
</div>  