

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<!-- Bootstrap Date-Picker Plugin -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>




<div class="content-wrap">
    <div class="container clearfix">
        <div class="postcontent nobottommargin col_last">
            <div id="posts" class="events small-thumbs">
                <script>
                    $(function () {



                        $('input[name="opcion"]').bind('change', function () {
                            var showOrHide = (($(this).val() == "AceptadoCC")) ? true : false;
                            if (!showOrHide) {
                                $("#comentario").hide(1000);
                                document.getElementById("comentarioID").required = false;
                                document.getElementById("datetimepicker").required = false;
                            } else {
                                $("#comentario").show(1000);
                                document.getElementById("comentarioID").required = true;
                                document.getElementById("datetimepicker").required = true;
                            }

                        });


                    });

                </script>

                <script>
                    $(function () {



                        $('input[name="opcion"]').bind('change', function () {
                            var showOrHide = (($(this).val() == "Aceptado")) ? true : false;
                            if (!showOrHide) {
                                $("#sin_comentario").hide(1000);
                                document.getElementById("datetimepicker1").required = false;
                            } else {
                                $("#sin_comentario").show(1000);
                                document.getElementById("datetimepicker1").required = true;
                            }

                        });


                    });

                </script>

                <?php
                if ($datos) {
                    foreach ($datos->result() as $row) {
                        $id_articulo = $row->ID;
                    }
                    ?>


                    <div class="clearfix">
                        <div class="content-wrap">
                            <div class="container clearfix">

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/articulo_editor/comentarios_de_revisores_aceptar_rechazar/<?php echo $id_articulo; ?>" method="POST">
                                            <div class="col-md-12">

                                                <h3 style = "color: black;"><?php echo lang('acdrar_acep rech articulo'); ?></h3>
                                                <hr>

                                            </div>
                                            <div class="col-md-12">

                                                <label class="control-label" for="text"><?php echo lang('acdrar_seleccione opcion'); ?></label>

                                            </div>
                                            <div class="col-md-12">
                                                <label class="radio-inline"><input type="radio" name="opcion" id="opcionid" value="AceptadoCC"><?php echo lang('acdrar_aceptado con comentarios'); ?></label>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="radio-inline"><input type="radio" name="opcion" id="opcionid" value="Aceptado"><?php echo lang('acdrar_aceptado sin comentarios'); ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="radio-inline"><input type="radio" name="opcion" id="opcionid" value="Rechazado"><?php echo lang('acdrar_rechazado'); ?></label>
                                            </div>

                                            <div class="col-md-8">
                                                <div id="comentario" style="display:none">
                                                    <br>
                                                    <label class="control-label" for="date"><?php echo lang('acdrar_fecha limite obligario'); ?></label>
                                                    <input type='text' class="form-control" id='datetimepicker' name="datetimepicker" />

                                                    <br>
                                                    <label class="text"><?php echo lang('acdrar_comentaros'); ?></label>
                                                    <textarea id="comentarioID" class="form-control" style="resize: none" rows="15" cols="10" name="comentario" required="required" oninvalid="setCustomValidity('<?php echo lang("fv_campo requerido"); ?>')" oninput="setCustomValidity('')"></textarea>

                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div id="sin_comentario" style="display:none">
                                                    <br>
                                                    <label class="control-label" for="date"><?php echo lang('acdrar_fecha limite opcional'); ?></label>
                                                    <input type='text' class="form-control" id='datetimepicker1' name="datetimepicker1" />

                                                    <br>

                                                </div>
                                            </div>
                                            <div class="col-md-offset-1 col-md-7">
                                                <br><br>
                                                <input type="submit" class="button button-3d button-mini button-rounded button-green btn-block" value="<?php echo lang('acdrar_ingresar'); ?>" />
                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-md-12">
                                        <form action="<?php echo base_url(); ?>index.php/articulo_editor/comentarios_de_revisores" method="POST">
                                            <div class="col-md-offset-1 col-md-7">

                                                <input type="submit" class="button button-3d button-mini button-rounded button-blue btn-block" value="<?php echo lang('acdrar_regresar'); ?>" />
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $('#datetimepicker').datetimepicker({format: 'YYYY-MM-DD HH:mm'});

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD HH:mm'});

        });
    });
</script>
