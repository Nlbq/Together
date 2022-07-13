<div class="main-panel">
  <div class="content-wrapper">
		<div class="col-12">
			<form method="POST">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Modifier une admin</h4>
						<?php 
				 Html::input('admin_id', 'Admin_id', 'text', 'Ex: ', $one_admin->getAdmin_id()); ?><?php 
				 Html::input('firstname', 'Firstname', 'text', 'Ex: ', $one_admin->getFirstname()); ?><?php 
				 Html::input('lastname', 'Lastname', 'text', 'Ex: ', $one_admin->getLastname()); ?><?php 
				 Html::input('email_address', 'Email_address', 'text', 'Ex: ', $one_admin->getEmail_address()); ?><?php 
				 Html::input('password', 'Password', 'text', 'Ex: ', $one_admin->getPassword()); ?><?php 
				 Html::input('token', 'Token', 'text', 'Ex: ', $one_admin->getToken()); ?>

              <button type="submit" class="btn btn-success mr-2 single-button">Modifier</button>
          </div>
        </div>
			</form>
    </div>
	</div>
  <!-- content-wrapper ends -->
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
