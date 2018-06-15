<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min_spanish.js"></script>


<script type="text/javascript">
    $(document).ready(function () {

        $('#articulos').DataTable({
            "language": {

                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/<?php echo ucwords($this->session->userdata('lang')['route']); ?>.json"
            },
            "order": [[6, "desc"]]

        });
    });
</script>
<!--
<script>
$(function() {

    setTimeout(function() {
        $(".successMessage").animate({ height: 'toggle', opacity: 'toggle' }, 1000);
    }, 3000);

});
-->
</script>

<div class="content-wrap">
    <div class="container clearfix">

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
        <div class="col-md-9">

            <div class="col-md-12">
                <div class="col-md-12">
                    <br>
                    <h3 style = "color: black;"><?php echo lang('aar_asignar articulos a revisores'); ?></h3>
                    <hr>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="col-md-12">
                <div class="col-md-12">


                    <table id="articulos" class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> <?php echo lang('aar_titulo'); ?></th>
                                <th><?php echo lang('aar_autor'); ?></th>
                                <th><?php echo lang('aar_estado'); ?></th>
                                <th><?php echo lang('aar_revisor N1'); ?></th>
                                <th><?php echo lang('aar_revisor N2'); ?></th>
                                <th><?php echo lang('aar_revisor N3'); ?></th>
                                <th><?php echo lang('aar_fecha ingreso'); ?></th>
                                <th><?php echo lang('aar_ver'); ?></th>
                                <th><?php echo lang('aar_asignar'); ?></th>
                                <th><?php echo lang('aar_eliminar'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($datos) { ?>
                                <?php foreach ($datos->result() as $row): ?>
                                    <?php
                                    $id_revista = $row->ID;
                                    $titulo_revista = $row->titulo_revista;
                                    $email_autor = $row->email_autor;
                                    $id_estado = $row->id_estado;
                                    $email_revisor_1 = $row->email_revisor_1;
                                    $email_revisor_2 = $row->email_revisor_2;
                                    $email_revisor_3 = $row->email_revisor_3;
                                    $fecha_ingreso = $row->fecha_ingreso;

                                    echo "<tr>";
                                    echo "<td>";
                                    echo $titulo_revista;
                                    echo "</td>";

                                    $CI = & get_instance();
                                    $CI->load->model('Articulo_model');


                                    $aut1 = $CI->Articulo_model->autor_direct($email_autor);

                                    echo "<td>";
                                    echo $aut1->nombre;
                                    echo " ";
                                    echo $aut1->apellido_1;
                                    echo " ";
                                    echo $aut1->apellido_2;
                                    echo "</td>";


                                    $est1 = $CI->Articulo_model->estado($id_estado);
                                    foreach ($est1->result() as $row) {
                                        echo "<td>";
                                        echo $row->nombre_estado;
                                        echo "</td>";
                                    }


                                    $rev1 = $CI->Articulo_model->revisor_direct($email_revisor_1);
                                    if ($email_revisor_1 != "No Asignado") {
                                        foreach ($rev1->result() as $row) {
                                            echo "<td>";
                                            echo $row->nombre;
                                            echo " ";
                                            echo $row->apellido_1;
                                            echo " ";
                                            echo $row->apellido_2;
                                            echo "</td>";
                                        }
                                    } else {
                                        echo "<td>";
                                        echo "<center>-</center>";
                                        echo "</td>";
                                    }



                                    $rev2 = $CI->Articulo_model->revisor_direct($email_revisor_2);

                                    if ($email_revisor_2 != "No Asignado") {
                                        foreach ($rev2->result() as $row) {
                                            echo "<td>";
                                            echo $row->nombre;
                                            echo " ";
                                            echo $row->apellido_1;
                                            echo " ";
                                            echo $row->apellido_2;
                                            echo "</td>";
                                        }
                                    } else {
                                        echo "<td>";
                                        echo "<center>-</center>";
                                        echo "</td>";
                                    }



                                    $rev3 = $CI->Articulo_model->revisor_direct($email_revisor_3);
                                    if ($email_revisor_3 != "No Asignado") {
                                        foreach ($rev3->result() as $row) {
                                            echo "<td>";
                                            echo $row->nombre;
                                            echo " ";
                                            echo $row->apellido_1;
                                            echo " ";
                                            echo $row->apellido_2;
                                            echo "</td>";
                                        }
                                    } else {
                                        echo "<td>";
                                        echo "<center>-</center>";
                                        echo "</td>";
                                    }


                                    echo "<td>";
                                    echo $fecha_ingreso;
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<a href='" . base_url() . "index.php/articulo_editor/asignar_revisores_ver/" . $id_revista . "'><center><i class='material-icons' style='font-size:40px;'>zoom_in</i></center></a>";
                                    echo "</td>";




                                    if ($id_estado == 1 || $id_estado == 3) {
                                        echo "<td>";
                                        echo "<a href='" . base_url() . "index.php/articulo_editor/asignar_revisores_editar/" . $id_revista . "'><center><i class='material-icons' style='font-size:40px;'>assignment_ind</i></center></span></center></span></a>";
                                        echo "</td>";
                                    } else {
                                        echo "<td>";
                                        echo "<center><i class='material-icons' style='font-size:40px;'>not_interested</i></center></a>";
                                        echo "</td>";
                                    }

                                    if ($id_estado == 1) {
                                        echo "<td>";
                                        echo "<a href='" . base_url() . "index.php/articulo_editor/asignar_revisores_borrar/" . $id_revista . "'><center><i class='material-icons' style='font-size:40px;color:red'>delete_forever</i></center></a>";
                                        echo "</td>";
                                    } else {
                                        echo "<td>";
                                        echo "<center><i class='material-icons' style='font-size:40px;'>not_interested</i></center></a>";
                                        echo "</td>";
                                    }

                                    echo "</tr>";
                                    ?>
    <?php endforeach ?>

    <?php }
?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>


    </div>
</div>
</div>
