<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Together</title>
    <!-- plugins:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/Delivery/view.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>

  <body>

    <?php if($one_delivery->getValidation() == 1 ){
        $validation="Livraison validée";
    }else {
        $validation="Livraison non validée";
    } ?>


    <div class="container delivery-view-container ">
        <div class="row col-12">
        <h4 class="mt-4 mb-2 mx-auto text-center delivery-view-title">
            Livraison du projet "
            <?=$one_project->
            getName();?>
            " du 
            <?=FD_JJMMAA($one_delivery->getValidation_date());?>
        </h4>
    </div>

    <div class="row col-12 justify-content-center mb-2 p-3">
        <div class="col-10 p-0">
            <div class="media text-muted pt-2">
                <p class="media-body pb-2 mb-0 border-bottom border-primary">
                    <strong class="d-block pb-1">Description</strong>
                    <?= $one_delivery->getDescription() ?>
                </p>
            </div>

            <?php if ($one_delivery->getValidation() == 1): ?>
                <div class="media text-muted pt-2">
                    <p class="media-body pb-2 mb-0 border-bottom border-primary">
                        <strong class="d-block pb-1">Validation</strong>
                        <?=  $validation ?>
                    </p>
                </div>
                <div class="media text-muted pt-2">
                    <p class="media-body pb-2 mb-0 border-bottom border-primary">
                        <strong class="d-block pb-1">Date de validation</strong>
                        <?=FD_JJMMAA($one_delivery->getValidation_date());?>
                    </p>
                </div>

            <?php elseif($one_delivery->getValidation() == 0) : ?>
                <div class="media text-muted pt-2">
                    <p class="media-body pb-2 mb-0 border-bottom border-primary">
                        <strong class="d-block pb-1">Validation</strong>
                        <?=  $validation ?>
                    </p>
                </div>
            <?php endif; ?>  
        </div>
    </div>
                
    <!-- <div class="container mb-3"> -->
        <div class="row justify-content-center col-12">
            <h4 class="pb-1 p-0 col-10 deliverables-title">Livrables</h4>
        </div>
        
        <div class="row col-12 justify-content-center mb-5 delivery-content">
            <div class="col-10">
            <div class="row justify-content-start">
        <?php foreach ($delivery_list_deliverables as $key => $deliverable): ?>
            <div class="col-4">

            <?php if($deliverable['type'] == "image/jpeg" || $deliverable['type'] == "image/png" || $deliverable['type'] == "image/jpg"){?>

            <a href="" data-bs-toggle="modal" data-bs-target=".bannerformmodal" class="deliverable-link">
                <div class="card livrable-card-view m-3 p-0" style="width: 18rem;">
                    <img class="card-img-top deliverable-img"  src="uploads/deliverables/<?= $deliverable['link'] ?>" alt="deliverable">
                    <div class="card-body">
                        <p class="card-text text-center">
                            <?= $deliverable['link'] ?>
                        </p>
                    </div>
                </div>
            </a>   
            
            
                        
            <?php }elseif($deliverable['type'] == "application/pdf"){ ?>
            
            <a href="uploads/deliverables/<?= $deliverable['link'] ?>" target="_blank" class="deliverable-link">
                <div class="card livrable-card-view justify-content-center m-3 p-0" style="width: 18rem;">
                    <img class="card-img-top file-logo mx-auto mt-4" src="assets/img/file-logo.png" alt="deliverable">
                    <div class="card-body">
                        <p class="card-text text-center">
                            <?= $deliverable['link'] ?>
                        </p>
                    </div>
                </div>   
            </a>   


            <?php } ?>
            </div>
            <?php endforeach; ?>
            </div>
            </div>
        </div>
    <!-- </div> -->

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- The Close Button -->
    <span id="close-modal" class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01" >

    </div>

    <div class="row delivery-validate text-center justify-content-center mb-5">

        <?php if ($one_delivery->getValidation() == 1): ?>

            <div class="alert alert-success col-10" role="alert">
                Cette commande est validée. 
            </div>

        <?php else: ?>    
        <h5> Une livraison de votre commande a été effectuée, confirmez vous la validation de la commande?</h5>
            <form method="post" class="col-sm-10 col-md-10 col-lg-10 col-xl-10  delivery-validate-form" id="delivery-validate-form">
                <input type="hidden" name="hiddenInput" value=""/>
                <button type="submit" class="btn btn-success btn-fw transparent-button col-3 m-2">Valider</button>
            </form>
        <small class="mb-4">(Une fois la commande validée, vous clôturez la commande définitivement)</small>
        <?php endif ?>
    </div>


    <script type="text/javascript" src="assets/js/deliveryView.js"></script>

    </body>
</html>