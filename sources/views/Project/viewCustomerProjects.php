<style>
<?php include "assets/css/Project/viewCustomerProjects.css";?>
</style>

			<div class="content-wrapper">
				<div class="row col-12">
			        <h3 class="mt-5 mb-3 mx-auto text-center projects-list-title">Liste des projets de "<?= 
                  $one_user->getFirstName(). " ". $one_user->getLastName();
                ?>"</h3>
			    </div>
				<div class="row col-12 justify-content-center">
			      <div class="col-10 text-center">
			        <div class="d-flex align-items-start p-2 px-4 mb-3">
			          <a href="index.php?tab=user" class="btn btn-primary btn-fw together-button add-customer-button me-3" >Retour</a>
			          <a href="index.php?tab=project&action=add&id=<?= $one_user->getUser_id() ?>" class="btn btn-success btn-fw together-button add-customer-button " >Ajouter</a>
			        </div>
			      </div>
			     </div>

			     <div class="row col-12 justify-content-center m-0 mt-3">
			        <div class="card col-10 p-0">
			          <div class="card-body p-0">
			            <!-- <div class="row col-12 m-0"> -->
			              <!-- <div class="col-12 "> -->
			                <table id="order-listing" class="table text-center">
			                  <thead>
			                    <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Actions</th>
				                    </tr>
				                  </thead>
				                  <tbody>
				                    <?php foreach ($customer_list_projects as $key => $project): ?>
				                      <tr>
                                <td><?= $project['name'] ?></td>
                                <td><?= $project['type'] ?></td>
                                <td><?= $project['description'] ?></td>
				                        <td>
                                  <a href="index.php?tab=project&action=view&id=<?= $project['project_id'] ?>"><button class="btn btn-fw together-button m-1">Afficher</button></a>
				                          <a href="index.php?tab=project&action=edit&id=<?= $project['project_id'] ?>"><button class="btn btn-fw bg-warning together-button m-1">Modifier</button></a>
				                          <a href="index.php?tab=project&action=delete&id=<?= $project['project_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce projet?')"><button class="btn bg-danger together-button btn-fw m-1">Supprimer</button></a>
				                        </td>
				                      </tr>
				                    <?php endforeach; ?>
				                  </tbody>
				                </table>
				              <!-- </div> -->
				            <!-- </div> -->
				          </div>
				        </div>

				    </div>
				  </div>