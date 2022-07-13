$("#change-password-form").validate({
    rules:{
      emailChangePassword:{
        email: true
      },
    },
        messages: {
          emailChangePassword:{
            required: "Veuillez renseigner votre adresse email",
            email: "L'adresse email renseignée n'est pas valide"
          }  
        },
      
    submitHandler: function(form) {
    form.submit();
  }
 });