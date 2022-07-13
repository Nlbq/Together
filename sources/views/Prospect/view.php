<style>
	<?php include "assets/css/Prospect/view.css";?>
</style>

<div class="content-wrapper">

<div class="row col-12 justify-content-center">
  <h3 class="prospect-title text-center mt-5 mb-3">Prospect : <?=$GLOBALS['one_prospect']->getFirstname().' '.$GLOBALS['one_prospect']->getLastname(); ?> </h3>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-10 mb-3 p-0">
		<a href="index.php?tab=prospect" class="btn btn-primary together-button add-prospect-button" >Retour</a>

			<a href="index.php?tab=prospect_event&action=add&id=<?= $_GET['id'] ?>" class="btn btn-success together-button add-prospect-button" >Ajouter un évènement</a>

	</div>
</div>

<div class="row col-md-11 mx-auto mt-3 justify-content-center">

	<div class="card card-highlight card-info col-3 p-4 mx-3">
		<div class="prospect-info-title text-center">
			<h4 class="m-0 mb-4">Informations</h4>
		</div>
		<div class="my-auto prospect-info">
	    	<p> <b>Société: </b><?=$GLOBALS['one_prospect']->getCompany_name(); ?></p>
	    	<p> <b>Prénom: </b><?=$GLOBALS['one_prospect']->getFirstname(); ?></p>
	    	<p> <b>Nom: </b><?= $GLOBALS['one_prospect']->getLastname(); ?></p>
	    	<p> <b>Adresse email: </b><?= $GLOBALS['one_prospect']->getEmail_address();?></p>
	    	<p> <b>N° de téléphone: </b><?= $GLOBALS['one_prospect']->getPhone_number(); ?></p>
			<p> <b>Source: </b><?= $GLOBALS['one_prospect']->getSource(); ?></p>
			<p> <b>Type de source: </b><?= $GLOBALS['one_prospect']->getType_source(); ?></p>
		</div>
	</div>

			<div class="card col-8 card-highlight card-events mx-3 p-4">

				<h4 class="event-title text-center mb-3">Evènements</h4>

				<?php foreach ($list_events as $key => $prospect_event): ?>
					<div class="card col-lg-9 col-md-11 border-<?= $event_Types[$prospect_event['type']] ?> mb-3 mx-auto">
							<div class="card-header text-center py-1">
								<p class="m-0 event-type"><?= $prospect_event['type'] ?></p>
							</div>
							<div class="card-body text-center">
								<p class="card-text mb-1"><?= $prospect_event['comment'] ?></p>
							</div>
							<div class="card-footer d-flex py-0">
								<div class="col-6 d-flex align-items-center">
									<p class="me-auto mb-1"><?= FD_JJMMAA($prospect_event['at'])?></p>
								</div>
								<div class="col-6 d-flex">
								<a href="index.php?tab=prospect_event&action=view&id=<?= $prospect_event['prospect_event_id'] ?>" class="ms-auto"><button class="btn btn-primary text-white m-1 btn-sm"><i class="bi bi-eye-fill"></i></button></a>
									<a href="index.php?tab=prospect_event&action=edit&id=<?= $prospect_event['prospect_event_id'] ?>" ><button class="btn btn-warning text-white m-1 btn-sm"><i class="bi bi-pencil-fill"></i></button></a>
									<a href="index.php?tab=prospect_event&action=delete&id=<?= $prospect_event['prospect_event_id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet événement?')"><button class="btn btn-danger m-1 btn-sm"><i class="bi bi-trash3-fill"></i></button></a>	
								</div>
							</div>
					</div>
				<?php	endforeach; ?> 
			</div>
		</div>
	</div>
</div>