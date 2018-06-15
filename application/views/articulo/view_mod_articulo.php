<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-filestyle.min.js"> </script>
<script type="text/javascript">
	$(":userfile").filestyle();
  $(":userfile").filestyle('icon');
</script>


<div class="content-wrap">
    <div class="container clearfix">
        <div class="postcontent nobottommargin col_last">
            <div id="posts" class="events small-thumbs">

            <?php if($datos){ ?>
            <?php foreach ($datos->result() as $row): ?>
            <?php

            $id_revista        =   $row->ID;
            $titulo_revista    =   $row->titulo_revista;
            $version           =   $row->version;
            $email_autor          =   $row->email_autor;
            $id_campo          =   $row->id_campo;
            $id_estado         =   $row->id_estado;

            $palabras_claves   =   $row->palabras_claves;
            $abstract          =   $row->abstract;
            $autor_1           =   $row->autor_1;
            $autor_2           =   $row->autor_2;
            $autor_3           =   $row->autor_3;
            $autor_4           =   $row->autor_4;

            $archivo           =   $row->archivo;
            $comentarios       =   $row->comentarios;
            $fecha_ultima_upd  =   $row->fecha_ultima_upd ;

            $fecha_ingreso     =   $row->fecha_ingreso;
            $email_revisor_1           =   $row->email_revisor_1;
            $email_revisor_2           =   $row->email_revisor_2;
            $email_revisor_3           =   $row->email_revisor_3;
            $comentarios_editor        =   $row->comentarios_editor;
            $fecha_timeout             =   $row->fecha_timeout;
            ?>

            <?php if($id_estado==1){ ?>
            <div class="col-md-12">
                <br>
                <h3 style = "color: black;">Modificar datos de Artículo</h3>
                <hr>
            </div>

            <form method="POST" action="<?php echo base_url(); ?>index.php/System/mod_articulo/<?php echo $row->ID; ?>">

                <!-- -->
                <div class="col-md-12">
                    <div style="text-align: right;" class="col-md-2">
                        <label>Título (*): </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $titulo_revista; ?>" name="titulo_revista" required="required"><br>
                    </div>
                </div>
                <!-- -->
                <div class="col-md-12">
                    <div style="text-align: right;" class="col-md-2">
                        <label>Área Aplicable (*): </label>
                    </div>
                    <div class="col-md-10">
                         <select class="form-control" name="area_aplicable" id="area_aplicable" required="required">

                        <?php

                            foreach ($campo->result() as $campos){
                                if($campos->id_campo == $id_campo){
                                    $string = ' selected="selected" ';
                                }else{
                                    $string = "";
                                }
                                echo '<option value="'.$campos->id_campo.'" '.$string.'>'.$campos->nombre_campo.'</option>';
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <!-- -->
                <div class="col-md-12">
                    <div style="text-align: right;" class="col-md-2">
                        <label>Palabras Claves (*): </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $palabras_claves; ?>" name="palabras_claves" required="required"><br>
                    </div>
                </div>
                <!-- -->
                <div class="col-md-12">
                    <div style="text-align: right;" class="col-md-2">
                        <label>Abstract (*): </label>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control"  name="abstract" id="abstract" rows="3" required="required"><?php echo $abstract ?></textarea>
                    </div>
                </div>
                <!-- -->
                <div class="col-md-12">
                  <br>
                    <div style="text-align: right;" class="col-md-2">
                        <label>Autor del artículo (*): </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $autor_1; ?>" name="autor_1" id = "autor_1" required="required"><br>
                    </div>
                </div>
                <!-- -->
                <div class="col-md-12">
                    <div style="text-align: right;" class="col-md-2">
                        <label>Autor adicional: </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $autor_2; ?>" name="autor_2" id = "autor_2"><br>
                    </div>
                </div>
                <!-- -->
                <div class="col-md-12">
                    <div style="text-align: right;" class="col-md-2">
                        <label>Autor adicional: </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $autor_3; ?>" name="autor_3" id = "autor_3"><br>
                    </div>
                </div>
                <!-- -->
                <div class="col-md-12">
                    <div style="text-align: right;" class="col-md-2">
                        <label>Autor adicional: </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $autor_4; ?>" name="autor_4" id = "autor_4"><br>
                    </div>
                </div>
                <!-- -->
                <div class="col-md-12">
                <br>
                    <div style="text-align: right;" class="col-md-2">
                        <label>COMENTARIOS ADICIONALES: </label>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control"  name="comentarios" id="comentarios" rows="3"><?php echo $comentarios ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-7">
                        <br><br>
                        <button type="submit" class="button button-3d button-mini button-rounded button-green btn-block">Modificar Artículo</button>
                    </div>
                </div>

            </form>

            <?php }else{ ?>

                <div class="col-md-12">
                <br>
                <h3 style = "color: black;">Este Artículo no puede modificarse</h3>
                <hr>
            </div>

            <?php } ?>


            <?php endforeach ?>
            <?php } ?>

            </div>


        </div>

        <div class="sidebar nobottommargin clearfix">
            <div class="sidebar-widgets-wrap">
                <div class="widget clearfix">
                    <?php
                     $this->load->view('include/menu_autor');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
