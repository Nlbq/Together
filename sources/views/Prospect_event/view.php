<style>
<?php include "assets/css/Prospect_event/view.css";?>
</style>


<div class="container prospect-event-view-container ">
  <div class="row col-12">
    <h4 class="my-5 mx-auto text-center prospect-event-view-title">
        Event du prospect "<?= $one_prospect->getFirstname()." ".$one_prospect->getLastname() ?>"
    </h4>
  </div>

  <div class="card col-lg-9 col-md-11 my-5 mx-auto">
    <div class="card-header d-flex text-center py-1">
      <p class="m-0 me-auto event-type"><?= $one_prospect_event->getType() ?></p>
      <p class="m-0 ms-auto event-type"><?= $one_prospect->getCompany_name() ?></p>
    </div>
    <div class="card-body text-center">
      <p class="card-text mb-1"><?= $one_prospect_event->getComment() ?></p>
    </div>
    <div class="card-footer d-flex py-0">
      <div class="col-6 d-flex align-items-center">
        <p class="me-auto mb-1"><?= FD_JJMMAA($one_prospect_event->getAt())?></p>
      </div>
      <div class="col-6 d-flex">
        <a href="index.php?tab=prospect_event&action=edit&id=<?= $one_prospect_event->getProspect_event_id() ?>" class="ms-auto"><button class="btn btn-warning text-white m-1 btn-sm"><i class="bi bi-pencil-fill"></i></button></a>
        <a href="index.php?tab=prospect_event&action=delete&id=<?= $one_prospect_event->getProspect_event_id() ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet événement?')"><button class="btn btn-danger m-1 btn-sm"><i class="bi bi-trash3-fill"></i></button></a>	
      </div>
    </div>
  </div>
</div>
  
                
    