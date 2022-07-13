<style>
<?php include "assets/css/Customer_information/view.css";?>
</style>

<div class="container customer-view-container mb-5">
  <div class="row col-12">
    <h4 class="mt-4 mb-2 mx-auto text-center customer-view-title">
      Information du client "<?= $one_user->getFirstName(). " ". $one_user->getLastName();?>"
    </h4>
  </div>

  <div class="row col-12 text-center">
    <div class="d-flex align-items-start mt-3 p-2 px-3">
        <a href="index.php?tab=user" class="btn btn-primary btn-fw together-button delivery-button-back me-3" >Retour</a>
        <a href="index.php?tab=customer_information&action=add&id=<?= $one_user->getUser_id() ?>" class="btn btn-success btn-fw together-button add-customer-button " >Ajouter infos</a>
    </div>
  </div>


  <div class="row col-12 pb-5 p-3 bg-white rounded box-shadow">
    <div class="col-10 p-0">
      <div class="media text-muted pt-2">
          <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Société</strong>

              <?php if (!empty($current_customer_informations)): ?>
              <?= $current_customer_informations['company_name'] ?>
              <?php else: ?>
              Information client à renseigner
              <?php endif; ?>  
          </p>
      </div>

      <div class="media text-muted pt-2">
          <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Adresse</strong>

              <?php if (!empty($current_customer_informations)): ?>
                <?= $current_customer_informations['address'] ?>
              <?php else: ?>
              Information client à renseigner
              <?php endif; ?>  
              
          </p>
      </div>

      <div class="media text-muted pt-2">
          <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Code postal</strong>

              <?php if (!empty($current_customer_informations)): ?>
                <?= $current_customer_informations['zip_code'] ?>

              <?php else: ?>
              Information client à renseigner
              <?php endif; ?>  
          </p>
      </div>

      <div class="media text-muted pt-2">
          <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Pays</strong>

              <?php if (!empty($current_customer_informations)): ?>
              <?= $current_customer_informations['country'] ?>
              <?php else: ?>
              Information client à renseigner
              <?php endif; ?>  
          </p>
      </div>
          
      <div class="media text-muted pt-2">
          <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Ville</strong>

              <?php if (!empty($current_customer_informations)): ?>
              <?= $current_customer_informations['city'] ?>
              <?php else: ?>
              Information client à renseigner
              <?php endif; ?>  
          </p>
      </div>

      <div class="media text-muted pt-2">
          <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">N° de téléphone</strong>

              <?php if (!empty($current_customer_informations)): ?>
              <?= $current_customer_informations['phone_number'] ?>
              <?php else: ?>
              Information client à renseigner
              <?php endif; ?>  
          </p>
      </div>

      <div class="media text-muted pt-2">
          <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Siret</strong>

              <?php if (!empty($current_customer_informations)): ?>
              <?= $current_customer_informations['siret'] ?>
              <?php else: ?>
              Information client à renseigner
              <?php endif; ?>  
          </p>
      </div>

      <div class="media text-muted pt-2">
          <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Siren</strong>

              <?php if (!empty($current_customer_informations)): ?>
              <?= $current_customer_informations['siren'] ?>
              <?php else: ?>
              Information client à renseigner
              <?php endif; ?>  
          </p>
      </div>  
    </div>
    <div class="col-2 my-3 p-3 ps-5 rounded box-shadow">
      <h4 class="border-bottom border-primary actions-title pb-2 mb-0">Actions</h4>
      <div class="media text-muted pt-3">
        <a href="index.php?tab=customer_information&action=edit&id=<?= $one_user->getUser_id() ?>"><button class="btn btn-fw bg-warning text-white together-button m-1">Modifier</button></a>
      </div>
      <div class="media text-muted pt-3">
        <a href="index.php?tab=project&action=viewCustomerProjects&id=<?= $one_user->getUser_id() ?>"><button class="btn btn-fw bg-primary text-white together-button px-4 m-1">Projets</button></a>
      </div>
    </div>
  </div>
</div>

