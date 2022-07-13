<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Together</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="login-logo text-center mt-5 mb-3">
      <img src="assets/img/together.png" />
    </div>

    <div class="container col-8 col-sm-8 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
      <div class="login-form-logo text-center">
        <i class="fa-solid fa-user fa-3x"></i>
      </div>
      <form class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 mx-auto p-5 login-form" method="POST" action="">

        <?php if(isset($error)){?>
        <p class="login-error text-danger text-center p-2"><?= $error; ?></p>
        <?php }?>
        <?php if(isset($notification)){?>
        <p class="login-notification text-danger text-center p-2"><?= $notification; ?></p>
        <?php }?>
        <?php if(isset($validPassword)){?>
        <p class="email-password-valid text-success text-center p-2"><?= $validPassword; ?></p>
        <?php }?>

        <div class="form-group mt-1">
          <input type="email" class="form-control email-input mb-4" id="InputEmail" name="loginEmail" aria-describedby="emailHelp" placeholder="Adresse email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control password-input mb-4" name="loginPwd" id="InputPassword" placeholder="Mot de passe">
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group text-center">
              <input type="checkbox" class="form-check-input" id="stayConnect" name="stayConnect" >
              <label class="form-check-label mb-2" for="stayConnect">Rester connecter</label>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group text-center">
              <a href="index.php?tab=changePassword" class="forget-password" value="">Mot de passe oublié</a>
            </div>
          </div>
        </div>
        <div class="col text-center">
          <button type="submit" class="btn btn-primary col-md-4 col-lg-4 mt-4 mb-2 connexion-btn">Connexion</button>
        </div>
      </form>
    </div>
  </body>
</html>
