<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#articulos tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" style="width: 100%; text-align: left;" placeholder="Filtrar" />' );
        } );
        
        

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
           
 
    // Apply the search
        table.columns().every( function () {
            var that = this;
 
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

      
    });
</script>


  <section class="content">
        <div class="container-fluid" style="margin-top: 150px;">
          
            <!-- Basic Table -->
            <div class="row-fluid">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            
                            <h2>
                                Artículos Rechazados
                            </h2>
                        
                        </div>
                        <div class="body table-responsive">
                        <table id="articulos" class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                   ID
                                </th>
                                <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                    <?php echo lang('aaa_fecha ingreso'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aar_tema'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aaa_titulo'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aaa_estado'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aaa_autor'); ?>
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($datos){ 
                                $i = 0 ?>
                            <?php foreach ($datos->result() as $row): ?>
                            <?php

                                $id_revista = $row->ID;
                                $titulo_revista = $row->titulo_revista;
                                $email_autor = $row->email_autor;
                                $estado = $row->estado;
                                $tema = $row->tema;
                                $fecha = $row->fecha_timeout;
                                $e_post = $row->e_post;
                                $peticion = $row->peticion;
                                $fecha_reenvio = NULL;
                                if($fecha != NULL){
                                    $fecha_reenvio = date("d-m-y",strtotime($fecha));
                                }
                                
                                
                                $i = $i + 1;
                                
                              $url = base_url()."index.php/articulo_editor/aceptar_peticion_articulo/".$id_revista;

                              

                              echo '<div class="modal fade" id="modal_aprobar'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
                              echo '  <div class="modal-dialog" role="document">';
                              echo '    <div class="modal-content">';
                              echo '      <div class="modal-header">';
                              echo '        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                              echo '        <h4 class="modal-title" id="myModalLabel">Confirmación de extensión Plazo</h4>';
                              echo '      </div>';
                              echo '      <div class="modal-body">';
                              echo ' <h4>'.$peticion.'</h4>';
                              echo ' ¿Está seguro que desea aceptar el plazo extendido?';
                              echo '      </div>';
                              echo '      <div class="modal-footer">';
                              echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                              echo '        <a href="' . $url . '" "#" class="btn btn-success" role="button">Aceptar</a>';
                              echo '      </div>';
                              echo '    </div>';
                              echo '  </div>';
                              echo '</div>';


                                  

                                    echo "<tr>";   
                                    if($e_post == 1 ){
                                       
                                        echo "<td style='border-left: 6px solid green;'>";
                                    }
                                    else{
                                        echo "<td>"; 
                                    }
                                                                 
                            
                                        echo $id_revista; echo "</td>";
                                        echo "<td>";echo $fecha_reenvio; echo "</td>";
                                        echo "<td>"; echo $tema; echo "</td>";
                  					    echo "<td>"; echo $titulo_revista; echo "</td>";

                                              echo "<td>";
                                              echo $estado;
                                              echo "</td>";
                                         

                                              echo "<td>";
                                              echo $email_autor;
                                             
                                              echo "</td>";
                                              
                  						if($e_post == 1){
                                            echo "<td>"; echo "<a data-toggle='modal' data-target='#modal_aprobar".$i."'><center><i class='material-icons' style='font-size:25px;'>assignment_ind</i></center></span></center></span></a>";  echo "</td>";
                                        }
                                              
                                             


                  					echo "</tr>";
                  				?>
                                <?php endforeach ?>
                                <?php
                              } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                   ID
                                </th>
                                <th>
                                    <?php echo lang('aaa_fecha ingreso'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aar_tema'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aaa_titulo'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aaa_estado'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aaa_autor'); ?>
                                </th>
                                <th style="display:none">
                                   acciones
                                </th>
                               
                            </tr>
                        </tfoot>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
            <!-- Striped Rows -->
  
    </section>

   <div class="container-fluid  " style="margin-top: 200px;">
	<div class="row">


            <div class="col-md-3">
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
    </div>
