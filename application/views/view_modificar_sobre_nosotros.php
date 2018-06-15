<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container-fluid  " style="margin-top: 200px;">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>
				<div class="card">
					<div class="header bg-blue">
                  
                    <h3><?php echo lang("vmsn_modificar quienes somos");?></h3>
                        <br>
                       
                   
					</div>
					<div class="row">
                       
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal col-lg-9" action="<?php echo base_url(); ?>index.php/System/modifica_nosotros" method="POST" enctype="multipart/form-data">
                        <div class="form-group col_full">
                            <center>             
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <textarea class="ckeditor" name="t_com" id="abstract"rows="6" required="true"><?php echo  $texto->texto; ?></textarea>
                            </div>
                            </center>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-7">
                                <br><br>
                                <button type="submit" name="go" style="margin:4%" class="btn btn-success waves-effect"><?php echo lang("vmsn_modificar");?></button>
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

