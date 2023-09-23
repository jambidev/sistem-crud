<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller 
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
			$tot_hal = $this->db->query("select a.nis, a.nama, b.id_tahun, b.tahun, c.id_jenis_pembayaran, c.nama_pembayaran, c.harga, d.id_bulan, d.nama_bulan, e.id_pembayaran, e.dibayar from tabel_siswa as a join tabel_tahun as b join tabel_jenis_pembayaran as c join tabel_bulan as d join tabel_pembayaran as e on a.nis=e.nis and b.id_tahun=e.id_tahun and c.id_jenis_pembayaran=e.id_jenis_pembayaran and d.id_bulan=e.id_bulan where e.id_pembayaran");
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
			$d['jadwal'] = $this->db->query("select a.nis, a.nama, b.id_tahun, b.tahun, c.id_jenis_pembayaran, c.nama_pembayaran, c.harga, d.id_bulan, d.nama_bulan, e.id_pembayaran, e.dibayar from tabel_siswa as a join tabel_tahun as b join tabel_jenis_pembayaran as c join tabel_bulan as d join tabel_pembayaran as e on a.nis=e.nis and b.id_tahun=e.id_tahun and c.id_jenis_pembayaran=e.id_jenis_pembayaran and d.id_bulan=e.id_bulan where e.id_pembayaran LIMIT ".$offset.",".$limit."");
			$this->load->view('template_header');
			$this->load->view('pembayaran/home',$d);
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
			$d['jenis_pembayaran'] = $this->db->get('tabel_jenis_pembayaran');
			$d['dibayar'] = "";
			$d['bulan'] = $this->db->get('tabel_bulan');
			$d['stts'] = "Tambah";
			$this->load->view('template_header');
			$this->load->view('pembayaran/add',$d);
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
			$this->form_validation->set_rules('id_jenis_pembayaran', 'Nama Pembayaran', 'trim|required');
			$this->form_validation->set_rules('dibayar', 'dibayar', 'trim|required');
			$this->form_validation->set_rules('id_bulan', 'Bulan', 'trim|required');
			
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
						$in['nis'] = $this->input->post("nis");
						$in['id_tahun'] = $this->input->post("id_tahun");
						$in['id_tahun'] = $id_tahun;
						$in['id_jenis_pembayaran'] = $this->input->post("id_jenis_pembayaran");
						$in['dibayar'] = $this->input->post("dibayar");
						$in['id_bulan'] = $this->input->post("id_bulan");
						$this->db->insert("tabel_pembayaran",$in);
						header('location:'.base_url().'tatausaha/pembayaran');
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