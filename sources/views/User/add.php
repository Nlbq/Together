<style>
<?php include "assets/css/Customer/add.css";?>
</style>

<div class="row col-12">
  <h4 class="add-customer-title text-center mt-4 mb-2">Ajouter un utilisateur</h4>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-10 text-center">
		<div class="d-flex align-items-start p-2 px-4">
			<a href="index.php?tab=user" class="btn btn-primary btn-fw together-button add-customer-button" >Retour</a>
		</div>
	</div>
</div>

<div class="container col-10 mx-auto pt-4 pb-2 px-5 mb-4 mt-3">
	
		<form method="POST" >
			<div class="row col-12">
				<div class="col">
					<?php 
							Html::input('firstname', 'Prénom', 'text', 'Renseigner ce champ ...'); ?><?php 
							Html::input('lastname', 'Nom', 'text', 'Renseigner ce champ ...'); ?><?php 
							Html::input('email_address', 'Adresse email', 'text', 'Renseigner ce champ ...'); ?><?php 
							Html::input('gender', 'Genre', 'text', 'Renseigner ce champ ...'); ?><?php 
							Html::input('role', 'Role', 'text', 'Renseigner ce champ ...'); ?><?php 
							Html::input('status', 'Statut', 'text', 'Renseigner ce champ ...'); ?>
				</div>	
				<div class="add-btn p-2 text-center">
					<button type="submit" class="btn btn-success together-button px-4 m-3">Ajouter</button>
				</div>
			</div>
		</form>
	</div>
