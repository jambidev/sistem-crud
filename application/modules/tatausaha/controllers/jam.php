<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jam extends CI_Controller 
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
			$tot_hal = $this->db->get("tabel_jam");
			$config['base_url'] = base_url() . 'jam/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['jam'] = $this->db->get("tabel_jam",$limit,$offset);
			$this->load->view('template_header');
			$this->load->view('jam/home',$d);
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
			$d['jam'] = "";
			$d['stts'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('jam/add',$d);
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
			$this->form_validation->set_rules('jam', 'Jam Pelajaran', 'trim|required');
			
			$id['id_jam'] = $this->input->post("id_param");

			if ($this->form_validation->run() == FALSE)
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$q = $this->db->get_where("tabel_jam",$id);
					$d = array();
						foreach($q->result() as $f)
							{
								$d['id_param'] = $f->id_jam;
								$d['jam'] = $f->jam;
							}
					$d['stts'] = "Edit";
					$this->load->view('template_header');
					$this->load->view('jam/add',$d);
				}
				else if($stts=="Tambah")
				{
								$d['id_param'] = "";
								$d['jam'] = "";
				}				
					$d['stts'] = $stts;
					$this->load->view('template_header');
					$this->load->view('jam/add',$d);
			}
			else
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$u['jam'] = $this->input->post("jam");
					$this->db->update("tabel_jam",$u,$id);
					header('location:'.base_url().'tatausaha/jam');
				}
				else if($stts=="Tambah")
				{
					$in['jam'] = $this->input->post("jam");
					$this->db->insert("tabel_jam",$in);
					header('location:'.base_url().'tatausaha/jam');
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
			$id['id_jam'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_jam",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_jam;
				$d['jam'] = $f->jam;
			}
			$d['stts'] = "Edit";
			$this->load->view('template_header');
			$this->load->view('jam/add',$d);
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
			$id['id_jam'] = $this->uri->segment(4);
			$this->db->delete("tabel_jam",$id);
			header('location:'.base_url().'tatausaha/jam');
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
			$id['id_jam'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_jam",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_jam;
				$d['jam'] = $f->jam;
			}
			$d['stts'] = "Edit";
			$this->load->view('template_header');
			$this->load->view('jam/detail',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}