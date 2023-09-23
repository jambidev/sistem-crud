<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lihat_nilai extends CI_Controller 
{
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="siswa")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['pilih_tahun'] = $this->db->query("select DISTINCT a.id_tahun, a.tahun, d.nis from tabel_tahun as a join tabel_nilai as c join tabel_siswa as d on a.id_tahun=c.id_tahun and d.nis=c.nis where c.id_tahun order by a.id_tahun DESC");
			$this->load->view('template_siswa');
			$this->load->view('lihat_nilai/pilih_tahun',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cari_nilai()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="siswa")
		{
			if($this->input->post("pilih_tahun")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("pilih_tahun");
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
			$tot_hal = $this->db->query("select a.nis, a.nama, b.id_mata_pelajaran, b.nama_pelajaran, c.id_nilai, c.nilai, c.id_tahun, d.id_guru, d.nama from tabel_siswa as a join tabel_mata_pelajaran as b join tabel_nilai as c join tabel_guru as d on a.nis=c.nis and b.id_mata_pelajaran=c.id_mata_pelajaran and a.nis=c.nis and d.id_guru=c.id_guru where c.id_tahun like '%".$kata."%' ");
			$config['base_url'] = base_url() . 'lihat_nilai/cari_nilai/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['siswa'] = $this->db->query("select a.nis, a.nama, b.id_mata_pelajaran, b.nama_pelajaran, c.id_nilai, c.nilai, c.id_tahun, d.id_guru, d.nama from tabel_siswa as a join tabel_mata_pelajaran as b join tabel_nilai as c join tabel_guru as d on a.nis=c.nis and b.id_mata_pelajaran=c.id_mata_pelajaran and a.nis=c.nis and d.id_guru=c.id_guru where c.id_tahun like '%".$kata."%' limit ".$offset.",".$limit."");
			$d['credit'] = $this->config->item('credit_aplikasi');
			$this->load->view('template_siswa');
			$this->load->view('lihat_nilai/nilai',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}