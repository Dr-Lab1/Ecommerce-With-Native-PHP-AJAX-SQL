
$(function () {
    // console.log('we are here');
    /** init **/
    $('.menu .item').tab();
    $('.dropdown').dropdown();

    handler();

});


function handler() {

    /*Listener button */
    $('.button_enregistrer').off("click").on("click", function (event) {
        /** recupération des données sur le formulaire **/
        var donnee = $('.formulaire_Client').serialize();
        donnee += '&Save_customer=true';
        console.log("donne collecté : ", donnee);

        $.ajax({
            type: "POST",
            url: "./model/recepteur.php",
            //data: {id: true, nom: nom, post_nom: postnom}, /**  !!!!!!!!!!  **/
            data: donnee,
            success: function (Data) {
                console.log(Data);
            },

        });




    });


}


function getZombie() {
    $('.zombie').on('click', function (event) {
        alert('zamba');
    });
}

function afficher (){
    
    
    $.ajax({
            type: "POST",
            url: "./model/recepteur.php",
            data: {liste_user: 'precieux' }, /**  !!!!!!!!!!  **/
            
            success: function (Data) {
                console.log(Data);
                $('#contenu').html(Data);
            },

        });
    
}