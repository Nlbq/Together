<br>
<div class="container">
	<form method="POST">
		<div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Client</label>
		    <select name="user_id" class="form-select" aria-label="Default select example">
	    	<?php foreach ($list_customer as $key => $customer): ?>
	    		<option value="<?= $customer['user_id'] ?>"><?= ucfirst($customer['firstname']).' '.ucfirst($customer['lastname']) ?></option>
	    	<?php endforeach ?>
		    </select>	    
		</div>
		<div class="mb-3">
		    <label for="payment_method_field" class="form-label">Moyen de paiement</label>
		    
		    <input type="text" name="payment_method" class="form-control" id="payment_method_field" placeholder="Entrer un moyen de paiement">
		</div>
		<div class="mb-3">
		    <input type="submit" class="btn btn-warning" value="Créer la facture">
		</div>
	</form>
</div>
