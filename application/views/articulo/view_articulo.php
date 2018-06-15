<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 $CI = & get_instance();
 $CI->load->library('session');
 $CI->load->model('Articulo_model');

?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<script type="text/javascript">
    var nextinput = 0;
    function AgregarCampos(){
        nextinput++;
    
        if(nextinput<6){
 
            campo = '<h6>Autor adicional '+nextinput+'</h6><label class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >Nombre Autor adicional:</label><div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"><div class="form-line">  <input type="text" value="" class="form-control" placeholder="Nombre autor adicional:" name="autor_'+nextinput+'" id="autor_'+nextinput+'" "> </div></div>';
            campo_email ='<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >Email Autor adicional:</label><div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"><div class="form-line"><input type="email" value="" placeholder="<?php echo lang('aa_email_adicional'); ?>:" class="form-control" name="email_add'+nextinput+'" id="email_add'+nextinput+'" "></div></div>';
            $("#campos").append(campo+campo_email);
        }
    }                  

</script>



<script type="text/javascript">


    function load(value){
       
        $.post("<?php echo base_url(); ?>index.php/Articulo_autor/selectTema", {
            area_aplicable : value
        }, 
        function(data) {
            $("#tema_interes").html(data);
        });
    }        

    
</script>

<style type="text/css">
 

 i{
     font-size:10px;
 }
</style>




   
<div class="container-fluid  " style="margin-top: 200px;">
       
       <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <center>
               <div class="card">
                   <div class="header">
                       <h2>
                       <h3 style = "color: black;"><?php echo lang('aa_ingrese informacion de articulo'); ?></h3>
                           
                       </h2>
                      
                   </div>
                   <div class="body">
     
                   <form id="wizard_with_validation" name = "wizard_with_validation" action="<?php echo base_url();?>index.php/Articulo_autor/ingresar_articulo" method="POST" enctype="multipart/form-data">
                             <h3>Información de autor</h3>
                             <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <br><br><br><br><?php echo lang('vap_part3'); ?>.<br><?php echo lang('vap_part4'); ?>: "<b>Pablo Campos M.</b>" <?php echo lang('vap_part5'); ?>.</p>
                                    </div>
                                    <label class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >Autor de Contacto:</label>
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
									<div class="form-group form-float">
										
										<div class="form-line">
                                            
											<input type="text" value="" placeholder="Ingrese <?php echo lang('aa_autor_prinicipal') . ' (*)'; ?>:" class="form-control" name="autor_principal" id="autor_principal"  required="required"> 
										</div>
									</div>
                                    </div>
                                   
                                    <label class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >Email de Contacto:</label>
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                    <div class="form-group ">
                                        <div class="form-line">
                                        
                                        <input type="email" value="" class="form-control" name="email_autor" placeholder="Ingrese <?php echo lang('aa_email_contacto') . ' (*)'; ?>:" id="email_autor"  required="required">
                                        
                                        </div>
                                       
                                    </div>
                                    </div>
                                
                                            <button type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="añadir autor adicional">
                                                <i  onclick=AgregarCampos(); class="material-icons" >add</i>
                                            </button>
                           
                                   
								 

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div id="campos" class="input-group" >
                          
                                        </div>
                                    </div>
                                    <label class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >Institución:</label>
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                              
                                                <input type="text" value="" class="form-control" name="institucion" id="institucion" placeholder="<?php echo lang('aa_ingrese institucion');?>" required="required">
										    </div>  
                                        </div>
                                    </div>

                                 
                                    <label class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >Pais:</label>
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                        <div class="form-group form-float">
                                       
                                            <div class="form-line">
                                           
                                                   
                                                    
                                                     <select  name="pais" id = "pais" value="" class="form-control show-tick"  required="required"> 
                                                        <?php 
                                                        if ($paises){
                                                            foreach ($paises->result() as $row){
                                                                if (isset($_POST['pais']) && $_POST['pais'] == $row->ID)
                                                                {
                                                                    echo '<option selected value='. $row->ID . '> ' . $row->nombre . '</option>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<option value='. $row->ID . '> ' . $row->nombre . '</option>';
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        </select> 
                                                 
                                             </div>  
                                        </div>
                                    </div> 

                             </fieldset>                             
                                <h3><?php echo lang('aa_ingrese informacion de articulo'); ?></h3>
                             <fieldset>
                                <label class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >Titulo artículo:</label>
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                    <div class="form-group ">
                                        <div class="form-line">
                                        
                                        <input type="text" class="form-control" name="titulo_articulo" value="<?php if (isset($_POST['titulo_articulo'])) echo $_POST['titulo_articulo']; ?>" id="titulo_articulo" placeholder="<?php echo lang('aa_ingrese titulo'); ?>" required="required">
                                        
                                        </div>
                                       
                                    </div>
                                    </div>
                                  
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								
										<div class="form-line">
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <label for="abstract"><?php echo lang('aa_abstract'); ?> (*):</label>
                                           
                                        </div>
                                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                            <textarea class="ckeditor" name="abstract" id="abstract" rows="20" cols="90" required="requerid" placeholder="ingrese un resumen del articulo" ></textarea>
                                        </div>
                                        </div>
								
                                    </div>

                                    <div class="form-group col-md-12">
                  
                  <div class="form-group">
                      <div style="text-align: right;" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <label for="tema"><?php echo lang('aa_area aplicable'); ?> (*):</label>
                      </div>
                      <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                          <select class="form-control" id="area_aplicable" name="area_aplicable"  required="required" onchange="load(this.value)">
                            <option value="">Selecciona Area Aplicable</option>
                              <?php
                              
                              foreach ($campo->result() as $row) {
                                  if ($row->id_campo == $_SESSION["area_aplicable"]) {
                                      $string = ' selected="selected" ';
                                  } else {
                                      $string = "";
                                  }
                                  echo '<option value="' . $row->id_campo . '" ' . $string . '>' . $row->nombre_campo . '</option>';
                              }
                              ?>
                          </select>
                      </div>
                  </div>
           
              </div>

              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div style="text-align: right;" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <label for="tema_interes"><?php echo lang('aa_tema'); ?> (*):</label>
                  </div>
                  <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                   
                  
                          <select class="form-control" name="tema_interes" id="tema_interes" required="required">
                              <option value="">Selecciona tema</option>
                                
                          </select>
                     
                  </div>
           
              </div>
              <label class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >Palabras Clave:</label>	
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                   
			    <div class="form-group form-float">
				    <div class="form-line ">	
                           									
                            <input type="text" maxlength="80" value="<?php if (isset($_POST['palabras_claves'])) echo $_POST['palabras_claves']; ?>" class="form-control" name="palabras_claves" id="palabras_claves" placeholder="<?php echo lang('aa_ingrese palabras claves'); ?>" required="required">
				    </div>
                    <small>escriba las palabras clave separadas por un espacio</small>
			    </div>
                </div> 

                                <div class="form-group form-float">
				                	<div class="form-line">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                            <label for="comentarios">Comentrios (*):</label> 
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                            <textarea class="ckeditor" name="comentarios" id="comentarios" rows="3" placeholder="ingrese comentarios" ><?php  if (isset($_POST['comentarios'])) echo $_POST['comentarios']; ?></textarea>
                                        </div>
                                    </div>
								</div>
                                   

                                  
																							
                            </fieldset>                             
                                <h3>Articulo</h3>
                          <fieldset>
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
                                        <label for="fecha_ingreso">Fecha de Ingreso (*):</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" maxlength="80" value="<?php echo date('d-m-Y'); ?>" name="fecha_ingreso" id="fecha_ingreso" disabled="disabled">
                                    </div>
                                </div>
                            </div>
      

													
                          </fieldset>
					</form>
                </div>
            </div>
            </center>
        </div>
    </div>
</div>


