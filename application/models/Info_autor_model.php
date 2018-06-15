<?php

class Info_autor_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function obtener_informacion_autor($email)
    {
      $this->db->select('*');
      $this->db->from('usuario');
      $this->db->where('email', $email);

      $query = $this->db->get();

      $result = $query->row();

      if ($result)
      {
          return $result;
      }
      else
      {
          return false;
      }
    }

    function get_existe_autor_como_revisor($correo_autor)
    {
      $query = $this->db->query("SELECT correo from login WHERE correo = ? AND rol_fk = 3 AND rol2_fk = 2", array($correo_autor));

      if ($query->num_rows() > 0)
      {
          return true;
      }
      else
      {
          return false;
      }
    }
}
