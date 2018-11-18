<?php 
class Kasir_model extends CI_Model {
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

	public function get_autocomplete($search_data)
        {
                $this->db->select('*');
                $this->db->like('barcode', $search_data);
                 $this->db->or_like('nama_barang', $search_data);
                return $this->db->get('tbl_barang', 10)->result();
        }

	
}