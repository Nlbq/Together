<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Together</title>
    <!-- plugins:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="assets/css/modifyPassword.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </head>

  <body>
    <div class="login-logo text-center mt-5 mb-3">
      <img src="assets/img/together.png" />
    </div>

    <div class="container col-10 col-sm-8 col-md-8 col-lg-8 col-xl-6 justify-content-center">
        <div class="modify-password-info col-10 text-center p-3 mx-auto pt-4">
            <p>Veuillez renseigner votre nouveau mot de passe, comprenant au moins 8 caractères</p>
        </div>

        <form method="post" class="col-sm-10 col-md-10 col-lg-10 col-xl-10 mx-auto pb-2 login-form" id="modifyPasswordForm">

            <div class="form-group pt-1 text-center">
                <label for="newPassword" class="pb-2 newPasswordLabel">Nouveau mot de passe</label><br>
                <input type="password" class="col-8 p-2 mt-2 newPassword" placeholder="Votre nouveau mot de passe" name="newPassword" id="newPassword" required>
            </div>
            <div class="form-group pt-1 text-center">
                <label for="newPasswordConfirm" class="pb-2 pt-4 newPasswordConfirmLabel">Confirmation du nouveau mot de passe</label><br>
                <input type="password" class="col-8 p-2 mt-2 newPasswordConfirm" placeholder="Confirmez votre nouveau mot de passe" name="newPasswordConfirm" id="newPasswordConfirm" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary col-md-4 col-lg-5 mt-5 mb-4 connexion-btn">Valider</button>
            </div>
        </form>
  </div>

  <script type="text/javascript" src="assets/js/modifyPassword.js"></script>

</body>
</html>

