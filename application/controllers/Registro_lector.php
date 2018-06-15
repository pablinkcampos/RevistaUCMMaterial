<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_lector extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Model_for_login');
        $this->load->model('Model_registro');
    }

    public function index() {
        $this->load->view('include/head');
        $data = [];

        $this->load->library('form_validation');

        $q = $this->Model_for_login->get_areas();
        $t = $this->Model_for_login->get_temas();
        $i = 0;
        $mensaje_error = "Seleccionado";
        $data['mensaje_error'] = $mensaje_error;
        $not_valid = 0;

        if ($t) {

            foreach ($t->result() as $row) {
                if ($this->input->post('c' . $row->id_tema)) {
                    $i++;
                }
            }
            $var_set = $this->input->post('nombre');
            $seteado = isset($var_set);

            if ($i == 0 && $seteado) {
                $not_valid = 1;
                $mensaje_error = lang("fv_seleccionar areas de especialidad");
                $data['mensaje_error'] = $mensaje_error;
            }
        }
        

  


            $this->load->view('view_registro_lector', $data);
            $this->load->view('include/footer');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formulario['nombre'] = $this->input->post('nombre');
            $formulario['apellido_1'] = $this->input->post('apellido1');
            $formulario['apellido_2'] = $this->input->post('apellido2');
            $formulario['titulo_academico'] = $this->input->post('titulo');
            $formulario['organizacion'] = $this->input->post('organizacion');
            $formulario['telefono'] = $this->input->post('telefono');
            $formulario['email'] = $this->input->post('correo');

            $existe_lector = $this->Model_registro->get_existe_usuario($formulario['email']);

            $estado = false;
            if ($existe_lector == true) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Ya tienes cuenta","Tu correo ya esta registrado en nuestra plataforma","warning");';
                echo '}, 350);</script>';

               
            } else {
                $this->Model_registro->ingresar_lector($formulario);


                $consulta = $this->Model_for_login->get_temas();
                if ($consulta) {
                    $id_lector = $this->Model_registro->get_id_lector($this->input->post('correo'));

                    foreach ($consulta->result() as $row) {
                        if ($this->input->post('c' . $row->id_tema)) {
                            $d['id_tema'] = $row->id_tema;
                            $d['id_usuario'] = $id_lector->ID;

                            $this->Model_registro->ingresar_nuevo_tema_usuario($d);
                        }
                    }
                }

                // Ingresar lector en login
                $formulario_login['correo'] = $formulario['email'];
                $formulario_login['clave'] = sha1($this->input->post('clave1') . '4b8519cf8d0f836b4516f59c1826db9a');
                $formulario_login['rol_fk'] = 4;
                $estado = $this->Model_registro->ingresar_lector_login($formulario_login);

                if ($estado == true) {

                    $subject = "Registro lector Revista UCM";
                    $mensaje = '<html>' .
                            '<body><h4>Hola <br><br>Te has registrado en la revista UCM como lector.</h4><br>' .
                            '</body>' .
                            '</html>';
                    $mensaje .= "<b>Saludos</br><br>";
                    $mensaje .= "<b>Equipo Revista UCM</b><br>";
                    $headers = "From: RevistaUCM@ucm.cl \r\n";
                    $headers .= 'Bcc: servicios.intech@gmail.com' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                    mail($formulario['email'], $subject, $mensaje, $headers);

                   $aviso = array('title' => '¡Solicitud Recibida!',
                       'text' => 'Seras informado de articulos que te interesen publicados por Revista UCM.',
                       'tipoaviso' => 'info',
                       'windowlocation' => base_url() . "index.php/Login/login"
                   );
                   $this->load->view('include/aviso', $aviso);

                  
                }
            }
        }
    }
}
