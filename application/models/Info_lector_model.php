<?php

class Info_revisor_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function obtener_informacion_lector($email)
    {
      $this->db->select('*');
      $this->db->from('lector');
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

    function get_existe_lector_como_autor($correo_autor)
    {
      $query = $this->db->query("SELECT correo from login WHERE correo = ? AND rol_fk = 2 AND rol2_fk = 3", array($correo_autor));

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
