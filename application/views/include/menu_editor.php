<section>
<?php
    $CI =& get_instance();
    $CI->load->library('session');
    $CI->load->model('Articulo_model');
    $data_usuario=$CI->session->userdata('userdata');
    $email_select=$data_usuario['email_usuario'];
    $est1 = $CI->Articulo_model->revisor_direct($email_select);
    $datos=$est1->result();
    $nombre="";
    if(isset($est1)){
        $nombre=$datos[0]->nombre." ".$datos[0]->apellido_1;
    }
   
 ?>
        <!-- Left Sidebar -->
		<?php 	$user_data = $this->session->userdata('userdata');	?>
        <aside id="leftsidebar" class="sidebar" style="margin-top: 50px; ">
            <!-- User Info -->
            <div class="user-info">
           
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?></div>
                    <div class="email"><?php echo $email_select; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
					
						<?php
                  
               
                     if ($user_data['id_rol'] == 2 || $user_data['id_rol2'] == 2 || $user_data['id_rol3'] == 2 ) {
                         
                         echo '    <li><a href="' . base_url() . 'index.php/System/revisor"><i class="material-icons">person</i>Cambiar menu a <br><center> Revisor</center></a></li>';
                         
                     } 
                ?>
							    
                            <li role="seperator" class="divider"></li>
							<li><a href="<?php echo base_url(); ?>index.php/Login/pass" class=" waves-effect waves-block"><i class="material-icons">refresh</i> Cambiar<br><center>Password</center></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Login/cerrar_sesion" class=" waves-effect waves-block"><i class="material-icons">input</i> Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu scroll-menu-2x">
                <ul class="list">
                    <li class="header">Acciones Editor</li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/System/editor">
                            <i class="material-icons">home</i>
                            <span>Home Editor</span>
                        </a>
                    </li>
                   
                     
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Artículos</span>
                        </a>
                        <ul class="ml-menu">
							<li><a  href="<?php echo base_url(); ?>index.php/Articulo_editor/all_articulos_recibidos"><?php echo lang('ME_recibidos');?></a></li>
                			<li><a  href="<?php echo base_url(); ?>index.php/Articulo_editor/all_articulos_noasignados"><?php echo lang('ME_noasignados');?></a></li>
			    			<li><a  href="<?php echo base_url(); ?>index.php/Articulo_editor/all_articulos_asignados"><?php echo lang('ME_asignados');?></a></li>
							<li><a  href="<?php echo base_url(); ?>index.php/Articulo_editor/all_articulos_revisados"><?php echo lang('ME_Revisados');?></a></li>
                			<li><a  href="<?php echo base_url(); ?>index.php/Articulo_editor/all_articulos_rechazado_editor"><?php echo lang('ME_Rechazado por Editor');?></a></li>
                			<li><a  href="<?php echo base_url(); ?>index.php/Articulo_editor/all_articulos_espera_final"><?php echo lang('ME_Espera Version Final');?></a></li>
                        </ul>
                    </li>
            
              
            
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span><?php echo lang('ME_revista');?></span>
                        </a>
                        <ul class="ml-menu">
							<li><a  href="<?php echo base_url(); ?>index.php/System/editor_magazine"><?php echo lang('ME_revistas');?></a></li>
							<li><a  href="<?php echo base_url(); ?>index.php/System/newm"><?php echo lang('ME_asignar articulo');?></a></li>

                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">unarchive</i>
                            <span>Editar Contenido</span>
                        </a>
                        <ul class="ml-menu">
                           
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
									<i class="material-icons">http</i>
                                    <span>Página web</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/System/editor_modificar_politica_editorial">
                                            <span><?php echo lang('vmc_politicas editorial');?></span>
                                        </a>
                                    </li>
									<li>
                                        <a href="<?php echo base_url(); ?>index.php/System/editor_modificar_sobre_nosotros" >
                                            <span><?php echo lang('vmc_sobre nosotros');?></span>
                                        </a>
                                       
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/System/editor_cambia_imagen">
                                            <span><?php echo lang('vmc_logo del sistema');?></span>
                                        </a>
                                        
                                    </li>
								
                                </ul>
							</li>

							<li>
                                        <a href="javascript:void(0);" class="menu-toggle">
											<i class="material-icons">mail</i>
                                            <span>Mensajes</span>
                                        </a>
										<ul class="ml-menu">
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/System/editor_cambia_mensaje_r">
                                                    <span><?php echo lang('vmc_Mensaje recepcion de articulos');?></span>
                                                </a>
                                            </li>
											<li>
                                                <a href="<?php echo base_url(); ?>index.php/System/editor_cambia_mensaje_a">
                                                    <span><?php echo lang('vmc_Mensaje aceptacion de articulo');?></span>
                                                </a>
                                            </li>
											<li>
                                                <a href="<?php echo base_url(); ?>index.php/System/editor_cambia_mensaje_p">
                                                    <span><?php echo lang('vmc_Mensaje publicacion efectiva');?></span>
                                                </a>
                                            </li>
                                    	</ul>
                                        
                            </li>
									
                        	
							<li>
                                        <a href="javascript:void(0);" class="menu-toggle">
											<i class="material-icons">storage</i>
                                            <span>Datos</span>
                                        </a>
										<ul class="ml-menu">
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/System/editor_crud_campos">
                                                    <span>Editar Areas de Investigación</span>
                                                </a>
                                            </li>
											<li>
                                                <a href="<?php echo base_url(); ?>index.php/System/editor_crud_temas">
                                                    <span>Editar Temas</span>
                                                </a>
                                            </li>
											<li>
                                                <a href="<?php echo base_url(); ?>index.php/System/editor_cambia_datos_r">
                                                    <span><?php echo lang('vmc_datos_revista');?></span>
                                                </a>
                                            </li>
                                    	</ul>
                                        
                            </li>
									
                        </ul>
                    </li>
					
					<li>
                        <a href="<?php echo base_url(); ?>index.php/System/dar_alta_revisor">
                            <i class="material-icons">check</i>
                            <span>Dar de Alta revisor</span>
                        </a>
                    </li>

					<li>
                        <a href="<?php echo base_url(); ?>index.php/System/cambiar_configuracion">
                            <i class="material-icons">settings_applications</i>
                            <span>Configuraciones <br> Generales</span>
                        </a>
                    </li>

                </ul>
            </div>
         
        </aside>

</section>



