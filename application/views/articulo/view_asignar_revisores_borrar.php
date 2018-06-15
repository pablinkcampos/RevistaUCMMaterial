<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>


<div class="content-wrap">
    <div class="container clearfix">
        
        <div class="col-md-3">
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
        <div class="col-md-9">


                

                  <?php
                  foreach ($datos->result() as $row) {
                      $id_articulo=$row->ID;
                  }

                   ?>


                      <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/articulo_editor/asignar_revisores_borrar/<?php echo $id_articulo; ?>" method="POST">
                          <div class="col-md-12">
                              <div class="col-md-12">
                                  <h3 style = "color: black;"><?php echo lang('aarb_borrar articulo');?></h3>
                                  <hr>
                              </div>
                          </div>
                          <div class="col-md-12">

                              <div class="col-md-12">
                                  <label class="control-label" for="text"><h4><?php echo lang('aarb_esta seguro');?></h4></label>
                              </div>
                          </div>

                          <div class="col-md-12">
                              <div class="col-md-4">
                                  <label class="radio-inline"><input type="radio" name="opcion" id="opcion" value="YES"><strong><h5><?php echo lang('aarb_si');?></h5></strong></label>
                              </div>
                              <div class="col-md-4">
                                  <label class="radio-inline"><input type="radio" name="opcion" id="opcion" value="NO"><strong><h5><?php echo lang('aarb_no');?></h5></strong></label>
                              </div>
                          </div>


                          <div class="col-md-12">
                         
                              <div class="col-md-offset-2 col-md-8">
                                <br>
                                <input type="submit" class="button button-3d button-mini button-rounded button-red btn-block" value="<?php echo lang('aarb_ingresar opcion');?>" />
                              </div>
                       
                          </div>
                      </form>

                      <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url();?>index.php/articulo_editor/asignar_revisores">

                   
                            <div class="col-md-offset-2 col-md-8">
                              <input type="submit" class="button button-3d button-mini button-rounded button-blue btn-block" value="<?php echo lang('aarb_regresar');?>" />
                            </div>
                   
                      </form>
                      </div>

                  </div>
                  </div>
                  </div>

            </div>


        </div>

        
    </div>
</div>
