<?php

class Info_revisor_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function obtener_informacion_revisor($email)
    {
      $this->db->select('*');
      $this->db->from('revisor');
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

    function lista_revisores_por_tema($tema)
    {

        $query = $this->db->query("SELECT rev.ID as ID, CONCAT(rev.nombre,' ',rev.apellido_1,' ',rev.apellido_2) as nombre,rev.titulo_academico as titulo_academico , rev.fk_tema as tema, 
        (SELECT  COUNT(1) as cantidad FROM  revista as r WHERE  (rev.ID = r.id_revisor_1 or rev.ID = r.id_revisor_2 or rev.ID = r.id_revisor_3) AND r.id_estado=3 AND r.VerificacionTexto = 1 ) as cantidad 
        FROM revisor as rev INNER JOIN revisor_tema as rt ON rt.id_revisor = rev.ID WHERE rt.id_tema = ? ORDER by cantidad ASC", array($tema));
        if ($query) {
            return $query;
        } else {
            return false;
        }
     

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
    function get_existe_revisor_como_autor($correo_autor)
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
