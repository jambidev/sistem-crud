<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller 
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
			$tot_hal = $this->db->query("select a.nip, a.nama, b.nama_pelajaran, c.nama_kelas, d.id_jadwal, e.nama_hari, f.jam from tabel_guru as a join tabel_mata_pelajaran as b join tabel_kelas as c join tabel_jadwal as d join tabel_hari as e join tabel_jam as f on a.id_guru=d.id_guru and b.id_mata_pelajaran=d.id_mata_pelajaran and e.id_hari=d.id_hari and f.id_jam=d.id_jam and c.id_kelas=d.id_kelas where d.id_jadwal");
			$config['base_url'] = base_url() . 'tatausaha/jadwal/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['jadwal'] = $this->db->query("select a.nip, a.nama, b.nama_pelajaran, c.nama_kelas, d.id_jadwal, e.nama_hari, f.jam from tabel_guru as a join tabel_mata_pelajaran as b join tabel_kelas as c join tabel_jadwal as d join tabel_hari as e join tabel_jam as f on a.id_guru=d.id_guru and b.id_mata_pelajaran=d.id_mata_pelajaran and e.id_hari=d.id_hari and f.id_jam=d.id_jam and c.id_kelas=d.id_kelas where d.id_jadwal LIMIT ".$offset.",".$limit."");
			$this->load->view('template_header');
			$this->load->view('jadwal/home',$d);
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
			$d['id_jadwal'] = $this->app_model->get_jadwal();
			$d['nip'] = $this->db->get('tabel_guru');
			$d['mata_pelajaran'] = $this->db->get('tabel_mata_pelajaran');
			$d['kelas'] = $this->db->get('tabel_kelas');
			$d['hari'] = $this->db->get('tabel_hari');
			$d['jam'] = $this->db->get('tabel_jam');
			$d['stts'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('jadwal/add',$d);
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
			$this->form_validation->set_rules('id_guru', 'NIP', 'trim|required');
			$this->form_validation->set_rules('id_mata_pelajaran', 'Mata Pelajaran', 'trim|required');
			$this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('id_hari', 'Hari', 'trim|required');
			$this->form_validation->set_rules('id_jam', 'Jam Pelajaran', 'trim|required');
			
			$id['id_jadwal'] = $this->input->post("id_param");

			if ($this->form_validation->run() == FALSE)
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					$q = $this->db->get_where("tabel_mata_pelajaran",$id);
					$d = array();
						foreach($q->result() as $f)
							{
								
								$d['id_param'] = $f->id_jadwal;
								$d['id_guru'] = $f->id_guru;
								$d['id_mata_pelajaran'] = $f->id_mata_pelajaran;
								$d['id_kelas'] = $f->id_kelas;
								$d['id_hari'] = $f->id_hari;
								$d['id_jam'] = $f->id_jam;
						}
							$d['stts'] = "Edit";
							$d['nip'] = $this->db->get('tabel_guru');
							$d['mata_pelajaran'] = $this->db->get('tabel_mata_pelajaran');
							$d['kelas'] = $this->db->get('tabel_kelas');
							$d['hari'] = $this->db->get('tabel_hari');
							$d['jam'] = $this->db->get('tabel_jam');
							$d['stts'] = "Edit";
							$this->load->view('jadwal/add',$d);
				}
				else if($stts=="Tambah")
				{
					$d['id_param'] = "";
					$d['nip'] = $this->db->get('tabel_guru');
					$d['mata_pelajaran'] = $this->db->get('tabel_mata_pelajaran');
					$d['kelas'] = $this->db->get('tabel_kelas');
					$d['hari'] = $this->db->get('tabel_hari');
					$d['jam'] = $this->db->get('tabel_jam');
					$d['stts'] = $stts;
					$this->load->view('template_header');
					$this->load->view('jadwal/add',$d);			
				}
			}
			else
			{
				$stts = $this->input->post('stts');
				if($stts=="Edit")
				{
					/*$ceknama['nama_pelajaran'] = $this->input->post("nama_pelajaran");
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
						$this->load->view('mata_pelajaran/add',$d);
					}
					else
					{*/
						$semesters = $this->app_model->get_active_semester()->row();
						$id_semester = $semesters->id_semester;
						$tahun = $this->app_model->get_active_tahun()->row();
						$id_tahun = $tahun->id_tahun;
						$u['id_guru'] = $this->input->post("id_guru");
						$u['id_mata_pelajaran'] = $this->input->post("id_mata_pelajaran");
						$u['id_kelas'] = $this->input->post("id_kelas");
						$u['id_semester'] = $id_semester;
						$u['id_hari'] = $this->input->post("id_hari");
						$u['id_jam'] = $this->input->post("id_jam");
						$u['id_tahun'] = $id_tahun;
						$this->db->update("tabel_jadwal",$u,$id);
						header('location:'.base_url().'tatausaha/jadwal');
					//}	
				}
				else if($stts=="Tambah")
				{
					/*ceknama['nama_pelajaran'] = $this->input->post("nama_pelajaran");
					$cek = $this->db->get_where('tabel_mata_pelajaran', $ceknama);
					if($cek->num_rows()>0)
					{
						$d['nama_pelajaran'] = "";
						$d['id_mata_pelajaran'] = $this->app_model->get_mata_pelajaran();
						$d['stts'] = $stts;
						?><script>alert("Nama Mata Pelajaran Sudah ada");</script><?php
						$this->load->view('mata_pelajaran/add',$d);
					}
					else
					{*/	
						$tahun = $this->app_model->get_active_tahun()->row();
						$id_tahun = $tahun->id_tahun;
						$in['id_jadwal'] = $this->input->post("id_jadwal");
						$in['id_guru'] = $this->input->post("id_guru");
						$in['id_mata_pelajaran'] = $this->input->post("id_mata_pelajaran");
						$in['id_kelas'] = $this->input->post("id_kelas");
						$in['id_hari'] = $this->input->post("id_hari");
						$in['id_jam'] = $this->input->post("id_jam");
						$in['id_tahun'] = $id_tahun;
						$this->db->insert("tabel_jadwal",$in);
						header('location:'.base_url().'tatausaha/jadwal');
					//}
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
			
			$id['id_jadwal'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_jadwal",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_jadwal;
				$d['id_guru'] = $f->id_guru;
				$d['id_mata_pelajaran'] = $f->id_mata_pelajaran;
				$d['id_kelas'] = $f->id_kelas;
				$d['id_hari'] = $f->id_hari;
				$d['id_jam'] = $f->id_jam;
			}
			$d['stts'] = "Edit";
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['nip'] = $this->db->get('tabel_guru');
			$d['mata_pelajaran'] = $this->db->get('tabel_mata_pelajaran');
			$d['kelas'] = $this->db->get('tabel_kelas');
			$d['hari'] = $this->db->get('tabel_hari');
			$d['jam'] = $this->db->get('tabel_jam');
			$this->load->view('template_header');
			$this->load->view('jadwal/add',$d);
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
			$id['id_jadwal'] = $this->uri->segment(4);
			$this->db->delete("tabel_jadwal",$id);
			header('location:'.base_url().'tatausaha/jadwal');
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
			
			$id['id_jadwal'] = $this->uri->segment(4);
			$q = $this->db->get_where("tabel_jadwal",$id);
			$d = array();
			foreach($q->result() as $f)
			{
				$d['id_param'] = $f->id_jadwal;
				$d['id_guru'] = $f->id_guru;
				$d['id_mata_pelajaran'] = $f->id_mata_pelajaran;
				$d['id_kelas'] = $f->id_kelas;
				$d['id_hari'] = $f->id_hari;
				$d['id_jam'] = $f->id_jam;
			}
			$d['stts'] = "Detail";
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['nip'] = $this->db->get('tabel_guru');
			$d['mata_pelajaran'] = $this->db->get('tabel_mata_pelajaran');
			$d['kelas'] = $this->db->get('tabel_kelas');
			$d['hari'] = $this->db->get('tabel_hari');
			$d['jam'] = $this->db->get('tabel_jam');
			$this->load->view('template_header');
			$this->load->view('jadwal/detail',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}