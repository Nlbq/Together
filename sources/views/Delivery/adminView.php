<style>
<?php include "assets/css/Delivery/view.css";?>
</style>

<?php if($current_delivery['validation'] == 1 ){
    $validation="Livraison validée";
}else {
    $validation="Livraison non validée";
} ?>

<div class="container project-view-container ">

    <div class="row col-12">
        <h4 class="mt-4 mb-2 mx-auto text-center delivery-view-title">
            Livraison du projet "
            <?=$one_project->
            getName();?>
            " du 
            <?=FD_JJMMAA($current_delivery['delivery_date']);?>
        </h4>
    </div>

        <div class="row col-12 text-center">
            <div class="d-flex align-items-start mt-3 p-2 px-3">
                <a href="index.php?tab=project&action=view&id=<?=$one_project->getProject_id()?>" class="btn btn-primary btn-fw together-button delivery-button-back" >Retour</a>
            </div>
        </div>


    <div class="row col-12 p-3 bg-white rounded box-shadow justify-content-center">
        <div class="col-8 p-0">
            <div class="media pt-2">
                <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
                    <strong class="d-block text-gray-dark pb-1">Description</strong>
                    <?= $current_delivery['description'] ?>
                </p>
            </div>

            <?php if ($current_delivery['validation'] == 1): ?>
                <div class="media pt-2">
                    <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
                        <strong class="d-block text-gray-dark pb-1">Validation</strong>
                        <?=  $validation ?>
                    </p>
                </div>
                <div class="media pt-2">
                    <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
                        <strong class="d-block text-gray-dark pb-1">Date de validation</strong>
                        <?=FD_JJMMAA($current_delivery['validation_date']);?>
                    </p>
                </div>
            <?php elseif($current_delivery['validation'] == 0) : ?>
                <div class="media pt-2">
                    <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
                        <strong class="d-block text-gray-dark pb-1">Validation</strong>
                        <?=  $validation ?>
                    </p>
                </div>
            <?php endif; ?>  
        </div>
            <div class="col-2 my-3 p-3 ps-5 rounded box-shadow">
                <h4 class="border-bottom border-primary actions-title pb-2 mb-0">Actions</h4>
                <div class="media text-muted pt-3">
                    <a href="index.php?tab=delivery&action=edit&id=<?= $current_delivery['delivery_id'] ?>" ><button class="btn btn-fw bg-warning text-white together-button">Modifier</button></a>
                </div>
                <div class="media text-muted pt-3">
                    <form method="post" class="col-sm-10 col-md-10 col-lg-10 col-xl-10  send-email-form" id="send-email-form">
                        <input type="hidden" name="hiddenInput" value=""/>
                        <button type="submit" class="btn btn-success btn-fw together-button">Envoyer</button>
                    </form>
                </div>
                <div class="media text-muted pt-3">
                    <a href="index.php?tab=delivery&action=delete&id=<?= $current_delivery['delivery_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette livraison?')"><button class="btn btn-fw bg-danger text-white together-button">Supprimer</button></a>
                </div>
            </div>

            <?php if(isset($error)){?>
                <p class="email-delivery-validation-error alert alert-danger rounded text-center p-2"><?= $error; ?></p>
            <?php } ?>

            <?php if(isset($valid)){?>
                <p class="email-delivery-validation-valid col-6 rounded mx-auto text-center alert alert-success p-2"><?= $valid; ?></p>
            <?php } ?>
    </div>

    <div class="row col-12 justify-content-center">
        <div class="col-10 mb-3">
            <h4 class="add-delivrable-title">
                Ajouter un livrable
            </h4>
            <form method="POST" class="mb-3" enctype='multipart/form-data'>
                <div class="row align-items-center">
                    <div class="col">
                        <input type="file" class="form-control" id="customFile" name="deliverable">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-fw together-button m-2">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

        <div class="container mb-3">
        <div class="row justify-content-center col-12">
            <h4 class="p-0 pb-1 deliverables-title col-10">Livrables </h4>
        </div>
        
        <div class="row justify-content-center mb-5 delivery-content">
            <!-- <div class="col-10"> -->
            <div class="row col-10 justify-content-start mb-5">
        <?php foreach ($delivery_list_deliverables as $key => $deliverable): ?>
            <div class="col-4">

            <?php if($deliverable['type'] == "image/jpeg" || $deliverable['type'] == "image/png" || $deliverable['type'] == "image/jpg"){?>

            <div class="card livrable-card-view mx-auto m-3 p-0" style="width: 18rem;">
                <a href="index.php?tab=deliverable&action=delete&id=<?= $deliverable['deliverable_id'] ?>">
                    <div class="cross">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </a>
                <img class="card-img-top" src="uploads/deliverables/<?= $deliverable['link'] ?>" alt="deliverable">
                <div class="card-body">
                    <p class="card-text text-center">
                        <?= $deliverable['link'] ?>
                    </p>
                </div>
            </div>
            
            <?php }elseif($deliverable['type'] == "application/pdf"){ ?>

            <div class="card livrable-card-view mx-auto m-3 p-0" style="width: 18rem;">
                <img class="card-img-top file-logo mx-auto mt-4" src="assets/img/file-logo.png" alt="deliverable">
                <a href="index.php?tab=deliverable&action=delete&id=<?= $deliverable['deliverable_id'] ?>">
                    <div class="cross">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </a>
                <div class="card-body">
                    <p class="card-text text-center">
                        <?= $deliverable['link'] ?>
                    </p>
                </div>
            </div>      
            <?php } ?>
            </div>
            <?php endforeach; ?>
            </div>
            <!-- </div> -->
        </div>
    </div>

    </div>
