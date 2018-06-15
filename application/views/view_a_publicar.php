<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>


<script type="text/javascript">
    function validate_num() {
        var s = 0;

        var user = document.forms["form_23"]["p_ini"].value;
        var user2 = document.forms["form_23"]["p_fin"].value;
        for (i = 0; i < user.length; i++) {
            if (!(((user.charAt(i) >= "0") && (user.charAt(i) <= "9")))) {
                s++;
                swal("Número incorrecto", "Solo se permiten números.", "warning");
                break;
            }
        }
        for (i = 0; i < user2.length; i++) {
            if (!(((user2.charAt(i) >= "0") && (user2.charAt(i) <= "9")))) {
                s++;
                swal("Número incorrecto", "Solo se permiten números.", "warning");
                break;
            }
        }
        if (user2 <== user) {
            s++;
            swal("Números de páginas incorrectos.", "", "warning");
        }

        if (s > 0) {
            return false;
        }
    }
</script>



<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 $info = $this->Articulo_Model->obtener_info_articulo2($articulo_id);
                if ($info)
                {

                }
                else
                {
                  redirect('index.php/System/editor');
                }
?>

<div class="container-fluid  " style="margin-top: 200px;">
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
            <div class="card">
                <div class="header bg-blue">
                      
                    <h3>Subir PDF: <?php echo $info->titulo_revista ?></h3>
                        
                   
                </div>
                <center>
                <div class="row">
                <div  style="margin:10px" align='left' class="col-lg-12 clearfix">
                    <b>Instrucciones:  </b> 
                    <br>1)descargar Artículo<br> 
                </div>
                
                <div class="col-lg-6" style="margin:10px">

                    <a Download href="<?php echo base_url() . 'uploads/' . $info->archivo ?>" class="button right button-3d button button-rounded button-blue"><i class='material-icons' style='font-size:25px;'>file_download</i><?php echo lang('vap_descargar articulo'); ?></a>
                </div>
                <div  style="margin:10px" align='left' class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br>2)subir y convertir Artículo descargado<br>
                </div>
                <form class="form-horizontal col-lg-12 col-md-12 col-sm-12 col-xs-12" action="https://v2.convertapi.com/docx/to/pdf?Secret=zLxh3oGBDrQ9kSwI&download=attachment" method="post" enctype="multipart/form-data">
                   
                    <div style="text-align: right;" class="col-lg-1">
                            <label for="final_file">Subir archivo .docx</label>
                    </div>
                    <div class="form-group col_full">
                        <input type="file" name="File"  />
                    </div>
                    <div class="form-group m-1" style="margin:10px">
                        <div class="col-lg-offset-2 col-lg-7">
                              
                            <button class="btn btn-info bg-blue waves-effect" type="submit">Convertir</button>
                        </div>
                         
                    </div>
                   
                   
                </form>
           
      
            
                <hr>
                <div style="margin:10px" align='left' class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br>3)subir Artículo convertido<br>    
                </div>
                <form class="form-horizontal col-lg-12 col-md-12 col-sm-12 col-xs-12" name="form_23" action="<?php echo base_url(); ?>index.php/Articulo_autor/responder_solicitud" method="POST" onsubmit="return validate_num()" enctype="multipart/form-data">
                
                <div class="form-group col_full">
                        <input type="hidden" value="<?php echo $articulo_id ?>" name="t_id" />   
                    </div>
              
                    <div class="form-group col_full">
                        <div style="text-align: right;" class="col-lg-1">
                            <label for="final_file"><?php echo lang('vap_subir archivo'); ?> PDF</label>
                        </div>
                        <div class="col-lg-11">
                            <input type="file" name = "final_file" accept=".pdf" class="filestyle" id="exampleInputFile" required="required" aria-describedby="fileHelp" data-buttonText="<i class='material-icons' style='font-size:20px;vertical-align:bottom'>file_upload</i> <?php echo lang('aa_seleccionar'); ?> ">
                            <small id="fileHelp" class="form-text text-muted"><?php echo lang('vap_formato admitido'); ?> <b>(.pdf)</b></small>
                        </div>
                    </div>

                        <div class="form-group m-1" style="margin:10px">
                            <div class="col-lg-offset-2 col-lg-7">
                              
                                <button  type="submit" name="exit" class="btn btn-success waves-effect">subir PDF</button>
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



