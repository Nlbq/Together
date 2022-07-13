<style>
<?php include "assets/css/Delivery/index.css";?>
</style>

<div class="content-wrapper">
	<div class="row col-12">
			<h3 class="my-5 mx-auto text-center index-title">Liste des livraisons</h3>
	</div>

	<div class="row col-12 m-0 justify-content-center">
		<div class="col-10 mr-auto p-2 my-4 d-flex">
				<a href="index.php?tab=delivery&action=add" class="btn btn-primary together-button add-customer-button me-5" >Nouvelle livraison</a>

				<div class="col-4 text-center ">
				<form method="POST">
					<div class="form-group d-flex">
						<input type="text" placeholder="Rechercher..." name="search" class="form-control" value="<?= $searchValue ?>">
						<button type="submit" class="btn btn-primary me-2"><i class="fas fa-search"></i></button>
						<a href="index.php?tab=delivery" class="btn btn-danger me-2"><i class="fas fa-x"></i></a>
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
							<th class="p-3">N°</th>
							<th class="p-3">Date</th>
							<th class="p-3">Projet</th>
							<th class="p-3">Client</th>
							<th class="p-3">Description</th>
							<th class="p-3">Statut</th>
							<th class="p-3">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($list_deliverys as $key => $delivery): ?>

						<?php	$delivery['validation'] = ($delivery['validation'] == 0) ? "Non validée" : "Validée"; ?>

						<tr>
							<td><?= $delivery['delivery_id'] ?></td>
							<td ><?= FD_JJMMAA($delivery['delivery_date']) ?></td>
							<td><?= $delivery['project_name'] ?></td>
							<td><?= $delivery['customer_firstname'].' '.$delivery['customer_lastname'] ?></td>
							<td><?= $delivery['delivery_description'] ?></td>
							<td><?= $delivery['validation'] ?></td>	
							<td>
								<a href="index.php?tab=delivery&action=view&id=<?= $delivery['delivery_id'] ?>" ><button class="btn bg-primary text-white"><i class="bi bi-eye-fill"></i></button></a>
								<a href="index.php?tab=delivery&action=edit&id=<?= $delivery['delivery_id'] ?>" ><button class="btn bg-warning text-white"><i class="bi bi-pencil-fill"></i></button></a>
								<a href="index.php?tab=delivery&action=deletet&id=<?= $delivery['delivery_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce client?')"><button class="btn bg-danger text-white"><i class="bi bi-trash3-fill"></i></button></a>
							</td>	

							
							
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<nav>
					<ul class="pagination separated d-flex justify-content-end m-0 p-2">
						<li class="page-item">
							<a class="page-link py-2" href="index.php?tab=delivery&p=<?= $p-1 ?>">
								<i class="fa-solid fa-chevron-left"></i>
							</a>
						</li>
						<?php for($i=1;$i<=$nbr_de_pages;$i++){
								if($p != $i){ ?>
									<li class="page-item">
										<a class="page-link py-2" href="index.php?tab=delivery&p=<?= $i ?>"><?= $i ?></a>
									</li> 
									<?php } else { ?>
									<li class="page-item active">
										<a class="page-link py-2" href="index.php?tab=delivery&p=<?= $i ?>"><?= $i ?></a>
									</li>  
								<?php } ?>
						<?php } ?>
						
						<li class="page-item">
							<a class="page-link py-2" href="index.php?tab=delivery&p=<?= $p+1 ?>">
								<!-- <i class="mdi mdi-chevron-right"></i> -->
								<i class="fa-solid fa-chevron-right"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>