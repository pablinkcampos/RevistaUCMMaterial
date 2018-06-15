<style type="text/css">
.centrar-imagen {

}

.centrar-imagen img {
    width: 50%; /* Siempre que la resolución de pantalla sea inferior que el ancho de la imagen, ocupará el 100% */
    max-width: 500px; /* Definimos el ancho máximo; el ancho de la imagen original, para evitar que siga ampliándose cuando la resolución de pantalla sea superior a éste */
    height: auto; /* Dejamos que el navegador muestre automáticamente el alto siempre proporcional al ancho de la imagen */
    min-width: 200px;


html,body{
margin:100px;
height:10%;
}
</style>

<body class="theme-blue theme-blue ls-closed">

  
    <nav class="navbar" >
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="row">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="true"></a>
                <a href="javascript:void(0);" class="bars" style="padding-right:40px;"></a>
                </div>
                
                <a class="navbar-brand" href="<?php echo base_url(); ?>index.php"><div class="centrar-imagen">

                <img src="<?php echo base_url(); ?>img/logo.png" alt="UCM Logo" width="100%" style="padding-left:40px;">
                </div></a>
            </div>
          
               
                        <?php
                          $consult = $this->Articulo_Model->count_articulos_total_publicados();

                          if ($consult)
                          {
                            $cantidad_articulos = $consult->total;
                          }
                         ?>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
    
                    
                    <!-- #END# Call Search -->
                
    
                  
                </ul>
            </div>
            <ol class="breadcrumb breadcrumb-bg-cyan align-center">
                    <li><a href="<?php echo base_url(); ?>"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Home_principal/nosotros"><i class="material-icons">library_books</i>Nosotros</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Home_principal/politica"><i class="material-icons">library_books</i>Politica editorial</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Home_principal/numeros"><i class="material-icons">library_books</i>Publicacion efectiva</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Home_principal/cuerpo_editorial"><i class="material-icons">library_books</i>Cuerpo editorial</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Home_principal/plantilla"><i class="material-icons">library_books</i>Guía autor</a></li>            
            </ol>
            
        </div>
       
    </nav>

<body class="stretched">
    

        <header id="header">
            
            
           
        </header>
