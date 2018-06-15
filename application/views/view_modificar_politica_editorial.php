<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <script>
  tinymce.init({
    selector: '#t_com_2'
  });
  </script>


<div class="container-fluid  " style="margin-top: 200px;">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>
				<div class="card">
					<div class="header bg-blue">
                  
                        <h3><?php echo lang("vmpe_modificar politicas");?></h3>
                        <br>
                       
                   
					</div>
					<div class="row">
                       
                        <div class="col-lg-12">
                            <form class="form-horizontal col-lg-12" action="<?php echo base_url(); ?>index.php/System/modifica_politicas" method="POST" enctype="multipart/form-data">
                            <div class="form-group col_full">                      
                                <div class="col-lg-12">
                                    <textarea class="ckeditor" id="t_com_2" name="t_com_2" id="abstract"rows="6" required="true"><?php echo  $texto->texto; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-7">
                                    <br><br>
                                    <button type="submit" name="go" style="margin:4%" class="btn btn-success waves-effect"><?php echo lang("vmpe_modificar");?></button>
                                </div>
                            </div>
                            </form>
                           
                        </div>
						</div>
					</div>
			</center>
		</div>
	</div>
</div>



                <div class="widget clearfix">
                    <?php
                     $this->load->view('include/menu_editor');
                    ?>
                </div>
      
