<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_autor_a_revisor extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Model_for_login');
        $this->load->model('Model_registro');
        $this->load->model('Info_autor_model');
    }

    public function index() {
        $this->load->view('include/head');
        $q = $this->Model_for_login->get_areas();
        $i = 0;
        $mensaje_error = "Seleccionado";
        $data['mensaje_error'] = $mensaje_error;
        $not_valid = 0;
        if ($q) {

            foreach ($q->result() as $row) {
                if ($this->input->post('c' . $row->id_campo)) {
                    $i++;
                }
            }

            $var_set = $this->input->post('press');
            $seteado = isset($var_set);

            if ($i == 0 && $seteado == 1) {
                $not_valid = 1;
                $mensaje_error = lang("fv_seleccionar areas de especialidad");
                $data['mensaje_error'] = $mensaje_error;
            }
        }

        if ($not_valid == 1) {
            $this->load->view('view_registro_autor_a_revisor', $data);
            $this->load->view('include/footer');
        } else {
            if ($i > 0) {
                $user_data = $this->session->userdata('userdata');

                $autor_info = $this->Info_autor_model->obtener_informacion_autor($user_data['email_usuario']);

                if ($autor_info) {
                    $formulario['nombre'] = $autor_info->nombre;
                    $formulario['apellido_1'] = $autor_info->apellido_1;
                    $formulario['apellido_2'] = $autor_info->apellido_2;
                    $formulario['titulo_academico'] = $autor_info->titulo_academico;
                    $formulario['organizacion'] = $autor_info->organizacion;
                    $formulario['telefono'] = $autor_info->telefono;
                    $formulario['biografia'] = $autor_info->biografia;
                    $formulario['email'] = $autor_info->email;

                    $existe_revisor = $this->Info_autor_model->get_existe_autor_como_revisor($formulario['email']);
                    $estado = false;
                    if ($existe_revisor == true) {
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { swal("Ya tienes cuenta como revisor","Tu correo ya esta registrado en nuestra plataforma","warning");';
                        echo '}, 450);</script>';

                        $this->load->view('view_registro_autor_a_revisor', $data);
                        $this->load->view('include/footer');
                    } else {
                        $this->Model_registro->ingresar_revisor($formulario);


                        $consulta = $this->Model_for_login->get_areas();
                        if ($consulta) {
                            $id_revisor = $this->Model_registro->get_id_revisor($formulario['email']);

                            foreach ($consulta->result() as $row) {
                                if ($this->input->post('c' . $row->id_campo)) {
                                    $d['id_campo'] = $row->id_campo;
                                    $d['id_revisor'] = $id_revisor->ID;

                                    $this->Model_registro->ingresar_nuevo_campo_revisor($d);
                                }
                            }
                        }

                        // Actualizaci
                        $estado = $this->Model_registro->actualizar_autor_agregando_revisor($formulario['email']);
                    }
                    if ($estado == true) {

                        $subject = "Registro Revisor Revista UCM";
                        $mensaje = '<html>' .
                                '<body><h4>Hola <br><br>Te has registrado en la revista UCM como revisor. El editor de la Revista UCM debe aprobar tu solicitud. Te informaremos de ello.</h4><br>' .
                                '</body>' .
                                '</html>';
                        $mensaje .= "<b>Saludos</br><br>";
                        $mensaje .= "<b>Equipo Revista UCM</b><br>";
                        $headers = "From: RevistaUCM@ucm.cl \r\n";
                        $headers .= 'Bcc: servicios.intech@gmail.com' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                        mail($formulario['email'], $subject, $mensaje, $headers);

                        $aviso = array('title' => '¡Solicitud Recibida!',
                            'text' => 'Debes esperar la aprobación del Editor de la Revista UCM.',
                            'tipoaviso' => 'info',
                            'windowlocation' => base_url() . "index.php/Login/login"
                        );
                        $this->load->view('include/aviso', $aviso);
                        $this->load->view('include/footer_esencial');
                    }
                }
            } else {
                $this->load->view('include/head');
                $this->load->view('view_registro_autor_a_revisor', $data);
                $this->load->view('include/footer');
            }
        }
    }

}
