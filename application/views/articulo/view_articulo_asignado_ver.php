<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>

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
            "order": [[ 3, "asc" ]],
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
               Artículo Asignado
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
                              <table class="table" style="width:90%; text-align: right;">
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
                                    
                                    echo "
                                    
                                    <tr>";
                                    echo "
                                    
                                    <th style='text-align: right;'>".lang("allanav_titulo articulo").":</th>";
                                    echo "
                                    
                                    <td>".$titulo_revista."</td>";
                                    echo "
                                    
                                    </tr>";
                                    
                                    
                                    
                                    $CI =& get_instance();
                                    $CI->load->model('Articulo_model');
                                    
                                    //Autor
                                    echo "
                                    
                                    <tr>";
                                    echo "
                                    
                                    <th style='text-align: right;'>".lang("allanav_autor").":</th>";
                                    
                                    
                                       echo "
                                    
                                    <td>";
                                       echo $email_autor;
                                    
                                       echo "</td>";
                                    
                                    echo "
                                    
                                    </tr>";
                                    
                                    //Campo de investigacion
                                    echo "
                                    
                                    <tr>";
                                    echo "
                                    
                                    <th style='text-align: right;'>".lang("allanav_campo de investigacion").":</th>";
                                    
                                       echo "
                                    
                                    <td>";
                                       echo $tema;
                                       echo "</td>";
                                    
                                    echo "
                                    
                                    </tr>";
                                    
                                    //Estado
                                    echo "
                                    
                                    <tr>";
                                    echo "
                                    
                                    <th style='text-align: right;'>".lang("allanav_estado").":</th>";
                                    
                                    
                                       echo "
                                    
                                    <td>";
                                       echo $row->estado;
                                       echo "</td>";
                                    
                                    echo "
                                    
                                    </tr>";
                                    
                                    echo "
                                    
                                    <tr>";
                                    echo "
                                    
                                    <th style='text-align: right;'>".lang("allanav_palabras claves").":</th>";
                                    echo "
                                    
                                    <td>".$palabras_claves."</td>";
                                    echo "
                                    
                                    </tr>";
                                    
                                    echo "
                                    
                                    <tr>";
                                    echo "
                                    
                                    <th style='text-align: right;'>".lang("allanav_abstract").":</th>";
                                    echo "
                                    
                                    <td style='text-align: right;'>".$abstract."</td>";
                                    echo "
                                    
                                    </tr>";
                                    
                                    echo "
                                    
                                    <tr>";
                                    echo "
                                    
                                    <th style='text-align: right;'>".lang("allanav_archivo:")."</th>";
                                    echo "
                                    
                                    <td>
                                    <a href='".base_url()."uploads/".$archivo."'>".$archivo."</a>
                                    </td>";
                                    echo "
                                    
                                    </tr>";
                                    
                                    echo "
                                    
                                    <tr>";
                                    
                                    
                                    echo "
                                    
                                    <tr>";
                                    echo "
                                    
                                    <th style='text-align: right;'>".lang("allanav_fecha ultima actualizacion").":</th>";
                                    echo "
                                    
                                    <td>".$fecha_ultima_upd."</td>";
                                    echo "
                                    
                                    </tr>";
                                    
                                    echo "
                                    
                                    <tr>";
                                    echo "
                                    
                                    <th style='text-align: right;'>".lang("allanav_fecha ingreso articulo").":</th>";
                                    echo "
                                    
                                    <td>".$fecha_ingreso."</td>";
                                    echo "
                                    
                                    </tr>
                                    <br>";
                                    if($comentarios==""){
                                        echo "
                                        
                                        <th style='text-align: right;'>".lang("allanav_comentarios").":</th>";
                                        echo "
                                        
                                        <td>-</td>";
                                        echo "
                                        
                                        </tr>";
                                        }else{
                                        echo "
                                        
                                        <th style='text-align: right;'>".lang("allanav_comentarios").":</th>";
                                        echo "
                                        
                                        <td>".$comentarios."</td>";
                                        echo "
                                        
                                        </tr>";
                                        
                                        }
                                    
                                    
                                    
                                    ?>
                                 <?php endforeach ?>
                              </table>
                           </div>
                        </div>
                     </div>
                      <!-- panel de reasignacion de revisores -->
                     <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingTwo_1">
                           <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false"
                                 aria-controls="collapseTwo_1">
                                Reasignar Revisores
                              </a>
                           </h4>
                        </div>
                        <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
                           <div class="panel-body">
                              <div class="col-md-12">
                                 <div  id="alerta" style="display: none;">
                                     <!-- alertas si es que se asigna mas de 3 revisores -->
                                    <div  class="alert alert-danger" role="alert">
                                       <strong>Alerta!</strong> Solo puede asignar un máximo de 3 revisores 
                                       <a href="#" class="alert-link"></a>.
                                    </div>
                                 </div>
                                 <div  id="alerta2" style="display: none;">
                                    <div  class="alert alert-danger" role="alert">
                                       <strong>Alerta!</strong> Debe asignar al menos un revisor 
                                       <a href="#" class="alert-link"></a>.
                                    </div>
                                 </div>
                                   <!-- formulario en el cual se activa el metodo post para reasignar revisores -->
                                 <form class="form-horizontal" action="
                                    <?php echo base_url(); ?>index.php/articulo_editor/reasignar_revisores_editor/<?php echo $id_revista; ?>" method="POST">
                                    <table id="articulos" class="display" width="100%" cellspacing="0">
                                       <thead>
                                          <tr>
                                             <th align="center";>
                                                &nbsp;&nbsp;
                                             </th>
                                             <th align="left";>
                                                &nbsp;
                                                <?php echo lang('allanav_nombre'); ?>
                                                &nbsp;
                                             </th>
                                             <th align="left";>
                                                &nbsp;
                                                <?php echo lang('allanav_academico'); ?>
                                                &nbsp;
                                             </th>
                                             <th align="left";>
                                                &nbsp;
                                                <?php echo lang('allanav_cantidad'); ?>
                                                &nbsp;
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                            <!-- se obtienen los datos de los revisores --> 
                                          <div id='form1'>
                                             <?php if($revisores){ 
                                                ?>
                                             <?php foreach ($revisores->result() as $row): ?>
                                             <?php
                                                $id_revisor = $row->ID;
                                                $nombre_r = $row->nombre;
                                                $academico = $row->titulo_academico;
                                                $tema_r = $row->tema;
                                                $cantidad_a = $row->cantidad;
                                                                        
                                                echo "
                                                <tr>";
                                                 //se obtienen los datos de los revisores 
                                                 //si el revisor ya califico el checkbox se bloquea
                                                if($id_revisor == $id_rev1 && $cal_rev1 !=3 || $id_revisor == $id_rev2 && $cal_rev2 !=3 || $id_revisor == $id_rev3 && $cal_rev3 != 3){
                                                   echo "<td>"; echo '<input type="checkbox" name="revisor[]" id="'.$id_revisor.'"  value="'.$id_revisor.'" class="filled-in chk-col-blue" checked disabled> <label for="'.$id_revisor.'">'.$id_revisor.'</label></td>';
                                                }
                                                else{
                                                //si el revisor fue asignado aparece por defecto como seleccionado
                                                if($id_revisor == $id_rev1 || $id_revisor == $id_rev2 || $id_revisor == $id_rev3){
                                                       echo "<td>"; echo '<input type="checkbox" name="revisor[]" id="'.$id_revisor.'"  value="'.$id_revisor.'" class="filled-in chk-col-blue" checked ><label for="'.$id_revisor.'">'.$id_revisor.'</label></td>';
                                                }
                                                //sino ha sido asignado aparece vacios
                                                else{
                                                       echo "<td>"; echo '<input type="checkbox" name="revisor[]" id="'.$id_revisor.'"  value="'.$id_revisor.'" class="filled-in chk-col-blue" ><label for="'.$id_revisor.'">'.$id_revisor.'</label></td>';
                                                }
                                                }
                                                //nombre
                                                echo "
                                                <td align='left'>"; echo $nombre_r; echo "</td>";
                                                //grado academico
                                                echo "
                                                <td align='left'>"; echo $academico; echo "</td>";
                                                //cantidad de articulos asignados
                                                echo "
                                                <td align='center'>";echo $cantidad_a;echo "</td>";
                                                echo "
                                                </tr>";
                                                
                                                
                                                ?>
                                             <?php endforeach ?>
                                             <?php
                                                } ?>
                                          </div>
                                       </tbody>
                                       
                                      
                                     
                                    </table>
                                    <div class="row" style="position:fixed;left:91%;top:68.3%;"> 
                                        <button name="asignar" type="submit" class="btn btn-success waves-effect">
                                            <span><i class="material-icons">assignment_ind</i>  <?php echo lang('allanav_asignar'); ?></span>
                                        </button>
                                    </div>
                                    <br>
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
<!-- Basic Table -->
<div class="form-group">
   <div class="pull-right" style="position: fixed;left:80%;top:68.3%;">
      <form action="
         <?php echo base_url();?>index.php/articulo_editor/all_articulos_asignados">
         <button name="regresar" type="submit" class="btn btn-primary waves-effect">
                <span><i class="material-icons">reply</i>  <?php echo lang('allanav_regresar'); ?></span>
        </button>
     
      </form>
   </div>
</div>

		<div class="widget clearfix">
						<?php
                     $this->load->view('include/menu_editor');
                    ?>
					</div>
		