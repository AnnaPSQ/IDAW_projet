let repas = [];
let apports =[];
let urlBackendPrefix = "http://localhost/IDAW_projet/IDAW_projet/backend/";          
                
function AjaxAfficheRepas(login){
                    
    $.ajax({
        url: urlBackendPrefix+"api/journal/afficheRepas.php?id_login='"+login+"'",
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

function AjaxAfficheApports(login, periode){
                    
    $.ajax({
        url: urlBackendPrefix+"api/journal/afficheApports.php?id_login='"+login+"'&id_periode='"+periode+"'",
        type: 'GET',
        // dataType: 'json',
        success : function(data){
            console.log('success');
            console.log(data);
        },
        error : function(data, statut, error){
        console.log(data);
        console.log(statut);
        console.log(error);
        }
    });
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

                
function onFormSubmitRepas(){
    event.preventDefault();

    let login_value = $("input[name='login']").val();
    AjaxAfficheRepas(login_value);
}

function onFormSubmitApports(){
    event.preventDefault();

    let login_value = $('#IDlogin2').val();
    let periode_value = $('#IDperiode').val();
    console.log(login_value);
    console.log(periode_value);
    AjaxAfficheApports(login_value, periode_value);
    console.log(apports);          

}