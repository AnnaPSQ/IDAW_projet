<div class="conteneur-flexible ligne ">
<!-- page affichant son journal avec possibilité d’ajouter une entrée (repas)
 résumé des repas, formulaire renseignement repas et comporte -->
    <div class="element-flexible bleu-clair element-hw-autres"> 
        <center> <h2> Journal <h2> </center> 
        <p> Vous trouverez ici toutes les informations sur votre alimentations ! </p>

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

        <form id="AfficheRepas" onsubmit="onFormSubmit();" autocomplete="off" method="POST">
            <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
            <p>Date (optionnel) <br id="contenu-date"> <input type="date" id="IDdate" name="date"></p>
            <p><button type="submit">Submit</button></p>
        </form>

        <script>
            
            let repas = [];
            let urlBackendPrefix = "http://localhost/IDAW_projet/IDAW_projet/backend/";          

            // function AjaxEnvoieInfosVoulues(infos){
            //     $.ajax({
            //         //L'URL de la requête 
            //         url: urlBackendPrefix+"afficheRepas.php",

            //         //La méthode d'envoi (type de requête)
            //         method: "POST",

            //         //Le format de réponse attendu
            //         dataType : "json",
            //         data : infos,
            //         success : function(response){

            //         // .always(function(response){
            //                 console.log('success');
            //                 repas = response;
            //                 $.each(repas, function(i,r){
            //                     let unRepas = {};
            //                     unRepas.id_repas = r.ID_repas;
            //                     unRepas.date = r.Date;
            //                     unRepas.type_repas = r.Type_repas;
            //                     unRepas.type_aliment = r.Type;
            //                     unRepas.nom_aliment = r.Nom;
            //                     unRepas.quantite = r.Quantite;
            //                     // console.log(unRepas);
            //                     ajouteRepasTable(unRepas);
            //                 });
            //         // })
            //         },
            //         error : function(data, statut, error){
            //             console.log(error);
            //             console.log('erreur');
            //         }
            //     });
            // };
            
            

            
            function onFormSubmit(){
                event.preventDefault();

                let infos_voulues = {};
                infos_voulues.login = $("#IDlogin").val() ;
                infos_voulues.date = $("#IDdate").val() ;

                if (infos_voulues.login !='' ){
                    
                    AjaxEnvoieInfosVoulues(infos_voulues);
                }  
            }

            function ajouteRepasTable(repasAd){
                
                $("#table-content").append
                        (`<tr id=aliments-${repasAD.id_repas}> <td> 
                        ${repasAd.id_repas}  </td> <td> 
                        ${repasAd.date}  </td> <td> 
                        ${repasAd.type_repas}  </td> <td> 
                        ${repasAd.type_aliment}  </td> <td> 
                        ${repasAd.nom_aliment} </td> <td>
                        ${repasAs.quantite}  </td> </tr> `)
            }
        </script>
    </div>
</div>  
