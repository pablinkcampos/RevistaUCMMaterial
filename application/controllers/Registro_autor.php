<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_autor extends MY_Controller {

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

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|alpha|max_length[50]');
        $this->form_validation->set_rules('apellido1', 'Apellido paterno', 'required|min_length[2]|max_length[50]|alpha');
        $this->form_validation->set_rules('apellido2', 'Apellido materno', 'required|min_length[2]|max_length[50]|alpha');
        $this->form_validation->set_rules('titulo', 'Titulo profesional', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('organizacion', 'Organización', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('dept', 'Departamento', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('biog', 'Biografía', 'required|min_length[5]|max_length[1000]');
        $this->form_validation->set_rules('comentario', 'Comentario', 'max_length[1000]');
        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'min_length[9]|max_length[12]|required|numeric');
        $this->form_validation->set_rules('clave1', 'Contraseña', 'min_length[4]|max_length[500]|required|matches[clave2]');
        $this->form_validation->set_rules('clave2', 'Reingresar contraseña', 'min_length[4]|max_length[500]|required');

        $this->form_validation->set_message('alpha', lang("fv_solo letras"));
        $this->form_validation->set_message('required', lang("fv_debes ingresar el campo"));
        $this->form_validation->set_message('numeric', lang("fv_solo numeros"));
        $this->form_validation->set_message('min_length', lang("fv_minimo caracteres"));
        $this->form_validation->set_message('max_length', lang("fv_maximo caracteres"));
        $this->form_validation->set_message('valid_email', lang("fv_formato valido"));
        $this->form_validation->set_message('matches', lang("fv_igual en ambos campos"));

        if ($this->form_validation->run() == FALSE) {

            $var_test = $this->input->post('nombre');
            if (isset($var_test)) {
                $title2 = json_encode(lang('tswal_datos incorrectos'), JSON_HEX_TAG);
                $text2 = json_encode(lang('cswal_ingrese todos los campos en el formato requerido'), JSON_HEX_TAG);
                echo
                "<script type='text/javascript'>
            setTimeout(function () {
              var title = {$title2};
              var text = {$text2};
              swal(title,text, 'warning');
            }, 450);
            </script>";
            }
            $this->load->view('view_registro_autor', $data);
            $this->load->view('include/footer');
        } else {
            $formulario['nombre'] = $this->input->post('nombre');
            $formulario['apellido_1'] = $this->input->post('apellido1');
            $formulario['apellido_2'] = $this->input->post('apellido2');
            $formulario['titulo_academico'] = $this->input->post('titulo');
            $formulario['organizacion'] = $this->input->post('organizacion');
            $formulario['departamento'] = $this->input->post('dept');
            $formulario['telefono'] = $this->input->post('telefono');
            $formulario['pais'] = $this->input->post('pais');
            $formulario['biografia'] = $this->input->post('biog');
            $formulario['comentario'] = $this->input->post('comentario');
            $formulario['email'] = $this->input->post('correo');


            $existe_autor = $this->Model_registro->get_existe_usuario($formulario['email']);

            $estado = false;
            if ($existe_autor == true) {
                $title2 = json_encode(lang('tswal_ya tienes cuenta'), JSON_HEX_TAG);
                $text2 = json_encode(lang('cswal_tu correo ya esta registrado en nuestra plataforma'), JSON_HEX_TAG);
                echo
                "<script type='text/javascript'>
            setTimeout(function () {
              var title = {$title2};
              var text = {$text2};
              swal(title,text, 'warning');
            }, 450);
            </script>";

                $this->load->view('view_registro_autor', $data);
                $this->load->view('include/footer');
            } else {
                $this->Model_registro->ingresar_autor($formulario);

                // Ingresar autor en login
                $formulario_login['correo'] = $formulario['email'];
                $formulario_login['clave'] = sha1($this->input->post('clave1') . '4b8519cf8d0f836b4516f59c1826db9a');
                $formulario_login['rol_fk'] = 3;
                $estado = $this->Model_registro->ingresar_autor_login($formulario_login);
            }

            if ($estado == true) {

                $subject = "Registro Revista UCM";
                $mensaje = '<html>' .
                        '<body><h4>Hola <br><br>Te has registrado como autor en la revista UCM. Ahora puedes publicar articulos en la plataforma y ser parte del cuerpo investigador de la UCM.</h4><br>' .
                        '</body>' .
                        '</html>';
                $mensaje .= "<b>Saludos</br><br>";
                $mensaje .= "<b>Equipo Revista UCM</b><br>";
                $headers = "From: RevistaUCM@ucm.cl \r\n";
                $headers .= 'Bcc: servicios.intech@gmail.com' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                mail($formulario['email'], $subject, $mensaje, $headers);


         $aviso = array('title' => '¡Registrado!',
             'text' => 'Ahora ya puedes acceder a nuestra plataforma.',
             'tipoaviso' => 'success',
             'windowlocation' => base_url() . "index.php/Login/login"
         );
         $this->load->view('include/aviso', $aviso);
                $this->load->view('view_color', $data);
                $this->load->view('include/footer_esencial');
            }
        }
    }

}
