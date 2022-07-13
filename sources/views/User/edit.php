<style>
<?php include "assets/css/User/edit.css";?>
</style>

<?php 
if($one_user->getGender() == 0){
  $genderMale = 'checked';
  $genderFemale = '';
}elseif ($one_user->getGender() == 1){
  $genderMale = '';
  $genderFemale = 'checked';
}
?>


<div class="row col-12">
  <h4 class="edit-user-title text-center mt-4 mb-2">Modifier le client:  
    <?php 
    echo ($one_user->getFirstName(). " ". $one_user->getLastName());
    ?>
  </h4>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-10">
		<div class="d-flex align-items-start py-3 px-4">
			<a href="index.php?tab=user" class="btn btn-primary btn-fw together-button add-user-button" >Retour</a>
		</div>
	</div>
</div>

<div class="container col-8 mx-auto py-3 p-5 mb-4 mt-4">

  <form method="POST" class="edit_user_form"  name="edit_user_form" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <div class="form-group">
        <fieldset data-role="controlgroup">
        <label for="male">Genre:</label><br>
        <label class="gender-label" for="male">Homme</label>
        <input type="radio" name="gender" id="male" value="0" <?= $genderMale ?> ><br>
        <label class="gender-label" for="female">Femme</label>
        <input type="radio" name="gender" id="female" value="1" <?= $genderFemale ?> >
        </fieldset>
        </div>
        <?php Html::input('firstname', 'Prénom', 'text', 'Ex: ', $one_user->getFirstname()); ?><?php 
				 Html::input('lastname', 'Nom', 'text', 'Ex: ', $one_user->getLastname()); ?><?php 
				 Html::input('email_address', 'Adresse email', 'text', 'Ex: ', $one_user->getEmail_address()); ?><?php 
				 Html::input('status', 'Statut', 'text', 'Ex: ', $one_user->getStatus()); ?>
      <div class="col-12 text-center">
          <button type="submit" class="btn btn-warning text-white together-button px-4 m-3">Modifier</button>
      </div>
  </form>
</div>

