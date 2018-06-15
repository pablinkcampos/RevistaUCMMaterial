<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script language="javascript">
   $(document).ready(function(){
   
   
   
   // Evento que se ejecuta al pulsar en un checkbox
   $("input[type=checkbox]").change(function(){
   
   	// Cogemos el elemento actual
   	var elemento=this;
   	var contador=0;
   
   	// Recorremos todos los checkbox para contar los que estan seleccionados
   	$("input[type=checkbox]").each(function(){
   		if($(this).is(":checked"))
   			contador++;
   	});
   
   	var cantidadMaxima=3
   
   	// Comprovamos si supera la cantidad máxima indicada
   	if(contador>cantidadMaxima)
   	{
   		$("#alerta").show(3000);
   		// Desmarcamos el ultimo elemento
   		$(elemento).prop('checked', false);
   		contador--;
   		$("#alerta").hide(5000);
   	}
   	else{
   		$("#alerta").hide(1000);
   	}
   
   
   	
   });
   });
   	
</script>
<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<script type="text/javascript">
   $(document).ready(function () {
   
       
       
   
            var table = $('#articulos').DataTable( {
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
               Evaluar Artículo Asignado
            </h2>
         </div>
         <div class="body">
            <div class="row clearfix">
               <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                  <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingOne_1">
                           <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                              <?php  echo lang('allanav_informacion articulo'); ?>
                              </a>
                           </h4>
                        </div>
                        <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                           <div class="panel-body">
                           <table class="table" style="width:100%; text-align: right;">
                       
                          
                       <?php if($datos){ ?>
                         <?php foreach ($datos->result() as $row): ?>
                        <?php
                           $id_revista        =   $row->ID;
                           $titulo_revista    =   $row->titulo_revista;
                                    $email_autor          =   $row->email_autor;
                                    $tema          =   $row->tema;
                                    $estado         =   $row->estado;
                           
                                    $palabras_claves   =   $row->palabras_claves;
                                    $abstract          =   $row->abstract;
                           
                                    $archivo           =   $row->archivo;
                                    $comentarios       =   $row->com_autor;
                                    $fecha_ultima_upd  =   $row->fecha_ultima_upd ;
                           
                                    $fecha_ingreso     =   $row->fecha_ingreso;
                                    $id_rev1 = $row->id_rev1;
                                    $id_rev2 = $row->id_rev2;
                                    $id_rev3 = $row->id_rev3;
                                    $cal_rev1 = $row->cal_rev1; 
                                    $cal_rev2 = $row->cal_rev2; 
                                    $cal_rev3 = $row->cal_rev3;
                             
                                    echo "<tr>";
                                    echo "<th style='text-align: right;'>".lang("allanav_titulo articulo").":</th>";
                                    echo "<td>".$titulo_revista."</td>";
                                    echo "</tr>";
                           
                           
                           
                                    $CI =& get_instance();
                                    $CI->load->model('Articulo_model');
                           
                                    //Autor
                                    echo "<tr>";
                                    echo "<th style='text-align: right;'>".lang("allanav_autor").":</th>";
                                  
                           
                                        echo "<td>";
                                        echo $email_autor;
                                    
                                        echo "</td>";
                           
                                    echo "</tr>";
                           
                                    //Campo de investigacion
                                    echo "<tr>";
                                    echo "<th style='text-align: right;'>".lang("allanav_campo de investigacion").":</th>";
                              
                                        echo "<td>";
                                        echo $tema;
                                        echo "</td>";
                                    
                                    echo "</tr>";
                           
                                    //Estado
                                    echo "<tr>";
                                    echo "<th style='text-align: right;'>".lang("allanav_estado").":</th>";
                           
                               
                                        echo "<td>";
                                        echo $row->estado;
                                        echo "</td>";
                                   
                                    echo "</tr>";
                           
                                    echo "<tr>";
                                    echo "<th style='text-align: right;'>".lang("allanav_palabras claves").":</th>";
                                    echo "<td>".$palabras_claves."</td>";
                                    echo "</tr>";
                           
                                    echo "<tr>";
                                    echo "<th style='text-align: right;'>".lang("allanav_abstract").":</th>";
                                    echo "<td style='text-align: justify;'>".$abstract."</td>";
                                    echo "</tr>";
                           
                                    echo "<tr>";
                                    echo "<th style='text-align: right;'>".lang("allanav_archivo:")."</th>";
                                    echo "<td><a href='".base_url()."uploads/".$archivo."'>".$archivo."</a></td>";
                                    echo "</tr>";
                           
                                    echo "<tr>";
                                    if($comentarios==""){
                                        echo "<th style='text-align: right;'>".lang("allanav_comentarios").":</th>";
                                     echo "<td>-</td>";
                                     echo "</tr>";
                                    }else{
                                        echo "<th style='text-align: right;'>".lang("allanav_comentarios").":</th>";
                                     echo "<td>".$comentarios."</td>";
                                     echo "</tr>";
                           
                                    }
                           
                                    echo "<tr>";
                                    echo "<th style='text-align: right;'>".lang("allanav_fecha ultima actualizacion").":</th>";
                                    echo "<td>".$fecha_ultima_upd."</td>";
                                    echo "</tr>";
                           
                                    echo "<tr>";
                                    echo "<th style='text-align: right;'>".lang("allanav_fecha ingreso articulo").":</th>";
                                    echo "<td>".$fecha_ingreso."</td>";
                                    echo "</tr>";
                           
                           
                           
                           ?>
                            <div class="col-md-12">
                       
                         <div class="col-md-4"></div>
                     </div>

                     
                         <div class="col-md-4"></div>
                     </div>
                 </div>
                        <?php endforeach ?>
                             <?php
                           } ?>
                                       
                      
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
                                Evaluar Articulo
                              </a>
                           </h4>
                        </div>
                        <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
                           <div class="panel-body">
                              <div class="col-md-12">
                             
                                   <!-- formulario en el cual se activa el metodo post para reasignar revisores -->
                                   <form method="POST" action="<?php echo base_url(); ?>index.php/articulo_revisor/articulos_asignados_comentar/<?php echo $id_revista; ?>">
                                    
                                    <div class="form-group">
                                        <label for="comment"><?php echo lang('aaac_comentario'); ?></label>
                                        <textarea class="ckeditor" rows="40" id="comentario" name="comentario" > <?php echo $comentario; ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                    <div class="form-group">
                                    <div style="text-align: left; color:red;" class="col-md-12">
                                        <h3 style="text-align: left; color:red; bold" >Advertencia: Al Calificar este artículo el sistema asumira que esta revisado.</h3>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                       
                                        <div style="text-align: right;" class="col-md-3">
                                        <label for="calificacion"><?php echo lang('aaac_calificacion'); ?> (*):</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="calificacion" id="calificacion" >
                                                <option value="3">Selecciona Calificación</option>
                                                <?php
                              
                                                foreach ($calificaciones->result() as $row) {
                                                    if ($row->id_calificacion == $calificacion) {
                                                    $string = ' selected="selected" ';
                                                    } else {
                                                        $string = "";
                                                    }
                                                    echo '<option value="' . $row->id_calificacion . '" ' . $string . '>' . $row->calificacion . '</option>';
                                                }
                                                ?>
                                
                                            </select>
                                        </div>
                                    </div>
           
                                </div>


                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-6">
                                        <button name="asignar" type="submit" class="btn btn-success waves-effect">
                                            <span><i class="material-icons">assignment_ind</i>  Evaluar</span>
                                        </button>
                                            
                                        </div>
                                    </div>

                                </form>
      
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<!-- #END# Basic Examples -->
<!-- boton regresar -->
<div class="form-group">
   <div class="pull-right" style="position: fixed;left:80%;top:68.3%;">
      <form action="<?php echo base_url(); ?>index.php/articulo_revisor/articulos_asignados">
         <button name="regresar" type="submit" class="btn btn-primary waves-effect">
                <span><i class="material-icons">reply</i>  <?php echo lang('allanav_regresar'); ?></span>
        </button>
     
      </form>
   </div>
</div>


                        <div class="widget clearfix">
                            <?php
                     $this->load->view('include/menu_revisor');
                    ?>
                        </div>
 