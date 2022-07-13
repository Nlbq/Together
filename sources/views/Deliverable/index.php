<!-- partial -->
			<div class="main-panel">
			  <div class="content-wrapper">
			    <div class="row">
			      <div class="col-sm-6">
			        <h4 class="mb-1 font-weight-bold ">Deliverables</h4>
			        <p>Celui qui n’a pas d’objectifs ne risque pas de les atteindre.</p>
			      </div>
			      <div class="col-sm-6">
			        <div class="d-flex align-items-center justify-content-md-end">
			          <button type="button" class="btn btn-primary btn-fw single-button" data-toggle="modal" data-target="#exampleModal-2">Nouvelle Deliverable</button>
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
				<th>Deliverable_id</th>
				<th>Delivery_id</th>
				<th>Type</th>
				<th>Link</th><th>Actions</th>
				                    </tr>
				                  </thead>
				                  <tbody>
				                    <?php foreach ($list_deliverables as $key => $deliverable): ?>
				                      <tr>
				<td><?= $deliverable['deliverable_id'] ?></td>
				<td><?= $deliverable['delivery_id'] ?></td>
				<td><?= $deliverable['type'] ?></td>
				<td><?= $deliverable['link'] ?></td>
				                         <td>
				                          <a href="index.php?tab=deliverable&action=edit&id=<?= $deliverable['deliverable_id'] ?>"><button class="btn btn-inverse-warning btn-fw transparent-button">Modifier</button></a>
				                          <a href="index.php?tab=deliverable&action=delete&id=<?= $deliverable['deliverable_id'] ?>"><button class="btn btn-inverse-danger transparent-button btn-fw">Supprimer</button></a>
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
          <h5 class="modal-title" id="exampleModalLabel-2">Ajouter une Deliverable</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" name="add_deliverable_form">
          <?php 
				 Html::input('deliverable_id', 'Deliverable_id', 'text', 'Ex: '); ?><?php 
				 Html::input('delivery_id', 'Delivery_id', 'text', 'Ex: '); ?><?php 
				 Html::input('type', 'Type', 'text', 'Ex: '); ?><?php 
				 Html::input('link', 'Link', 'text', 'Ex: '); ?>
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success single-button" onclick="form_deliverable()">Ajouter</button>
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
  function form_deliverable() {
    document.add_deliverable_form.submit();
  }
</script></div></div></div></div>