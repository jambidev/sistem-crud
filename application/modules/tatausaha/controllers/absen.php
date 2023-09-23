<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends CI_Controller 
{
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$page=$this->uri->segment(4);
			$limit= $GLOBALS['site_limit_medium']; 
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select a.nama, b.id_absen, b.nis, b.tgl, b.absen from tabel_siswa as a join tabel_absen as b on a.nis=b.nis where b.id_absen order by b.id_absen DESC");
			$config['base_url'] = base_url() . 'tatausaha/absen/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['absensi'] = $this->db->query("select a.nama, b.id_absen, b.nis, b.tgl, b.absen from tabel_siswa as a join tabel_absen as b on a.nis=b.nis where b.id_absen order by b.id_absen DESC LIMIT ".$offset.",".$limit.""); 
			$this->load->view('template_header');
			$this->load->view('absen/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function add()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['id_param'] = "";
			$d['nis'] = $this->db->get('tabel_siswa');
			$d['tgl'] = "";
			$d['absen'] = "";
			$d['stts'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('absen/add',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function save()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$this->form_validation->set_rules('nis', 'NIS', 'trim|required');
			$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
			$this->form_validation->set_rules('absen', 'Absen', 'trim|required');
			
			$id['id_absen'] = $this->input->post("id_param");

			if ($this->form_validation->run() == FALSE)
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$q = $this->db->get_where("tabel_guru",$id);
					$d = array();
						foreach($q->result() as $f)
							{
								$d['id_param'] = $f->id_guru;
								$d['nip'] = $f->nip;
								$d['nama'] = $f->nama;
								$d['jenis_kelamin'] = $f->jenis_kelamin;
								$d['agama'] = $f->agama;
								$d['tempat_lahir'] = $f->tempat_lahir;
								$d['tanggal_lahir'] = $f->tanggal_lahir;
								$d['alamat_lengkap'] = $f->alamat_lengkap;
							}
					$d['stts'] = "Edit";
					$this->load->view('template_header');
					$this->load->view('guru/add',$d);
				}
				else if($stts=="Tambah")
				{
					$d['id_param'] = "";
					$d['nis'] = $this->db->get('tabel_siswa');
					$d['tgl'] = "";
					$d['absen'] = "";
					$d['stts'] = $stts;
					$this->load->view('template_header');
					$this->load->view('absen/add',$d);
				}
			}
			else
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$u['nis'] = $this->input->post("nis");
					$u['tgl'] = $this->input->post("tgl");
					$u['absen'] = $this->input->post("absen");
					$this->db->update("tabel_absen",$u,$id);
					header('location:'.base_url().'tatausaha/absen');
				}
				else if($stts=="Tambah")
				{
					$tahun = $this->app_model->get_active_tahun()->row();
					$id_tahun = $tahun->id_tahun;
					$in['nis'] = $this->input->post("nis");
					$in['tgl'] = $this->input->post("tgl");
					$in['absen'] = $this->input->post("absen");
					$in['id_tahun'] = $id_tahun;
					$this->db->insert("tabel_absen",$in);
					header('location:'.base_url().'tatausaha/absen');
				}
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	/*public function edit()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$id['id_absen'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_absen",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_absen;
				$d['nis'] = $f->nis;
				$d['tgl'] = $f->tgl;
				$d['absen'] = $f->absen;
			}
			$d['stts'] = "Edit";
			$d['nis'] = $this->db->get('tabel_siswa');
			$this->load->view('template_header');
			$this->load->view('absen/add',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}*/

	/*public function delete()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$id['id_absen'] = $this->uri->segment(4);
			$this->db->delete("tabel_absen",$id);
			header('location:'.base_url().'tatausaha/absen');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}*/

	public function detail()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$id['id_guru'] = $this->uri->segment(3);
			$q = $this->db->get_where("tabel_guru",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_guru;
				$d['nip'] = $f->nip;
				$d['nama'] = $f->nama;
				$d['jenis_kelamin'] = $f->jenis_kelamin;
				$d['agama'] = $f->agama;
				$d['tempat_lahir'] = $f->tempat_lahir;
				$d['tanggal_lahir'] = $f->tanggal_lahir;
				$d['alamat_lengkap'] = $f->alamat_lengkap;
			}
			$d['stts'] = "Edit";
			$this->load->view('template_header');
			$this->load->view('guru/detail',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function search()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			if($this->input->post("cari")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("cari");
				$this->session->set_userdata($sess_data);
				$kata = $this->session->userdata('kata');
			}
			
			$page=$this->uri->segment(4);
			$limit= $GLOBALS['site_limit_medium']; 
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select a.nama, b.id_absen, b.nis, b.tgl, b.absen from tabel_siswa as a join tabel_absen as b on a.nis=b.nis where a.nama  like '%".$kata."%'  order by b.id_absen DESC");
			$config['base_url'] = base_url() . 'absen/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['absensi'] = $this->db->query("select a.nama, b.id_absen, b.nis, b.tgl, b.absen from tabel_siswa as a join tabel_absen as b on a.nis=b.nis where a.nama like '%".$kata."%' order by b.id_absen DESC LIMIT ".$offset.",".$limit.""); 
			$this->load->view('template_header');
			$this->load->view('absen/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cetak()
	{
			$this->load->view('guru/print');
	}
}