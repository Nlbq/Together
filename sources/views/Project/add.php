<style>
<?php include "assets/css/Project/add.css";?>
</style>



<div class="row col-12">
  <h4 class="add-project-title text-center mt-4 mb-2">Ajouter un projet</h4>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-8 mb-3 text-center">
		<!-- <div class="d-flex align-items-start p-2 px-4">
			<a href="index.php?tab=project&action=viewCustomerProjects&id=<?=$one_user->getUser_id()?>" class="btn btn-primary btn-fw together-button add-project-button-back" >Retour</a>
		</div> -->
	</div>
</div>
<div class="container col-6 mx-auto pt-4 pb-2 px-5 mb-4 mt-3">
<form method="POST" >
			<div class="row col-12 justify-content-center">
			<div class="col-10">
				<?php 
						Html::input('name', 'Nom', 'text', 'Renseigner un titre ...'); ?><?php 
						Html::input('type', 'Type', 'text', 'Renseigner le type ...'); ?><?php 
						Html::input('description', 'Description', 'textarea', 'Renseigner une description ...'); ?>
			</div>
			
			<div class="add-btn p-2 text-center">
							<button type="submit" class="btn btn-success together-button px-4 m-3">Ajouter</button>
						</div>
			</div>

</form>
</div>