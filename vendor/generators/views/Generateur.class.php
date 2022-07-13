<?php
	class Generateur {
		private $data, $res_table, $dossier_exp, $ext;

		public function __construct($data, $dossier_exp, $ext="") {
			$this->data = $data;
			$this->dossier_exp = $dossier_exp;
			$this->ext = $ext;
		}

		public function ucbirst($string) {
			if ($this->ext != "") {
				return $string;
			}
			return ucfirst($string);
		}

		public function ecrireUneClasse($laTable) {
			if (!file_exists($this->dossier_exp . '/' . $this->ucbirst($laTable)))
				mkdir($this->dossier_exp . '/' . $this->ucbirst($laTable));			

			$nom_fichier = $this->dossier_exp.'/'.$this->ucbirst($laTable).'/index.php';

			if (!file_exists($nom_fichier)) {
				file_put_contents($nom_fichier, $this->print_index($laTable));
			}

			$nom_fichier = $this->dossier_exp.'/'.$this->ucbirst($laTable).'/list_view.php';
			if (!file_exists($nom_fichier)) {
				file_put_contents($nom_fichier, $this->print_list($laTable));
			}

			$nom_fichier = $this->dossier_exp.'/'.$this->ucbirst($laTable).'/view.php';
			if (!file_exists($nom_fichier)) {
				file_put_contents($nom_fichier, '');
			}

			$nom_fichier = $this->dossier_exp.'/'.$this->ucbirst($laTable).'/add.php';
			if (!file_exists($nom_fichier)) {
				file_put_contents($nom_fichier, $this->print_add_form($laTable));
			}

			$nom_fichier = $this->dossier_exp.'/'.$this->ucbirst($laTable).'/edit.php';
			if (!file_exists($nom_fichier)) {
				file_put_contents($nom_fichier, $this->print_edit_form($laTable));
			}

			$nom_fichier = $this->dossier_exp.'/'.$this->ucbirst($laTable).'/delete.php';
			if (!file_exists($nom_fichier)) {
				file_put_contents($nom_fichier, '');
			}			
		}

		public function print_index($table) {
			$str = '<!-- partial -->
			<div class="main-panel">
			  <div class="content-wrapper">
			    <div class="row">
			      <div class="col-sm-6">
			        <h4 class="mb-1 font-weight-bold ">'.$this->ucbirst($table).'s</h4>
			        <p>Celui qui n’a pas d’objectifs ne risque pas de les atteindre.</p>
			      </div>
			      <div class="col-sm-6">
			        <div class="d-flex align-items-center justify-content-md-end">
			          <button type="button" class="btn btn-primary btn-fw single-button" data-toggle="modal" data-target="#exampleModal-2">Nouvelle '.$this->ucbirst($table).'</button>
			        </div>
			      </div>
			     </div>
			     <div class="row">
			      <div class="col-md-12 grid-margin stretch-card">
			        <div class="card">
			          <div class="card-body">
			            <div class="row">
			              <div class="col-12">
			                <table id="order-listing" class="table tableplus">
			                  <thead>
			                    <tr>';
				                      foreach ($this->data[$table] as $key => $value) {
											$str .= "\n\t\t\t\t"."<th>".ucfirst($value['Field'])."</th>";
											$i++; 
										}

				                        $str .= '<th>Actions</th>
				                    </tr>
				                  </thead>
				                  <tbody>
				                    <?php foreach ($list_'.$table.'s as $key => $'.$table.'): ?>
				                      <tr>';
				                      foreach ($this->data[$table] as $key => $value) {
											$str .= "\n\t\t\t\t".'<td><?= $'.$table.'[\''.$value['Field'].'\'] ?></td>';
											$i++; 
										}

				                        $str .= '
				                         <td>
				                          <a href="index.php?tab='.$table.'&action=edit&id=<?= $'.$table.'[\''.$this->data[$table][0]['Field'].'\'] ?>"><button class="btn btn-inverse-warning btn-fw transparent-button">Modifier</button></a>
				                          <a href="index.php?tab='.$table.'&action=delete&id=<?= $'.$table.'[\''.$this->data[$table][0]['Field'].'\'] ?>"><button class="btn btn-inverse-danger transparent-button btn-fw">Supprimer</button></a>
				                        </td>
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
				  </div>';
				  $str .= '<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel-2">Ajouter une '.$this->ucbirst($table).'</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" name="add_'.$table.'_form">
          ';
          foreach ($this->data[$table] as $key => $value) {
				$str .= '<?php '."\n\t\t\t\t".' Html::input(\''.$value['Field'].'\', \''.$this->ucbirst($value['Field']).'\', \'text\', \'Ex: \'); ?>';
				$i++; 
			}

            $str .= '
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success single-button" onclick="form_'.$table.'()">Ajouter</button>
          <button type="button" class="btn btn-light single-button" data-dismiss="modal">Annuler</button>
        </div>
      </div>
    </div>
  </div>';
  $str .= '  <!-- content-wrapper ends -->
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
<!-- main-panel ends -->
<script type="text/javascript">
  function form_'.$table.'() {
    document.add_'.$table.'_form.submit();
  }
</script>';
			$str .= '</div></div></div></div>';
			return $str;
		}

		public function print_add_form($table) {
			$str = "<form method=\"POST\">\n\t<table>\n\t\t<caption>Add ".$table." :</caption>\n\t\t<tbody>";
			foreach ($this->data[$table] as $key => $value)
				$str .= "\n\t\t\t" . '<tr>'."\n\t\t\t\t".'<td><label for="'.$value['Field'].'">'.$this->ucbirst($value['Field']).'</label></td>'."\n\t\t\t\t".'<td><input name="'.$value['Field'].'" id="'.$value['Field'].'" placeholder="'.$value['Field'].'" type="text" /></td></tr>';
			$str .= "\n\t\t</tbody>\n\t\t<tfoot>\n\t\t\t<tr>\n\t\t\t\t<th colspan=\"2\"><input type=\"submit\" name=\"add_form\" value=\"Submit\" /></th>\n\t\t\t</tr>\n\t\t</tfoot>\n\t</table>\n</form>";
			return $str;
		}

		public function print_edit_form($table) {
			$str = '<div class="main-panel">
  <div class="content-wrapper">
		<div class="col-12">
			<form method="POST">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Modifier une '.$table.'</h4>
						';
          foreach ($this->data[$table] as $key => $value) {
				$str .= '<?php '."\n\t\t\t\t".' Html::input(\''.$value['Field'].'\', \''.$this->ucbirst($value['Field']).'\', \'text\', \'Ex: \', $one_'.$table.'->get'.ucfirst($value['Field']).'()); ?>';
				$i++; 
			}

            $str .= '

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
  $(\'textarea\').autoResize();

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
$(\'#importance_field\').barrating({
  theme: \'fontawesome-stars\',
  showSelectedRating: false
});
</script>
';
			/*$str .= "<form method=\"POST\">\n\t<table>\n\t\t<caption>Edit ".$table." :</caption>\n\t\t<tbody>";
			foreach ($this->data[$table] as $key => $value)
				$str .= "\n\t\t\t" . '<tr>'."\n\t\t\t\t".'<td><label for="'.$value['Field'].'">'.$this->ucbirst($value['Field']).'</label></td>'."\n\t\t\t\t".'<td><input name="'.$value['Field'].'" id="'.$value['Field'].'" placeholder="'.$value['Field'].'" type="text" value="<?php echo ; ?>" /></td></tr>';
			$str .= "\n\t\t</tbody>\n\t\t<tfoot>\n\t\t\t<tr>\n\t\t\t\t<th colspan=\"2\"><input type=\"submit\" name=\"add_form\" value=\"Submit\" /></th>\n\t\t\t</tr>\n\t\t</tfoot>\n\t</table>\n</form>";*/
			return $str;
		}

		public function print_list($table) {
			$str = "<table>\n\t<caption>".$this->ucbirst($table)."</caption>\n\t<thead>\n\t\t<tr>";
			foreach ($this->data[$table] as $key => $value)
				$str .= "\n\t\t\t" . '<th>'.$this->ucbirst($value['Field'])."</th>";
			$str .= "\n\t\t</tr>\n\t</thead>\n\t<tbody>";
			$BDD = new Database();
			$str .= "\n\t<?php foreach (\$list_".$table."s as \$key => \$$table) : ?>";
			$str .= "\n\t\t<tr>";
			foreach ($this->data[$table] as $key => $value)
				$str .= "\n\t\t\t" . '<td><?php echo $'.$table."['".$value['Field']."']; ?></td>";
			$str .= "\n\t\t</tr>";
			$str .= "\n\t<?php endforeach; ?>";
			$str .= "\n\t</tbody>\n</table>";
			return $str;
		}

		public function ecrireLesClasses() {
			foreach ($this->data as $key => $table) {
				$this->ecrireUneClasse($key);
			}
		}
	}