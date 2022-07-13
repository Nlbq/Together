<style>
<?php include "assets/css/Delivery/edit.css";?>
</style>

<div class="row col-12">
  <h4 class="edit-delivery-title text-center mt-4 mb-2">Modifier la livraison du projet "<?= $one_project->getName(); ?>" du <?= FD_JJMMAA($one_delivery->getDelivery_date()); ?></h4>
</div>

<div class="row col-12 justify-content-center">
  <div class="col-9 text-center">
    <div class="d-flex align-items-start py-4 px-4 mb-3">
      <a href="index.php?tab=delivery&action=view&id=<?= $one_delivery->getDelivery_id()?>" class="btn btn-primary btn-fw together-button add-customer-button" >Retour</a>
    </div>
  </div>
</div>

<div class="container col-7 mx-auto py-3 p-5 mb-4 mt-3">
  <form method="POST">
    <div class="card-body">
      <?php 
        Html::input('description', 'Description', 'textarea', 'Ex: ', $one_delivery->getDescription()); ?><?php 
        Html::input('validation', 'Validation', 'text', 'Ex: ', $one_delivery->getValidation()); ?><?php 
      ?>

      <div class="edit-project-btn text-center">
        <button type="submit" class="btn btn-warning text-white m-2 mt-4 together-button">Modifier</button>
      </div>
    </div>
  </form>
</div>

  
