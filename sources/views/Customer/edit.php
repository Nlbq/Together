<style>
<?php include "assets/css/Customer/edit.css";?>
</style>

<?php 
if($one_customer->getGender() == 0){
  $genderMale = 'checked';
  $genderFemale = '';
}elseif ($one_customer->getGender() == 1){
  $genderMale = '';
  $genderFemale = 'checked';
}
?>


<div class="row col-12">
  <h4 class="edit-customer-title text-center mt-4 mb-2">Modifier le client:  
    <?php 
    echo ($one_customer->getFirstName(). " ". $one_customer->getLastName());
    ?>
  </h4>
</div>

<div class="row col-12 justify-content-center">
	<div class="col-10 text-center">
		<div class="d-flex align-items-start p-2 px-4">
			<a href="index.php?tab=customer" class="btn btn-primary btn-fw transparent-button add-customer-button" >Retour</a>
		</div>
	</div>
</div>

<div class="container col-10 mx-auto py-3 p-5 mb-4 mt-3">

  <form method="POST" class="edit_customer_form"  name="edit_customer_form" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <div class="form-group">
        <fieldset data-role="controlgroup">
        <label for="male">Gender:</label><br>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="0" <?= $genderMale ?> ><br>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value="1" <?= $genderFemale ?> >
        </fieldset>
        </div>
        <div class="form-group">
            <label for="firstName" class="mt-1 mb-1">FirstName : </label>
            <input type="text" class="form-control mb-2" id="firstName" name="firstname" value="<?= $one_customer->getFirstName() ?>">
        </div>
        <div class="form-group">
            <label for="lastName" class="mt-1 mb-1">LastName : </label>
            <input type="text" class="form-control mb-2" id="lastName" name="lastname" value="<?= $one_customer->getLastName() ?>">
        </div>
        <div class="form-group">
            <label for="company_name" class="mt-1 mb-1">Company_name : </label>
            <input type="text" class="form-control mb-2" id="company_name" name="company_name" value="<?= $one_customer->getCompany_name() ?>">
        </div>
        <div class="form-group">
            <label for="email_address" class="mt-1 mb-1">Email_address : </label>
            <input type="text" class="form-control mb-2" id="email_address" name="email_address" value="<?= $one_customer->getEmail_address() ?>">
        </div>
        <div class="form-group">
            <label for="address" class="mt-1 mb-1">Address : </label>
            <input type="text" class="form-control mb-2" id="address" name="address" value="<?= $one_customer->getAddress() ?>">
        </div>
      </div>

      <div class="col">        
        <div class="form-group">
            <label for="zip_code" class="mt-1 mb-1">Zip_code : </label>
            <input type="text" class="form-control mb-2" id="zip_code" name="zip_code" value="<?= $one_customer->getZip_code() ?>">
        </div>
        <div class="form-group">
            <label for="country" class="mt-1 mb-1">Country : </label>
            <input type="text" class="form-control mb-2" id="country" name="country" value="<?= $one_customer->getCountry() ?>">
        </div>
        <div class="form-group">
            <label for="city" class="mt-1 mb-1">City : </label>
            <input type="text" class="form-control mb-2" id="city" name="city" value="<?= $one_customer->getCity() ?>">
        </div>
        <div class="form-group">
            <label for="phone_number" class="mt-1 mb-1">Phone_number : </label>
            <input type="text" class="form-control mb-2" id="phone_number" name="phone_number" value="<?= $one_customer->getPhone_number() ?>">
        </div>
        <div class="form-group">
            <label for="siret" class="mt-1 mb-1">Siret : </label>
            <input type="text" class="form-control mb-2" id="siret" name="siret" value="<?= $one_customer->getSiret() ?>">
        </div>
        <div class="form-group">
            <label for="siren" class="mt-1 mb-1">Siren : </label>
            <input type="text" class="form-control mb-2" id="siren" name="siren" value="<?= $one_customer->getSiren() ?>">
        </div>
      </div>


      </div>

      <div class="col-12 text-center">
          <button type="submit" class="btn btn-warning text-white transparent-button px-4 m-3">Modifier</button>
      </div>
  </form>
</div>

