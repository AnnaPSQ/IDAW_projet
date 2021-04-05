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
            console.log(repas);
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
        dataType: 'json',
        success : function(data){
            console.log('success');
            apports = data;
            console.log(apports);
            console.log(apports['Energie'][0].ApportTotal);
            let renseignements = {};
            renseignements.Energie = apports['Energie'][0].ApportTotal;
            renseignements.Proteines = apports['Proteines'][0].ApportTotal;
            renseignements.Glucides = apports['Glucides'][0].ApportTotal;
            renseignements.Lipides = apports['Lipides'][0].ApportTotal;
            renseignements.Sucres = apports['Sucres'][0].ApportTotal;
            renseignements.Cholesterol = apports['Cholesterol'][0].ApportTotal;
            renseignements.Calcium = apports['Calcium'][0].ApportTotal;
            renseignements.Fer = apports['Fer'][0].ApportTotal;
            renseignements.Magnesium = apports['Magnesium'][0].ApportTotal;
            renseignements.Phosphore = apports['Phosphore'][0].ApportTotal;
            renseignements.Potassium = apports['Potassium'][0].ApportTotal;
            renseignements.Sodium = apports['Sodium'][0].ApportTotal;
            console.log('renseignements');
            console.log(renseignements);
            ajouteRepasTable(renseignements);
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

function ajouteRepasTable(renseignements){
                    
    $("#table-content-apports").append
            (`<tr> <td> 
            ${renseignements.Energie}  </td> <td> 
            ${renseignements.Proteines}  </td> <td> 
            ${renseignements.Glucides}  </td> <td> 
            ${renseignements.Lipides}  </td> <td> 
            ${renseignements.Sucres} </td> <td>
            ${renseignements.Cholesterol}  </td> <td>
            ${renseignements.Calcium}  </td> <td>
            ${renseignements.Fer}  </td> <td>
            ${renseignements.Magnesium}  </td> <td>
            ${renseignements.Phosphore}  </td> <td>
            ${renseignements.Potassium}  </td> <td>
            ${renseignements.Sodium}  </td> </tr>`)
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
    AjaxAfficheApports(login_value, periode_value);
    console.log(apports);          

}