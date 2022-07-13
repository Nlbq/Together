<style>
	<?php include "assets/css/Delivery/add.css";?>
</style>
<div class="content-wrapper">
			    <div class="row col-12">
			        <h4 class="mt-4 mb-2 mx-auto text-center index-title">Liste des événements</h4>
			    </div>
				<div class="row col-12 justify-content-center">
			      <div class="col-10 text-center">
			        <div class="d-flex align-items-start p-2 px-4 mb-3">
			          <a href="http://together.lozako.com/index.php?tab=delivery&action=add" class="btn btn-primary btn-fw transparent-button add-customer-button" >Nouvel événement</a>
			        </div>
			      </div>
			     </div>

			     <div class="row col-12 justify-content-center">
			      <div class="col-md-10">
			        <div class="card">
			          <div class="card-body">
			            <div class="row">
			              <div class="col-12">
			                <table id="order-listing" class="table tableplus text-center">
			                  <thead class="">
			                    <tr>
									<th>Identifiant de l'événement</th>
									<th>Identifiant du prospect</th>
									<th>Commentaire</th>
									<th>Date</th>
									<th>Type</th>
									<th>Actions</th>									
				                </tr>
				                  </thead>
				                  <tbody>
				                    <?php foreach ($list_prospect_events as $key => $prospect_event): ?>
				                      <tr>
										<td><?= $prospect_event['prospect_event_id'] ?></td>
										<td><?= $prospect_event['prospect_id'] ?></td>
										<td><?= $prospect_event['comment'] ?></td>
										<td><?= $prospect_event['at'] ?></td>
										<td><?= $prospect_event['type'] ?></td>
				                        <td>
				                          <a href="index.php?tab=prospect_event&action=edit&id=<?= $prospect_event['prospect_event_id'] ?>"><button class="btn btn-fw bg-warning transparent-button m-1">Modifier</button></a>
				                          <a href="index.php?tab=prospect_event&action=delete&id=<?= $prospect_event['prospect_event_id'] ?>"><button class="btn btn-fw bg-danger  transparent-button m-1">Supprimer</button></a>
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

<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel-2">Ajouter une Prospect_event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" name="add_prospect_event_form">
          <?php 
				 Html::input('prospect_event_id', 'Prospect_event_id', 'text', 'Ex: '); ?><?php 
				 Html::input('prospect_id', 'Prospect_id', 'text', 'Ex: '); ?><?php 
				 Html::input('comment', 'Comment', 'text', 'Ex: '); ?><?php 
				 Html::input('at', 'At', 'text', 'Ex: '); ?><?php 
				 Html::input('type', 'Type', 'text', 'Ex: '); ?>
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success single-button" onclick="form_prospect_event()">Ajouter</button>
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
  function form_prospect_event() {
    document.add_prospect_event_form.submit();
  }
</script></div></div></div></div>