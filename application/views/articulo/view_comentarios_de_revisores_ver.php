<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min_spanish.js"></script>

<style type="text/css">

	input[type="text"], textarea {

				background-color : #d1d1d1;

			}
</style>

<div class="content-wrap">
    <div class="container clearfix">
        <div class="postcontent nobottommargin col_last">
            <div id="posts" class="events small-thumbs">
							<div class="col-md-12">
					            <div class="col-md-12">
					                <br>
					                <h3 style = "color: black;"><?php echo lang('acdrv_comentarios articulo');?></h3>
					                <hr>
					            </div>
					        <div class="col-md-4"></div>
					    </div>

					    <div class="col-md-12">
					    <div class="col-md-12">
					    <?php if($datos){ ?>
					    	<?php foreach ($datos->result() as $row): ?>
					    		<?php

								$id_revista        =   $row->ID;
								$titulo_revista    =   $row->titulo_revista;
					            $version           =   $row->version;
					            $email_autor       =   $row->email_autor;
					            $id_campo          =   $row->id_campo;
					            $id_estado         =   $row->id_estado;

					            $palabras_claves   =   $row->palabras_claves;
					            $abstract          =   $row->abstract;

					            $archivo           =   $row->archivo;
					            $comentarios       =   $row->comentarios;
					            $fecha_ultima_upd  =   $row->fecha_ultima_upd ;

					            $fecha_ingreso             =   $row->fecha_ingreso;
								$email_revisor_1		   =   $row->email_revisor_1;
								$email_revisor_2		   =   $row->email_revisor_2;
								$email_revisor_3		   =   $row->email_revisor_3;

					            $comentario_revisor_1           =   $row->comentario_revisor_1;
					            $comentario_revisor_2           =   $row->comentario_revisor_2;
					            $comentario_revisor_3           =   $row->comentario_revisor_3;
					            $comentarios_editor           =   $row->comentarios_editor;
					            ?>
						   <?php endforeach ?>


					        <?php
					            $CI =& get_instance();
					            $CI->load->model('Articulo_model');
					            $rev1 = $CI->Articulo_model->revisor_direct($email_revisor_1);
					            foreach ($rev1->result() as $row){
					                $nombre_rev1=$row->nombre." ".$row->apellido_1." ".$row->apellido_2;
					            }

					            $rev2 = $CI->Articulo_model->revisor_direct($email_revisor_2);
					            foreach ($rev2->result() as $row){
					                $nombre_rev2=$row->nombre." ".$row->apellido_1." ".$row->apellido_2;
					            }

					            $rev3 = $CI->Articulo_model->revisor_direct($email_revisor_3);
					            foreach ($rev3->result() as $row){
					                $nombre_rev3=$row->nombre." ".$row->apellido_1." ".$row->apellido_2;
					            }

					            if($email_revisor_1=="No Asignado"){
					                $nombre_rev1="-";
					            }
					            if($email_revisor_2=="No Asignado"){
					                $nombre_rev2="-";
					            }
					            if($email_revisor_3=="No Asignado"){
					                $nombre_rev3="-";
					            }
					        ?>

					    </div>
					    <div class="col-md-4"></div>
					    </div>
					    <div class="col-md-12">

					        <div class="col-md-12" style="text-align: left;">
					            <form action="<?php echo base_url();?>index.php/articulo_editor/comentarios_de_revisores">

					                <label for="revisor1"><?php echo lang('acdrv_revisor 1');?>: <?php echo $nombre_rev1 ?></label>
					                <textarea style="background-color: white" class="form-control" rows="5" id="revisor1" readonly='readonly'><?php echo $comentario_revisor_1 ?></textarea>

					                <label for="revisor2"><?php echo lang('acdrv_revisor 2');?>: <?php echo $nombre_rev2 ?></label>
					                <textarea style="background-color: white" class="form-control" rows="5" id="revisor2" readonly='readonly'><?php echo $comentario_revisor_2?></textarea>

					                <label for="revisor3"><?php echo lang('acdrv_revisor 3');?>: <?php echo $nombre_rev3 ?></label>
					                <textarea style="background-color: white" class="form-control" rows="5" id="revisor3" readonly='readonly'><?php echo $comentario_revisor_3 ?></textarea>

					                <label for="revisor2"><?php echo lang('acdrv_editor');?>: </label>
					                <textarea style="background-color: white" class="form-control" rows="5" id="editor" readonly='readonly'><?php echo $comentarios_editor?></textarea>

					                <label for="labelarchivo"><?php echo lang('acdrv_articulo descarga');?>:</label>
					                <br>
					                <label for="archivo"><a href='<?php echo base_url()?>uploads/<?php echo $archivo ?>'><?php echo $archivo?></a></label>

					                <br><br>
													<div class="form-group">
														<div class="col-md-offset-1 col-md-10">
																	<input type="submit" class="button button-3d button-mini button-rounded button-blue btn-block" value="<?php echo lang('acdrv_regresar');?>" />
														</div>
													</div>
					            </form>
					        </div>
					    </div>
					    <?php } ?>
            </div>


        </div>

        <div class="sidebar nobottommargin clearfix">
            <div class="sidebar-widgets-wrap">
                <div class="widget clearfix">
                    <?php
                     $this->load->view('include/menu_editor');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
