<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Semester extends CI_Controller 
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
			$tot_hal = $this->db->get("tabel_semester");
			$config['base_url'] = base_url() . 'absen/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['semester'] = $this->db->get("tabel_semester",$limit,$offset);
			$this->load->view('template_header');
			$this->load->view('semester/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function aktif()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
				$q = $this->db->query("select * from tabel_semester ");
				foreach ($q -> result_array() as $f) {
					if($f['nama_status']=='1'){
						$dd=array('nama_status'=>'0');
						$ds=array('id_semester'=>$f['id_semester']);
						$this->db->update("tabel_semester",$dd,$ds);
					}
				}
			$id['id_semester'] = $this->uri->segment(4);
			$u=array('nama_status'=>'1');
			$this->db->update("tabel_semester",$u,$id);
			header('location:'.base_url().'tatausaha/semester');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function nonaktif()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$q = $this->db->query("select * from tabel_semester ");
				foreach ($q -> result_array() as $f) {
					if($f['nama_status']=='0'){
						$dd=array('nama_status'=>'1');
						$ds=array('id_semester'=>$f['id_semester']);
						$this->db->update("tabel_semester",$dd,$ds);
					}
				}
			$id['id_semester'] = $this->uri->segment(4);
			$u=array('nama_status'=>'0');
			$this->db->update("tabel_semester",$u,$id);
			header('location:'.base_url().'tatausaha/semester');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}
