<style>
<?php include "assets/css/Invoice/index.css";?>
</style>

<div class="content-wrapper">
	<div class="row col-12">
				<h3 class="my-5 mx-auto text-center index-title">Liste des factures</h3>
	</div>

	<div class="row col-12 m-0 justify-content-center">
		<div class="col-10 mr-auto p-2 my-4 d-flex">
				<a href="index.php?tab=invoice&action=add" class="btn btn-primary together-button add-customer-button me-5" >Créer une facture</a>

				<div class="col-4 text-center ">
				<form method="POST">
					<div class="form-group d-flex">
						<input type="text" placeholder="Rechercher..." name="search" class="form-control" value="<?= $searchValue ?>">
						<button type="submit" class="btn btn-primary me-2"><i class="fas fa-search"></i></button>
						<a href="index.php?tab=invoice" class="btn btn-danger me-2"><i class="fas fa-x"></i></a>
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
				<table class="table text-center mb-0">
					<thead>
						<tr>
							<th class="p-3">#</th>
							<th class="p-3">Client</th>
							<th class="p-3">Date</th>
							<th class="p-3">Moyen de paiement</th>
							<th class="p-3">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($list_invoices as $key => $facture): ?>
						<tr>
							<td><?= $facture['invoice_id'] ?></td>
							<td><?= $facture['firstname'].' '.$facture['lastname'] ?></td>
							<td><?= FD_JJMMAAaHHMM($facture['at']) ?></td>
							<td><?= $facture['payment_method'] ?></td>
							<td>
								<a href="index.php?tab=invoice&action=download&id=<?=$facture['invoice_id']?>" target="_blank"><button type="submit" class="btn btn-primary text-white " ><i class="bi bi-file-earmark-arrow-down-fill"></i></button></a>
								<a href="index.php?tab=invoice&action=edit&id=<?=$facture['invoice_id']?>"><button type="submit" class="btn btn-warning text-white "><i class="bi bi-pencil-fill"></i></button></a>
								<a href="index.php?tab=invoice&action=delete&id=<?=$facture['invoice_id']?> " onclick="return confirm('Voulez-vous vraiment supprimer cette facture?')"><button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a>
								<a href="index.php?tab=invoice_line&id=<?= $facture['invoice_id'] ?>"><button type="button" class="btn btn-primary"><i class="bi bi-gear-fill"></i></button></a>
								<!-- <a href="index.php?tab=invoice&action=duplicate&id=<?= $facture['invoice_id'] ?>">
									<button type="button" class="btn btn-primary"><i class="bi bi-clipboard-plus-fill"></i></button>
								</a> -->
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<nav>
					<ul class="pagination separated d-flex justify-content-end m-0 p-2">
						<li class="page-item">
							<a class="page-link py-2" href="index.php?tab=invoice&p=<?= $p-1 ?>">
								<i class="fa-solid fa-chevron-left"></i>
							</a>
						</li>
						<?php for($i=1;$i<=$nbr_de_pages;$i++){
								if($p != $i){ ?>
									<li class="page-item">
										<a class="page-link py-2" href="index.php?tab=invoice&p=<?= $i ?>"><?= $i ?></a>
									</li> 
									<?php } else { ?>
									<li class="page-item active">
										<a class="page-link py-2" href="index.php?tab=invoice&p=<?= $i ?>"><?= $i ?></a>
									</li>  
								<?php } ?>
						<?php } ?>
						
						<li class="page-item">
							<a class="page-link py-2" href="index.php?tab=invoice&p=<?= $p+1 ?>">
								<i class="fa-solid fa-chevron-right"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>