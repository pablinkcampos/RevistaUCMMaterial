

<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<script type="text/javascript">
   $(document).ready(function () {
   
       
       
   
            var table = $('#articulos').DataTable( {

                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],    
           language: {
           processing:     "Procesando ...",
           search:         "Buscar:",
           lengthMenu:    "Mostrar _MENU_ Elementos",
           info:           "Visualización del elemento _START_ de _END_ en _TOTAL_ elementos",
           infoEmpty:      "Mostrar 0 elemento 0 en 0 elementos",
           infoFiltered:   "(filtro de  _MAX_ en total)",
           infoPostFix:    "",
           loadingRecords: "Cargando ...",
           zeroRecords:    "No hay datos disponibles en la tabla",
           emptyTable:     "No hay datos disponibles en la tabla",
           paginate: {
               first:      "Primero",
               previous:   "Anterior",
               next:       "Siguiente",
               last:       "Último"
           },
           aria: {
               sortAscending:  ": activar para ordenar la columna en orden ascendente",
               sortDescending: ": active para ordenar la columna en orden descendente"
           }
           }
           } );
          
   
   
     
   });
</script>
<section class="content">
<div class="container-fluid" style="margin-top: 150px;">
   <!-- Basic Examples -->
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
         <div class="header">
            <h2>
               Estado Artículo
            </h2>
         </div>
         <div class="body">
            <div class="row clearfix">
               <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                  <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingOne_1">
                           <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                              <?php  echo lang('allanav_informacion articulo'); ?>
                              </a>
                           </h4>
                        </div>
                        <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                           <div class="panel-body">
						   <table class="table" style="width:100%; text-align: right;">
								<?php foreach ( $datos->result() as $row ): ?>
								<?php $id_revista=$row->ID; $titulo_revista = $row->titulo_revista; $email_autor = $row->email_autor; $tema = $row->tema; $estado = $row->estado; $id_estado = $row->id_estado; $palabras_claves = $row->palabras_claves; $abstract = $row->abstract; $archivo = $row->archivo; $comentarios = $row->com_autor; $fecha_ultima_upd = $row->fecha_ultima_upd; $fecha_asignacion = $row->fecha_asr; $fecha_cal = $row->fecha_cal; $fecha_calf = $row->fecha_calf; $fecha_ingreso = $row->fecha_ingreso; $n_rev1 = $row->rev_1; $n_rev2 = $row->rev_2; $n_rev3 = $row->rev_3; $id_rev1 = $row->id_rev1; $id_rev2 = $row->id_rev2; $id_rev3 = $row->id_rev3; $cal_rev1 = $row->cal_rev1; $cal_rev2 = $row->cal_rev2; $cal_rev3 = $row->cal_rev3; $com_rev1 = $row->com_rev1; $com_rev2 = $row->com_rev2; $com_rev3 = $row->com_rev3; $fecha_final = $row->fecha_timeout; echo "
								<tr>"; echo "
									<th style='text-align: right;'>" . lang( "allarvv_titulo articulo" ) . ":
									</th>"; echo "
									<td>" . $titulo_revista . "</td>"; echo "
								</tr>"; $CI =& get_instance(); $CI->load->model( 'Articulo_model' ); echo "
								<tr>"; echo "
									<th style='text-align: right;'>" . lang( "allarvv_autor" ) . ":</th>"; echo "
									<td>"; echo $email_autor; echo "
									</td>"; echo "</tr>"; echo "
								<tr>"; echo "
									<th style='text-align: right;'>" . lang( "allarvv_campo de investigacion" ) . ":
									</th>"; echo "
									<td>"; echo $tema; echo "
									</td>"; echo "
								</tr>"; echo "
								<tr>"; echo "
									<th style='text-align: right;'>" . lang( "allarvv_estado" ) . ":</th>"; echo "
									<td>"; echo $row->estado; echo "
									</td>"; echo "</tr>"; echo "
								<tr>"; echo "
									<th style='text-align: right;'>" . lang( "allarvv_abstract" ) . ":</th>"; echo "
									<td style='text-align: right;'>" . $abstract . "</td>"; echo "</tr>"; echo "
								<tr>"; echo "
									<th style='text-align: right;'>" . lang( "allarvv_archivo:" ) . "</th>"; echo "
									<td><a href='" . base_url() . "uploads/" . $archivo . "'>" . $archivo . "</a>
									</td>"; echo "</tr>";  echo "
								<tr>"; echo "
									<th style='text-align: right;'>" . lang( "allarvv_fecha ultima actualizacion" ) . ":</th>"; echo "
									<td>" . $fecha_ultima_upd . "
									</td>"; echo "
								</tr>"; echo "
								<tr>"; echo "
									<th style='text-align: right;'>" . lang( "allarvv_fecha ingreso articulo" ) . ":
									</th>"; echo "
									<td>" . $fecha_ingreso . "</td>"; echo "
								</tr>"; 
								echo "
								<tr>"; if ( $comentarios == "" ) { echo "
									<th style='text-align: right;'>" . lang( "allarvv_comentarios" ) . ":</th>"; echo "
									<td>-</td>"; echo "</tr>"; } else { echo "
								<th style='text-align: right;'>" . lang( "allarvv_comentarios" ) . ":</th>"; echo "
								<td>" . $comentarios . "</td>"; echo "</tr>"; }?>
								<?php endforeach; ?>
							</table>
                           </div>
                        </div>
					 </div>
					       <!-- panel de reasignacion de revisores -->
						   <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingTwo_1">
                           <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse"  href="#collapseTwo_1" aria-expanded="false"
                                 aria-controls="collapseTwo_1">
								 Estado Actual Artículo
                              </a>
                           </h4>
                        </div>
                        <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
                           <div class="panel-body">
						   <table id="articulos" class="table" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th align="left" ;>
											ID-Artículo
										</th>
										<th align="left" ;>
											Estado
										</th>
										<?php 
											if ( $id_estado==3 ) { 
											echo "<th style='text-align: left;'>Fecha Asignación</th>"; 
											echo "<th style='text-align: left;'>Revisores</th>"; 
											} elseif ( $id_estado==14 ) { 
												echo "<th style='text-align: left;'>Fecha Revisión</th>"; 
												echo "<th style='text-align: left;'>Revisores</th>"; 
												echo "<th style='text-align: left;'>Recomendaciones</th>"; 
											} elseif ( $id_estado==5 || $id_estado==4 || $id_estado==6 || $id_estado==9 ) { 
												echo "<th style='text-align: left;'>Fecha Calificación</th>"; 
												echo "<th style='text-align: left;'>ID-Revisores</th>"; 
												echo "<th style='text-align: left;'>Recomendaciones</th>"; 
												echo "<th style='text-align: left;'>Recomendacion Editor</th>"; 
												echo "<th style='text-align: left;'>Acciones</th>"; } ?>
									</tr>
								</thead>
								<tbody>
									<div id='form1'>
										<?php 
											if ( $id_estado==3 ) { 
												echo "<tr>"; 
												echo "<td>"; echo $id_revista; echo "</td>"; 
												echo "<td>"; echo $estado; echo "</td>"; 
												echo "<td>"; echo $fecha_asignacion; echo "</td>"; 
												echo "<td>"; 
												if ( $id_rev1 !=0 ) { 
													echo $id_rev1 . "<br>"; 
												} 
												if ( $id_rev2 !=0 ) { 
													echo $id_rev2 . "<br>"; 
												} 
												if ( $id_rev3 !=0 ) { 
													echo $id_rev3 . "<br>"; 
												} "</td>"; echo "<td>"; 
												if ( $id_rev1 !=0 ) { 
													echo $com_rev1 . "<br>"; 
												} 
												if ( $id_rev2 !=0 ) { 
													echo $com_rev2 . "<br>"; 
												} 
												if ( $id_rev3 !=0 ) { 
													echo $com_rev3 . "<br>"; 
												} 
												echo "</td>"; 
												echo "</tr>"; 
											} elseif ( $id_estado==14 ) { 
												echo "<tr>"; 
												echo "<td>"; echo $id_revista; echo "</td>"; 
												echo "<td>"; echo $estado; echo "</td>"; 
												echo "<td>"; echo $fecha_cal; echo "</td>"; 
												echo "<td>"; 
												if ( $id_rev1 !=0 ) { 
													echo $id_rev1 . "<br>"; 
												} 
												if ( $id_rev2 !=0 ) { 
													echo $id_rev2 . "<br>"; 
												} if ( $id_rev3 !=0 ) { 
													echo $id_rev3 . "<br>"; 
												} "</td>"; echo "<td>"; 
												if ( $id_rev1 !=0 ) { 
													echo $com_rev1 . "<br>"; 
												} 
												if ( $id_rev2 !=0 ) { 
													echo $com_rev2 . "<br>"; 
												} if ( $id_rev3 !=0 ) { 
													echo $com_rev3 . "<br>"; 
												} "</td>"; 
												echo "</tr>"; 
												} elseif ( $id_estado==5 || $id_estado==4 || $id_estado==6 || $id_estado == 9) { 
													echo "<tr>"; echo "<td>"; echo $id_revista; echo "</td>"; echo "<td>"; echo $estado; echo "</td>"; echo "<td>"; echo $fecha_calf; echo "</td>"; echo "<td>"; 
													if ( $id_rev1 !=0 ) { echo $id_rev1 . "<br>"; } if ( $id_rev2 !=0 ) { echo $id_rev2 . "<br>"; } if ( $id_rev3 !=0 ) { echo $id_rev3 . "<br>"; } "</td>"; echo "<td>"; 
													if ( $id_rev1 !=0 ) { echo $com_rev1 . "<br>"; } if ( $id_rev2 !=0 ) { echo $com_rev2 . "<br>"; } if ( $id_rev3 !=0 ) { echo $com_rev3 . "<br>"; } "</td>"; echo "<td>"; echo $comentarios; echo "</td>"; 
													if ( $id_estado==6 ) { 
														echo "<td>"; echo "<a data-toggle='modal' data-target='#modal_correcion'><center><i class='material-icons' style='font-size:25px;'>autorenew</i></center></span></center></span></a>"; echo "</td>"; 
													} elseif ( $id_estado==4 || date("d-m-y",strtotime($fecha_final)) < date( 'd-m-y' ) || $id_estado == 9) { 
														echo "<td>"; echo "<a data-toggle='modal' data-target='#modal_peticion'><center><i class='material-icons' style='font-size:25px;'>assignment_ind</i></center></span></center></span></a>"; echo "</td>"; 
													} echo "</tr>"; } ?>
										
									</div>
								</tbody>
							</table>
                           
                           </div>
                        </div>
					 </div>
                      <!-- panel de reasignacion de revisores -->
                     
					 </div>
					 
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<!-- #END# Basic Examples -->
<!-- Basic Table -->
<div class="form-group">
   <div class="pull-right" style="position: fixed;left:80%;top:68.3%;">
   	  <form action="<?php echo base_url();?>index.php/System">
         <button name="regresar" type="submit" class="btn btn-primary waves-effect">
                <span><i class="material-icons">reply</i>  <?php echo lang('allanav_regresar'); ?></span>
        </button>
     
      </form>
   </div>
</div>




<div class="modal fade" id="modal_correcion" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Corrección Articulo</h4>
                        </div>
                        <div class="modal-body">
						<form name="form_art" class="form-horizontal" action="<?php echo base_url();?>index.php/Articulo_autor/editar_articulo/<?php echo $id_revista; ?>" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
							<div class="form-group col-md-12">
								<div style="text-align: right;" class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
									<label  for="text">
										<?php echo lang( 'aa_titulo' ); ?> (*):</label>
								</div>	
								<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">								
								<div class="form-line">
									<input type="text" class="form-control" name="titulo_articulo" value="<?php echo $titulo_revista;?>" id="titulo_articulo" placeholder="<?php echo lang( 'aa_ingrese titulo' ); ?>" required="True">
								</div>
								</div>
							</div>
							<br>
							<div class="form-group col-md-12">
								<div class="form-group">
									<div style="text-align: right;" class="col-md-3">
										<label for="abstract">
											<?php echo lang( 'aa_abstract' ); ?> (*):</label>
									</div>
									<div class="col-md-9">
										<textarea class="ckeditor" name="abstract" id="abstract" rows="20" cols="80" value="" required="true">
											<?php echo $abstract; ?>
										</textarea>
									</div>
								</div>
							</div>
							<div class="form-group col-md-12">
								<div class="form-group">
									<div style="text-align: right;"  class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="text">
											<?php echo lang( 'aa_palabras claves' ); ?> (*):</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">								
										<div class="form-line">
										<input type="text" maxlength="80" value="<?php echo $palabras_claves;?>" class="form-control" name="palabras_claves" id="palabras_claves" placeholder="<?php echo lang( 'aa_ingrese palabras claves' );?>" required="required">
										</div>
									</div>
									
								</div>
							</div>
							<div class="form-group col-md-12">
								<div class="form-group">
									<div style="text-align: right;" class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="fecha_ingreso">Plazo de Reenvio (*):
										</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">								
										<div class="form-line">
											<input type="text" maxlength="80" value="<?php echo date("d-m-y",strtotime($fecha_final));?>" name="fecha_ingreso" id="fecha_ingreso" disabled="disabled">
										</div>
									</div>
									
								</div>
							</div>
							<div class="form-group col-md-12">
								<div class="form-group">
									<div style="text-align: right;" class="col-md-3">
										<label for="exampleInputFile">
											<?php echo lang( 'aa_subir archivo' ); ?> (*):</label>
									</div>
									<div class="col-md-9">
										<input type="file" name="userfile" accept=".doc, .docx" class="filestyle" id="exampleInputFile" required="required" data-buttonText="<i class='material-icons' style='font-size:20px;vertical-align:bottom'>file_upload</i> <?php echo lang( 'aa_seleccionar' );?>">
										<small id="fileHelp" class="form-text text-muted"><?php echo lang( 'aa_archivos de extension' );?> .doc o .docx. Max: 5MB</small>
									</div>
								</div>
							</div>
							<div class="form-group col-md-12">
								<div class="form-group">
									<div style="text-align: right;" class="col-md-3">
										<label for="comentarios">Detalle de Correcciones:
										</label>
									</div>
									<div class="col-md-9">
										<textarea class="ckeditor" name="comentarios" id="comentarios" rows="3">
											<?php if ( isset( $_POST[ 'comentarios'] ) ) echo $_POST[ 'comentarios']; ?>
										</textarea>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-7">
									<br>
									<br>
									<button type="submit" name="upload" id="upload" class="btn btn-success waves-effect">
										<?php echo lang( 'aa_ingresar articulo' ); ?>
									</button>
								</div>
							</div>
						</form>
                        </div>
                        <div class="modal-footer">
                          
                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
	
			<div class="modal fade" id="modal_peticion" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Petición al Editor</h4>
                        </div>
                        <div class="modal-body">
						<form name="form_art" class="form-horizontal" action="<?php echo base_url();?>index.php/Articulo_autor/peticion_articulo/<?php echo $id_revista; ?>" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
					
							<div class="form-group col-md-12">
								<div class="form-group">
									<div style="text-align: right;" class="col-md-3">
										<label for="peticion">Petición al Editor:
										</label>
									</div>
									<div class="col-md-9">
										<textarea  class="ckeditor" name="peticion" id="peticion" rows="3">

										</textarea>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-8">
									<br>
									<br>
									<button type="submit" name="upload" id="upload" class="btn btn-success waves-effect">
										Enviar Petición
									</button>
								</div>
							</div>
						</form>
                        </div>
                        <div class="modal-footer">
                          
                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>


