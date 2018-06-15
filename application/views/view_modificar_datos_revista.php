<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>



<div class="container-fluid  " style="margin-top: 200px;">
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
            <div class="card">
                <div class="header">
                        <div class="col-md-12">
                          <br>
                          <h3 style = "color: black;">Modificar Editorial Revista</h3>
                          <hr>
                        </div>
                   
                </div>
                <center>
                <div class="row">
                   
                <form class="form-horizontal col-lg-9" action="<?php echo base_url(); ?>index.php/System/modifica_datos_revista" method="POST" enctype="multipart/form-data">
                        <div class="form-group col_full">
                            <div style="text-align: right;" class="col-lg-3">
                                <label class="control-label" for="ta_e"><?php echo lang("vmdr_editor");?>:</label>
                            </div>                        
                            <div class="col-lg-12">
                                <textarea class="ckeditor" name="ta_e" id="ta_e" rows="20" cols="100" required="true"><?php echo  $editor->texto; ?></textarea>
             
                            </div>
                        </div>
                        <div class="form-group col_full">
                            <div style="text-align: right;" class="col-lg-3">
                                <label class="control-label" for="text"><?php echo lang("vmdr_coEditor");?>:</label>
                            </div>                        
                            <div class="col-lg-12">
                                <textarea class="ckeditor" name="ta_ce" id="ta_ce" rows="20" cols="100" required="true"><?php echo  $coeditor->texto; ?></textarea>
             
                            </div>
                        </div>

                        <div class="form-group col_full">
                            <div style="text-align: right;" class="col-lg-3">
                                <label class="control-label" for="text"><?php echo lang("vmdr_comite_ea");?>:</label>
                            </div>                        
                            <div class="col-lg-12">
                                <textarea class="ckeditor" name="ta_cea" id="ta_cea" rows="20" cols="100" required="true"><?php echo  $comite_editor_asesor->texto; ?></textarea>
             
                            </div>
                        </div>

                        <div class="form-group col_full">
                            <div style="text-align: right;" class="col-lg-3">
                                <label class="control-label" for="text"><?php echo lang("vmdr_comite");?>:</label>
                            </div>                        
                            <div class="col-lg-12">
                                <textarea class="ckeditor" name="ta_coe" id="ta_coe" rows="20" cols="100" required="true"><?php echo  $comite_editor->texto; ?></textarea>
             
                            </div>
                        </div>
                        <div class="form-group col_full">
                            <div style="text-align: right;" class="col-lg-3">
                                <label class="control-label" for="text"><?php echo lang("vmdr_produccion_editorial");?>:</label>
                            </div>                        
                            <div class="col-lg-12">
                                <textarea class="ckeditor" name="ta_pe" id="ta_pe" rows="20" cols="100" required="true"><?php echo  $produccion_editorial->texto; ?></textarea>
             
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-7" style="margin:20px; allign:center">
                                <br><br>
                                <center>
                                <button type="submit" name="go" class="btn btn-success waves-effect"><?php echo lang("vmma_modificar");?></button>
                                </center>
                            </div>
                        </div>
                     

                    </form>
                    
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
  
