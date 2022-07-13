<style>
<?php include "assets/css/Customer_information/edit.css";?>
</style>

<div class="row col-12">
  <h4 class="edit-customer-title text-center mt-4 mb-4">Modifier le client:  
    <?php 
    echo ($one_user->getFirstName(). " ". $one_user->getLastName());
    ?>
  </h4>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-10 mb-3 text-center">
		<div class="d-flex align-items-start p-2 px-4">
			<a href="index.php?tab=customer_information&action=view&id=<?= $one_user->getUser_id() ?>" class="btn btn-primary btn-fw together-button add-customer-button" >Retour</a>
		</div>
	</div>
</div>

<div class="container col-10 mx-auto py-3 p-5 mb-4 mt-5">

  <form method="POST" class="edit_customer_form"  name="edit_customer_form" enctype="multipart/form-data">

  <div class="row justify-content-center">
  <div class="col-6">

  <?php 
				 Html::input('company_name', 'Nom de société', 'text', 'Renseigner ce champs ...', $one_customer_information->getCompany_name()); ?><?php 
				 Html::input('address', 'Adresse', 'text', 'Renseigner ce champs ...', $one_customer_information->getAddress()); ?><?php 
				 Html::input('zip_code', 'Code postal', 'text', 'Renseigner ce champs ...', $one_customer_information->getZip_code()); ?><?php 
				 Html::input('country', 'Pays', 'text', 'Renseigner ce champs ...', $one_customer_information->getCountry()); ?>
  </div>


  <div class="col-6">

        <?php 
				 Html::input('city', 'Ville', 'text', 'Renseigner ce champs ...', $one_customer_information->getCity()); ?><?php 
				 Html::input('phone_number', 'N° de téléphone', 'text', 'Renseigner ce champs ...', $one_customer_information->getPhone_number()); ?><?php 
				 Html::input('siret', 'Siret', 'text', 'Renseigner ce champs ...', $one_customer_information->getSiret()); ?><?php 
				 Html::input('siren', 'Siren', 'text', 'Renseigner ce champs ...', $one_customer_information->getSiren()); ?>

  </div>

  </div>

      <div class="col-12 text-center">
          <button type="submit" class="btn btn-warning text-white together-button px-4 m-3">Modifier</button>
      </div>

  </form>
</div>

