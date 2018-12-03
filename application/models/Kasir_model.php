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
                 $this->db->where('stok<=','0');
                return $this->db->get('tbl_barang', 10)->result();
        }
    public function gettransaksi(){
    	$this->db->select('sum(harga_jual)as total, tanggal,tbl_transaksi.id_transaksi,nama_pembeli,count(id_detail_tr) as jumlah_item,bayar');
		$this->db->from('tbl_transaksi');
		$this->db->join('tbl_detail_transaksi','tbl_detail_transaksi.id_transaksi= tbl_transaksi.id_transaksi');
		$this->db->group_by('tbl_transaksi.id_transaksi'); 
		$this->db->where('id_kasir=',$_SESSION['login']['id_user']);
		$this->db->where('status=',1);
		$this->db->order_by("tanggal", "ASC");
		$query = $this->db->get();
		return $query->result();
    }

    public function getlaporantrxdetail($id_transaksi){
		$query = $this->db->query("SELECT * FROM tbl_detail_transaksi JOIN tbl_barang ON tbl_detail_transaksi.id_barang=tbl_barang.id_barang WHERE id_transaksi='".$id_transaksi."'");
		return $query->result();
	}

	public function getdetailtrx($id_transaksi){
		$query = $this->db->query("SELECT sum(tbl_detail_transaksi.harga_jual) as total,tbl_transaksi.id_transaksi,tbl_transaksi.nama_pembeli, tbl_transaksi.tanggal,nama_user,no_telpon,bayar FROM tbl_transaksi JOIN tbl_detail_transaksi ON tbl_detail_transaksi.id_transaksi=tbl_transaksi.id_transaksi JOIN tbl_user ON tbl_user.id_user=tbl_transaksi.id_kasir WHERE tbl_transaksi.id_transaksi='".$id_transaksi."' AND tbl_transaksi.id_kasir='".$_SESSION['login']['id_user']."' GROUP BY tbl_transaksi.id_transaksi");
		return $query->row();
	}

	
}