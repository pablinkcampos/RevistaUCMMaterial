<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 $CI = & get_instance();
 $CI->load->library('session');
 $CI->load->model('Articulo_model');

?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-filestyle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/form_valid.js"></script>
<script type="text/javascript">
    $(":userfile").filestyle();
    $(":userfile").filestyle('icon');
</script>
<script type="text/javascript">
var nextinput = 0;
function AgregarCampos(){
    nextinput++;
    
    if(nextinput<6){
        campo = '<div class="form-group col-md-12"><div class="form-group"> <div style="text-align: right;" class="col-md-3"> <label for="autor_'+nextinput+'"><?php echo lang('aa_autor_adicional'); ?>:</label></div><div class="col-md-9"> <input type="text" value="" class="form-control" name="autor_'+nextinput+'" id="autor_'+nextinput+'" placeholder="<?php echo lang('aa_ingrese autor adicional'); ?>"> </div></div></div>';
        campo_email ='<div class="form-group col-md-12"><div class="form-group"><div style="text-align: right;" class="col-md-3"><label for="email_add'+nextinput+'"><?php echo lang('aa_email_adicional') . ' (*)'; ?>:</label></div><div class="col-md-9"><input type="email" value="" class="form-control" name="email_add'+nextinput+'" id="email_add'+nextinput+'" placeholder="<?php echo lang('aa_ingrese email adicional');?>"></div></div></div>';
        $("#campos").append(campo+campo_email);
    }
}                  

</script>

<script type="text/javascript">
    $(document).ready(function() {
    $("#area_aplicable").change(function() {
        $("#area_aplicable option:selected").each(function() {
            campo = $("#area_aplicable").val();
            $.post("<?php echo base_url(); ?>index.php/Articulo_autor/selectTema", {
            area_aplicable : campo
            }, function(data) {
                $("#tema_interes").html(data);
            });
        });
    });
    });
</script>
 <script type="text/javascript" src="<?php echo base_url(); ?>vendors/ckeditor/ckeditor.js"></script>


<div class="content-wrap">
    <div class="container clearfix">
        <div class="postcontent nobottommargin col_last">
            <div id="posts" class="events small-thumbs col-md-9">
                <h3 style = "color: black;"><?php echo lang('aa_ingrese informacion de articulo'); ?></h3>
                <hr>
                <form name = "form_art" class="form-horizontal"  action="<?php echo base_url();?>index.php/Articulo_autor/editar_articulo" method="post" onsubmit="return validateForm()"  enctype="multipart/form-data">
                    <?php 
                    if($fail){
                        echo '<p align="center" style="color: red;"><big><b>'.$fail.'</big></b></p><br>';
                    }
                    ?>
                    <div class="form-group col-md-12">
                        <div style="text-align: right;" class="col-md-3">
                            <label class="control-label" for="text"><?php echo lang('aa_titulo'); ?> (*):</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="titulo_articulo" value="<?php if (isset($_POST['titulo_articulo'])) echo $_POST['titulo_articulo']; ?>" id="titulo_articulo" placeholder="<?php echo lang('aa_ingrese titulo'); ?>" required="True">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <div style="text-align: right;" class="col-md-3">
                                <label for="abstract"><?php echo lang('aa_abstract'); ?> (*):</label>
                            </div>
                            <div class="col-md-9">
                               
                                <textarea class="ckeditor" name="abstract" id="abstract" rows="20" cols="100" required="true"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <div style="text-align: right;" class="col-md-3">
                                <label for="text"><?php echo lang('aa_palabras claves'); ?> (*):</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" maxlength="80" value="<?php if (isset($_POST['palabras_claves'])) echo $_POST['palabras_claves']; ?>" class="form-control" name="palabras_claves" id="palabras_claves" placeholder="<?php echo lang('aa_ingrese palabras claves'); ?>" required="required">
                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <div style="text-align: right;" class="col-md-3">
                                <label for="fecha_ingreso">Fecha de Reenvio (*):</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" maxlength="80" value="<?php echo date('d-m-Y'); ?>" name="fecha_ingreso" id="fecha_ingreso" disabled="disabled">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div id="campos" >
                          
                        </div>
                        
                    </div>
                
               
                    
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <div style="text-align: right;" class="col-md-3">
                                <label for="exampleInputFile"><?php echo lang('aa_subir archivo'); ?> (*):</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name = "userfile" accept=".doc, .docx" class="filestyle" id="exampleInputFile" required="required" data-buttonText="<i class='material-icons' style='font-size:20px;vertical-align:bottom'>file_upload</i> <?php echo lang('aa_seleccionar'); ?> ">
                                <small id="fileHelp" class="form-text text-muted"><?php echo lang('aa_archivos de extension'); ?> .doc o .docx. Max: 5MB</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <div style="text-align: right;" class="col-md-3">
                                <label for="comentarios"><?php echo lang('aa_comentarios adicionales'); ?>:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="comentarios" id="comentarios" rows="3"><?php  if (isset($_POST['comentarios'])) echo $_POST['comentarios']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-7">
                            <br><br>
                            <button type="submit" name = "upload" id = "upload" class="button button-3d button-mini button-rounded button-green btn-block"><?php echo lang('aa_ingresar articulo'); ?></button>
                        </div>
                    </div>
  
                </form>
            </div>
            
            <div class="col-md-3">
                <br><br><br><br><?php echo lang('vap_part3'); ?>.<br><?php echo lang('vap_part4'); ?>: "<b>Pablo Campos M.</b>" <?php echo lang('vap_part5'); ?>.</p>
            </div>
            
        </div>
        
        <div class="sidebar nobottommargin clearfix">
            <div class="sidebar-widgets-wrap">
              
            </div>
        </div>
    </div>
</div>
