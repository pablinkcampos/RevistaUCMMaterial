<style>

    body {
        background:#fff;
    }

    .bookWrap {
        margin:25px auto;
        height:346px;
        width:230px;

        position:relative;

        -webkit-perspective: 1200px;
        -moz-perspective: 1200px;
        perspective: 1200px;
    }

    .book {
        background:#000;
        height:346px;
        width:230px;
        position:absolute;
        left:16px;
        top:0;

        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;

        -webkit-transition: -webkit-transform .5s ease 0s;
        -moz-transition: -moz-transform .5s ease 0s;
        transition: transform .5s ease 0s;

        -webkit-border-radius: 0 7px 7px 0;
        -moz-border-radius: 0 7px 7px 0;
        border-radius: 0 7px 7px 0;

        -webkit-perspective: 1200px;
        -moz-perspective: 1200px;
        perspective: 1200px;
    }

    .bookIntro {
        -webkit-transform: rotateY(30deg);
        -moz-transform: rotateY(30deg);
        transform: rotateY(30deg);
    }

    .cover {
        position:absolute;
        left:0;
        top:0;

        height: 100%;
        width: 230px;

        max-width: 230px;
        max-height: 346px;

        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        backface-visibility: hidden;

        -webkit-border-radius: 0 4px 4px 0;
        -moz-border-radius: 0 4px 4px 0;
        border-radius: 0 4px 4px 0;

        -webkit-transition: -webkit-transform .5s ease 0s, width .5s ease 0s;
        -moz-transition: -moz-transform .5s ease 0s, width .5s ease 0s;
        transition: transform .5s ease 0s, width .5s ease 0s;

        -webkit-transform-origin: 0;
        -moz-transform-origin: 0;
        transform-origin: 0;
    }

    .cover:hover {
        width:210px;

        -webkit-transform: rotateY(-20deg);
        -moz-transform: rotateY(-20deg);
        transform: rotateY(-20deg);
    }

    .spine {
        background:black;
        width: 40px;
        height: 344px;
        position: absolute;
        top: 0;
        left:0;


        -webkit-transform: rotateY(90deg);
        -moz-transform: rotateY(90deg);
        transform: rotateY(90deg);

        -webkit-transform-origin: 0;
        -moz-transform-origin: 0;
        transform-origin: 0;
    }








</style>
<br>


    <div class="container-fluid  " style="margin-top: 200px;">
       
        <!-- Portfolio Single Content
        ============================================= -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          
            <br>
            <?php
            $id_get = $this->input->get('revista');

            $logo = false;
            $resultado = $this->Articulo_Model->count_magazine();

            if ($resultado->cantidad > 0) {
                if ($id_get) {

                    $max_id = $id_get;
                    $magazine = $this->Articulo_Model->get_magazine($max_id);
                    $articulos_en_revista = $this->Articulo_Model->obtener_articulos_en_revista($max_id);
                } else {
                    $max_id = $this->Articulo_Model->get_max_id_magazine();
                    $magazine = $this->Articulo_Model->get_magazine($max_id->numero);
                    $articulos_en_revista = $this->Articulo_Model->obtener_articulos_en_revista($max_id->numero);
                }
                if ($magazine) {
                    if ($magazine->logo_revista) {
                        $logo = true;
                    }
                    
                   
                        
                    echo ' <div class="card">';
                    
                  
                    echo '<div class="header">';
              
                    echo ' <center>    <h2>' . $magazine->titulo_revista;
                    echo '        <br>' . $magazine->fecha_publicacion . '</h2>';
                    echo '</div></center>';

                    echo '<div class="body">';
                    if ($logo ) {
                        echo '
                                <div class="pull-left col-lg-12 col-md-12">
                
                                          <a href="#" class="nobg"><div class="bookWrap">
                                            <div class="book">
                                              <a href="' . base_url() . 'index.php/Home_principal/publicacion?revista=' . $id_get . '" class="nobg"><img class="cover"
                                                src="' . base_url() . 'img/' . $magazine->logo_revista . '"></a>
                                              <div class="spine"></div>
                                            </div>
                                          </a>
                                    
                                </div>
                                
                            ';
                    }
                    
                
                    echo '<div class="col-lg-12 col-md-12">
                        <center>
                      <p><b>' . lang("vhp_palabras del editor") . '</b><br>
                      <i>"' . $magazine->palabras_editor . '"</i></p>
                       </center>
                    </div>';


                    $row = null;
                    if ($articulos_en_revista) {
                        echo '
                  <div class="col-lg-2 col-md-2">
                      <p><b>' . lang("vres_pagina") . '</b></p>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <p><b>' . lang("vres_titulo") . '</b></p>
                  </div>
                  <div class="col-lg-4 col-md-4">
                      <p><b>' . lang("vres_autores") . '</b></p>
                  </div>';
                        foreach ($articulos_en_revista->result() as $row) {
                            echo '<div class="col-lg-2 col-md-2">';
                            echo '</div>';
                            echo '<div class="col-lg-6 col-md-6">';
                            echo '    <b>' . $row->titulo . '</b>';
                            if ($row->file_papper) {
                                echo '    <br><a href=' . base_url() . 'uploads/' . $row->file_papper . '><img width="40" height="40" src="' . base_url() . 'img/pdf.png' . '" alt="Descargar_Revista"></a><a href = ' . base_url() . 'uploads/' . $row->file_papper . '>' . lang("vres_descargar pdf") . '</a>';
                            }
                            echo '</div>';
                            echo '<div class="col-lg-4 col-md-4">';
                            $nombre = $this->Articulo_Model->getnamee($row->ID_articulo);
                            echo '    <p>' . $nombre->autor_1 . ' <br> ' . $nombre->autor_2 . ' <br> ' . $nombre->autor_3 . ' <br> ' . $nombre->autor_4 . ' </p>';
                            echo '</div>';
                            
                            echo '</div>';
                        
                        }
                    } else {
                        echo '<h4>' . lang("vres_no hay articulos asociados") . '</h4>';
                    }
                } else {
                    echo '<br><br>';
                    echo '<h3> ' . lang("vres_revista solicitada no se encuentra disponible") . '.</h3>';
                    echo '<br><br><br><br><br>';
                }
            } else {
                echo '<br><br>';
                echo '<h3>' . lang("vres_bienvenidos a nuestra plataforma de revistas") . '</h3>';
            }
            ?>
  
  


   <div class="widget clearfix">
                    <?php
                     $this->load->view('include/menu_editor');
                    ?>
                </div>
 


<script type="text/javascript">

    $(document).ready(function () {

// Pause just a moment
        setTimeout(function () {

            var $book = $('.book');

            // Apply the intro classes that will
            // appear to turn the book,
            // revealing its spine
            $book.addClass('bookIntro');

            // pause another moment, then turn back
            setTimeout(function () {
                $book.removeClass('bookIntro');
            }, 3000);


        }, 1000);


    });
</script>
