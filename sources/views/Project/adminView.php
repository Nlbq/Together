<style>
<?php include "assets/css/Project/view.css";?>
</style>

<?php 
			if($current_project['status'] == 1){
				$statut="Projet clôturé";
			}else{
				$statut="Projet en cours d'élaboration";
			}
?>

<div class="container project-view-container mb-5">
  <div class="row title-project-admin-view text-center px-3">
      <p class="mt-4">Projet : <?= $current_project['name']; ?></p>
  </div>

  <!-- <div class="row"> -->
    <!-- <div class="col-10 text-center"> -->
      <!-- <div class="d-flex align-items-start p-2 px-4 mb-3"> -->
        <a href="index.php?tab=project&action=viewCustomerProjects&id= <?= $one_user->getUser_id()?>" class="btn btn-primary btn-fw together-button add-customer-button" >Retour</a>
      <!-- </div> -->
    <!-- </div> -->
  <!-- </div> -->

  <div class="row col-12 pb-5 p-3 bg-white rounded box-shadow justify-content-center">
    <div class="col-8 p-0">
      <div class="media pt-2">
        <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
        <strong class="d-block text-gray-dark pb-1">Type</strong>
        <?= $current_project['type'] ?>
        </p>
      </div>
      <div class="media pt-2">
        <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
        <strong class="d-block text-gray-dark pb-1">Statut</strong>
        <?= $statut ?>
        </p>
      </div>
      <div class="media pt-2">
        <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-primary">
        <strong class="d-block text-gray-dark pb-1">Description</strong>
        <?= $current_project['description'] ?>
      </div>
    </div>

    <div class="col-2 my-3 p-3 rounded box-shadow">
      <h4 class="border-bottom border-primary pb-2 mb-0 action-title-admin">Actions</h4>
      <div class="media text-muted pt-3">
        <a href="index.php?tab=project&action=edit&id=<?= $current_project['project_id'] ?>" ><button class="btn btn-fw bg-warning text-white together-button">Modifier</button></a>   
      </div>
      <div class="media text-muted pt-3">
        <a href="index.php?tab=project&action=delete&id=<?= $current_project['project_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce projet?')"><button class="btn btn-fw bg-danger text-white together-button">Supprimer</button></a>
      </div>
    </div>
  </div>

  <h4 class=" pb-1 delivery-title-admin">Livraisons</h4>
  <a href="index.php?tab=delivery&action=add&id= <?= $one_project->getProject_id()?>" class="btn btn-success btn-fw together-button add-customer-button me-3" >Ajouter</a>

  <!-- <div class=" justify-content-center align-items-center"> -->
  <div class="row col-10 mb-5 delivery-content mx-auto">
    <table class="table tableplus text-center mt-3 mb-5">
      <thead>
        <tr>
          <th>Date</th>
          <th>Validation</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($project_list_deliverys as $key => $delivery): ?>
          <?php 
            if($delivery['validation'] == 1){
              $validation="Livraison validée";
            }else{
              $validation="Livraison non validée";
            }
          ?>
        <tr>
          <td><?=  FD_JJMMAA($delivery['delivery_date']) ?></td>
          <td><?= $validation ?></td><br>
          <td>
            <a href="index.php?tab=delivery&action=view&id=<?= $delivery['delivery_id'] ?>"><button class="btn btn-fw together-button m-1">Afficher</button></a>
            <!-- <a href=""><button class="btn btn-fw bg-success transparent-button m-1">Envoi</button></a> -->
            <a href="index.php?tab=delivery&action=delete&id=<?= $delivery['delivery_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette livraison?')"><button class="btn btn-fw bg-danger text-white together-button px-3 m-1">Supprimer</button></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- </div> -->
</div>