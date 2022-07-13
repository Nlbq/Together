<style>
	<?php include "assets/css/Delivery/add.css";?>
</style>

<div class="row col-12 justify-content-center">
  <h4 class="add-delivery-title text-center mt-4 mb-3">Ajouter un événement</h4>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-8 mb-3 text-center">
		<div class="d-flex align-items-start my-3 p-2 px-4">
			<a href="index.php?tab=prospect&action=view&id=<?=$_GET['id']?>" class="btn btn-primary btn-fw transparent-button add-prospect-button" >Retour</a>
		</div>
	</div>
</div>

<div class="container col-8 mx-auto pt-4 pb-2 px-5 mb-4 mt-3">
	<form method="POST">
	<div class="row col-12 justify-content-center">
			<div class="col-10"> 
				<?php Html::input('comment', 'Commentaire', 'textarea', 'Renseigner ce champ ...'); ?>
				<?php Html::input('at', 'Date', 'date', 'Renseigner ce champ ...',date('Y-m-d')); ?>
				<div class="form-group">
					<label for="" class="mt-1 mb-1">Type</label> <br>
						<select class="form-select" name="type">
							<?php foreach ($liste_type as $key => $type) { ?>
								<option value="<?= $type ?>"><?= $type ?></option>
							<?php } ?>
						</select>
				</div>
				<div class="add-btn p-2 text-center">
					<button type="submit" class="btn btn-success transparent-button px-4 m-3" > Ajouter</button>
				</div>
			</div>
	</div>
	</form>
</div>