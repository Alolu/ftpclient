$('.ftpTrigger').click(function(e){
    console.log($('.ftpTrigger').attr('id'));ds
    e.preventDefault();
    $('.table').removde();
    $('.contenu').load('src/controller/controller_accueil.php');
});