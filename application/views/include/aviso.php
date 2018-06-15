<!DOCTYPE html>
    <html dir='ltr' lang='es'>
                  

    <head>

        
        <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="<?php echo base_url(); ?>plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="<?php echo base_url(); ?>plugins/animate-css/animate.css" rel="stylesheet" />

         <link href="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
  
                </head>
                <body>
                 <script>


        setTimeout(function() {
            swal({
                title: <?php echo json_encode($title, JSON_HEX_TAG); ?>,
                text: <?php echo json_encode($text, JSON_HEX_TAG); ?>,
                type: <?php echo json_encode($tipoaviso, JSON_HEX_TAG); ?>
            }, function() {
                window.location.href = <?php echo json_encode($windowlocation, JSON_HEX_TAG); ?>;
            });
        }, 100);
    </script>
        <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>
        
        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
        
        <!-- Validation Plugin Js -->
        <script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.min.js"></script>
        
        <!-- Custom Js -->
        <script src="<?php echo base_url(); ?>js/admin.js"></script>
    
  </body></html>