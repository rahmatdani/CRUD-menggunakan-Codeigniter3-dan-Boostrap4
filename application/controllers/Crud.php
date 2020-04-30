<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function index()
	{

		if($this->input->post('submit')){
			$data['cari'] = $this->input->post('cari');
			$this->session->set_userdata('cari',$data['cari']);
		} else {
			$data['cari'] = $this->session->userdata('cari');
		}
		//config pagination
		$this->db->like('nama', $data['cari']); //mencari berdasarkan nama
		$this->db->or_like('alamat', $data['cari']); //mencari berdasarkan alamat
		$this->db->from('mahasiswa');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 12;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['mahasiswa'] = $this->M_crud->menampilkan_sebagian_data($config['per_page'], $data['start'], $data['cari'])->result();
		$this->load->view('User/Header');
		$this->load->view('V_index',$data);
		$this->load->view('User/Footer');
	}

	public function daftar()
	{
		$this->load->view('User/Header');
		$this->load->view('V_input');
		$this->load->view('User/Footer');
	}

	public function daftar_aksi()
	{
		#memvalidasi inputan dari form input
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');

		#mengecek apakah sudah vaid atau tidak
		if($this->form_validation->run() == FALSE ){
			$this->daftar();
		} else {
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$no_hp = $this->input->post('no_hp');

		#data di masukkan dalam array
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'no_hp' => $no_hp
		);

		#data di masukkan ke table mahasiswa
		$this->M_crud->masukkan_data($data,'mahasiswa');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Sukses Mendaftar!</strong> Terima kasih
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			');
		redirect('Crud');
		}
	}

	public function ubah_data($id)
	{
		$where = array('id_mhs' => $id);
		$data['mahasiswa'] = $this->db->query("SELECT * FROM mahasiswa WHERE id_mhs='$id'")->result();
		$this->load->view('User/Header');
		$this->load->view('V_edit',$data);
		$this->load->view('User/Footer');
	}

	public function ubah_data_aksi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'required');

		if($this->form_validation->run() == FALSE ){
			redirect('ubah_data');
		} else {
			$id_mhs = $this->input->post('id_mhs');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$no_hp = $this->input->post('no_hp');

			$data = array(
				'nama' => $nama,
				'alamat' => $alamat,
				'no_hp' => $no_hp
			);

			$where = array('id_mhs' => $id_mhs);

			$this->M_crud->ubah_data('mahasiswa',$data,$where);
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Sukses mengedit</strong> Terima kasih
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				');
			redirect('crud');
		}
	}

	public function hapus_data_aksi($id)
	{
		$where = array('id_mhs' => $id);
		$this->M_crud->hapus_data($where,'mahasiswa');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Data berhasil Dihapus
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			');
		redirect('Crud');
	}

	


}

/* End of file Crud.php */
/* Location: ./application/controllers/Crud.php */