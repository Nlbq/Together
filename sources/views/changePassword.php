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
    <link rel="stylesheet" type="text/css" href="assets/css/changePassword.css">


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
        <div class="change-password-info col-10 text-center p-2 mx-auto pt-4">
            <p>Un lien vous permettant de définir un nouveau mot de passe va vous être envoyé par email</p>
        </div>
        <form method="post" class="col-sm-10 col-md-10 col-lg-10 col-xl-10 mx-auto pb-2 change-password-form" id="change-password-form">

        <?php if(isset($error)){?>
        <p class="email-password-error text-center alert alert-danger text-danger p-2"><?= $error; ?></p>
        <?php } ?>

        <?php if(isset($valid)){?>
        <p class="email-password-valid text-center alert alert-success text-success p-2"><?= $valid; ?></p>
        <?php } ?>

            <div class="form-group pt-1 text-center">
                <label for="email" class="pb-3 change-password-label">Email</label><br>
                <input type="email" class="col-10 p-2 mb-2 emailChangePassword" placeholder="Renseignez votre Email" name="emailChangePassword" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary col-md-4 col-lg-5 mt-4 mb-4 connexion-btn">Valider</button>
            </div>
        </form>
</div>

<script type="text/javascript" src="assets/js/changePassword.js"></script>
 
</body>
</html>