<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min_spanish.js"></script>


<div class="content-wrap">
    <div class="container clearfix">
        <div class="postcontent nobottommargin col_last">
            <div id="posts" class="events small-thumbs">
							<div class="col-md-12">
					            <div class="col-md-12">
					                <br>
					                <h3 style = "color: grey;"><?php echo lang('aarv_informacion articulo'); ?></h3>
					
					            </div>
					        <div class="col-md-4"></div>
					    </div>

					    <div class="col-md-12">
					    <div class="col-md-12">
					    <table class="table" style="width:100%; text-align: right;">
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

					            $archivo           =   $row->archivo;
					            $comentarios       =   $row->comentarios;
					            $fecha_ultima_upd  =   $row->fecha_ultima_upd ;

					            $fecha_ingreso     =   $row->fecha_ingreso;
								$id_revisor_1		   =   $row->id_revisor_1;
								$id_revisor_2		   =   $row->id_revisor_2;
								$id_revisor_3		   =   $row->id_revisor_3;
								$comentario_revisor_1		   =   $row->comentario_revisor_1;
								$comentario_revisor_2		   =   $row->comentario_revisor_2;
								$comentario_revisor_3		   =   $row->comentario_revisor_3;
								$comentarios_editor		   =   $row->comentarios_editor;
								$fecha_timeout		   =   $row->fecha_timeout;

					            //Imprimir





					            echo "<tr>";
					            echo "<th style='text-align: right;' style='text-align: right;'>".lang("aarv_id-articulo").":</th>";
					            echo "<td >".$id_revista."</td>";
					            echo "</tr>";

					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_titulo articulo").":</th>";
					            echo "<td>".$titulo_revista."</td>";
					            echo "</tr>";

					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_version").":</th>";
					            echo "<td>".$version."</td>";
					            echo "</tr>";


					            $CI =& get_instance();
					            $CI->load->model('Articulo_model');

					            //Autor
					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_autor").":</th>";
					            $aut1 = $CI->Articulo_model->autor_direct($email_autor);

					                echo "<td>";
					                echo $aut1->nombre;
					                echo " ";
					                echo $aut1->apellido_1;
					                echo " ";
					                echo $aut1->apellido_2;
					                echo "</td>";

					            echo "</tr>";

					            //Campo de investigacion
					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_campo de investigacion").":</th>";
					            $aut1 = $CI->Articulo_model->campo_investigacion($id_campo);
					            foreach ($aut1->result() as $row){
					                echo "<td>";
					                echo $row->nombre_campo;
					                echo "</td>";
					            }
					            echo "</tr>";

					            //Estado
					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_estado").":</th>";
					            $est1 = $CI->Articulo_model->estado($id_estado);
					            foreach ($est1->result() as $row){
					                echo "<td>";
					                echo $row->nombre_estado;
					                echo "</td>";
					            }
					            echo "</tr>";

					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_palabras claves").":</th>";
					            echo "<td>".$palabras_claves."</td>";
					            echo "</tr>";

					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_abstract").":</th>";
					            echo "<td style='text-align: justify;'>".$abstract."</td>";
					            echo "</tr>";

					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_archivo:").":</th>";
					            echo "<td><a href='".base_url()."uploads/".$archivo."'>".$archivo."</a></td>";
					            echo "</tr>";

					            echo "<tr>";
					            if($comentarios==""){
					            	echo "<th style='text-align: right;'>".lang("aarv_comentarios").":</th>";
						            echo "<td>-</td>";
						            echo "</tr>";
					            }else{
					            	echo "<th style='text-align: right;'>".lang("aarv_comentarios").":</th>";
						            echo "<td style='text-align: justify;'>".$comentarios."</td>";
						            echo "</tr>";
						            
					            }

					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_fecha ultima actualizacion").":</th>";
					            echo "<td>".$fecha_ultima_upd."</td>";
					            echo "</tr>";

					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_fecha ingreso articulo").":</th>";
					            echo "<td>".$fecha_ingreso."</td>";
					            echo "</tr>";


					            //Revisor 1
					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_revisor 1").":</th>";
					            $rev1 = $CI->Articulo_model->revisor_direct($id_revisor_1);

					            if($id_revisor_1!=0){
					            	foreach ($rev1->result() as $row){
						                echo "<td>";
						                echo $row->nombre;
						                echo " ";
						                echo $row->apellido_1;
						                echo " ";
						                echo $row->apellido_2;
						                echo "</td>";
						            }
						            echo "</tr>";
					            }else{

						            echo "<td>-</td>";
									echo "</tr>";
					            }
					            

					            //Revisor 2
					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_revisor 2").":</th>";
					            $rev2 = $CI->Articulo_model->revisor_direct($id_revisor_2);


					            if($id_revisor_2!=0){
					            	foreach ($rev2->result() as $row){
						                echo "<td>";
						                echo $row->nombre;
						                echo " ";
						                echo $row->apellido_1;
						                echo " ";
						                echo $row->apellido_2;
						                echo "</td>";
						            }
						            echo "</tr>";
					            }else{

						            echo "<td>-</td>";
									echo "</tr>";
					            }

					            //Revisor 3
					            echo "<tr>";
					            echo "<th style='text-align: right;'>".lang("aarv_revisor 3").":</th>";
					            $rev3 = $CI->Articulo_model->revisor_direct($id_revisor_3);
					            if($id_revisor_3!=0){
					            	foreach ($rev3->result() as $row){
						                echo "<td>";
						                echo $row->nombre;
						                echo " ";
						                echo $row->apellido_1;
						                echo " ";
						                echo $row->apellido_2;
						                echo "</td>";
						            }
						            echo "</tr>";
					            }else{

						            echo "<td>-</td>";
									echo "</tr>";
					            }

					            echo "</tr>";


					            echo "<tr>";
					            if($comentario_revisor_1==""){
					            	echo "<th style='text-align: right;'>".lang("aarv_comentario revisor 1").":</th>";
						            echo "<td>-</td>";
						            echo "</tr>";
					            }else{
						            echo "<th style='text-align: right;'>".lang("aarv_comentario revisor 1").":</th>";
						            echo "<td style='text-align: justify;'>".$comentario_revisor_1."</td>";
						            echo "</tr>";
						          
					            }

					            echo "<tr>";
					            if($comentario_revisor_2==""){
					            	echo "<th style='text-align: right;'>".lang("aarv_comentario revisor 2").":</th>";
						            echo "<td>-</td>";
						            echo "</tr>";
					            }else{
						            echo "<th style='text-align: right;'>".lang("aarv_comentario revisor 2").":</th>";
						            echo "<td style='text-align: justify;'>".$comentario_revisor_2."</td>";
						            echo "</tr>";
						          
					            }

					            echo "<tr>";
					            if($comentario_revisor_3==""){
					            	echo "<th style='text-align: right;'>".lang("aarv_comentario revisor 3").":</th>";
						            echo "<td>-</td>";
						            echo "</tr>";
					            }else{
						            echo "<th style='text-align: right;'>".lang("aarv_comentario revisor 3").":</th>";
						            echo "<td style='text-align: justify;'>".$comentario_revisor_3."</td>";
						            echo "</tr>";
						          
					            }

					            echo "<tr>";
					            if($comentarios_editor==""){
					            	echo "<th style='text-align: right;'>".lang("aarv_comentarios editor").":</th>";
						            echo "<td>-</td>";
						            echo "</tr>";
					            }else{
						            echo "<th style='text-align: right;'>".lang("aarv_comentarios editor").":</th>";
						            echo "<td style='text-align: justify;'>".$comentarios_editor."</td>";
						            echo "</tr>";
						          
					            }
					            

					            echo "<tr>";
					            if($fecha_timeout==""){
					            	echo "<th style='text-align: right;'>".lang("aarv_fecha timeout").":</th>";
						            echo "<td>-</td>";
						            echo "</tr>";
					            }else{
						            echo "<th style='text-align: right;'>".lang("aarv_fecha Timeout").":</th>";
						            echo "<td>".$fecha_timeout."</td>";
						            echo "</tr>";
						          
					            }
					            

							?>
						<?php endforeach ?>
						<?php } ?>
					    </table>
					    </div>
					    <div class="col-md-4"></div>
					    </div>

							<div class="form-group">
								<div class="col-md-offset-3 col-md-7">
									<form action="<?php echo base_url();?>index.php/articulo_editor/asignar_revisores">
											<input type="submit" class="button button-3d button-mini button-rounded button-blue btn-block" value="<?php echo lang('aarv_regresar'); ?>" />
									</form>
								</div>
							</div>
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
