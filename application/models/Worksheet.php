<?php

class Worksheet extends CI_Model{
    public function getAll(){
        return $this->db->order_by('POSITION_WS', 'asc')->get("v_worksheet")->result();
    }
    public function get($param){
        return $this->db->where('ID_WS', $param['ID_WS'])->get("v_worksheet")->row();
    }
    public function get_detail($param){
        return $this->db->where('ID_WS', $param['ID_WS'])->get("worksheet_detail")->result();
    }
    public function insert($param){
        $this->db->insert('worksheet', $param);
    }
    public function insert_detail($param){
        $this->db->insert('worksheet_detail', $param);
        return $this->db->insert_id();
    }
    public function update($param){
        $this->db->where('ID_WS', $param['ID_WS'])->update('worksheet', $param);
    }
    public function checkPosition($param){
        return $this->db->query("
            SELECT * FROM worksheet WHERE POSITION_WS = '".$param['POSITION_WS']."' AND deleted_at IS NULL
        ")->row();
    }
}