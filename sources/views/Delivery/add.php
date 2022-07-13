<style>
<?php include "assets/css/Delivery/add.css";?>
</style>

<div class="row col-12">
  <h4 class="add-delivery-title text-center mt-4 mb-3">Ajouter une livraison</h4>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-8 mb-3 text-center">
		<div class="d-flex align-items-start my-3 p-2 px-4">
			<a href="index.php?tab=project&action=view&id=<?=$one_project->getProject_id()?>" class="btn btn-primary btn-fw transparent-button add-delivery-button-back" >Retour</a>
		</div>
	</div>
</div>
<div class="container col-6 mx-auto pt-4 pb-2 px-5 mb-4 mt-3">
<form method="POST" >
			<div class="row col-12 justify-content-center">
			<div class="col-10">
				<?php 
						Html::input('description', 'Description', 'textarea', 'Renseigner une description ...'); ?><?php 
						// Html::input('validation', 'Validation', 'text', 'Renseigner le champ ...'); ?><?php 
						// Html::input('description', 'Description', 'textarea', 'Renseigner une description ...'); ?>
			</div>
			
			<div class="add-btn p-2 text-center">
							<button type="submit" class="btn btn-success transparent-button px-4 m-3">Ajouter</button>
						</div>
			</div>

</form>
</div>