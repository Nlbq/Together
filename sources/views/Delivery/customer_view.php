<!-- <style>
<?php include "assets/css/Project/customer_view.css";?>
</style>

<div class="container customer-projects text-center align-items-center col-6 mb-5 pb-5">
    <p class="customer-projects-title pt-5 pb-2">Mes factures</p>

  <?php foreach ($list_invoices as $key => $value): ?>
        <?php 
			if($value['status'] == 1){
				$color="success";
                $statut="Projet terminé";
			}else{
				$color="warning";
                $statut="Projet en cours";
			}
        ?>
        <?php 
            if(strlen($value['description']) > 100){
            $newDescription = $value['description'];
            $value['description'] = substr_replace("$newDescription", "...", 100);
            }
        ?>  
    <div class="row card text-center project-card mb-3 mt-4 border-<?= $color ?>">
        <div class="card-header">
            <?= $value['type'] ?> 
        </div>
        <div class="card-body p-2">
          <h3 class="card-title mb-3"><?= $value['name'] ?></h3>
          <p class="card-text mb-3"><?= $value['description'] ?></p>
          <a href="index.php?tab=project&action=view&id=<?= $value['project_id'] ?>" class="btn btn-primary p-1 px-2">Afficher</a>
        </div>
          <div class="card-footer d-flex justify-content-between p-2">
            <p class="m-0 mx-3">14/04/2022</p>
            <p class="m-0 mx-3 text-<?= $color ?>"><?=$statut?></p>
          </div>
    </div>
    <?php endforeach ?>
</div> -->