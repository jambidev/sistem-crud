<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller 
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
			$tot_hal = $this->db->query("select a.nama_jenjang, b.nama_kelas, b.id_kelas from tabel_jenjang as a join tabel_kelas as b on a.id_jenjang=b.id_jenjang where b.id_kelas");
			$config['base_url'] = base_url() . 'tatausaha/kelas/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			//$d['guru'] = $this->mguru->get_guru($limit,$offset);  
			$d['kelas'] = $this->db->query("select a.nama_jenjang, b.nama_kelas, b.id_kelas from tabel_jenjang as a join tabel_kelas as b on a.id_jenjang=b.id_jenjang where b.id_kelas LIMIT ".$offset.",".$limit."");
			$this->load->view('template_header');
			$this->load->view('kelas/home',$d);
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
			$d['nama_kelas'] = "";
			$d['jenjang'] = $this->db->get('tabel_jenjang');
			$d['stts'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('kelas/add',$d);
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
			$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required');
			$this->form_validation->set_rules('id_jenjang', 'Nama Jenjang', 'trim|required');
			$id['id_kelas'] = $this->input->post("id_param");

			if ($this->form_validation->run() == FALSE)
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$q = $this->db->get_where("tabel_kelas",$id);
					$d = array();
						foreach($q->result() as $f)
							{
								$d['id_param'] = $f->id_kelas;
								$d['nama_kelas'] = $f->nama_kelas;
								$d['id_jenjang'] = $f->id_jenjang;
								
							}
					$d['stts'] = "Edit";
					$d['jenjang'] = $this->db->get('tabel_jenjang');
					$this->load->view('template_header');
					$this->load->view('kelas/add',$d);
				}
				else if($stts=="Tambah")
				{
								$d['id_param'] = "";
								$d['nama_kelas'] = "";
								$d['jenjang'] = $this->db->get('tabel_jenjang');
				}				
					$d['stts'] = $stts;
					$this->load->view('template_header');
					$this->load->view('kelas/add',$d);
			}
			else
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$u['nama_kelas'] = $this->input->post("nama_kelas");
					$u['id_jenjang'] = $this->input->post("id_jenjang");
					$this->db->update("tabel_kelas",$u,$id);
					header('location:'.base_url().'tatausaha/kelas');
				}
				else if($stts=="Tambah")
				{
					$in['id_kelas'] = $this->input->post("id_kelas");
					$in['nama_kelas'] = $this->input->post("nama_kelas");
					$in['id_jenjang'] = $this->input->post("id_jenjang");
					$this->db->insert("tabel_kelas",$in);
					header('location:'.base_url().'tatausaha/kelas');
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
			$d['credit'] = $this->config->item('credit_aplikasi');
			$id['id_kelas'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_kelas",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_kelas;
				$d['nama_kelas'] = $f->nama_kelas;
				$d['id_jenjang'] = $f->id_jenjang;
			}
			$d['stts'] = "Edit";
			$d['jenjang'] = $this->db->get('tabel_jenjang');
			$this->load->view('template_header');
			$this->load->view('kelas/add',$d);
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
			$id['id_kelas'] = $this->uri->segment(4);
			$this->db->delete("tabel_kelas",$id);
			header('location:'.base_url().'tatausaha/kelas');
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
			$d['credit'] = $this->config->item('credit_aplikasi');
			$id['id_kelas'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_kelas",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_kelas;
				$d['nama_kelas'] = $f->nama_kelas;
			}
			$d['stts'] = "Edit";
			$this->load->view('template_header');
			$this->load->view('kelas/detail',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}