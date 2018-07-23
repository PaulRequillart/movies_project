$(document).ready(function(){
    $("#action-email").click(function(){
        "hidden" == $("#form-account-email").attr("hidden") ? ($("#form-account-email").removeAttr("hidden"),
        $("#form-account-password").attr("hidden", "hidden"),
        $("#action-password").html("Changer votre mot de passe"),
        $("#action-email").html("Annuler")) : ($("#form-account-email").attr("hidden", "hidden"),
        $("#action-email").html("Changer l'adresse mail"))
    }),

    $("#action-password").click(function(){
        "hidden" == $("#form-account-password").attr("hidden") ? ($("#form-account-password").removeAttr("hidden"),
        $("#form-account-email").attr("hidden", "hidden"),
        $("#action-email").html("Changer l'adresse mail"),
        $("#action-password").html("Annuler")) : ($("#form-account-password").attr("hidden", "hidden"),
        $("#action-password").html("Changer votre mot de passe"))
    })

})