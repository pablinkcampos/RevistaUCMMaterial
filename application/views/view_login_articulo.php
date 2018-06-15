<script type="text/javascript">
    function validate() {
        var s = 0;

        var user = document.forms["login-form"]["login-form-id"].value;
        if (user === null || user.length < 1 || /^\s+$/.test(user)) {
            s++;
            swal("No se permiten campos nulos", "", "warning");
        }

        var pass = document.forms["login-form"]["login-form-password"].value;
        if (pass === null || pass.length < 3 || /^\s+$/.test(pass)) {
            s++;
            swal("No se permiten campos nulos", " ", "warning");
        }

        if (s > 0) {
            return false;
        }
    }
</script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>plugins/animate-css/animate.css" rel="stylesheet" />

     <link href="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">


<body class="login-page">
    <div class="login-box">
        <div class="logo">
                    <center>
                        <a><img width="350" height="80" src="<?php echo base_url(); ?>img/logo.png" alt="UCM Logo"></a>
                    </center>
        </div>
        <div class="card">
            <div class="body">
                <form name= "login-form" id="login-form" class="nobottommargin" action="<?php echo base_url(); ?>index.php/Articulo_autor/consultar_articulo" method="post" onsubmit="return validate()">
                    <div class="msg">Consulta por tu articulo</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                                <label for="login-form-id">ID ARTÍCULO:</label>
                                <input type="number" id="login-form-id" placeholder="ID Articulo" name="login-form-id" value="" required autofocus />
                            
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                                <label for="login-form-password"><?php echo lang('vl_contrasena');?>:</label>
                                <input type="password" id="login-form-password" name="login-form-password" value="" required autofocus/>
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-blue waves-effect" type="submit">Consultar</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url(); ?>index.php/Login">Volver a inicio</a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/examples/sign-in.js"></script>
    <script src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.min.js"></script>
</body>




            
   
   
