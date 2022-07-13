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

<div class="container project-view-container">
  <div class="row title-project-customer-view text-center px-3">
      <p class="mt-4">Projet : <?= $current_project['name']; ?></p>
  </div>

  <div class="row mb-3">
    <div class="col-2">
        <a href="index.php?tab=project" class="btn btn-primary btn-fw together-button add-customer-button" >Retour</a>
    </div>
  </div>

  <div class="row col-12 pb-5 mb-2 p-3 justify-content-center">
    <div class="col-10 p-0">
      <div class="media pt-2">
        <p class="media-body pb-2 mb-0 border-bottom border-primary">
        <strong class="d-block pb-1">Type</strong>
        <?= $current_project['type'] ?>
        </p>
      </div>
      <div class="media pt-2">
        <p class="media-body pb-2 mb-0 border-bottom border-primary">
        <strong class="d-block pb-1">Statut</strong>
        <?= $statut ?>
        </p>
      </div>
      <div class="media pt-2">
        <p class="media-body pb-2 mb-0 border-bottom border-primary">
        <strong class="d-block pb-1">Description</strong>
        <?= $current_project['description'] ?>
      </div>
    </div>
  </div>

  <div class="row col-10 mx-auto ">
    <h4 class="px-0 pb-1 delivery-title-customer">Livraisons</h4>
  </div>
  
  <div class="row col-10 mb-5 delivery-content mx-auto">
    <table id="order-listing col-10" class="table tableplus text-center">
      <thead>
        <tr>
          <th class="px-0">Date</th>
          <th class="px-0">Validation</th>
          <th class="px-0">Action</th>
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
          <td class="px-0"><?=  FD_JJMMAA($delivery['delivery_date']) ?></td>
          <td><?= $validation ?></td><br>
          <td class="px-0">
            <a href="index.php?tab=delivery&action=view&id=<?= $delivery['delivery_id'] ?>"><button class="btn btn-fw together-button m-1">Afficher</button></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>