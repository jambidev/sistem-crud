<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lihat_jadwal extends CI_Controller 
{
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="siswa")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['pilih_tahun'] = $this->db->query("select DISTINCT a.id_tahun, a.tahun, d.nis from tabel_tahun as a join tabel_nilai as c join tabel_siswa as d on a.id_tahun=c.id_tahun and d.nis=c.nis where c.id_tahun order by a.id_tahun DESC");
			$this->load->view('template_siswa');
			$this->load->view('lihat_jadwal/pilih_tahun',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cari_jadwal()
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
			$tot_hal = $this->db->query("select a.id_hari, a.nama_hari, b.id_jam, b.jam, c.id_guru, c.nama, d.id_mata_pelajaran, 
				d.nama_pelajaran, e.id_jadwal from tabel_hari as a join tabel_jam as b join tabel_guru as c 
				join tabel_mata_pelajaran as d join tabel_jadwal as e on a.id_hari=e.id_hari and b.id_jam=e.id_jam and c.id_guru=e.id_guru and d.id_mata_pelajaran=e.id_mata_pelajaran where e.id_jadwal like '%".$kata."%' ");
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
			$d['siswa'] = $this->db->query("select a.id_hari, a.nama_hari, b.id_jam, b.jam, c.id_guru, c.nama, d.id_mata_pelajaran, 
				d.nama_pelajaran, e.id_jadwal from tabel_hari as a join tabel_jam as b join tabel_guru as c 
				join tabel_mata_pelajaran as d join tabel_jadwal as e on a.id_hari=e.id_hari and b.id_jam=e.id_jam and c.id_guru=e.id_guru and d.id_mata_pelajaran=e.id_mata_pelajaran where e.id_jadwal like '%".$kata."%' limit ".$offset.",".$limit."");
			$d['credit'] = $this->config->item('credit_aplikasi');
			$this->load->view('template_siswa');
			$this->load->view('lihat_jadwal/jadwal',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}