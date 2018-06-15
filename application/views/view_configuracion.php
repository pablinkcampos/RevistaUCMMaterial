<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-fluid  " style="margin-top: 200px;">
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
            <div class="card">
                <div class="header bg-blue">
                      
                          <h3>Mensaje aviso artículo aceptado</h3>
                        
                   
                </div>
                <center>
                <div class="row">
                   
                <form class="form-horizontal col-lg-9" action="<?php echo base_url(); ?>index.php/System/agregar_configuracion" method="POST" enctype="multipart/form-data">
                       
                          
                       <div class="form-group col_full">
                           <div style="text-align: right;" class="col-lg-3">
                               <label class="control-label" for="text"><?php echo lang('vc_diamaxarti');?></label>
                           </div>
                           <div class="col-lg-9">
                               <input type="text" class="form-control" name="max_dia_asig_art" value="" id="max_dia_asig_art" placeholder="<?php echo lang('vc_diamaxartip');?>" required="True" oninvalid="setCustomValidity('<?php echo lang("fv_campo requerido");?>')" oninput="setCustomValidity('')" >
                           </div>
                       </div>
                       <div class="form-group col_full">
                           <div style="text-align: right;" class="col-lg-3">
                               <label class="control-label" for="text"><?php echo lang('vc_canmaxrevi');?></label>
                           </div>
                           <div class="col-lg-9">
                               <input type="number" max=3 min=1 class="form-control" name="max_revi_art" value="" id="max_revi_art" placeholder="<?php echo lang('vc_canmaxrevip');?>" required="True" oninvalid="setCustomValidity('<?php echo lang("fv_campo requerido");?>')" oninput="setCustomValidity('')" >
                           </div>
                       </div>
                       <div class="form-group col_full">
                           <div style="text-align: right;" class="col-lg-3">
                               <label class="control-label" for="text"><?php echo lang('vc_diamax');?></label>
                           </div>
                           <div class="col-lg-9">
                               <input type="number" max=30 min=1 class="form-control" name="max_dia_res_art" value="" id="max_dia_res_art" placeholder="<?php echo lang('vc_diamaxp');?>" required="True" oninvalid="setCustomValidity('<?php echo lang("fv_campo requerido");?>')" oninput="setCustomValidity('')" >
                           </div>
                       </div>

                       <div class="form-group col_full">
                           <div style="text-align: right;" class="col-lg-3">
                               <label class="control-label" for="text"><?php echo lang('vc_diamaxri');?></label>
                           </div>
                           <div class="col-lg-9">
                               <input type="number" max=30 min=1 class="form-control" name="max_dia_edi_rev_art" value="" id="max_dia_edi_rev_art" placeholder="<?php echo lang('vc_diamaxri');?>" required="True" oninvalid="setCustomValidity('<?php echo lang("fv_campo requerido");?>')" oninput="setCustomValidity('')" >
                           </div>
                       </div>

                        <div class="form-group col_full">
                           <div style="text-align: right;" class="col-lg-3">
                               <label class="control-label" for="text">MÁXIMA CANTIDAD DE DIAS PARA REENVIAR UN ARTICULO</label>
                           </div>
                           <div class="col-lg-9">
                               <input type="number" max=30 min=1 class="form-control" name="max_dia_reev_art" value="" id="max_dia_reev_art" placeholder="Ingrese días para reenviar un artículo" required="True" oninvalid="setCustomValidity('<?php echo lang("fv_campo requerido");?>')" oninput="setCustomValidity('')" >
                           </div>
                       </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-7">
                                <br><br>
                                <button type="submit" name="go" class="btn btn-success waves-effect"><?php echo lang("vmma_modificar");?></button>
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
       
