<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {

	public function menampilkan_data($table)
	{
		return $this->db->get($table); #mengambil data dari table
	}


	//pagination
	//
	public function menampilkan_sebagian_data($limit, $start, $cari = null)
	{
		if($cari){
			$this->db->like('nama',$cari);
			$this->db->or_like('alamat', $cari);
		}
		return $this->db->get('mahasiswa', $limit, $start);
	}

	public function hitung_data()
	{
		return $this->db->get('mahasiswa')->num_rows();
	}

	public function masukkan_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function ubah_data($table,$data,$where)
	{
		$this->db->update($table,$data,$where);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	

}

/* End of file Model_crud.php */
/* Location: ./application/models/Model_crud.php */