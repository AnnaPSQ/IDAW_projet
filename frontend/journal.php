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

            function AjaxEnvoieInfosVoulues(infos){
                $.ajax({
                        //L'URL de la requête 
                        url: urlBackendPrefix+"afficheRepas.php",

                        //La méthode d'envoi (type de requête)
                        method: "POST",

                        //Le format de réponse attendu
                        dataType : "json",
                        data : infos
                    })
                    //Ce code sera exécuté en cas de succès - La réponse du serveur est passée à done()
                    /*On peut par exemple convertir cette réponse en chaine JSON et insérer
                    * cette chaine dans un div id="res"*/
                    .always(function(response){
                        //let data = JSON.stringify(response);
                        console.log(response);
                    });
            }

            // function afficheRepas(){
            //     $.getJSON(urlBackendPrefix+"afficheRepas.php", function(data){ 
            //         repas = data;
            //         console.log(repas);
            //         $.each(repas, function(i,a){
            //             let unRepas = {};
            //             unRepas.
            //         })
            //     });

            // }
            
            function onFormSubmit(){
                event.preventDefault();
                let infos_voulues = {};
                infos_voulues.login = $("#IDlogin").val() ;
                infos_voulues.date = $("#IDdate").val() ;

                if (infos_voulues.login !='' ){

                    AjaxEnvoieInfosVoulues(infos_voulues);
                }  
            }
        </script>
    </div>
</div>  
