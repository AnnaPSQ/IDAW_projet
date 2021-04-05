<center>
<div class="conteneur-flexible ligne ">
<!-- page affichant son journal avec possibilité d’ajouter une entrée (repas)
 résumé des repas, formulaire renseignement repas et comporte -->
    <div class="element-flexible bleu-clair element-hw-autres"> 
        <h2> Journal <h2>  
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


        <h2> Afficher vos repas ! </h2>
        <form id="AfficheRepas"  autocomplete="off" method="GET">
        <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
        <p>Date (optionnel) <br id="contenu-date"> <input type="date" id="IDdate" name="date"></p>
        <p><button onClick="onFormSubmit();">Submit</button></p>
        </form>
        
        <h2> Afficher vos apport ! </h2>
        <form id="AfficheApports"  autocomplete="off" method="GET">
            <p>Login (email)<br id="contenu-login"> <input type="text" id="IDlogin" name="login"> </p>
            <input type="checkbox" id="IDjour" name="jour"> <label for="Jour">Du jour</label>
            <input type="checkbox" id="IDsemaine" name="semaine"> <label for="Semaine">De la semaine</label>
            <input type="checkbox" id="IDmois" name="mois"> <label for="Mois">Du mois</label>
        </form>
        <script>
            
            let repas = [];
            let urlBackendPrefix = "http://localhost/IDAW_projet/IDAW_projet/backend/";          
            
            function AjaxAfficheRepas(login){
                
                $.ajax({
                    url: urlBackendPrefix+"journal/afficheRepas.php?id_login='"+login+"'",
                    type: 'GET',
                    dataType: 'json',
                    success : function(data){
                        console.log('success');
                        repas = data;
                        $.each(repas, function(i,r){
                            let unRepas = {};
                            unRepas.id_repas = r.ID_repas;
                            unRepas.date = r.Date;
                            unRepas.type_repas = r.Type_repas;
                            unRepas.type_aliment = r.Type;
                            unRepas.nom_aliment = r.Nom;
                            unRepas.quantite = r.Quantite;
                            // console.log(unRepas);
                            ajouteRepasTable(unRepas);
                        });
                    },
                    error : function(data, statut, error){
                    console.log(data);
                    console.log(statut);
                    console.log(error);
                    }
                });
            }


            
            function onFormSubmit(){
                event.preventDefault();

                let login_value = $("input[name='login']").val();
                AjaxAfficheRepas(login_value);
            }

            function ajouteRepasTable(repasAd){
                
                $("#table-content").append
                        (`<tr id=aliments-${repasAd.id_repas}> <td> 
                        ${repasAd.id_repas}  </td> <td> 
                        ${repasAd.date}  </td> <td> 
                        ${repasAd.type_repas}  </td> <td> 
                        ${repasAd.type_aliment}  </td> <td> 
                        ${repasAd.nom_aliment} </td> <td>
                        ${repasAd.quantite}  </td> </tr> `)
            }
        </script>
    </div>
</div>  
</center>
