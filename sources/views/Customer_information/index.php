<!-- partial -->
			<div class="main-panel">
			  <div class="content-wrapper">
			    <div class="row">
			      <div class="col-sm-6">
			        <h4 class="mb-1 font-weight-bold ">Customer_informations</h4>
			        <p>Celui qui n’a pas d’objectifs ne risque pas de les atteindre.</p>
			      </div>
			      <div class="col-sm-6">
			        <div class="d-flex align-items-center justify-content-md-end">
			          <button type="button" class="btn btn-primary btn-fw single-button" data-toggle="modal" data-target="#exampleModal-2">Nouvelle Customer_information</button>
			        </div>
			      </div>
			     </div>
			     <div class="row">
			      <div class="col-md-12 grid-margin stretch-card">
			        <div class="card">
			          <div class="card-body">
			            <div class="row">
			              <div class="col-12">
			                <table id="order-listing" class="table tableplus">
			                  <thead>
			                    <tr>
				<th>Customer_information_id</th>
				<th>User_id</th>
				<th>Company_name</th>
				<th>Address</th>
				<th>Zip_code</th>
				<th>Country</th>
				<th>City</th>
				<th>Phone_number</th>
				<th>Siret</th>
				<th>Siren</th><th>Actions</th>
				                    </tr>
				                  </thead>
				                  <tbody>
				                    <?php foreach ($list_customer_informations as $key => $customer_information): ?>
				                      <tr>
				<td><?= $customer_information['customer_information_id'] ?></td>
				<td><?= $customer_information['user_id'] ?></td>
				<td><?= $customer_information['company_name'] ?></td>
				<td><?= $customer_information['address'] ?></td>
				<td><?= $customer_information['zip_code'] ?></td>
				<td><?= $customer_information['country'] ?></td>
				<td><?= $customer_information['city'] ?></td>
				<td><?= $customer_information['phone_number'] ?></td>
				<td><?= $customer_information['siret'] ?></td>
				<td><?= $customer_information['siren'] ?></td>
				                         <td>
				                          <a href="index.php?tab=customer_information&action=edit&id=<?= $customer_information['customer_information_id'] ?>"><button class="btn btn-inverse-warning btn-fw transparent-button">Modifier</button></a>
				                          <a href="index.php?tab=customer_information&action=delete&id=<?= $customer_information['customer_information_id'] ?>"><button class="btn btn-inverse-danger transparent-button btn-fw">Supprimer</button></a>
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
				  </div><div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel-2">Ajouter une Customer_information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" name="add_customer_information_form">
          <?php 
				 Html::input('customer_information_id', 'Customer_information_id', 'text', 'Ex: '); ?><?php 
				 Html::input('user_id', 'User_id', 'text', 'Ex: '); ?><?php 
				 Html::input('company_name', 'Company_name', 'text', 'Ex: '); ?><?php 
				 Html::input('address', 'Address', 'text', 'Ex: '); ?><?php 
				 Html::input('zip_code', 'Zip_code', 'text', 'Ex: '); ?><?php 
				 Html::input('country', 'Country', 'text', 'Ex: '); ?><?php 
				 Html::input('city', 'City', 'text', 'Ex: '); ?><?php 
				 Html::input('phone_number', 'Phone_number', 'text', 'Ex: '); ?><?php 
				 Html::input('siret', 'Siret', 'text', 'Ex: '); ?><?php 
				 Html::input('siren', 'Siren', 'text', 'Ex: '); ?>
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success single-button" onclick="form_customer_information()">Ajouter</button>
          <button type="button" class="btn btn-light single-button" data-dismiss="modal">Annuler</button>
        </div>
      </div>
    </div>
  </div>  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
      </span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
<script type="text/javascript">
  function form_customer_information() {
    document.add_customer_information_form.submit();
  }
</script></div></div></div></div>