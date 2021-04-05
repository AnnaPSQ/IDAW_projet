let repas = [];
let urlBackendPrefix = "http://localhost/IDAW_projet/IDAW_projet/backend/";
let currentMaxIdRepas = -1; 

function AjaxIDRepas(){
    
    $.ajax({
        url: urlBackendPrefix+"api/repas/idRepas.php",
        type: 'GET',
        dataType: 'json',
        success : function(data){
            console.log('success');
            IDrepas = data['COUNT(*)'];
            ChangeValeurCurrentMaxIdRepas(IDrepas);
        },
        error : function(data, statut, error){
        console.log(data);
        console.log(statut);
        console.log(error);
        }
    });
}

function AjaxEnvoieRepas(repas){
    $.ajax({
            //L'URL de la requête 
            url: urlBackendPrefix+"api/repas/addRepas.php",

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
            console.log(response);
        });
}

function ChangeValeurCurrentMaxIdRepas(IDrepas){
    console.log('Les deux val');
    console.log(IDrepas);
    currentMaxIdRepas = Number(IDrepas) +2;
    console.log(currentMaxIdRepas);
}

function onForm(login,date,type,aliment1,quantite1,aliment2,quantite2,aliment3,quantite3,aliment4,quantite4){
    $("#IDlogin").val(login);
    $("#IDdate").val(date);
    $("#IDtype_repas").val(type);
    $("#IDconsommation1").val(aliment1);
    $("#IDquantite1").val(quantite1);
    $("#IDconsommation2").val(aliment2);
    $("#IDquantite2").val(quantite2);
    $("#IDconsommation3").val(aliment3);
    $("#IDquantite3").val(quantite3);
    $("#IDconsommation4").val(aliment4);
    $("#IDquantite4").val(quantite4);
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
            if((newMeal.consommation2 !='' && newMeal.quantite2 =='') || (newMeal.consommation3 !='' && newMeal.quantite3 =='') || (newMeal.consommation4 !='' && newMeal.quantite4 =='')
            || (newMeal.consommation2 =='' && newMeal.quantite2 !='') || (newMeal.consommation3 =='' && newMeal.quantite3 !='') || (newMeal.consommation4 =='' && newMeal.quantite4 !='')){
                $("#AddMealForm").before("<p id=\"contenu-removable0\" style=\"color:red\"> Vous devez renseigner un aliment ET sa quantité associée. </p>");
                currentMaxIdRepas ++;
            }
            else{
                AjaxEnvoieRepas(newMeal);
                onForm("","","","","","","","","","","");
                $("#AddMealForm").before("<p id=\"contenu-removable0\" style=\"color:green\"> Votre repas a bien été ajouté à la base </p>");
            }  
    }
    else{
        $("#contenu-login").before("<p id=\"contenu-removable1\" style=\"color:red\"> Vous devez renseigner au moins les 5 premiers champs pour valider votre repas </p>");
    }

    
}

$(document).ready(function(){
    AjaxIDRepas();
    
});