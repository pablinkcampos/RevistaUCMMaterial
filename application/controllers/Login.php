<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_for_login');
        $this->load->model('Articulo_Model');
    }

    public function index() {
        
        $this->Articulo_Model->actualizar_articulos_timeout__aceptado_con_comentarios_y_sin_modificar_obligatorio();

        $user_data = $this->session->userdata('userdata');

        if (($user_data['email_usuario'])) {
            if ($user_data["id_rol"] == 1) {
                redirect('index.php/System/editor', 'refresh');
            } elseif ($user_data["id_rol"] == 2) {
                redirect('index.php/System/revisor', 'refresh');
            } elseif ($user_data["id_rol"] == 3) {
                redirect('index.php/System/autor', 'refresh');
            }
        } else {
            $this->load->view('include/head');
            $this->load->view('include/header_principal');
            $this->load->view('view_home_principal');
            $this->load->view('include/footer');
        }
    }

    public function cambiar_pass() {
      $this->load->view('include/head');

      $user_data = $this->session->userdata('userdata');

      $pass1 = $this->input->post('login-form-pass');
      $pass2 = $this->input->post('login-form-password');

      if ($pass1 != '' && $pass2 != '')
      {
        $resultado = $this->Model_for_login->modify_password($user_data["email_usuario"], $pass2);
      }
      else
      {
        $resultado = false;
      }

      if ($resultado)
      {
        $title = "¡Contraseña cambiada!";
        $text = "Ahora puedes acceder con tu nueva password.";

        $aviso = array('title' => $title,
            'text' => $text,
            'tipoaviso' => 'success',
            'windowlocation' => base_url() . "index.php/"
        );
        $this->load->view('include/aviso', $aviso);
        $this->load->view('include/footer_esencial');
      }
      else
      {
        $title = "Contraseña conservada";
        $text = "Tu actual password no ha sido modificada.";

        $aviso = array('title' => $title,
            'text' => $text,
            'tipoaviso' => 'info',
            'windowlocation' => base_url() . "index.php/"
        );
        $this->load->view('include/aviso', $aviso);
        $this->load->view('include/footer_esencial');
      }
    }
    public function ingresar() {
        if ($this->input->post('login-form-username')) {
            $usuario = $this->input->post('login-form-username');
            $contrasena = sha1($this->input->post('login-form-password') . '4b8519cf8d0f836b4516f59c1826db9a');

            $verifica = $this->Model_for_login->verificaUsuario($usuario, $contrasena);

            if (!$verifica) {
                $aviso = array('title' => 'Login Incorrecto',
                    'text' => 'Datos de usuario incorrectos',
                    'tipoaviso' => 'error',
                    'windowlocation' => base_url() . "index.php/Login/login"
                );
                $this->load->view('include/aviso', $aviso);
            } else {
                $datasession = array(
                    'email_usuario' => $verifica->correo,
                    'id_rol' => $verifica->rol_fk,
                    'id_rol2' => $verifica->rol2_fk,
                    'id_rol3' => $verifica->rol3_fk,
                    'login_ok' => TRUE,
                );

                // Timer para actualizar el estado
                $articulos = $this->Articulo_Model->articulos();
                if ($articulos) {
                    foreach ($articulos as $row) {
                        if ($row->fecha_timeout !== null) {
                            $now = date('Y-m-d H:i:s');

                            $fecha_timeout = $row->fecha_timeout;
                            $estado = $row->id_estado;
                            if ($estado == 6 && $fecha_timeout < $now) {//caducidad. aceptado con comentarios
                                $datos = array(
                                    'ID' => $row->ID,
                                    'id_estado' => 9
                                );
                                $this->Articulo_Model->actualizar_articulo_estado($datos);
                            }
                            if ($estado == 5 && $fecha_timeout < $now) {
                                $datos = array(
                                    'ID' => $row->ID,
                                    'id_estado' => 7
                                );
                                $this->Articulo_Model->actualizar_articulo_estado($datos);
                            }
                            $this->Articulo_Model->articulos();
                        }
                    }
                }


                $this->session->set_userdata('userdata', $datasession);
                if ($datasession["id_rol"] == 1) {
                    redirect('index.php/System/editor', 'refresh');
                } elseif ($datasession["id_rol"] == 2) {
                    redirect('index.php/System/revisor', 'refresh');
                } elseif ($datasession["id_rol"] == 3) {
                    redirect('index.php/System/autor', 'refresh');
                }


                /* if ($this->Model_for_login->verificaUsuario($usuario, $contrasena)) {  //importante
                  $datos = $this->Model_for_login->verificaUsuario($usuario, $contrasena);
                  if ($datos) {
                  $id_usuario =$datos->id_usuario;
                  $email_usuario = $datos->correo;
                  $id_rol = $datos->rol_fk;
                  $id_rol2 = $datos->rol2_fk;
                  $id_rol3 = $datos->rol3_fk;
                  }
                  $datasession = array(
                  'email_usuario' => $email_usuario,
                  'id_usuario' => $id_usuario,
                  'id_rol' => $id_rol,
                  'id_rol2' => $id_rol2,
                  'id_rol3' => $id_rol3,
                  'login_ok' => TRUE,
                  );

                  $this->session->set_userdata('userdata', $datasession);
                  if ($datasession["id_rol"] == 1) {
                  redirect('index.php/System/editor', 'refresh');
                  } elseif ($datasession["id_rol"] == 2) {
                  redirect('index.php/System/revisor', 'refresh');
                  } elseif ($datasession["id_rol"] == 3) {
                  redirect('index.php/System/autor', 'refresh');
                  }
                  } else {
                  redirect('index.php/Login/login', 'refresh');
                  } */
            }
        }
    }

    function cerrar_sesion() {
        $this->session->unset_userdata('userdata');
        redirect('index.php/');
    }

    function login() {
        $this->load->view('include/head');
        $this->load->view('view_login');
        //$this->load->view('include/footer');
    }

    function pass() {
        $this->load->view('include/head');
        $this->load->view('view_pass');
        //$this->load->view('include/footer');
    }

    function rpass() {
        $this->load->view('include/head');
        $this->load->view('view_rpass');
        //$this->load->view('include/footer');
    }

    function recpass() {
        $correo_ = $this->input->post('login-form-username');
        $existe = $this->Model_for_login->get_existe_usuario($correo_);

        if ($existe == false) {
            $title2 = json_encode("No existe una cuenta asociada al correo", JSON_HEX_TAG);
            $text2 = json_encode("Verifica tu correo, por el momento no hay cuenta asociada al correo ingresado.", JSON_HEX_TAG);
            echo
            "<script type='text/javascript'>
            setTimeout(function () {
              var title = {$title2};
              var text = {$text2};
              swal(title,text, 'error');
            }, 350);
            </script>";
            $this->load->view('include/head');
            $this->load->view('view_rpass');
        } else {
            $num = 'MEF';
            $num .= rand(1000, 999999);

            $formulario_login['correo'] = $correo_;
            $formulario_login['clave'] = sha1($num . '4b8519cf8d0f836b4516f59c1826db9a');

            $estado = $this->Model_for_login->modify_pass($formulario_login);
            if ($estado == true) {
                $subject = "Recuperar Password - Revista UCM";
                $mensaje = '<html>' .
                        '<body><h4>Hola <br><br>Puedes iniciar sesión con la siguiente contraseña:<br><br>' . $num . '<br><br>Recuerda que la puedes cambiar en el Menú.</h4><br>' .
                        '</body>' .
                        '</html>';
                $mensaje .= "<b>Saludos</br><br>";
                $mensaje .= "<b>Equipo Revista UCM</b><br>";
                $headers = "From: RevistaUCM@ucm.cl \r\n";
                $headers .= 'Bcc: servicios.intech@gmail.com' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                mail($correo_, $subject, $mensaje, $headers);

                $aviso = array('title' => "Password temporal enviada",
                    'text' => "Revisa tu correo.",
                    'tipoaviso' => 'success',
                    'windowlocation' => base_url() . "index.php/Login/Login"
                );
                $this->load->view('include/aviso', $aviso);
            } else {
                $title2 = json_encode("Hubo un problema al cambiar tu password", JSON_HEX_TAG);
                $text2 = json_encode("Intenta más tarde.", JSON_HEX_TAG);
                echo
                "<script type='text/javascript'>
                setTimeout(function () {
                  var title = {$title2};
                  var text = {$text2};
                  swal(title,text, 'error');
                }, 350);
                </script>";
                $this->load->view('include/head');
                $this->load->view('view_rpass');
            }
        }
    }

}
