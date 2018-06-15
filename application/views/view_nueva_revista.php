<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php //echo $id_usuario; echo $nombre_usuario; echo $email_usuario; echo $id_rol;             ?>
<div class="content-wrap">
    <div class="container clearfix">
        <div class="postcontent nobottommargin col_last">
            <div id="posts" class="events small-thumbs">
                <?php
                 if ($articulos) {
                     
                 } else {
                     echo '<div class="entry clearfix">';
                     echo '    <div class="entry-c">';
                     echo '        <div class="entry-title">';
                     echo '            <h2>'.lang("vnr_no hay articulos para agregar a su revista").'.</h2>';
                     echo '        </div>';
                     echo '    </div>';
                     echo '</div>';
                 }
                ?>

            </div>

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

