<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div class="clearfix">

		<!-- Page Title
		============================================= -->
		<section id="page-title" style = "background-color: #3f51b5;">

			<div class="container clearfix">
				<h1 style = "color:#fff"><?php echo lang('vraar_registro revisor');?></h1>
				<span style = "color:#fff"><?php echo lang('vraar_part1');?><br>
         <?php echo lang('vraar_part2');?></span>
				<ol class="breadcrumb">
					<li><a style = "color:#fff" href="<?php echo base_url(); ?>index.php/Login"><?php echo lang('vraar_inicio');?></a></li>
					<li><a style = "color:#fff" href="#"><?php echo lang('vraar_registro');?></a></li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">
						<form name = "form_revisor" class="form-horizontal"  action="<?php echo base_url();?>index.php/Registro_autor_a_revisor" method="post" enctype="multipart/form-data">
						<?php
							$areas = $this->Model_for_login->get_areas();
							if ($areas)
							{
								echo '<h3 style = "color: #3f51b5;">'.lang("vraar_areas de especialidad").'</h3>';
                echo '<h5>'.lang("vraar_ingrese las areas").':</h5>';
								echo '<hr>';
								if ($mensaje_error != "Seleccionado") echo '<div class="alert alert-danger">' . $mensaje_error . '</div>';
								foreach ($areas->result() as $row){
									echo '<label class="checkbox">';
									echo '<input type="checkbox" name= "c'. $row->id_campo .'" id= "c'. $row->id_campo .'" value='.$row->id_campo.'>' . $row->nombre_campo;
									echo '</label>';
								}
							}
						 ?>
						<br><br>
            <br>
            <input type="hidden" value="1" name="press" id = "press" />
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="button button-3d button-mini button-rounded button-green btn-block"><?php echo lang('vraar_registrar');?></button>
					    </div>
					  </div>
					</form>


					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">

							<div class="widget widget_links clearfix">

								<h4><?php echo lang('vraar_links');?></h4>
								<ul>
									<a href="<?php echo base_url(); ?>index.php/Login" class="button button-mini button-3d button-circle button-teal"></i><?php echo lang('vraar_pagina principal');?></a>
                  <a href="<?php echo base_url(); ?>index.php/Login/cerrar_sesion" class="button button-mini button-3d button-circle button-teal"></i><?php echo lang('vraar_cerrar sesion');?></a>
                </ul>

							</div>

						</div>
					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->


	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>
