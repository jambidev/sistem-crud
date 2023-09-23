<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_Pembayaran extends CI_Controller 
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
			$tot_hal = $this->db->get("tabel_jenis_pembayaran");
			$config['base_url'] = base_url() . 'jenis_pembayaran/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['jenis'] = $this->db->get("tabel_jenis_pembayaran",$limit,$offset);

			$this->load->view('template_header');
			$this->load->view('jenis_pembayaran/home',$d);
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
			$d['nama_pembayaran'] = "";
			$d['harga'] = "";
			$d['stts'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('jenis_pembayaran/add',$d);
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
			$this->form_validation->set_rules('nama_pembayaran', 'Jenis_Pembayaran', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');

			$id['id_jenis_pembayaran'] = $this->input->post("id_param");

			if ($this->form_validation->run() == FALSE)
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$q = $this->db->get_where("tabel_jenis_pembayaran",$id);
					$d = array();
						foreach($q->result() as $f)
							{
								$d['id_param'] = $f->id_jenis_pembayaran;
								$d['nama_pembayaran'] = $f->nama_pembayaran;
								$d['harga'] = $f->harga;
							}
					$d['stts'] = "Edit";
					$d['credit'] = $this->config->item('credit_aplikasi');
					$this->load->view('template_header');
					$this->load->view('jenis_pembayaran/add',$d);
				}
				else if($stts=="Tambah")
				{
					$d['id_param'] = "";
					$d['nama_pembayaran'] = $this->input->post("nama_pembayaran");
					$d['harga'] = $this->input->post("harga");
					$d['stts'] = $stts;
					$this->load->view('template_header');
					$this->load->view('jenis_pembayaran/add',$d);
				}
			}
			else
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$u['nama_pembayaran'] = $this->input->post("nama_pembayaran");
					$u['harga'] = $this->input->post("harga");
					$this->db->update("tabel_jenis_pembayaran",$u,$id);
					redirect("tatausaha/jenis_pembayaran/index");
				}
				else if($stts=="Tambah")
				{
					$in['nama_pembayaran'] = $this->input->post("nama_pembayaran");
					$in['harga'] = $this->input->post("harga");
					$this->db->insert("tabel_jenis_pembayaran",$in);
					header('location:'.base_url().'tatausaha/jenis_pembayaran');
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
			$id['id_jenis_pembayaran'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_jenis_pembayaran",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_jenis_pembayaran;
				$d['nama_pembayaran'] = $f->nama_pembayaran;
				$d['harga'] = $f->harga;
			}
			$d['stts'] = "Edit";
			$d['credit'] = $this->config->item('credit_aplikasi');
			$this->load->view('template_header');
			$this->load->view('jenis_pembayaran/add',$d);
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
			$id['id_jenis_pembayaran'] = $this->uri->segment(4);
			$this->db->delete("tabel_jenis_pembayaran",$id);
			header('location:'.base_url().'tatausaha/jenis_pembayaran');
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
			$id['id_tahun'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_tahun",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['tahun'] = $f->tahun;
			}
			
			$this->load->view('template_header');
			$this->load->view('tahun/detail',$d);
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
			$tot_hal = $this->db->query("select * from tabel_guru where nama like '%".$kata."%' ");
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
			$d['guru'] = $this->db->query("select * from tabel_guru where nama like '%".$kata."%' limit ".$offset.",".$limit."");
			$this->load->view('template_header');
			$this->load->view('guru/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}