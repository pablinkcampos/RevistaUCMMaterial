<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {

        $('#articulos').DataTable( {
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

<script>
    $(function () {

        setTimeout(function () {
            $(".successMessage").animate({height: 'toggle', opacity: 'toggle'}, 1000);
        }, 3000);

    });

</script>

<div class="container-fluid  " style="margin-top: 200px;">
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
            <div class="card">
                <div class="header">
                    <h3 style = "color: black;"><?php echo lang('vb_buscar en todos los articulos'); ?></h3>
                   
                </div>
                <div class="body">
                   
                <table id="articulos" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?php echo lang('vb_titulo'); ?></th>
                            <th><?php echo lang('vb_autor'); ?></th>
                            <th><?php echo lang('vb_archivo'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($datos) { ?>
                            <?php foreach ($datos->result() as $row): ?>
                                <?php
                                $ID = $row->ID_articulo;
                                $id_revista = $row->ID;
                                $titulo_revista = $row->titulo;
                                $archivo = $row->file_papper;

                                $info_paper = $this->Articulo_Model->obtener_info_articulo2($ID);

                                if ($info_paper) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $info_paper->titulo_revista;
                                    echo "</td>";

                                    $CI = & get_instance();
                                    $CI->load->model('Articulo_model');

                                    echo "<td>";
                                    echo $info_paper->autor_1;
                                    echo "</td>";

                                    echo "<td>";
                                    echo "<a Download href='" . base_url() . "uploads/" . $archivo . "'><center><i class='material-icons' style='font-size:40px;'>file_download</i></center>";
                                    echo "</td>";

                                    echo "</tr>";
                                }
                                ?>
                            <?php endforeach ?>

                            <?php }
                        ?>
                    </tbody>
                </table>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

