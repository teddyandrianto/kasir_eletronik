<?php 
class Admin_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function input($tabelName,$data){
        $res = $this->db->insert($tabelName,$data);
        return $res;
    }
	
		public function update($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;
	}

	public function delete($tabelName,$where){
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}

	public function getbarang(){
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->order_by("id_barang", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
}