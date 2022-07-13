$('.newPasswordConfirm').keyup(function(){
    var newPassword = $('.newPassword').val();
    var newPasswordConfirm = $('.newPasswordConfirm').val();

    if(newPassword == newPasswordConfirm){
      $('.message-valide').css("border-color", "green");
      $('.newPasswordConfirm').css("background-color", "rgba(65, 163, 23, 0.3)");
    }else{
      $('.newPasswordConfirm').css("background-color", "rgba(227, 38, 54, 0.3)");
    }
  });

  $("#modifyPasswordForm").validate({
    rules:{
      newPassword:{
        minlength: 8,
        maxlength: 16 
      },
      newPasswordConfirm:{
        minlength: 8,
        maxlength: 16,
        equalTo: "#newPassword"
      },
    },
        messages: {
          newPassword:{
            required: "Veuillez renseigner votre nouveau mot de passe",
            minlength: "Votre mot de passe doit contenir au moins 8 caractères",
            maxlength: "Votre mot de passe doit contenir moins de 16 caractères"
          },
          newPasswordConfirm:{
            required: "Veuillez confirmer votre nouveau mot de passe",
            minlength: "Votre mot de passe doit contenir au moins 8 caractères",
            maxlength: "Votre mot de passe doit contenir moins de 16 caractères",
            equalTo: "Veillez renseigner le même mot de passe que dans le champ au dessus"
          }
        },
      
    submitHandler: function(form) {
    form.submit();
  }
 });
