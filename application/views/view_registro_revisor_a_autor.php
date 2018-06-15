<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div class="clearfix">

		<!-- Page Title
		============================================= -->
		<section id="page-title" style = "background-color: #3f51b5;">

			<div class="container clearfix">
				<h1 style = "color:#fff"><?php echo lang('vrraa_registro autor');?></h1>
				<span style = "color:#fff"><?php echo lang('vrraa_part1');?><br>
         <?php echo lang('vrraa_part2');?></span>
				<ol class="breadcrumb">
					<li><a style = "color:#fff" href="<?php echo base_url(); ?>index.php/Login"><?php echo lang('vrraa_inicio');?></a></li>
					<li><a style = "color:#fff" href="#"><?php echo lang('vrraa_registro');?></a></li>
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
						<form name = "form_autor" class="form-horizontal"  action="<?php echo base_url();?>index.php/Registro_revisor_a_autor" method="post" enctype="multipart/form-data">
						<h3 style = "color: #3f51b5;"><?php echo lang('vrraa_informacion personal');?></h3>
						<hr>
            <div class="form-group">
							<label class="control-label col-sm-2" for="dato5"><?php echo lang('vrraa_departamento');?>:</label>
							<div class="col-sm-10">
								<?php if (form_error('dept')) echo '<div class="alert alert-danger">' . form_error('dept') . '</div>'; ?>
								<input type="text" name="dept" class="form-control" id="dept" value="<?php if (isset($_POST['dept'])) echo $_POST['dept'];?>" placeholder="<?php echo lang('vrraa_ingresar departamento');?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="dato6"><?php echo lang('vrraa_pais');?>:</label>
							<div class="col-sm-10">
								<select name="pais" id = "pais" value="<?php if (isset($_POST['pais'])) echo $_POST['pais'];?>" class="form-control selectpicker" data-live-search = "true">
                    <?php
											$paises = $this->Model_for_login->get_paises();
											if ($paises)
											{
	                      foreach ($paises->result() as $row){
	                        echo '<option value='. $row->ID . '> ' . $row->nombre . '</option>';
	                      }
											}
                     ?>
                  </select>
							</div>
						</div>
						<br>
						<h3 style = "color: #3f51b5;"><?php echo lang('vrraa_comentario');?></h3>
						<hr>
						<div class="form-group">
							<label class="control-label col-sm-2" for="dato8"><?php echo lang('vrraa_comentario opcional');?>:</label>
							<div class="col-sm-10">
								<?php if (form_error('comentario')) echo '<div class="alert alert-danger">' . form_error('comentario') . '</div>'; ?>
								<textarea class="form-control" name = "comentario" id = "comentario" placeholder="<?php echo lang('vrraa_ingresar comentario');?>" rows="3"><?php if (isset($_POST['comentario'])) echo $_POST['comentario'];?></textarea>
							</div>
						</div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="button button-3d button-mini button-rounded button-green btn-block"><?php echo lang('vrraa_registrar');?></button>
					    </div>
					  </div>
					</form>


					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">

							<div class="widget widget_links clearfix">

								<h4><?php echo lang('vrraa_links');?></h4>
								<ul>
									<a href="<?php echo base_url(); ?>index.php/Login" class="button button-mini button-3d button-circle button-teal"></i><?php echo lang('vrraa_pagina principal');?></a>
									<a href="<?php echo base_url(); ?>index.php/Login/login" class="button button-mini button-3d button-circle button-teal"></i><?php echo lang('vrraa_inicio de sesion');?></a>
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
	<script type="text/javascript">$('.selectpicker').selectpicker({
	  size: 5
	});
	</script>
