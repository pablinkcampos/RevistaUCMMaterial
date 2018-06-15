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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            
                  
                            <h3 style = "color: black;"><?php echo lang('aar_asignar ingresar revisores al sistema'); ?></h3>
                            
                        
                        </div>
                        <div class="body table-responsive">
                        
                        
                        <table id="articulos" class="table table-bordered table-striped table-hover dataTable js-exportable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th> Nombre</th>
                                  <th> Correo</th>
                                  <th> Título</th>
                                  <th> Organización</th>
                                  <th>Teléfono</th>
                                  <th>Biografía</th>
                                  <th>Aceptar</th>
                                  <th>Rechazar</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          $datos = $this->Articulo_Model->obtener_postulantes_editor();
                          $i = 0;
                          if($datos){ ?>
                          	<?php foreach ($datos->result() as $row): ?>
                  				<?php
                            $id = $row->id_revisor;
                  					$nombre	=	$row->nombre . ' ' . $row->apellido_1 .' '. $row->apellido_1;
                            $correo = $row->correo;
                            $titulo = $row->titulo_academico;
                            $organizacion = $row->organizacion;
                            $telefono = $row->telefono;
                            $biografia = $row->biografia;
                            $i = $i + 1;

                  					echo "<tr>";
                  						echo "<td>"; echo $nombre; echo "</td>";
                              echo "<td>"; echo $correo; echo "</td>";
                              echo "<td>"; echo $titulo; echo "</td>";
                              echo "<td>"; echo $organizacion; echo "</td>";
                              echo "<td>"; echo $telefono; echo "</td>";
                              echo "<td>"; echo $biografia; echo "</td>";


                              $url = base_url()."index.php/articulo_editor/aceptar_revisor/".md5($correo .'ox');

                              echo "<td>"; echo "<a data-toggle='modal' data-target='#modal_aprobar".$i."'><center><i class='material-icons' style='font-size:25px;'>assignment_ind</i></center></span></center></span></a>";  echo "</td>";

                              echo '<div class="modal fade" id="modal_aprobar'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
                              echo '  <div class="modal-dialog" role="document">';
                              echo '    <div class="modal-content">';
                              echo '      <div class="modal-header">';
                              echo '        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                              echo '        <h4 class="modal-title" id="myModalLabel">Confirmación de aceptación</h4>';
                              echo '      </div>';
                              echo '      <div class="modal-body">';
                              echo ' ¿Está seguro que desea aceptar el ingreso de este nuevo revisor?';
                              echo '      </div>';
                              echo '      <div class="modal-footer">';
                              echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                              echo '        <a href="' . $url . '" "#" class="btn btn-success" role="button">Aceptar</a>';
                              echo '      </div>';
                              echo '    </div>';
                              echo '  </div>';
                              echo '</div>';


                              $url_rechazar = base_url()."index.php/articulo_editor/rechazar_revisor/".md5($correo .'ox');
                              echo "<td>"; echo "<a data-toggle='modal' data-target='#modal_rechazar".$i."'><center><i class='material-icons' style='font-size:25px;color:red'>delete_forever</i></center></span></center></span></a>";  echo "</td>";

                              echo '<div class="modal fade" id="modal_rechazar'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
                              echo '  <div class="modal-dialog" role="document">';
                              echo '    <div class="modal-content">';
                              echo '      <div class="modal-header">';
                              echo '        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                              echo '        <h4 class="modal-title" id="myModalLabel">Confirmación de rechazo</h4>';
                              echo '      </div>';
                              echo '      <div class="modal-body">';
                              echo ' ¿Está seguro que desea rechazar el ingreso de este nuevo revisor?';
                              echo '      </div>';
                              echo '      <div class="modal-footer">';
                              echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                              echo '        <a href="' . $url_rechazar . '" "#" class="btn btn-danger" role="button">Rechazar</a>';
                              echo '      </div>';
                              echo '    </div>';
                              echo '  </div>';
                              echo '</div>';

                  					echo "</tr>";
                  				?>
                  			<?php endforeach ?>

                              <?php
                              } ?>
                          </tbody>
                      </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
            <!-- Striped Rows -->
  
    </section>
              <!-- menu -->
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



