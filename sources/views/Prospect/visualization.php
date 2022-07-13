<style>
<?php include "assets/css/Customer/index.css";?>
</style>

			  <div class="content-wrapper">
			    <div class="row col-10 mx-auto">
			        <h4 class="mt-4 mb-2 p-0 text-center index-title">Statistiques de prospection </h4>
			    </div>
				</div>

        <div class="row col-xxl-11 col-xl-10 col-lg-10 col-md-11 mx-auto justify-content-center">
            <div class="col-xl-12 col-md-12 p-0">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">

                      <table class="table">
                            <thead>
                              <tr style="text-align: center;">
                                <th scope="col">Jour</th>
                                <th scope="col">Messages</th>
                                <th scope="col">Appels</th>
                                <th scope="col">Visio</th>
                              </tr>
                            </thead>
                            <tbody class="table-group-divider">
                              <?php foreach ($list_prospect_events as $key => $prospects): ?>
                                <tr>
                                <td><?= $prospects['at'] ?></td>
                                <td>ESSAIE</td>
                                <td>ESSAIE</td>
                                <td>ESSAIE</td>
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
                  

