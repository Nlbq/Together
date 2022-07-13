<div class="col">
			<br>
			 <h4 class="text-center">Facture du client : <?php echo $one_user->getFirstname()." ".$one_user->getLastname();?></h4>

			 
		</div>
<div class="container facture">
	<div class="row">
		

	</div>

	<div >
		<img width="30%" src="assets/img/petit.png" alt="logo">
		<h4 class="float-end color">Facture n°<?= $_GET['id']?></h4>
		<br>
		<p class="float-end" >Créé le : <?= FD_JJMMAA($one_invoice->getAt());?></p>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="left">
		<h3>M.KHODJA Belhadry</h3>
		<p>09, Rue des Postillons 93200 Saint-Denis</p>
		<p class="color">www.belhadrykhodja.com</p>
		<p class="color">belhadry.khodja@gmail.com</p>
		</div>
		<div class="right">
		<h3 class="color"><?= $one_customer_information->getCompany_name();?></h3>
		<p><?= $one_customer_information->getAddress();?></p>
		<p><?= $one_customer_information->getZip_code();?></p>
		</div>
	</div>
		
	<div class="row">
		<div class="col mb-5 pb-5">
			<br>
			 <a href="index.php?tab=invoice_line&action=add&id=<?=$_GET['id'] ?>">
			 	<button type="button" class="btn btn-primary">Ajouter une ligne</button>
			 </a>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Produits/Services description</th>
			      <th scope="col">Qt</th>
			      <th scope="col">Prix</th>
			      <th scope="col">Réduction</th>
			      <th scope="col">Total</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  $compteur=0;?>
			  	<?php foreach ($list_invoice_lines as $key => $ligne): ?>
			  	<tr>
			  		
			      <td><?= $ligne['title'] ?></td>
			      <td><?= $ligne['quantity'] ?></td>
			      <td><?= monify($ligne['price']) ?></td>
			      <td><?= $ligne['reduction'] ?></td>
			      <td>
			      		<?php $total_ligne=($ligne['quantity']*$ligne['price'])*(1-($ligne['reduction']/100)) ?>
			      		<?= monify($total_ligne);?>
			      </td>
			      <td>
			      	<a href="index.php?tab=invoice_line&action=edit&id=<?=$ligne['invoice_line_id']?>"><button type="submit" class="btn btn-warning text-white "><i class="bi bi-pencil"></i></button></a>
					<a href="index.php?tab=invoice_line&action=delete&id=<?=$ligne['invoice_line_id']?> " onclick="return confirm('Voulez-vous vraiment supprimer cette ligne?')"><button class="btn btn-danger"><i class="bi bi-trash3"></i></button></a>
			      </td>
			     
			    </tr>
			    <?php $compteur += $total_ligne;?>
			  	<?php endforeach ?>
			  	<tr>
			  		<td></td>
			  		<td></td>
			  		<td></td>
			  		<td></td>
			  		<td>
			  			Total TTC: <?= monify($compteur); ?>
			  		</td>
			  	</tr>
			  </tbody>
			</table>
			 
		</div>
	</div>
</div>