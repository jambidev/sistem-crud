<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tahun extends CI_Controller 
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
			$tot_hal = $this->db->get("tabel_tahun");
			$config['base_url'] = base_url() . 'tahun/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['tahun'] = $this->db->get("tabel_tahun",$limit,$offset);

			$this->load->view('template_header');
			$this->load->view('tahun/home',$d);
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
			$d['tahun'] = "";
			$d['stts'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('tahun/add',$d);
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
			$this->form_validation->set_rules('tahun', 'Tahun Ajaran', 'trim|required');

			$id['id_tahun'] = $this->input->post("id_param");

			if ($this->form_validation->run() == FALSE)
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$q = $this->db->get_where("tabel_tahun",$id);
					$d = array();
						foreach($q->result() as $f)
							{
								$d['id_param'] = $f->id_tahun;
								$d['tahun'] = $f->tahun;
							}
					$d['stts'] = "Edit";
					$this->load->view('template_header');
					$this->load->view('tahun/add',$d);
				}
				else if($stts=="Tambah")
				{
					$d['id_param'] = "";
					$d['tahun'] = $this->input->post("tahun");
					$d['stts'] = $stts;
					$this->load->view('template_header');
					$this->load->view('tahun/add',$d);
				}
			}
			else
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$u['tahun'] = $this->input->post("tahun");
					$this->db->update("tabel_tahun",$u,$id);
					redirect("tatausaha/tahun/index");
				}
				else if($stts=="Tambah")
				{
					$semesters = $this->app_model->get_active_semester()->row();
					$id_semester = $semesters->id_semester;
					$in['tahun'] = $this->input->post("tahun").$id_semester;
					$this->db->insert("tabel_tahun",$in);
					header('location:'.base_url().'tatausaha/tahun');
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
			$id['id_tahun'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_tahun",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_tahun;
				$d['tahun'] = $f->tahun;
			}
			$d['stts'] = "Edit";
			$d['credit'] = $this->config->item('credit_aplikasi');
			$this->load->view('template_header');
			$this->load->view('tahun/add',$d);
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
			$id['id_tahun'] = $this->uri->segment(4);
			$this->db->delete("tabel_tahun",$id);
			header('location:'.base_url().'tatausaha/tahun');
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

	public function cetak()
	{
			$this->load->view('guru/print');
	}

	public function aktif()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
				$q = $this->db->query("select * from tabel_tahun ");
				foreach ($q -> result_array() as $ss) {
					if($ss['status']=='1'){
						$dd=array('status'=>'0');
						$ds=array('id_tahun'=>$ss['id_tahun']);
						$this->db->update("tabel_tahun",$dd,$ds);
					}
				}
			$id['id_tahun'] = $this->uri->segment(4);
			$d=array('status'=>'1');

			$this->db->update("tabel_tahun",$d,$id);
			header('location:'.base_url().'tatausaha/tahun');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	/*public function nonaktif()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
				$q = $this->db->query("select * from tabel_tahun where status LIMIT 1");
				foreach ($q -> result_array() as $ss) {
					if($ss['status']=='0'){
						$dd=array('status'=>'1');
						$ds=array('id_tahun'=>$ss['id_tahun']);
						$this->db->update("tabel_tahun",$dd,$ds);
					}
				}
			$id['id_tahun'] = $this->uri->segment(4);
			$d=array('status'=>'0');

			$this->db->update("tabel_tahun",$d,$id);
			header('location:'.base_url().'tatausaha/tahun');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}*/
}