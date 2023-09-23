<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mata_pelajaran extends CI_Controller 
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
			$tot_hal = $this->db->get("tabel_mata_pelajaran");
			$config['base_url'] = base_url() . 'tatausaha/ata_pelajaran/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['mata_pelajaran'] = $this->db->get("tabel_mata_pelajaran",$limit,$offset);
			$this->load->view('template_header');
			$this->load->view('mata_pelajaran/home',$d);
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
			$d['id_mata_pelajaran'] = $this->app_model->get_mata_pelajaran();
			$d['nama_pelajaran'] = "";
			$d['stts'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('mata_pelajaran/add',$d);
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
			$this->form_validation->set_rules('nama_pelajaran', 'Nama Mata Pelajaran', 'trim|required');
			
			$id['id_mata_pelajaran'] = $this->input->post("id_mata_pelajaran");

			if ($this->form_validation->run() == FALSE)
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$q = $this->db->get_where("tabel_mata_pelajaran",$id);
					$d = array();
						foreach($q->result() as $f)
							{
								$d['id_mata_pelajaran'] = $f->id_mata_pelajaran;
								$d['nama_pelajaran'] = $f->nama_pelajaran;
							}
					$d['stts'] = "Edit";
					$this->load->view('template_header');
					$this->load->view('mata_pelajaran/add',$d);
				}
				else if($stts=="Tambah")
				{
								$d['id_mata_pelajaran'] = $this->app_model->get_mata_pelajaran();
								$d['nama_pelajaran'] = "";
					$d['stts'] = $stts;
					$this->load->view('template_header');
					$this->load->view('mata_pelajaran/add',$d);
				}
			}
			else
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$ceknama['nama_pelajaran'] = $this->input->post("nama_pelajaran");
					$cek = $this->db->get_where('tabel_mata_pelajaran', $ceknama);
					$q = $this->db->get_where("tabel_mata_pelajaran",$id);
					$d = array();
					foreach($q->result() as $f)
					if($cek->num_rows()>0)
					{
						$d['nama_pelajaran'] = $f->nama_pelajaran;
						$d['id_mata_pelajaran'] = $this->app_model->get_mata_pelajaran();
						$d['stts'] = $stts;
						?><script>alert("Nama Mata Pelajaran Sudah ada");</script><?php
						//$this->session->set_flashdata('gagal', 'Nama Pelajaran telah terdaftar...!!!');
						$this->load->view('template_header');
						$this->load->view('mata_pelajaran/add',$d);
					}
					else
					{
						$u['id_mata_pelajaran'] = $this->input->post("id_mata_pelajaran");
						$u['nama_pelajaran'] = $this->input->post("nama_pelajaran");
						$this->db->update("tabel_mata_pelajaran",$u,$id);
						header('location:'.base_url().'tatausaha/mata_pelajaran');
					}	
				}
				else if($stts=="Tambah")
				{
					$ceknama['nama_pelajaran'] = $this->input->post("nama_pelajaran");
					$cek = $this->db->get_where('tabel_mata_pelajaran', $ceknama);
					if($cek->num_rows()>0)
					{
						$d['nama_pelajaran'] = "";
						$d['id_mata_pelajaran'] = $this->app_model->get_mata_pelajaran();
						$d['stts'] = $stts;
						?><script>alert("Nama Mata Pelajaran Sudah ada");</script><?php
						$this->load->view('template_header');
						$this->load->view('mata_pelajaran/add',$d);
					}
					else
					{
						$in['id_mata_pelajaran'] = $this->input->post("id_mata_pelajaran");
						$in['nama_pelajaran'] = $this->input->post("nama_pelajaran");
						$this->db->insert("tabel_mata_pelajaran",$in);
						header('location:'.base_url().'tatausaha/mata_pelajaran');
					}
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
			$id['id_mata_pelajaran'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_mata_pelajaran",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_mata_pelajaran;
				$d['id_mata_pelajaran'] = $f->id_mata_pelajaran;
				$d['nama_pelajaran'] = $f->nama_pelajaran;
			}
			$d['stts'] = "Edit";
			$this->load->view('template_header');
			$this->load->view('mata_pelajaran/add',$d);
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
			$id['id_mata_pelajaran'] = $this->uri->segment(4);
			$this->db->delete("tabel_mata_pelajaran",$id);
			header('location:'.base_url().'tatausaha/mata_pelajaran');
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
			$id['id_mata_pelajaran'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_mata_pelajaran",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_mata_pelajaran;
				$d['id_mata_pelajaran'] = $f->id_mata_pelajaran;
				$d['nama_pelajaran'] = $f->nama_pelajaran;
			}
			$d['stts'] = "Edit";
			$this->load->view('template_header');
			$this->load->view('mata_pelajaran/detail',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}