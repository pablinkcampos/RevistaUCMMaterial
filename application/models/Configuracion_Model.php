<?php

class Configuracion_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set("America/Santiago");
    }


    function insert_configuracion($form) {
        $query = $this->db->insert('configuracion', $form);

        $rows = $this->db->affected_rows();

        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

   

    function consulta_ultima_configuracion() {
        $query = $this->db->query("SELECT * FROM configuracion order by id_configuracion desc limit 1");

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function info_final_magazine($id) {
        $query = $this->db->query("SELECT titulo, pagina_inicio, pagina_fin, file_papper FROM final_magazine WHERE id_articulo = ?", array($id));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function obtener_arhivo($id) {
        $query = $this->db->query("SELECT archivo FROM revista WHERE ID = ?", array($id));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function actualizar_a_respondido($form, $id_articulo) {
        $this->db->where('ID', $id_articulo);
        $this->db->update('revista', $form);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function obtener_magazine_titulo() {
        $query = $this->db->query("SELECT * FROM magazines");

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function obtener_magazine_info($id) {
        $query = $this->db->query("SELECT * FROM magazines WHERE ID = ?", array($id));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function count_magaziness($id) {
        $query = $this->db->query("SELECT COUNT(*) as cantidad FROM final_magazine WHERE ID_magazine = ?", array($id));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function obtener_info_articulo2($ID) {
        $query = $this->db->query("SELECT * FROM revista WHERE ID = ?", array($ID));
        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function get_pagina_ini($id) {
        $query = $this->db->query("SELECT pagina_inicio FROM final_magazine WHERE ID_articulo = ?", array($id));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function get_pagina_fin($id) {
        $query = $this->db->query("SELECT pagina_fin FROM final_magazine WHERE ID_articulo = ?", array($id));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function get_fecha_last($id) {
        $query = $this->db->query("SELECT fecha_ultima_upd FROM revista WHERE ID = ?", array($id));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function get_8() {
        $query = $this->db->query("SELECT * FROM final_magazine WHERE ID_magazine = 9999 ORDER BY pagina_inicio");

        $result = $query->result();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function in_rev($data) {
        $query = $this->db->insert('magazines', $data);

        $rows = $this->db->affected_rows();

        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function count_obtener_articulos_listos2() {
        $query = $this->db->query("SELECT COUNT(*) as cantidad FROM final_magazine WHERE ID_magazine = 9999");

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function obtener_articulos_limit_listos2($start, $content_per_page) {
        $query = $this->db->query("SELECT * FROM final_magazine WHERE ID_magazine = 9999");

        if ($query->num_rows() > 0) {
            $resultado = $query->result();
            $data_row = array_slice($resultado, $start, $content_per_page);

            return $data_row;
        } else {
            return false;
        }
    }

    function up_art($id, $form) {

        $this->db->where('ID', $id);
        $this->db->update('final_magazine', $form);

        $rows = $this->db->affected_rows();

        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_id_rev($a, $b) {
        $query = $this->db->query("SELECT ID FROM magazines WHERE titulo_revista = ? and fecha_publicacion = ?", array($a, $b));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function drop_final_magazine($id) {
        $this->db->query("DELETE FROM final_magazine WHERE final_magazine.ID_articulo = ?", array($id));
    }

    function inf_final_magazine($id) {
        $query = $this->db->query("SELECT titulo, autor_1, autor_2, autor_3, autor_4 FROM final_magazine WHERE id_articulo = ?", array($id));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function get_id_revista_final($id) {
        $query = $this->db->query("SELECT ID_articulo FROM final_magazine WHERE ID = ?", array($id));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function upd_contenido($id, $form) {
        $this->db->where('contenido', $id);
        $this->db->update('contenidos', $form);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar_revista($datos)
    {
      $query = $this->db->query("UPDATE magazines SET titulo_revista = ?, fecha_publicacion = ?, palabras_editor = ?  WHERE ID = ?", array($datos['titulo'], $datos['fecha'], $datos['palabras'], $datos['ID']));

      if ($this->db->affected_rows() > 0) {
          return true;
      } else {
          return false;
      }
    }

    function get_mail_hash($hash) {
        $query = $this->db->query("SELECT login.correo FROM login WHERE md5(CONCAT(login.correo, 'ox')) = ?", array($hash));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }


}
