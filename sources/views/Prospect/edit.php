<style>
  <?php include "assets/css/Delivery/add.css";?>
</style>

<div class="row col-12">
  <h3 class="add-delivery-title text-center mt-5 mb-3">Modifier un prospect</h3>
</div>

<div class="row col-12 justify-content-center mt-3">
  <div class="col-9 text-center">
    <div class="d-flex align-items-start p-2 ps-1 mb-3">
      <a href="index.php?tab=prospect" class="btn btn-primary together-button add-prospect-button" >Retour</a>
    </div>
  </div>
</div>
<div class="container col-9 mx-auto py-4 p-5 mb-4 mt-3">
  <form method="POST" >
    <div class="row col-12 justify-content-center">
      <div class="col-5"> 
        <?php Html::input('company_name', 'Nom de la Société', 'text', 'Renseigner ce champ ...', $one_prospect->getCompany_name()); ?>
        <?php Html::input('firstname', 'Prénom', 'text', 'Renseigner ce champ ...', $one_prospect->getFirstname()); ?>
        <?php Html::input('lastname', 'Nom', 'text', 'Renseigner ce champ ...', $one_prospect->getLastname()); ?>
        <?php Html::input('email_address', 'Adresse mail', 'text', 'Renseigner ce champ ...', $one_prospect->getEmail_address()); ?>
      </div>
      <div class="col-5"> 
        <?php Html::input('phone_number', 'Numéro de téléphone', 'number', 'Renseigner ce champ ...', $one_prospect->getPhone_number()); ?>
        <?php Html::input('source', 'Source', 'text', 'Renseigner ce champ ...', $one_prospect->getSource()); ?>
        <div class="form-group">
          <label for="" class="mt-1 mb-1">Type de source</label> <br>
            <select class="form-select" name="type_source">
              <option value="<?= $one_prospect->getType_source()?>"><?= $one_prospect->getType_source()?></option>
              <?php foreach ($liste_type_sources as $key => $type_source) { ?>
                <option value="<?= $type_source ?>"><?= $type_source ?></option>
              <?php } ?>
            </select>
        </div>
        <div class="form-group">
          <label for="" class="mt-1 mb-1">Statut</label> <br>
          <select class="form-select" name="status">
              <option value="<?= $one_prospect->getStatus()?>"><?= $one_prospect->getStatus() ?></option>
            <?php foreach ($liste_statuts as $key => $status) { ?>
              <option value="<?= $status ?>"><?= $status ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="add-btn p-2 text-center">
        <button type="submit" class="btn btn-success together-button px-4 m-3">Modifier</button>
      </div>
    </form>
</div>


  <!-- content-wrapper ends -->
