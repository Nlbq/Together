<style>
<?php include "assets/css/Delivery/view.css";?>
</style>

<?php if($current_delivery['validation'] == 1 ){
    $validation="Livraison validée";
}else {
    $validation="Livraison non validée";
} ?>

<div class="container project-view-container ">
  <div class="row col-12">
    <h4 class="mt-4 mb-2 mx-auto text-center delivery-view-title">
        Livraison du projet "
        <?=$one_project->
        getName();?>
        " du 
        <?=FD_JJMMAA($current_delivery['delivery_date']);?>
    </h4>
  </div>
  <div class="row col-12 text-center">
    <div class="d-flex align-items-start mt-3 p-2 px-3">
      <a href="index.php?tab=project&action=view&id=<?=$one_project->getProject_id()?>" 
      class="btn btn-primary btn-fw together-button delivery-button-back" >Retour</a>
    </div>
  </div>

  <div class="row col-12 justify-content-center mb-0 p-3 bg-white rounded box-shadow">
    <div class="col-10 p-0">
      <div class="media pt-2">
          <p class="media-body pb-2 mb-0 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Description</strong>
              <?= $current_delivery['description'] ?>
          </p>
      </div>

      <?php if ($current_delivery['validation'] == 1): ?>
      <div class="media pt-2">
          <p class="media-body pb-2 mb-0 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Validation</strong>
              <?=  $validation ?>
          </p>
      </div>
      <div class="media pt-2">
          <p class="media-body pb-2 mb-0 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Date de validation</strong>
              <?=FD_JJMMAA($current_delivery['validation_date']);?>
          </p>
      </div>

      <?php elseif($current_delivery['validation'] == 0) : ?>
      <div class="media pt-2">
          <p class="media-body pb-2 mb-0 border-bottom border-primary">
              <strong class="d-block text-gray-dark pb-1">Validation</strong>
              <?=  $validation ?>
          </p>
      </div>
      <?php endif; ?>  
    </div>
  </div>
                
        <div class="row justify-content-center col-12 m-0">
            <h4 class="pb-1 p-0 col-10 deliverables-title">Livrables</h4>
        </div>
        
        <div class="row col-12 justify-content-center mb-5 delivery-content">
          <div class="col-10">
            <div class="row justify-content-start">
        <?php foreach ($delivery_list_deliverables as $key => $deliverable): ?>
              <div class="col-4">

              <?php if($deliverable['type'] == "image/jpeg" || $deliverable['type'] == "image/png" || $deliverable['type'] == "image/jpg"){?>

              <a href="" data-bs-toggle="modal" class="deliverable-link">
                  <div class="card livrable-card-view m-3 p-0" style="width: 18rem;">
                      <img class="card-img-top deliverable-img"  src="uploads/deliverables/<?= $deliverable['link'] ?>" alt="deliverable">
                      <div class="card-body">
                          <p class="card-text text-center">
                              <?= $deliverable['link'] ?>
                          </p>
                      </div>
                  </div>
              </a>   
                     
              <?php }elseif($deliverable['type'] == "application/pdf"){ ?>
            
              <a href="uploads/deliverables/<?= $deliverable['link'] ?>" target="_blank" class="deliverable-link">
                  <div class="card livrable-card-view justify-content-center m-3 p-0" style="width: 18rem;">
                      <img class="card-img-top file-logo mx-auto mt-4" src="assets/img/file-logo.png" alt="deliverable">
                      <div class="card-body">
                          <p class="card-text text-center">
                              <?= $deliverable['link'] ?>
                          </p>
                      </div>
                  </div>   
              </a>   
              <?php } ?>
              </div>
            <?php endforeach; ?>
            </div>
          </div>
        </div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- The Close Button -->
  <span id="close-modal" class="close">&times;</span>
  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01" >
</div>

    <div class="row delivery-validate text-center justify-content-center mb-5">

        <?php if ($current_delivery['validation'] == 1): ?>

            <div class="alert alert-success col-10" role="alert">
                Cette commande est validée. 
            </div>

        <?php else: ?>    
        <h5> Une livraison de votre commande a été effectuée, confirmez vous la validation de la commande?</h5>
        <a href="index.php?tab=delivery&action=validate&id=<?= $one_delivery->getDelivery_id() ?>" 
        onclick="return confirm('Confirmez vous la validation de cette commande?')" 
        class="btn btn-success btn-fw together-button delivery-button-validate col-3  m-2" >Valider
        </a>
        <small class="mb-4">(Une fois la commande validée, vous clôturez la commande définitivement)</small>
        <?php endif ?>
    </div>

<script>
// Add event listener to the close button
document.getElementById("close-modal").addEventListener("click", closeModal);

// Add event listeners to all the images
var images = document.getElementsByClassName("deliverable-img");
for(let i = 0; i < images.length; i++) {
  let img = images[i];
  img.addEventListener("click", showImage);
}

/** Declare event handlers **/
// Close the modal
function closeModal(e) {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

// Open the modal and show an image
function showImage(e) {
  var img = e.currentTarget;
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementById("img01");
  modalImg.src = img.src;
  modal.style.display = "block";
}
</script>