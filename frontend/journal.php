<div class="conteneur-flexible ligne ">
<!-- page affichant son journal avec possibilité d’ajouter une entrée (repas)
 résumé des repas, formulaire renseignement repas et comporte -->
    <div class="element-flexible bleu-clair element-hw-autres"> 
        <center> <h2> Journal <h2> </center> 
        <p> Vous trouverez ici toutes les informations sur votre alimentations ! </p>
            

        <form id="AfficheRepas" onsubmit="onFormSubmit();" autocomplete="off" method="POST">
            <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
            <p>Date (optionnel) <br id="contenu-date"> <input type="date" id="IDdate" name="date"></p>
            <p><button type="submit">Submit</button></p>
        </form>

        <script>

            let urlBackendPrefix = "http://localhost/IDAW_projet/IDAW_projet/backend/";

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
            }

            function AjaxEnvoieInfosVoulues(info_voulues){
                    $.ajax({
                            //L'URL de la requête 
                            url: urlBackendPrefix+"afficheRepas.php",

                            //La méthode d'envoi (type de requête)
                            method: "POST",

                            //Le format de réponse attendu
                            dataType : "json",
                            data : info_voulues
                        })
                        //Ce code sera exécuté en cas de succès - La réponse du serveur est passée à done()
                        /*On peut par exemple convertir cette réponse en chaine JSON et insérer
                        * cette chaine dans un div id="res"*/
                        .always(function(response){
                            //let data = JSON.stringify(response);
                            console.log(response);
                        });
            }

            $(document).ready(function(){
                    $.getJSON(urlBackendPrefix+"afficheRepas.php", function(data){ 
                        repas = data;
                        console.log(repas);
                    });
                });
        </script>
    </div>
</div>  
