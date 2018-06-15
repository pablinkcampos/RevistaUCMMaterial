<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php //echo $id_usuario; echo $nombre_usuario; echo $email_usuario; echo $id_rol;            ?>

<?php
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

<?php endforeach; ?>
<?php foreach($js_files as $file): ?>

    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<style type="text/css">
 
    .modal-backdrop{
        display: none;
    }
    .sidebar{
        position: absolute;
        height: 60%
    }
    i{
        font-size:30px;
    }
</style>




                    <?php
                     $this->load->view('include/menu_editor');
                    ?>
     

<div class="content">
    <div class="container-fluid">
    

                      <div class="col-md-12">
                          <br>
                          <h3 style = "color: black;">Editar Areas de Investigación</h3>
                          <small> <a href="<?php echo base_url(); ?>index.php/System/editor_crud_temas" target="_blank">Ir a temas</a></small>
                          <hr>
                        
                      </div>

                 <?php echo $output; ?>

    </div>
</div>


