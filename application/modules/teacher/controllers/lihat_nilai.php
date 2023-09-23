<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lihat_nilai extends CI_Controller 
{
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="guru")
		{
			$d['mata_pelajaran'] = $this->db->query("select DISTINCT a.id_mata_pelajaran, a.nama_pelajaran, b.id_guru, b.id_mata_pelajaran from tabel_mata_pelajaran as a join tabel_jadwal as b on a.id_mata_pelajaran=b.id_mata_pelajaran where b.id_jadwal");
			$d['kelas'] = $this->db->query("select DISTINCT a.id_kelas, a.nama_kelas, b.id_kelas, b.id_guru from tabel_kelas as a join tabel_jadwal as b on a.id_kelas=b.id_kelas where b.id_jadwal ");
			$this->load->view('template_guru');
			$this->load->view('lihat_nilai/add',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function nilai()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="guru")
		{
			if($this->input->post("id_kelas")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("id_kelas");
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
			$tot_hal = $this->db->query("select * from tabel_nilai where id_nilai like '%".$kata."%' ");
			$config['base_url'] = base_url() . 'nilai/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['id_mata_pelajaran'] = $this->input->post("id_mata_pelajaran");
			$d['kelas'] = $this->input->post("id_kelas");
			$d['nilai'] = "";
			$d['siswa'] = $this->db->query("select * from tabel_siswa where id_kelas like '%".$kata."%' limit ".$offset.",".$limit."");
			$d['status'] = "Tambah";
			$this->load->view('template_guru');
			$this->load->view('lihat_nilai/nilai',$d);
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
}