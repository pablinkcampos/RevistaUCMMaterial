<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="stretched">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<script language="javascript">
	function verificar(){
	var suma = 0;
	var los_cboxes = $("input:checkbox"); 
	for (var i = 0, j = los_cboxes.length; i < j; i++) {
    
    	if(los_cboxes[i].checked == true){
    		suma++;
    	}
	}
 
	if(suma == 0){
		swal("Error", "Debe seleccionar al menos 1 tema", "error");
	
		return false;
	}else{
		if(suma > 5){
			swal("Error", "El máximo de temas es 5", "error");
		
			return false;
		}
	}

	}
 


</script>




   



		<!-- Page Title
		============================================= -->
		<section id="page-title" style = "background-color: #3f51b5;">

			<div class="container clearfix">
				<h1 style = "color:#fff"><?php echo lang('vrr_registro de revisor');?></h1>
				<span style = "color:#fff"><?php echo lang('vrr_part1');?><br>
          <?php echo lang('vrr_part2');?></span>
				<ol class="breadcrumb breadcrumb-bg-cyan align-center">
					<li><a style = "color:#fff" href="<?php echo base_url(); ?>index.php"><?php echo lang('vrr_inicio');?></a></li>
					<li><a style = "color:#fff" href="<?php echo base_url(); ?>index.php/Login"><?php echo lang('vrr_registro');?></a></li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
		<div class="container-fluid  theme-blue" >
          
		<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <form id="wizard_with_validation" name = "wizard_with_validation" action="<?php echo base_url();?>index.php/Registro_revisor" method="POST" onsubmit="return verificar();" enctype="multipart/form-data">
                                <h3>Información de la cuenta</h3>
                                <fieldset>
																	<div class="form-group form-float">
																		
																		<div class="form-line">
																			<?php if (form_error('correo')) echo '<div class="alert alert-danger">' . form_error('correo') . '</div>'; ?>
																			<label class="form-label" ><?php echo lang('vrr_correo');?>:</label>
																			<input type="email" name="correo" class="form-control" id="correo" minlength=3 value="<?php if (isset($_POST['correo'])) echo $_POST['correo'];?>" required>
																		</div>
																	</div>
																  <div class="form-group form-float">
																    
																    <div class="form-line">
																			<label class="form-label" ><?php echo lang('vrr_contrasenia');?>:</label>
																			<?php if (form_error('clave1')) echo '<div class="alert alert-danger">' . form_error('clave1') . '</div>'; ?>
																      <input type="password" name="clave1" class="form-control" id="pwd1" minlength=6 value="<?php if (isset($_POST['clave1'])) echo $_POST['clave1'];?>" required>
																    </div>
																  </div>
																	<div class="form-group form-float">
																    
																    <div class="form-line">
																		<label class="form-label" ><?php echo lang('vrr_reingresar contrasenia');?>:</label>
																      <input type="password" name="clave2" class="form-control" id="pwd2" minlength=6 value="<?php if (isset($_POST['clave2'])) echo $_POST['clave2'];?>" required>
																    </div>
																  </div>
															
																
                                </fieldset>

                                <h3><?php echo lang('vrr_informacion personal');?></h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre'];?>" required>
																						<label class="form-label col-sm-2" for="dato1"><?php echo lang('vrr_nombre');?>:</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="apellido1" class="form-control" value="<?php if (isset($_POST['apellido1'])) echo $_POST['apellido1'];?>" required>
																						<label class="form-label col-sm-2" for="dato2"><?php echo lang('vrr_apellido paterno');?>:</label>
                                        </div>
                                    </div>
																		<div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="apellido2" class="form-control" value="<?php if (isset($_POST['apellido2'])) echo $_POST['apellido2'];?>" required>
																						<label class="form-label col-sm-2" ><?php echo lang('vrr_apellido materno');?>:</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="titulo" class="form-control" id="titulo"  value="<?php if (isset($_POST['titulo'])) echo $_POST['titulo'];?>" required>
                                            <label class="form-label col-sm-2"><?php echo lang('vrr_titulo academico');?>:</label>
                                        </div>
                                    </div>
																		
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input  type="text" name="organizacion" class="form-control" id="organizacion" value="<?php if (isset($_POST['organizacion'])) echo $_POST['organizacion'];?>" required></input>
                                            <label class="form-label col-sm-2" ><?php echo lang('vrr_organizacion');?>:</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input maxlenght="9" type="number" name="telefono" class="form-control" id="telefono" value="<?php if (isset($_POST['telefono'])) echo $_POST['telefono'];?>"  required>
																						<label class="form-label col-sm-2" ><?php echo lang('vrr_telefono');?>:</label>
                                        </div>
                                        <div class="help-info">debe ingresar 9 digitos</div>
                                    </div>

																		<div class="form-group form-float">
                                        <div class="form-line">
											<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ><?php echo lang('vrr_biografia');?>:</label>
                                            <textarea  type="text" name="biog" class="ckeditor"  id="biog" required><?php if (isset($_POST['biog'])) echo $_POST['biog'];?></textarea>
											
                                        </div>
										<small> escriba una breve biografia máximo 5 lineas.</small>
                                    </div>
																		
                                </fieldset>

                                <h3>Áreas de especialidad</h3>
                                <fieldset>
								
								
								 	
																	<?php
																		$areas = $this->Model_for_login->get_areas();
																		$temas = $this->Model_for_login->get_temas();
																		if ($areas)
																		{
																		
																			echo '<h3 style = "color: #3f51b5;">'.'Áreas de especialidad'.'</h3>';
																			echo '<hr>';

																			
																		
																			foreach ($areas->result() as $row){
																				echo '<div class="form-group">';
																				echo '<h6 style = "color: #3f51b5;">'.$row->nombre_campo.'</h6>';
																			
																				foreach ($temas->result() as $rowt){
																					$seleccionado = '';
																					if (isset($_POST['c'. $rowt->id_tema]))
																					{
																						$seleccionado = 'checked';
																					}
																					if($rowt->nombre_campo==$row->id_campo){
																						echo '&nbsp;&nbsp;';
																						echo '  <input style="margin:10px" onchange="verificar()" type="checkbox" name="c'. $rowt->id_tema .'" id="c'. $rowt->id_tema .'" value='.$rowt->id_tema.' class="filled-in chk-col-blue" '.$seleccionado.'>';
																						echo '  <label for="c'. $rowt->id_tema .'">' . $rowt->nombre.'</label>';
																					
																					}
																				
																				}
																				echo '</div>';
																			
																			}
																		}
																	 ?>
																	
                                </fieldset>
																</form>
                        </div>
												
                    </div>
                </div>
            </div>
        </div>

				





			

		</section><!-- #content end -->


	</div><!-- #wrapper end -->


