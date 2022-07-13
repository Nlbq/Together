<style>
<?php include "assets/css/Project/edit.css";?>
</style>

<div class="row col-12">
  <h4 class="edit-project-title text-center mt-4 mb-3">Modifier le projet: <?= $one_project->getName(); ?></h4>
</div>

<div class="row col-12 justify-content-center mt-3">
  <div class="col-9 text-center">
    <div class="d-flex align-items-start p-2 ps-1 mb-3">
      <a href="index.php?tab=project&action=view&id= <?= $one_project->getProject_id(); ?>" class="btn btn-primary together-button add-customer-button" >Retour</a>
    </div>
  </div>
</div>

<div class="container col-9 mx-auto py-3 p-5 mb-4 mt-3">
  <form method="POST">
    <div class="card-body">
      <?php 
        Html::input('name', 'Name', 'text', 'Ex: ', $one_project->getName()); ?><?php 
        Html::input('type', 'Type', 'text', 'Ex: ', $one_project->getType()); ?><?php 
        Html::input('description', 'Description', 'textarea', 'Ex: ', $one_project->getDescription()); ?><?php 
      ?>

      <div class="edit-project-btn text-center">
        <button type="submit" class="btn btn-warning text-white m-2 mt-4 together-button">Modifier</button>
      </div>
    </div>
  </form>
</div>

  
