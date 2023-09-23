<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller 
{
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$page=$this->uri->segment(3);
			$limit= $GLOBALS['site_limit_medium']; 
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("tabel_siswa");
			$config['base_url'] = base_url() . 'siswa/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			//$d['guru'] = $this->mguru->get_guru($limit,$offset);  
			$d['siswa'] = $this->db->get("tabel_siswa",$limit,$offset);
			$this->load->view('template_header');
			$this->load->view('siswa/home',$d);
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
			$d['nis'] = "";
			$d['nama'] = "";
			$d['nama_panggilan'] = "";
			$d['jenis_kelamin'] = "";
			$d['agama'] = "";
			$d['tempat_lahir'] = "";
			$d['tanggal_lahir'] = "";
			$d['status_anak'] = "";
			$d['riwayat'] = "";
			$d['asal'] = "";
			$d['alamat_lengkap'] = "";
			$d['kelas'] = $this->db->get('tabel_kelas');
			$d['username'] = "";
			$d['password'] = "";
			$d['stts'] = "siswa";
			$d['status'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('siswa/add',$d);
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
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'trim|required'); 
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
			//$this->form_validation->set_rules('status_anak', 'Status Anak', 'trim|required');
			$this->form_validation->set_rules('riwayat', 'Riwayat', 'trim|required');
			$this->form_validation->set_rules('asal', 'Asal Sekolah', 'trim|required');
			$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			$id['nis'] = $this->input->post("id_param");

			if ($this->form_validation->run() == FALSE)
			{
				$status = $this->input->post('status');
				if($status=="Edit")
				{
					$q = $this->db->get_where("tabel_siswa",$id);
					$d = array();
						foreach($q->result() as $f)
							{
								$d['id_param'] = $f->nis;
								$d['nis'] = $f->nis;
								$d['nama'] = $f->nama;
								$d['nama_panggilan'] = $f->nama_panggilan;
								$d['jenis_kelamin'] = $f->jenis_kelamin;
								$d['agama'] = $f->agama;
								$d['tempat_lahir'] = $f->tempat_lahir;
								$d['tanggal_lahir'] = $f->tanggal_lahir;
								$d['status_anak'] = $f->status_anak;
								$d['riwayat'] = $f->riwayat;
								$d['asal'] = $f->asal;
								$d['alamat_lengkap'] = $f->alamat_lengkap;
								$d['id_kelas'] = $f->id_kelas;
								$d['username'] = $f->username;
								$d['password'] = $f->password;
								$d['stts'] = $f->stts;
							}
					$d['status'] = $status;
					$this->load->view('template_header');
					$this->load->view('siswa/add',$d);
				}
				else if($status=="Tambah")
				{
					$d['id_param'] = "";
					$d['nis'] = $this->input->post("nis");
					$d['nama'] = $this->input->post("nama");
					$d['nama_panggilan'] = $this->input->post("nama_panggilan");
					$d['jenis_kelamin'] = $this->input->post("jenis_kelamin");
					$d['agama'] = $this->input->post("agama");
					$d['tempat_lahir'] = $this->input->post("tempat_lahir");
					$d['tanggal_lahir'] = $this->input->post("tanggal_lahir");
					$d['status_anak'] = $this->input->post("status_anak");
					$d['riwayat'] = $this->input->post("riwayat");
					$d['asal'] = $this->input->post("asal");
					$d['alamat_lengkap'] = $this->input->post("alamat_lengkap");
					$d['kelas'] = $this->db->get('tabel_kelas');
					$d['kelas'] = $this->db->get('tabel_kelas');
					$d['username'] = $this->input->post("username");
					$d['password'] = $this->input->post("password");
					$d['stts'] ="siswa";
					$d['status'] = $status;
					$this->load->view('template_header');
					$this->load->view('siswa/add',$d);
				}
			}
			else
			{
				$status = $this->input->post('status');
				if($status=="Edit")
				{
					$u['nis'] = $this->input->post("nis");
					$u['nama'] = $this->input->post("nama");
					$u['nama_panggilan'] = $this->input->post("nama_panggilan");
					$u['jenis_kelamin'] = $this->input->post("jenis_kelamin");
					$u['agama'] = $this->input->post("agama");
					$u['tempat_lahir'] = $this->input->post("tempat_lahir");
					$u['tanggal_lahir'] = $this->input->post("tanggal_lahir");
					$u['status_anak'] = $this->input->post("status_anak");
					$u['riwayat'] = $this->input->post("riwayat");
					$u['asal'] = $this->input->post("asal");
					$u['alamat_lengkap'] = $this->input->post("alamat_lengkap");
					$u['id_kelas'] = $this->input->post("id_kelas");
					$u['username'] = $this->input->post("username");
					$u['password'] = md5($this->input->post("password").'#$aV(*)L!C4-5i');
					$u['stts'] = $this->input->post("stts");
					$this->db->update("tabel_siswa",$u,$id);
					header('location:'.base_url().'tatausaha/siswa');
				}
				else if($status=="Tambah")
				{
					$in['nis'] = $this->input->post("nis");
					$in['nama'] = $this->input->post("nama");
					$in['nama_panggilan'] = $this->input->post("nama_panggilan");
					$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
					$in['agama'] = $this->input->post("agama");
					$in['tempat_lahir'] = $this->input->post("tempat_lahir");
					$in['tanggal_lahir'] = $this->input->post("tanggal_lahir");
					$in['status_anak'] = $this->input->post("status_anak");
					$in['riwayat'] = $this->input->post("riwayat");
					$in['asal'] = $this->input->post("asal");
					$in['alamat_lengkap'] = $this->input->post("alamat_lengkap");
					$in['id_kelas'] = $this->input->post("id_kelas");
					$in['username'] = $this->input->post("username");
					$in['password'] = md5($this->input->post("password").'#$aV(*)L!C4-5i');
					$in['stts'] = $this->input->post("stts");
					$this->db->insert("tabel_siswa",$in);
					header('location:'.base_url().'tatausaha/siswa');
				}
			
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	public function edit()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			
			$id['nis'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_siswa",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->nis;
				$d['nis'] = $f->nis;
				$d['nama'] = $f->nama;
				$d['nama_panggilan'] =$f->nama_panggilan;
				$d['jenis_kelamin'] = $f->jenis_kelamin;
				$d['agama'] = $f->agama;
				$d['tempat_lahir'] = $f->tempat_lahir;
				$d['tanggal_lahir'] = $f->tanggal_lahir;
				$d['alamat_lengkap'] = $f->alamat_lengkap;
				$d['status_anak'] = $f->status_anak;
				$d['riwayat'] = $f->riwayat;
				$d['asal'] = $f->asal;
				$d['alamat_lengkap'] = $f->alamat_lengkap;
				$d['id_kelas'] = $f->id_kelas;
				$d['username'] = $f->username;
				$d['password'] = $f->password;
				$d['stts'] = $f->stts;
			}
			$d['status'] = "Edit";
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['kelas'] = $this->db->get('tabel_kelas');
			$this->load->view('template_header');
			$this->load->view('siswa/add',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function delete()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$id['nis'] = $this->uri->segment(4);
			$this->db->delete("tabel_siswa",$id);
			header('location:'.base_url().'tatausaha/siswa');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function detail()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			
			$id['nis'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_siswa",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->nis;
				$d['nis'] = $f->nis;
				$d['nama'] = $f->nama;
				$d['jenis_kelamin'] = $f->jenis_kelamin;
				$d['agama'] = $f->agama;
				$d['tempat_lahir'] = $f->tempat_lahir;
				$d['tanggal_lahir'] = $f->tanggal_lahir;
				$d['alamat_lengkap'] = $f->alamat_lengkap;
				$d['id_kelas'] = $f->id_kelas;
				$d['username'] = $f->username;
				$d['password'] = $f->password;
				$d['stts'] = $f->stts;
			}
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['kelas'] = $this->db->get('tabel_kelas');
			$this->load->view('template_header');
			$this->load->view('siswa/detail',$d);
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
			
			$page=$this->uri->segment(3);
			$limit= $GLOBALS['site_limit_medium']; 
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select * from tabel_siswa where nama like '%".$kata."%' ");
			$config['base_url'] = base_url() . 'siswa/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['guru'] = $this->db->query("select * from tabel_siswa where nama like '%".$kata."%' limit ".$offset.",".$limit."");
			$this->load->view('template_header');
			$this->load->view('guru/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function aktif()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$id['nis'] = $this->uri->segment(4);
			$d=array('stts_siswa'=>'1');

			$this->db->update("tabel_siswa",$d,$id);
			header('location:'.base_url().'tatausaha/siswa');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	public function nonaktif()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$id['nis'] = $this->uri->segment(4);
			$d=array('stts_siswa'=>'0');

			$this->db->update("tabel_siswa",$d,$id);
			header('location:'.base_url().'tatausaha/siswa');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}