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

<div class="content-wrap">
    <div class="container clearfix">
        <div class="postcontent nobottommargin col_last">
            <div id="posts" class="events small-thumbs">

                <div class="col-md-12">
                    <div class="col-md-12">
                        <br>
                        <h3 style = "color: black;"><?php echo lang('ama_mis articulos'); ?></h3>
                        <i class="fa fa-heart"></i>
                        <hr>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-12">


                        <table id="articulos" class="display" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo lang('ama_titulo'); ?></th>
                                    <th><?php echo lang('ama_autor'); ?></th>
                                    <th><?php echo lang('ama_estado'); ?></th>
                                    <th><?php echo lang('ama_revisor N1'); ?></th>
                                    <th><?php echo lang('ama_revisor N2'); ?></th>
                                    <th><?php echo lang('ama_revisor N3'); ?></th>
                                    <th><?php echo lang('ama_fecha ingreso'); ?></th>
                                    <th><?php echo lang('ama_ver'); ?></th>
                                    <th><?php echo lang('ama_modif op'); ?></th>
                                    <th><?php echo lang('ama_modif oblig'); ?></th>
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
                                        echo "<a href='" . base_url() . "index.php/articulo_autor/mis_articulos_ver/" . $id_revista . "'><center><i class='material-icons' style='font-size:42px;'>zoom_in</i></center></a>";
                                        echo "</td>";

                                        if ($id_estado == 5) {
                                            echo "<td>";
                                            echo "<a href='" . base_url() . "index.php/Articulo_autor/mis_articulos_mod_op/" . $id_revista . "'><center><i class='material-icons' style='font-size:42px'>file_upload</i></center></a>";
                                            echo "</td>";
                                        } else {
                                            echo "<td>";
                                            echo "<center><i class='material-icons' style='font-size:30px;color:grey;'>not_interested</i></center></a>";
                                            echo "</td>";
                                        }

                                        if ($id_estado == 6) {
                                            echo "<td>";
                                            echo "<a href='" . base_url() . "index.php/Articulo_autor/mis_articulos_mod_ob/" . $id_revista . "'><center><i class='material-icons' style='font-size:42px'>file_upload</i></center></a>";
                                            echo "</td>";
                                        } else {
                                            echo "<td>";
                                            echo "<center><i class='material-icons' style='font-size:30px;color:grey;'>not_interested</i></span></center></a>";
                                            echo "</td>";
                                        }

                                        //echo "<td>"; echo "-"; 	echo "</td>";

                                        echo "</tr>";
                                        ?>
                                    <?php endforeach ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>


        </div>

        <div class="sidebar nobottommargin clearfix">
            <div class="sidebar-widgets-wrap">
                <div class="widget clearfix">
                    <?php
                    $this->load->view('include/menu_autor');
                    ?>
                    <br>
                    <p><b>Modif. op.</b> Significa que el archivo fue aceptado y puede subir modificaciones opcionales si desea.</p>
                    <p><b>Modif. oblig.</b> Significa que el archivo fue aceptado pero necesita modificaciones obligatorias.</p>
                    <p>Las modificaciones sólo se habilitan cuando el archivo fue aceptado.</p>
                </div>
            </div>
        </div>
    </div>
</div>
