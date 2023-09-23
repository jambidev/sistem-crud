<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenjang extends CI_Controller 
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
			$tot_hal = $this->db->get("tabel_jenjang");
			$config['base_url'] = base_url() . 'jenjang/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['jenjang'] = $this->db->get("tabel_jenjang",$limit,$offset);
			$this->load->view('template_header');
			$this->load->view('jenjang/home',$d);
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
			$d['nama_jenjang'] = "";
			$d['stts'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('jenjang/add',$d);
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
			$this->form_validation->set_rules('nama_jenjang', 'Nama Jenjang Pendidikan', 'trim|required');
			
			$id['id_jenjang'] = $this->input->post("id_param");

			if ($this->form_validation->run() == FALSE)
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$q = $this->db->get_where("tabel_jenjang",$id);
					$d = array();
						foreach($q->result() as $f)
							{
								$d['id_param'] = $f->id_jenjang;
								$d['nama_jenjang'] = $f->nama_jenjang;
							}
					$d['stts'] = $stts;
					$this->load->view('template_header');
					$this->load->view('jenjang/add',$d);
				}
				else if($stts=="Tambah")
				{
					$d['id_param'] = "";
					$d['nama_jenjang'] = $this->input->post("nama_jenjang");
					$d['stts'] = $stts;
					$this->load->view('template_header');
					$this->load->view('jenjang/add',$d);
				}
			}
			else
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$ceknama['nama_jenjang'] = $this->input->post("nama_jenjang");
					$cek = $this->db->get_where('tabel_jenjang', $ceknama);
					$q = $this->db->get_where("tabel_jenjang",$id);
					$d = array();
					foreach($q->result() as $f)
					if($cek->num_rows()>0)
					{
						$d['id_param'] = $f->id_jenjang;
						$d['nama_jenjang'] = $f->nama_jenjang;
						$d['stts'] = $stts;
						?><script>alert("Nama Jenjang Pendidikan Sudah ada");</script><?php
						$this->load->view('template_header');
						$this->load->view('jenjang/add',$d);
					}
					else
					{
						$u['nama_jenjang'] = $this->input->post("nama_jenjang");
						$this->db->update("tabel_jenjang",$u,$id);
						header('location:'.base_url().'tatausaha/jenjang');
					}
				}
				else if($stts=="Tambah")
				{
					$ceknama['nama_jenjang'] = $this->input->post("nama_jenjang");
					$cek = $this->db->get_where('tabel_jenjang', $ceknama);
					if($cek->num_rows()>0)
					{
						$d['nama_jenjang'] = "";
						$d['id_param'] = "";
						$d['stts'] = $stts;
						?><script>alert("Nama Jenjang Pendidikan Sudah ada");</script><?php
						$this->load->view('template_header');
						$this->load->view('jenjang/add',$d);
					}
					else
					{
						$in['nama_jenjang'] = $this->input->post("nama_jenjang");
						$this->db->insert("tabel_jenjang",$in);
						header('location:'.base_url().'tatausaha/jenjang');
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
			$id['id_jenjang'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_jenjang",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_jenjang;
				$d['nama_jenjang'] = $f->nama_jenjang;
			}
			$d['stts'] = "Edit";
			$this->load->view('template_header');
			$this->load->view('jenjang/add',$d);
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
			$id['id_jenjang'] = $this->uri->segment(4);
			$this->db->delete("tabel_jenjang",$id);
			header('location:'.base_url().'tatausaha/jenjang');
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
			$id['id_jenjang'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_jenjang",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_jenjang;
				$d['nama_jenjang'] = $f->nama_jenjang;
			}
			$d['stts'] = "Edit";
			$this->load->view('template_header');
			$this->load->view('jenjang/detail',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}