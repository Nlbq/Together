<style>
  <?php include "assets/css/Prospect_event/edit.css";?>
</style>

<div class="row col-12 justify-content-center">
  <h4 class="edit-prospect-event-title text-center my-5">Modifier l'évènement d'un prospect</h4>
</div>

<div class="row col-12 justify-content-center">
  <div class="col-6 mb-3 text-center">
    <div class="d-flex align-items-start my-3 p-2 px-4">
      <a href="index.php?tab=prospect&action=view&id=<?= $one_prospect_event->getProspect_id() ?>" class="btn btn-primary btn-fw together-button add-prospect-button">Retour</a>
    </div>
  </div>
</div>
<div class="container col-6 mx-auto pt-4 pb-2 px-5 mb-4 mt-3">
<form method="POST">
      <div class="row col-12 justify-content-center">
      <div class="col-10"> 
         <?php Html::input('comment', 'Commentaire', 'textarea', 'Ex: ', $one_prospect_event->getComment()); ?>
         <?php Html::input('at', 'Date', 'date', 'Ex: ', substr($one_prospect_event->getAt(), 0, 10)); ?>
         <div class="form-group">
          <label for="" class="mt-1 mb-1">Type</label> <br>
            <select class="form-select" name="type">
              <option value="<?= $one_prospect_event->getType() ?>"><?= $one_prospect_event->getType()?></option>
              <?php foreach ($liste_type as $key => $type) { ?>
                <option value="<?= $type ?>"><?= $type ?></option>
              <?php } ?>
            </select>
        </div>
      </div>
      
        <div class="add-btn p-2 text-center">
          <button type="submit" class="btn btn-success together-button px-4 m-3">Modifier</button>
        </div>
      </div>


    </form>
</div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html 
  <footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
      </span>
    </div>
  </footer>-->
  <!-- partial -->
</div>
<script src="../../../assets/js/textareaAutoResize.js"></script>
<script type="text/javascript">
  $('textarea').autoResize();

</script>
<script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../../assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
<script src="../../../assets/vendors/jquery-asColor/jquery-asColor.min.js"></script>
<script src="../../../assets/vendors/jquery-asGradient/jquery-asGradient.min.js"></script>
<script src="../../../assets/vendors/jquery-asColorPicker/jquery-asColorPicker.min.js"></script>
<script src="../../../assets/vendors/x-editable/bootstrap-editable.min.js"></script>
<script src="../../../assets/vendors/moment/moment.min.js"></script>
<script src="../../../assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js"></script>
<script src="../../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="../../../assets/vendors/dropify/dropify.min.js"></script>
<script src="../../../assets/vendors/jquery-file-upload/jquery.uploadfile.min.js"></script>
<script src="../../../assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="../../../assets/vendors/dropzone/dropzone.js"></script>
<script src="../../../assets/vendors/jquery.repeater/jquery.repeater.min.js"></script>
<script src="../../../assets/vendors/inputmask/jquery.inputmask.bundle.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../../assets/js/shared/off-canvas.js"></script>
<script src="../../../assets/js/shared/hoverable-collapse.js"></script>
<script src="../../../assets/js/shared/misc.js"></script>
<script src="../../../assets/js/shared/settings.js"></script>
<script src="../../../assets/js/shared/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../../../assets/js/shared/formpickers.js"></script>
<script src="../../../assets/js/shared/form-addons.js"></script>
<script src="../../../assets/js/shared/x-editable.js"></script>
<script src="../../../assets/js/shared/inputmask.js"></script>
<script src="../../../assets/js/shared/dropify.js"></script>
<script src="../../../assets/js/shared/dropzone.js"></script>
<script src="../../../assets/js/shared/jquery-file-upload.js"></script>
<script src="../../../assets/js/shared/form-repeater.js"></script>
<!-- End custom js for this page -->
<script type="text/javascript">
$('#importance_field').barrating({
  theme: 'fontawesome-stars',
  showSelectedRating: false
});
</script>
