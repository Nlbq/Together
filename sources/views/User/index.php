<style>
<?php include "assets/css/User/index.css";?>
</style>

	<div class="content-wrapper">
		<div class="row col-12 justify-content-center">
				<h3 class="my-5 p-0 text-center index-title">Liste des clients</h3>
		</div>
		<div class="row col-12 m-0 justify-content-center">
			<div class=" col-10 mr-auto p-2 my-4 d-flex">
				<a href="index.php?tab=user&action=add" class="btn btn-primary together-button add-user-button me-5" >Nouveau client</a>

				<div class="col-4 text-center ">
					<form method="POST">
						<div class="form-group d-flex">
							<input type="text" placeholder="Rechercher..." name="search" class="form-control" value="<?= $searchValue ?>">
							<button type="submit" class="btn btn-primary me-2"><i class="fas fa-search"></i></button>
							<a href="index.php?tab=user" class="btn btn-danger me-2"><i class="fas fa-x"></i></a>
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
						<thead class="data-sticky-header">
							<tr class="user-table-header">
								<th class="p-3">Prénom</th>
								<th class="p-3">Nom</th>
								<th class="p-3">Adresse email</th>
								<th class="p-3">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($list_users as $key => $user): ?>
									<tr>
										<td class="col-2 capitalize"><?= $user['firstname'] ?></td>
										<td class="col-2 capitalize"><?= $user['lastname'] ?></td>

										<td><?= $user['email_address'] ?></td>
										<td>
											<a href="index.php?tab=customer_information&action=view&id=<?= $user['user_id'] ?>"><button class="btn btn-fw bg-secondary together-button px-4 m-1">Infos</button></a>				  
											<a href="index.php?tab=user&action=edit&id=<?= $user['user_id'] ?>"><button class="btn btn-fw bg-warning together-button m-1">Modifier</button></a>
											<a href="index.php?tab=user&action=delete&id=<?= $user['user_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce client?')"><button class="btn btn-fw bg-danger px-3 together-button m-1">Supprimer</button></a>	
											<a href="index.php?tab=project&action=viewCustomerProjects&id=<?= $user['user_id'] ?>"><button class="btn btn-fw together-button px-4 m-1">Projets</button></a>
										</td>
									</tr>
								<?php endforeach; ?>
						</tbody>
					</table>
					
					<nav>
							<ul class="pagination separated d-flex justify-content-end m-0 p-2">
								<li class="page-item">
									<a class="page-link py-2" href="index.php?tab=user&p=<?= $p-1 ?>">
										<i class="fa-solid fa-chevron-left"></i>
									</a>
								</li>
								<?php for($i=1;$i<=$nbr_de_pages;$i++){
										if($p != $i){ ?>
											<li class="page-item">
												<a class="page-link py-2" href="index.php?tab=user&p=<?= $i ?>"><?= $i ?></a>
											</li> 
											<?php } else { ?>
											<li class="page-item active">
												<a class="page-link py-2" href="index.php?tab=user&p=<?= $i ?>"><?= $i ?></a>
											</li>  
									<?php } ?>
								<?php } ?>
								
								<li class="page-item">
									<a class="page-link py-2" href="index.php?tab=user&p=<?= $p+1 ?>">
										<i class="fa-solid fa-chevron-right"></i>
									</a>
								</li>
							</ul>
						</nav>
				</div>
			</div>
		</div>
	</div>
				  