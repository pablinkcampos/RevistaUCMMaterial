<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php //echo $id_usuario; echo $nombre_usuario; echo $email_usuario; echo $id_rol;            ?>
<script type="text/javascript">
    function validate_logo() {
        var s = 0;

        var user = document.forms["logo-form"]["file_logo"].value;
        if (user === null || user.length < 3 || /^\s+$/.test(user)) {
            s++;
            var title = <?php echo json_encode(lang("tswal_debe seleccionar un archivo antes de enviar"), JSON_HEX_TAG);?>;
            swal(title, "", "warning");
        }

        if (s > 0) {
            return false;
        }
    }
 </script>

         
<div class="container-fluid  " style="margin-top: 200px;">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>
				<div class="card">
					<div class="header bg-blue">
                  
                        <h2><?php echo lang('vci_cambiar logo');?></h2>
                        <br>
                         <div class="entry-image">
                            <a href="<?php echo base_url(); ?>img/logo.png" data-darkbox="image"><img class="image_fade" src="<?php echo base_url(); ?>img/logo.png" alt="Logo principal"></a>
                         </div>
                   
					</div>
					<div class="row">
                        <p><?php echo lang('vci_part1');?>  '.PNG'. <?php echo lang('vci_part2');?> 717x93
                            <?php echo lang('vci_part3');?>.</p>
                        <div class="col-lg-12">
                            <form name= "logo-form" class="form-horizontal" action="<?php echo base_url(); ?>index.php/System/insert_logo" method="post" enctype="multipart/form-data" onsubmit="return validate_logo()">
                                <div class="col-lg-12">
                                    <br>
                                    <input type="file" name="file_logo"/>
                                   
                                </div>
                                <button style="margin:4%" class="btn btn-success waves-effect" name="logo-form-submit" value="logo"><?php echo lang('vci_cambiar');?></button>
                               
                                       
                                    
                              
                            </form>
                        </div>
						</div>
					</div>
			</center>
		</div>
	</div>
</div>



        
                <div class="widget clearfix">
                    <?php
                     $this->load->view('include/menu_editor');
                    ?>
                </div>
         