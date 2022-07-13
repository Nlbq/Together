<style>
<?php include "assets/css/Project/index.css";?>
</style>

			<div class="content-wrapper">
				<div class="row col-12">
			    <h3 class="my-5 mx-auto text-center index-title">Liste des projets </h3>
			  </div>
				<div class="row col-12 m-0 justify-content-center">
					<div class="col-10 mr-auto p-2 my-3 d-flex">
							<a href="index.php?tab=project&action=add" class="btn btn-primary together-button add-customer-button me-5" >Nouveau projet</a>

					<div class="col-4 text-center ">
						<form method="POST">
							<div class="form-group d-flex">
								<input type="text" placeholder="Rechercher..." name="search" class="form-control" value="<?= $searchValue ?>">
								<button type="submit" class="btn btn-primary me-2"><i class="fas fa-search"></i></button>
								<a href="index.php?tab=project" class="btn btn-danger me-2"><i class="fas fa-x"></i></a>
							</div>
						</form>
					</div>
					<?php if(isset($searchError)): ?>
					<p class="alert alert-danger text-center p-1 m-0 col-3" role="alert"><?= $searchError ?></p>
					<?php endif ?>
			    </div>
			  </div>

				<div class="row col-12 justify-content-center m-0 mt-3">
					<div class="card col-10 p-0">
      			<div class="card-body p-0">
							<table id="order-listing" class="table text-center mb-0">
								<thead class=" data-sticky-header ">
									<tr class="user-table-header">
									<th class="p-3">N°</th>
									<th class="p-3">Nom</th>
									<th class="p-3">Client</th>
									<th class="p-3">Type</th>
									<th class="p-3">Statut</th>
									<th class="p-3">Actions</th>
									</tr>
								</thead>
								<tbody>
										<?php	$list_project_sort = rsort($list_projects);		
												foreach ($list_projects as $key => $project): ?>

												<?php	$project['status'] = ($project['status'] == 0) ? "Non validé" : "Validé"; ?>
										<tr>
											<td><?= $project['project_id'] ?></td>
											<td><?= $project['name'] ?></td>
											<td><?= $project['firstname'].' '.$project['lastname'] ?></td>
											<td><?= $project['type'] ?></td>
											<td><?= $project['status'] ?></td>
											<td>
												<a href="index.php?tab=project&action=view&id=<?= $project['project_id'] ?>"><button class="btn bg-primary mt-1"><i class="bi bi-eye-fill"></i></button></a>
												<a href="index.php?tab=project&action=edit&id=<?= $project['project_id'] ?>"><button class="btn bg-warning mt-1"><i class="bi bi-pencil-fill"></i></button></a>
												<a href="index.php?tab=project&action=delete&id=<?= $project['project_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce client?')"><button class="btn bg-danger mt-1"><i class="bi bi-trash3-fill"></i></button></a>
											</td>
				            </tr>
				          <?php endforeach; ?>
								</tbody>
							</table>
							<nav>
								<ul class="pagination separated d-flex justify-content-end m-0 p-2">
									<li class="page-item">
										<a class="page-link py-2" href="index.php?tab=project&p=<?= $p-1 ?>">
											<i class="fa-solid fa-chevron-left"></i>
										</a>
									</li>
									<?php for($i=1;$i<=$nbr_de_pages;$i++){
											if($p != $i){ ?>
												<li class="page-item">
													<a class="page-link py-2" href="index.php?tab=project&p=<?= $i ?>"><?= $i ?></a>
												</li> 
												<?php } else { ?>
												<li class="page-item active">
													<a class="page-link py-2" href="index.php?tab=project&p=<?= $i ?>"><?= $i ?></a>
												</li>  
											<?php } ?>
									<?php } ?>
									
									<li class="page-item">
										<a class="page-link py-2" href="index.php?tab=project&p=<?= $p+1 ?>">
											<i class="fa-solid fa-chevron-right"></i>
										</a>
									</li>
								</ul>
              </nav>
				    </div>
				  </div>
				</div>
			</div>
				  






















			     <!-- <div class="row col-12 justify-content-center">
			      <div class="col-md-10">
			        <div class="card">
			          <div class="card-body">
			            <div class="row">
			              <div class="col-12">
			                <table id="order-listing" class="table tableplus">
			                  <thead>
			                    <tr class="text-center">
									<th>Project_id</th>
									<th>Name</th>
									<th>Type</th>
									<th>Description</th>
									<th>Status</th>
									<th>Actions</th>
				                    </tr>
				                  </thead>
				                  <tbody>

				                    <?php
														$list_project_sort = rsort($list_projects);
														
														foreach ($list_projects as $key => $project): ?>
				                      <tr>
										<td><?= $project['project_id'] ?></td>
										<td><?= $project['name'] ?></td>
										<td><?= $project['type'] ?></td>
										<td><?= $project['description'] ?></td>
										<td><?= $project['status'] ?></td>
				                        <td>
				                          <a href="index.php?tab=project&action=edit&id=<?= $project['project_id'] ?>"><button class="btn bg-warning btn-fw transparent-button mt-1">Modifier</button></a>
				                          <a href="index.php?tab=project&action=delete&id=<?= $project['project_id'] ?>"><button class="btn  bg-danger transparent-button btn-fw mt-1">Supprimer</button></a>
				                        </td>
				                      </tr>
				                    <?php endforeach; ?>
				                  </tbody>
				                </table>

				                    <?php
														$list_project_sort = sort($list_projects);											
														
														foreach ($list_projects as $key => $project): ?>
				                      <tr>
										<td><?= $project['project_id'] ?></td>
										<td><?= $project['customer_id'] ?></td>
										<td><?= $project['name'] ?></td>
										<td><?= $project['type'] ?></td>
										<td><?= $project['description'] ?></td>
										<td><?= $project['status'] ?></td>
				                        <td>
				                          <a href="index.php?tab=project&action=edit&id=<?= $project['project_id'] ?>"><button class="btn bg-warning btn-fw transparent-button mt-1">Modifier</button></a>
				                          <a href="index.php?tab=project&action=delete&id=<?= $project['project_id'] ?>"><button class="btn  bg-danger transparent-button btn-fw mt-1">Supprimer</button></a>
				                        </td>
				                      </tr>
				                    <?php endforeach; ?>
				                  </tbody>
				                </table>
				              </div>
				            </div>
				          </div>
				        </div>
				      </div>
				    </div> -->
				  </div>