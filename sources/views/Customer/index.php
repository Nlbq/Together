<style>
<?php include "assets/css/Customer/index.css";?>
</style>

			  <div class="content-wrapper">
			    <div class="row col-10 mx-auto">
			        <h4 class="mt-4 mb-2 p-0 text-center index-title">Liste des clients</h4>
			    </div>
				<div class="row col-10 justify-content-center">
			      <div class="col-10 text-center">
			        <div class="d-flex align-items-start p-2 px-4 mb-3">
			          <a href="index.php?tab=customer&action=add" class="btn btn-primary btn-fw transparent-button add-customer-button" >Nouveau client</a>
			        </div>
			      </div>
			     </div>

			     <div class="row col-xxl-11 col-xl-10 col-lg-10 col-md-11 mx-auto justify-content-center">
			      <div class="col-xl-12 col-md-12 p-0">
			        <div class="card">
			          <div class="card-body">
			            <div class="row">
			              <div class="col-12">
			                <table id="order-listing" class="table tableplus text-center">
			                  <thead class="">
			                    <tr>
									<th>Prénom</th>
									<th>Nom</th>
									<th>Société</th>
									<th>Adresse email</th>
									<th>N° de téléphone</th>
									<th>Actions</th>
				                </tr>
				                  </thead>
				                  <tbody>
				                    <?php foreach ($list_customers as $key => $customer): ?>
				                      <tr>
										<td ><?= $customer['firstname'] ?></td>
										<td><?= $customer['lastname'] ?></td>
										<td><?= $customer['company_name'] ?></td>
										<td><?= $customer['email_address'] ?></td>
										<td><?= $customer['phone_number'] ?></td>
				                        <td>
				                          <a href="index.php?tab=customer&action=edit&id=<?= $customer['customer_id'] ?>"><button class="btn btn-fw bg-warning transparent-button m-1">Modifier</button></a>
				                          <a href="index.php?tab=customer&action=delete&id=<?= $customer['customer_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce client?')"><button class="btn btn-fw bg-danger  transparent-button m-1">Supprimer</button></a>	
				                          <a href="index.php?tab=project&action=viewCustomerProjects&id=<?= $customer['customer_id'] ?>"><button class="btn btn-fw transparent-button px-4 m-1">Projets</button></a>				  
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
				    </div>
				  </div>
				  