<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php //echo $id_usuario; echo $nombre_usuario; echo $email_usuario; echo $id_rol;        ?>


<div class="container-fluid  " style="margin-top: 200px;">
       
      


              <?php
                function obtenerFechaEnLetra($fecha)
                {
                   $dia= conocerDiaSemanaFecha($fecha);
                   $num = date("j", strtotime($fecha));
                   $anno = date("Y", strtotime($fecha));
                   $mes = array(lang('enero'), lang('febrero'), lang('marzo'), lang('abril'), lang('mayo'), lang('junio'), lang('julio'), lang('agosto'), lang('septiembre'), lang('octubre'), lang('noviembre'), lang('diciembre'));
                   $mes = $mes[(date('m', strtotime($fecha))*1)-1];
                   return $dia.', '.$num.lang('vhr_de').$mes.lang('vhr_del').$anno;
               }

               function conocerDiaSemanaFecha($fecha)
               {
                   $dias = array(lang('domingo'), lang('lunes'), lang('martes'), lang('miercoles'), lang('jueves'), lang('viernes'), lang('sabado'));
                   $dia = $dias[date('w', strtotime($fecha))];
                   return $dia;
               }
                // Parametros
                $group_no = 0;
                $content_per_page = 3;
                $user_data = $this->session->userdata('userdata');
                $email_autor=$user_data['email_usuario'];
                $datos = $this->Articulo_Model->id_revisor_email($email_autor);
                if($datos){

                  $id_revisor = $datos->ID;
                
                  
                }
                else{
                  $id_revisor = -1;
                }
                // Datos get
                $datas = $this->input->get('page');

                // Cantidad de grupos en total
                $cantidad = $this->Articulo_Model->count_articulos_asignados($id_revisor);
         

                $cant_group = 0;
                if ($cantidad)
                {
                  $cant_group_aux = ceil($cantidad/$content_per_page);
                  $cant_group = $cant_group_aux;

                  if ($cantidad == 0)
                  {
                    echo ' <div class="card">';
                   
                 
                    echo '<div class="header">';
              
                    echo ' <center>    <h2>' ;
           
                    echo '</div></center>';
 
                    echo '<div class="row">';
                    
                    
                
                    echo '<div class="col-lg-12 col-md-12">
                        <center>
                        <h2>'.lang("vhr_no tienes articulos asignados").'.</h2>
                        </center>
                        </div>';
                       
 
                        echo '</div>';
                     echo '<div class="entry clearfix">
                     
                      </div>';
                    
                  }
                }

                if ($datas)
                {
                  if ($group_no < $cant_group)
                  {
                    $group_no = $datas;
                  }
                }
                //Ruta archivos
                $ruta = 'uploads';


                $start = ceil($group_no * $content_per_page);

                $consulta = $this->Articulo_Model->articulos_asignados_limit($id_revisor, $start, $content_per_page);
                if ($consulta && $cantidad)
                {
                    foreach ($consulta as $row) {
                        $salida_estado = $row->estado;
                        if ($salida_estado)
                        {
                       
                          echo '  <div class="row fluid">
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                              <div class="card">
                                  <div class="header bg-blue">
                                      
                                      <h2>'. $row->titulo_revista .'</h2>
                                        <ul class="entry-meta clearfix">
                                      <li><span class="label label-success">'. $salida_estado . '</span></li>
                                      <li><i class="icon-time"></i> '.lang("vhr_actualizado el").''. obtenerFechaEnLetra($row->fecha_ultima_upd) .'</li>
                                    </ul>
                                      
                                
                                  </div>
                                  <div class="form-group">
                                            <center>
                                            <p> '. $row->abstract . '</p>
                                             <form name="input" action="'.base_url().'index.php/System/revisor" method="post">
                                             <a href="'. base_url() . $ruta .'/'. $row->archivo.'" class="btn-info">'.lang("vhr_ver articulo").'</a>
                                             <input type="hidden" value="'. $row->ID .'" name="articulo_id" />
                                             </center>
                                           </form>
                                  </div>
                              </div>
                          </div>';
                      
                        }
                      }
                }

               ?>

            </div>

            <!-- Pagination
            ============================================= -->
            <?php
              echo '<ul class="pager nomargin">';
                if ($group_no == 0 && $group_no + 1 < $cant_group)
                {
                  $next = $group_no + 1;
                  echo '<li class="next"><a href="'.base_url().'index.php/System/revisor?page=' . $next . '">'.lang("vhr_siguiente").' &rarr;</a></li>';
                }
                else if ($group_no + 1 == $cant_group && $group_no > 0)
                {
                  $back = $group_no - 1;
                  echo '<li class="previous"><a href="'.base_url().'index.php/System/revisor?page=' . $back . '">&larr; '.lang("vhr_anterior").'</a></li>';
                }
                else if ($group_no + 1 < $cant_group)
                {
                  $next = $group_no + 1;
                  echo '<li class="next"><a href="'.base_url().'index.php/System/revisor?page=' . $next . '">'.lang("vhr_siguiente").' &rarr;</a></li>';
                  $back = $group_no - 1;
                  echo '<li class="previous"><a href="'.base_url().'index.php/System/revisor?page=' . $back . '">&larr; '.lang("vhr_anterior").'</a></li>';
                }
              echo '</ul>';
             ?>

        </div>



   
                <div class="widget clearfix">
                    <?php
                     $this->load->view('include/menu_revisor');
                    ?>
                </div>
  
