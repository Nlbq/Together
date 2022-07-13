<style>
<?php include "assets/css/Customer/add.css";?>
</style>

<div class="row col-12">
  <h4 class="add-customer-title text-center mt-4 mb-2">Ajouter un client</h4>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-10 text-center">
		<div class="d-flex align-items-start p-2 px-4">
			<a href="index.php?tab=customer" class="btn btn-primary btn-fw transparent-button add-customer-button" >Retour</a>
		</div>
	</div>
</div>

<div class="container col-10 mx-auto pt-4 pb-2 px-5 mb-4 mt-3">
	
		<form method="POST" >
			<div class="row col-12">
			<div class="col">
				<?php 
						Html::select('gender', 'Gender', ['Male', 'Female'], 'Choisir un genre ...'); ?><?php 
						Html::input('firstname', 'Firstname', 'text', 'Renseigner ce champ ...'); ?><?php 
						Html::input('lastname', 'Lastname', 'text', 'Renseigner ce champ ...'); ?><?php 
						Html::input('company_name', 'Company_name', 'text', 'Renseigner ce champ ...'); ?><?php 
						Html::input('email_address', 'Email_address', 'text', 'Renseigner ce champ ...'); ?><?php 
						Html::input('address', 'Address', 'text', 'Renseigner ce champ ...'); ?>
			</div>
			<div class="col">

						<?php 
						Html::input('zip_code', 'Zip_code', 'text', 'Renseigner ce champ ...'); ?><?php 
						Html::input('country', 'Country', 'text', 'Renseigner ce champ ...'); ?><?php 
						Html::input('city', 'City', 'text', 'Renseigner ce champ ...'); ?><?php 
						Html::input('phone_number', 'Phone_number', 'text', 'Renseigner ce champ ...'); ?><?php 
						Html::input('siret', 'Siret', 'text', 'Renseigner ce champ ...'); ?><?php 
						Html::input('siren', 'Siren', 'text', 'Renseigner ce champ ...'); ?>
			</div>
				

						<div class="add-btn p-2 text-center">
							<button type="submit" class="btn btn-success transparent-button px-4 m-3">Ajouter</button>
						</div>
			</div>

		</form>
	</div>
