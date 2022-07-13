<style>
	<?php include "assets/css/Delivery/add.css";?>
</style>

<div class="row col-12 justify-content-center">
  <h4 class="add-delivery-title text-center mt-4 mb-3">Ajouter un prospect</h4>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-8 mb-3 text-center">
		<div class="d-flex align-items-start my-3 p-2 px-4">
			<a href="index.php?tab=prospect" class="btn btn-primary btn-fw transparent-button add-prospect-button" >Retour</a>
		</div>
	</div>
</div>
<div class="container col-8 mx-auto pt-4 pb-2 px-5 mb-4 mt-3">
<form method="POST" >
			<div class="row col-12 justify-content-center">
			<div class="col-10"> 
				<?php Html::input('company_name', 'Nom de la Société', 'text', 'Renseigner ce champ ...'); ?>
				<?php Html::input('firstname', 'Prénom', 'text', 'Renseigner ce champ ...'); ?>
				<?php Html::input('lastname', 'Nom', 'text', 'Renseigner ce champ ...'); ?>
				<?php Html::input('email_address', 'Adresse mail', 'text', 'Renseigner ce champ ...'); ?>
				<?php Html::input('phone_number', 'Numéro de téléphone', 'number', 'Renseigner ce champ ...'); ?>
				<?php Html::input('source', 'Source', 'text', 'Renseigner ce champ ...'); ?>
				<div class="form-group">
					<label for="" class="mt-1 mb-1">Type de source</label> <br>
						<select class="form-select" name="type_source">
							<?php foreach ($liste_sources as $key => $type_source) { ?>
								<option value="<?= $type_source ?>"><?= $type_source ?></option>
							<?php } ?>
						</select>
				</div>
				<div class="form-group">
					<label for="" class="mt-1 mb-1">Statut</label> <br>
						<select class="form-select" name="status">
							<?php foreach ($liste_statuts as $key => $status) { ?>
								<option value="<?= $status ?>"><?= $status ?></option>
							<?php } ?>
						</select>
				</div>
				<?php Html::select('gender', 'Genre', ['Homme', 'Femme'], 'Choisir un genre ...'); ?>
				</div>
			
				<div class="add-btn p-2 text-center">
					<button type="submit" class="btn btn-success transparent-button px-4 m-3">Ajouter</button>
				</div>
			</div>

		</form>
</div>
