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
                            
                            <h2>
                                <?php echo lang('allana_articulo_noasignado'); ?>
                            </h2>
                        
                        </div>
                        <div class="body table-responsive">
                        
                        <table  class="table table-bordered table-striped table-hover dataTable js-exportable" id="articulos" class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                   ID
                                </th>
                                <th>
                                    <?php echo lang('allaa_fecha ingreso articulo'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aar_tema'); ?>
                                </th>
                                <th>
                                    <?php echo lang('allaa_titulo articulo'); ?>
                                </th>
                                <th>
                                    <?php echo lang('allaa_estado'); ?>
                                </th>
                                <th>
                                    <?php echo lang('allaa_autor'); ?>
                                </th>
                              
                                <th>
                                    <?php echo lang('aaa_ver'); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($datos){ ?>
                            <?php foreach ($datos->result() as $row): ?>
                            <?php

                                $id_revista = $row->ID;
                                $titulo_revista = $row->titulo_revista;
                                $email_autor = $row->email_autor;
                                $estado = $row->estado;
                                $tema = $row->tema;
                                $version = $row->versiona;
                                $fecha_ingreso = date("d-m-y",strtotime($row->fecha_ingreso));
                                
                                $fecha_verifica = $row->fecha_verifica;
                                $fecha_vencimiento = $row->fecha_vencimiento;
                                $date1 = new DateTime($fecha_verifica);
                                $date2 = new DateTime($fecha_vencimiento);
                               
                                $now = new DateTIme('now');
                                $diff = $date1->diff($date2);
                                $diff2 = $date2->diff($now);
                                $dife = intval($diff2->days);
                                $limite = intval($diff->days);
                                
                                  
                                    //calcula el tiempo que deberia ser asignado y asigna un color
                                 
                                    echo "<tr>";
                                    if($dife > $limite/2 ){
                                       
                                        echo "<td style='border-left: 6px solid green;'>";
                                    }
                                    else{
                                        if($dife < $limite/2 && $dife > 0 ){
                                            
                                            echo "<td style='border-left: 6px solid orange;'>";
                                        }
                                        else{
                                           
                                            echo "<td style='border-left: 6px solid red;'>";
                                        }
                                    } 
                                    echo $id_revista; echo "</td>";
                                    echo "<td>"; echo $fecha_ingreso; echo "</td>";
                                    echo "<td>"; echo $tema; echo "</td>";
                  					echo "<td>"; echo $titulo_revista; echo "</td>";

                                              echo "<td>";
                                              echo $estado;
                                              echo "</td>";
                                         

                                              echo "<td>";
                                              echo $email_autor;
                                             
                                              echo "</td>";
                                              
                  						
                  						    echo "<td>"; echo "<a href='".base_url()."index.php/articulo_editor/all_articulos_noasignados_ver/".$id_revista."'><center><i class='material-icons' style='font-size:25px;'>zoom_in</i></center></center></a>"; echo "</td>";


                  					echo "</tr>";
                  				?>
                                <?php endforeach ?>
                                <?php
                              } ?>
                        </tbody>
                         <!-- filtros -->
                        <tfoot>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    <?php echo lang('allaa_fecha ingreso articulo'); ?>
                                </th>
                                <th>
                                    <?php echo lang('aar_tema'); ?>
                                </th>
                                
                                <th>
                                    <?php echo lang('allaa_titulo articulo'); ?>
                                </th>
                                <th>
                                    <?php echo lang('allaa_estado'); ?>
                                </th>
                                <th>
                                    <?php echo lang('allaa_autor'); ?>
                                </th>
                               
                                <th style="display:none;">
                                    
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



