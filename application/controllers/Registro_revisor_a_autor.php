<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_revisor_a_autor extends MY_Controller {

  function __construct()
	{
		parent::__construct();
    $this->load->helper('form');
    $this->load->model('Model_for_login');
    $this->load->model('Model_registro');
    $this->load->model('Info_revisor_model');
	}
  public function index()
	{
    $this->load->view('include/head');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('dept', 'Departamento', 'required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('comentario', 'Comentario', 'max_length[1000]');

    $this->form_validation->set_message('alpha', lang("fv_solo letras"));
    $this->form_validation->set_message('required', lang("fv_debes ingresar el campo"));
    $this->form_validation->set_message('numeric', lang("fv_solo numeros"));
    $this->form_validation->set_message('min_length', lang("fv_minimo caracteres"));
    $this->form_validation->set_message('max_length', lang("fv_maximo caracteres"));
    $this->form_validation->set_message('valid_email', lang("fv_formato valido"));
    $this->form_validation->set_message('matches', lang("fv_igual en ambos campos"));

    if ($this->form_validation->run() == FALSE) {
      $var_test = $this->input->post('dept');
      if (isset($var_test))
      {
        echo '<script type="text/javascript">';
			  echo 'setTimeout(function () { swal("Datos incorrectos","Ingrese todos los campos en el formato requerido","info");';
			  echo '}, 350);</script>';
      }
      $this->load->view('view_registro_revisor_a_autor');
      $this->load->view('include/footer');
    }
    else
    {
      $user_data = $this->session->userdata('userdata');

      $revisor_info = $this->Info_revisor_model->obtener_informacion_revisor($user_data['email_usuario']);

      if ($revisor_info)
      {
        $formulario['nombre'] = $revisor_info->nombre;
        $formulario['apellido_1'] = $revisor_info->apellido_1;
        $formulario['apellido_2'] = $revisor_info->apellido_2;
        $formulario['titulo_academico'] = $revisor_info->titulo_academico;
        $formulario['organizacion'] = $revisor_info->organizacion;
        $formulario['departamento'] = $this->input->post('dept');
        $formulario['telefono'] = $revisor_info->telefono;
        $formulario['pais'] = $this->input->post('pais');
        $formulario['biografia'] = $revisor_info->biografia;
        $formulario['comentario'] = $this->input->post('comentario');
        $formulario['email'] = $revisor_info->email;


        $existe_revisor = $this->Info_revisor_model->get_existe_revisor_como_autor($formulario['email']);

        $estado = false;
        if ($existe_revisor == true)
        {
          echo '<script type="text/javascript">';
          echo 'setTimeout(function () { swal("Ya tienes cuenta como autor","Tu correo ya esta registrado en nuestra plataforma","warning");';
          echo '}, 350);</script>';

          $this->load->view('view_registro_revisor_a_autor', $data);
          $this->load->view('include/footer');
        }
        else
        {
          $this->Model_registro->ingresar_autor($formulario);

          // Actualizacion
            $estado = $this->Model_registro->actualizar_revisor_agregando_autor($formulario['email']);
      }
      // Estado
      if ($estado == true)
      {

                        $subject = "Registro Autor Revista UCM";
                        $mensaje = '<html>'.
                                        '<body><h4>Hola <br><br>Te has registrado como autor en la revista UCM. Ahora puedes publicar articulos en la plataforma y ser parte del cuerpo investigador de la UCM.</h4><br>'.
                                        '</body>'.
                                    '</html>';
                        $mensaje.= "<b>Saludos</br><br>";
                        $mensaje.= "<b>Equipo Revista UCM</b><br>";
                        $headers = "From: RevistaUCM@ucm.cl \r\n";
                        $headers.= 'Bcc: servicios.intech@gmail.com'."\r\n";
                        $headers.= 'Content-type: text/html; charset=utf-8' . "\r\n";

                        mail($formulario['email'], $subject, $mensaje, $headers);


        $aviso = array('title' => '¡Registrado como autor!',
            'text' => 'Ahora ya puedes acceder, como autor, a nuestra plataforma.',
            'tipoaviso' => 'success',
            'windowlocation' => base_url() . "index.php/Login/login"
        );
        $this->load->view('include/aviso', $aviso);
        $this->load->view('include/footer_esencial');
      }

    }

	}
  }

}
