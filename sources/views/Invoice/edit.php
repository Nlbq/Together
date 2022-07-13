<style>
<?php include "assets/css/Invoice/edit.css";?>
</style>

<div class="content-wrapper">

  <div class="row col-12">
    <h3 class="edit-invoice-title text-center mt-5 mb-3">Modifier la facture n° <?= $one_invoice->getInvoice_id(); ?> </h3>
  </div>

  <div class="row col-12 justify-content-center">
  <div class="col-10 text-center">
    <div class="d-flex align-items-start p-2 ps-1 mb-3">
      <a href="index.php?tab=invoice" class="btn btn-primary btn-fw together-button" >Retour</a>
    </div>
  </div>
</div>

  <div class="col-12 justify-content-center mx-auto mt-4">
    <div class="card col-10 mx-auto">
      <div class="card-body">
        <form method="POST">
              <?php 
          Html::input('invoice_id', 'Invoice_id', 'text', 'Ex: ', $one_invoice->getInvoice_id()); ?><?php 
          Html::input('user_id', 'User_id', 'text', 'Ex: ', $one_invoice->getUser_id()); ?><?php 
          Html::input('at', 'At', 'text', 'Ex: ', $one_invoice->getAt()); ?><?php 
          Html::input('status', 'Status', 'text', 'Ex: ', $one_invoice->getStatus()); ?><?php 
          Html::input('payment_method', 'Payment_method', 'text', 'Ex: ', $one_invoice->getPayment_method()); ?>

          <div class="edit-invoice-btn text-center">
            <button type="submit" class="btn btn-success m-2 mt-4 together-button">Modifier</button>
          </div>
              
        </form>
      </div>
    </div>
  </div>
</div>

  
