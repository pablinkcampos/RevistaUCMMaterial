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
                  
                
   
                     if ($user_data['id_rol'] == 1 || $user_data['id_rol2'] == 1 || $user_data['id_rol3'] == 1) {
                        echo '<li><a href="' . base_url() . 'index.php/System/editor"><i class="material-icons">person</i>Cambiar menu a <br><center> Editor</center></a></li>';
                         
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
                    <li class="header"><?php echo lang('MR_acciones revisor');?></li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/System/revisor">
                            <i class="material-icons">home</i>
                            <span>Home Revisor</span>
                        </a>
                    </li>
                   
                    <li class="active">
                    <li >
                        <a href="<?php echo base_url(); ?>index.php/Articulo_revisor/articulos_asignados" >
                            <i class="material-icons">assignment</i>
                            <span>Sus Artículos</span>
                        </a>
                       
                    </li>
                    </li>
                    <li class="active">
                    <li >
                        <a href="<?php echo base_url(); ?>index.php/Articulo_revisor/articulos_revisados" >
                            <i class="material-icons">done_all</i>
                            <span>Revisados</span>
                        </a>
                       
                    </li>
                    </li>
              
            
                    
                </ul>
            </div>
         
        </aside>

</section>






