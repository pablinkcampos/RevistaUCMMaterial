<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min_spanish.js"></script>

<script>


    function showCampo(str) {

        $.ajax(
                {
                    url: "<?php echo base_url(); ?>index.php/articulo_editor/ajax_get/",
                    method: "POST",
                    data: {'string': str},
                    success: function (data)
                    {
                        if (str != "No Asignado") {
                            var z = data;
                            z = z.replace(/#/g, "<br>");
                            swal({html: true, title: 'Campos Revisor', text: z});
                        }
                    },
                    error: function (e) {
                        swal({html: true, title: 'Error', text: 'Error'});
                    }

                }
        );
    }
</script>



<div class="content-wrap">
    <div class="container clearfix">
        <div class="postcontent nobottommargin col_last">
            <div id="posts" class="events small-thumbs">

                <?php if ($datos) { ?>
                    <?php foreach ($datos->result() as $row): ?>
                        <?php
                        $id_revista = $row->ID;
                        $titulo_revista = $row->titulo_revista;
                        $id_revisor_1 = $row->id_revisor_1;
                        $id_revisor_2 = $row->id_revisor_2;
                        $id_revisor_3 = $row->id_revisor_3;
                        ?>


                        <div class="col-md-12">
                            <div class="col-md-12">
                                <br>
                                <h3 style = "color: grey;"><?php echo lang('aare_editar articulo'); ?></h3>
                                <hr>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="col-md-9">
                            <div class="col-md-12">
                                <form method="POST" action="<?php echo base_url(); ?>index.php/articulo_editor/asignar_revisores_editar/<?php echo $id_revista; ?>">
                                    <div class="form-group">
                                        <label for="text"><?php echo lang('aare_titulo revista'); ?></label>
                                        <input type="text" class="form-control" id="titulo_revista" value="<?php echo $titulo_revista; ?>" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                        <label for="email_revisor_1"><?php echo lang('aare_revisor n1'); ?></label>

                                        <select class="form-control" name="email_revisor_1" id="email_revisor_1" onchange="showCampo(this.value)">


                                            <?php


                                            foreach ($revisores->result() as $row) {
                                                echo '<option value="' . $row->email . '" ';
                                                if ($id_revisor_1 == $row->email)
                                                    echo "selected";
                                                echo '>' . $row->nombre . ' ' . $row->apellido_1 . ' ' . $row->apellido_2;
                                                echo '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="email_revisor_2"><?php echo lang('aare_revisor n2'); ?></label>
                                        <select class="form-control" name="email_revisor_2" id="email_revisor_2" onchange="showCampo(this.value)">
                                            <?php
                                            foreach ($revisores->result() as $row) {
                                                echo '<option value="' . $row->id . '" ';
                                                if ($id_revisor_2 == $row->id)
                                                    echo "selected";
                                                echo '>' . $row->nombre . ' ' . $row->apellido_1 . ' ' . $row->apellido_2 . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="email_revisor_3"><?php echo lang('aare_revisor n3'); ?></label>
                                        <select class="form-control" name="email_revisor_3" id="email_revisor_3" onchange="showCampo(this.value)">
                                            <?php
                                            foreach ($revisores->result() as $row) {
                                                echo '<option value="' . $row->email . '" ';
                                                if ($email_revisor_3 == $row->email)
                                                    echo "selected";
                                                echo '>' . $row->nombre . ' ' . $row->apellido_1 . ' ' . $row->apellido_2 . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>



                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-8">
                                            <input type="submit" class="button button-3d button-mini button-rounded button-green btn-block" value="<?php echo lang('aare_asignar'); ?>" />
                                        </div>
                                    </div>
                                </form>

                                <form method="POST" action="<?php echo base_url(); ?>index.php/articulo_editor/asignar_revisores">

                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-8">
                                            <input type="submit" class="button button-3d button-mini button-rounded button-blue btn-block" value="<?php echo lang('aare_regresar'); ?>" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="container col-md-3">
                            <br>Seleccione los revisores del <b>primero</b> al <b>tercero</b>. Puede asignar <i>un revisor, dos revisores o tres revisores</i>.
                            <br><br>En caso de cometer un error en la asignación, vuelva a asignar revisor y seleciona el campo <b> No asignado</b>.
                        </div>
                    </div>
                <?php endforeach ?>
            <?php } ?>
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

<!--
<script>
function email1() {

        var email = document.getElementById("email_revisor_1").value;
        var y = <?php json_encode($data_usuarios); ?>;
        var z = y[email];

        if (email!="No Asignado") {
            z= z.replace(/#/g,"<br>");

            swal({ html:true, title:'<i>Campos Revisor</i>', text:z});
    }

}
function email2() {

        var email = document.getElementById("email_revisor_2").value;
        var y = <?php echo json_encode($data_usuarios); ?>;
        var z = y[email];

        if (email!="No Asignado") {
            z= z.replace(/#/g,"<br>");

            swal({ html:true, title:'<i>Campos Revisor</i>', text:z});
    }

}
function email3() {

        var email = document.getElementById("email_revisor_3").value;
        var y = <?php echo json_encode($data_usuarios); ?>;
        var z = y[email];

        if (email!="No Asignado") {
            z= z.replace(/#/g,"<br>");

            swal({ html:true, title:'<i>Campos Revisor</i>', text:z});
    }

}
</script>
-->
