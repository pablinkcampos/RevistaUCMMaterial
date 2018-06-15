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

<body class="theme-blue">

  
    <nav class="navbar" >
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>index.php"><div class="centrar-imagen">

                <img src="<?php echo base_url(); ?>img/logo.png" alt="UCM Logo" width="100%"  >
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
                    <li><a href="<?php echo base_url(); ?>index.php/home_principal/buscar" data-toggle="tooltip" data-placement="bottom" title="Buscar artículo"><i class="material-icons">search</i> <span class="label-count"><?php echo $cantidad_articulos ?></span></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/articulo_autor/login_articulo" data-toggle="tooltip" data-placement="bottom" title="Consultar mi artículo"><i class="material-icons">assignment_ind</i> </a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/articulo_autor/art" data-toggle="tooltip" data-placement="bottom" title="Ingresar artículo"><i class="material-icons">note_add</i> </a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/registro_revisor" data-toggle="tooltip" data-placement="bottom" title="Cadrastro revisor"><i class="material-icons">how_to_reg</i> </a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/registro_lector" data-toggle="tooltip" data-placement="bottom" title="Registro lector"><i class="material-icons">local_library</i> </a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Login/login" data-toggle="tooltip" data-placement="bottom" title="Iniciar sesión"><i class="material-icons">person</i> </a></li>
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
  
    <!-- #Top Bar -->

     

 
