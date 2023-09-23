<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller 
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
			$tot_hal = $this->db->get("tabel_guru");
			$config['base_url'] = base_url() . 'guru/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['guru'] = $this->db->get("tabel_guru",$limit,$offset);

			$this->load->view('template_header');
			$this->load->view('guru/home',$d);
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
			$d['id_param'] = "";
			$d['kode_guru'] = $this->app_model->get_kode_guru();
			$d['nip'] = "";
			$d['nama'] = "";
			$d['jenis_kelamin'] = "";
			$d['agama'] = "";
			$d['tempat_lahir'] = "";
			$d['tanggal_lahir'] = "";
			$d['alamat_lengkap'] = "";
			$d['username'] = "";
			$d['password'] = "";
			$d['stts'] = "guru";
			$d['status'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('guru/add',$d);
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
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('stts', 'Status', 'trim|required');
			$id['id_guru'] = $this->input->post("id_param");

			if ($this->form_validation->run() == FALSE)
			{
				$status = $this->input->post('status');
				if($status=="Edit")
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
								$d['username'] = $f->username;
								$d['password'] = $f->password;
								$d['stts'] = $f->stts;
							}
					$d['status'] = "Edit";
					$this->load->view('template_header');
					$this->load->view('guru/add',$d);
				}
				else if($status=="Tambah")
				{
					$d['id_param'] = "";
					$d['nip'] = $this->input->post("nip");
					$d['nama'] = $this->input->post("nama");
					$d['jenis_kelamin'] = $this->input->post("jenis_kelamin");
					$d['agama'] = $this->input->post("agama");
					$d['tempat_lahir'] = $this->input->post("tempat_lahir");
					$d['tanggal_lahir'] = $this->input->post("tanggal_lahir");
					$d['alamat_lengkap'] = $this->input->post("alamat_lengkap");
					$d['username'] = $this->input->post("username");
					$d['password'] = $this->input->post("password");
					$d['stts'] = "guru";
					$d['status'] = $status;
					$this->load->view('template_header');
					$this->load->view('guru/add',$d);
				}
			}
			else
			{
				$status = $this->input->post('status');
				if($status=="Edit")
				{
					$u['nip'] = $this->input->post("nip");
					$u['nama'] = $this->input->post("nama");
					$u['jenis_kelamin'] = $this->input->post("jenis_kelamin");
					$u['agama'] = $this->input->post("agama");
					$u['tempat_lahir'] = $this->input->post("tempat_lahir");
					$u['tanggal_lahir'] = $this->input->post("tanggal_lahir");
					$u['alamat_lengkap'] = $this->input->post("alamat_lengkap");
					$u['username'] = $this->input->post("username");
					$u['password'] = md5($this->input->post("password").'#$aV(*)L!C4-5i');
					$u['stts'] = $this->input->post("stts");
					$this->db->update("tabel_guru",$u,$id);
					redirect("tatausaha/guru/index");
				}
				else if($status=="Tambah")
				{
					$in['kode_guru'] = $this->input->post("kode_guru");
					$in['nip'] = $this->input->post("nip");
					$in['nama'] = $this->input->post("nama");
					$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
					$in['agama'] = $this->input->post("agama");
					$in['tempat_lahir'] = $this->input->post("tempat_lahir");
					$in['tanggal_lahir'] = $this->input->post("tanggal_lahir");
					$in['alamat_lengkap'] = $this->input->post("alamat_lengkap");
					$in['username'] = $this->input->post("username");
					$in['password'] = md5($this->input->post("password").'#$aV(*)L!C4-5i');
					$in['stts'] = $this->input->post("stts");
					$this->db->insert("tabel_guru",$in);
					header('location:'.base_url().'tatausaha/guru');
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
			
			$id['id_guru'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_guru",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_guru;
				$d['kode_guru'] = $f->kode_guru;
				$d['nip'] = $f->nip;
				$d['nama'] = $f->nama;
				$d['jenis_kelamin'] = $f->jenis_kelamin;
				$d['agama'] = $f->agama;
				$d['tempat_lahir'] = $f->tempat_lahir;
				$d['tanggal_lahir'] = $f->tanggal_lahir;
				$d['alamat_lengkap'] = $f->alamat_lengkap;
				$d['username'] = $f->username;
				$d['password'] = $f->password;
				$d['stts'] =  $f->stts;
			}
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['status'] = "Edit";
			$this->load->view('template_header');
			$this->load->view('guru/add',$d);
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
			$id['id_guru'] = $this->uri->segment(4);
			$this->db->delete("tabel_guru",$id);
			header('location:'.base_url().'tatausaha/guru');
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
			$id['id_guru'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_guru");
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_guru;
				$d['kode_guru'] = $f->kode_guru;
				$d['nip'] = $f->nip;
				$d['nama'] = $f->nama;
				$d['jenis_kelamin'] = $f->jenis_kelamin;
				$d['agama'] = $f->agama;
				$d['tempat_lahir'] = $f->tempat_lahir;
				$d['tanggal_lahir'] = $f->tanggal_lahir;
				$d['alamat_lengkap'] = $f->alamat_lengkap;
				$d['username'] = $f->username;
				$d['password'] = $f->password;
				$d['stts'] =  $f->stts;
			}
			$this->load->view('template_header');
			$this->load->view('tatausaha/guru/detail',$d);
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
			$tot_hal = $this->db->query("select * from tabel_guru where nama like '%".$kata."%' ");
			$config['base_url'] = base_url() . 'guru/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['guru'] = $this->db->query("select * from tabel_guru where nama like '%".$kata."%' limit ".$offset.",".$limit."");
			$this->load->view('template_header');
			$this->load->view('guru/home',$d);
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
	public function aktif()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$id['id_guru'] = $this->uri->segment(4);
			$d=array('stts_guru'=>'1');

			$this->db->update("tabel_guru",$d,$id);
			header('location:'.base_url().'tatausaha/guru');
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
			$id['id_guru'] = $this->uri->segment(4);
			$d=array('stts_guru'=>'0');

			$this->db->update("tabel_guru",$d,$id);
			header('location:'.base_url().'tatausaha/guru');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}