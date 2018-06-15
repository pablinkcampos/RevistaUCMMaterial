<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>



<div class="container-fluid  " style="margin-top: 200px;">
	<div class="row">
        <div class="postcontent nobottommargin col_last">
            <div id="posts" class="events small-thumbs">
                <div class="entry clearfix col-lg-12">
                    <div class="col-lg-9"><h2><?php echo lang('vrev_revistas ucm');?> </h2>

                    </div>
                    <a href="<?php echo base_url(); ?>index.php/System/newm" ><button type="button"  class="btn bg-green waves-effect">
                                    <i class="material-icons">note_add</i>
                                    <span><?php echo lang('vrev_nueva revista');?></span>
                    </button></a>
                    

                </div>
                <?php
                    $ids = $this->Articulo_Model->obtener_magazine_titulo();
                    if($ids){

                            foreach($ids->result() as $row)   {
                                $num = $this->Articulo_Model->count_magaziness($row->ID);
                                echo ' <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <div class="card">
                                    <div class="icon">
                                        <i class="material-icons col-blue">bookmark</i>
                                    </div>
                                    <div class="header">
                                 
                                        <h2>
                                        <a href="'.base_url().'index.php/Home_principal/publicacion?revista=' . $row->ID . '">'.$row->titulo_revista.'</a>
                                        </h2>
                                    </div>

                                           
                                            
                                            <div class="body">
                                                
                                                <div class="text"> <i class="material-icons">date_range</i>'.$row->fecha_publicacion.'</div>
                                                <div class="text"><a href="'.base_url().'index.php/Home_principal/publicacion?revista=' . $row->ID . '"><i class="icon-comments"></i>'.$num->cantidad.' '.lang("vrev_articulos").'</a></div>
                                                <a href="'.base_url().'index.php/System/editar?revista=' . $row->ID . '" ><button type="button"  class="btn bg-amber waves-effect">
                                                <i class="material-icons">create</i>
                                                <span>Editar Revista</span>
                                                
                                            </div>
                                </div>
                                </div>';
                    
                  
                                            
                                        
                              
                            }

                    }else{
                                echo '<div class="entry clearfix col-lg-6">';
                                echo     '<div class="entry-title">';
                                echo         '<h2>'.lang("vrev_no hay revistas creadas aun").'.</h2>';
                                echo    '</div>';
                                echo '</div>';
                    }
                ?>
            </div>
        </div>


                <div class="widget clearfix">
                    <?php
                     $this->load->view('include/menu_editor');
                    ?>
                </div>
 