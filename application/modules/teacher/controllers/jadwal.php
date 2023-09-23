<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller 
{
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="guru")
		{
			$page=$this->uri->segment(4);
			$limit= $GLOBALS['site_limit_medium']; 
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select a.id_guru, a.nip, a.nama, b.nama_pelajaran, c.nama_kelas, d.id_jadwal, e.nama_hari, f.jam from tabel_guru as a join tabel_mata_pelajaran as b join tabel_kelas as c join tabel_jadwal as d join tabel_hari as e join tabel_jam as f on a.id_guru=d.id_guru and b.id_mata_pelajaran=d.id_mata_pelajaran and e.id_hari=d.id_hari and f.id_jam=d.id_jam and c.id_kelas=d.id_kelas where d.id_jadwal");
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
			$d['jadwal'] = $this->db->query("select a.id_guru, a.nip, a.nama, b.nama_pelajaran, c.nama_kelas, d.id_jadwal, e.nama_hari, f.jam from tabel_guru as a join tabel_mata_pelajaran as b join tabel_kelas as c join tabel_jadwal as d join tabel_hari as e join tabel_jam as f on a.id_guru=d.id_guru and b.id_mata_pelajaran=d.id_mata_pelajaran and e.id_hari=d.id_hari and f.id_jam=d.id_jam and c.id_kelas=d.id_kelas where d.id_jadwal LIMIT ".$offset.",".$limit."");
			$this->load->view('template_guru');
			$this->load->view('jadwal/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}