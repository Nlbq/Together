<style>
<?php include "assets/css/Prospect/index.css";?>
</style>

<div class="content-wrapper">
	<div class="row col-12">
		<h3 class="my-5 mx-auto text-center index-title">Liste des prospects </h3>
	</div>

	<div class="row col-12 m-0 justify-content-center">
		<div class="col-10 mr-auto p-2 my-4 d-flex">
			<a href="index.php?tab=prospect&action=add" class="btn btn-primary together-button add-prospect-button me-5">Nouveau prospect</a>

			<div class="col-4 text-center ">
				<form method="POST">
					<div class="form-group d-flex">
						<input type="text" placeholder="Rechercher..." name="search" class="form-control" value="<?= $searchValue ?>">
						<button type="submit" class="btn btn-primary me-2"><i class="fas fa-search"></i></button>
						<a href="index.php?tab=prospect" class="btn btn-danger me-2"><i class="fas fa-x"></i></a>
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
				<table id="order-listing" class="table tableplus text-center mb-0">
					<thead class="">
						<tr>
							<th class="p-3">Société</th>
							<th class="p-3">Prénom</th>
							<th class="p-3">Nom</th>
							<th class="p-3">Adresse email</th>
							<th class="p-3">N° de téléphone</th>
							<!-- <th>Statut</th> -->
							<th class="p-3">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($list_prospects as $key => $prospect): ?>
						<tr>
							<td><?= $prospect['company_name'] ?></td>
							<td><?= $prospect['firstname'] ?></td>
							<td><?= $prospect['lastname'] ?></td>
							<td><?= $prospect['email_address'] ?></td>
							<td><?= $prospect['phone_number'] ?></td>
							<!-- <td> 
							<?php if ($prospect['status'] == "Prospect") { ?>
								<span class="badge text-bg-primary"><?= $prospect['status'] ?></span>
									<?php } elseif ($prospect['status'] == "Client actif") { ?>
										<span class="badge text-bg-success"><?= $prospect['status'] ?></span>
									<?php } elseif ($prospect['status'] == "Qualifié veille") { ?>
										<span class="badge text-bg-primary"><?= $prospect['status'] ?></span>
									<?php } elseif ($prospect['status'] == "Qualifié potentiel") { ?>
										<span class="badge text-bg-success"><?= $prospect['status'] ?></span>
									<?php } elseif ($prospect['status'] == "Out") { ?>
										<span class="badge text-bg-warning"><?= $prospect['status'] ?></span>
									<?php } elseif ($prospect['status'] == "Client ancien") { ?>
										<span class="badge text-bg-warning"><?= $prospect['status'] ?></span>
									<?php } else { ?>
										<span class="badge text-bg-danger"><?= $prospect['status'] ?></span>
									<?php } ?>
							</td> -->
							<td>
								<a href="index.php?tab=prospect&action=edit&id=<?= $prospect['prospect_id'] ?>"><button class="btn bg-warning together-button m-1">Modifier</button></a>
								<a href="index.php?tab=prospect&action=delete&id=<?= $prospect['prospect_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce prospect?')"><button class="btn bg-danger together-button m-1">Supprimer</button></a>	
								<a href="index.php?tab=prospect&action=view&id=<?= $prospect['prospect_id'] ?>"><button class="btn btn-primary together-button m-1">Events</button></a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<nav>
					<ul class="pagination separated d-flex justify-content-end m-0 p-2">
						<li class="page-item">
							<a class="page-link py-2" href="index.php?tab=prospect&p=<?= $p-1 ?>">
								<i class="fa-solid fa-chevron-left"></i>
							</a>
						</li>
						<?php for($i=1;$i<=$nbr_de_pages;$i++){
								if($p != $i){ ?>
									<li class="page-item">
										<a class="page-link py-2" href="index.php?tab=prospect&p=<?= $i ?>"><?= $i ?></a>
									</li> 
									<?php } else { ?>
									<li class="page-item active">
										<a class="page-link py-2" href="index.php?tab=prospect&p=<?= $i ?>"><?= $i ?></a>
									</li>  
								<?php } ?>
						<?php } ?>
						
						<li class="page-item">
							<a class="page-link py-2" href="index.php?tab=prospect&p=<?= $p+1 ?>">
								<i class="fa-solid fa-chevron-right"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

	