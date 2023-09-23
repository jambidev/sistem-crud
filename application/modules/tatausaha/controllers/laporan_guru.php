<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_guru extends CI_Controller 
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
			$tot_hal = $this->db->get("tabel_guru");
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
			$d['guru'] = $this->db->get("tabel_guru",$limit,$offset);
			$this->load->view('template_header');
			$this->load->view('laporan/laporan_guru',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	public function prin()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['data_guru'] = $this->db->get("tabel_guru");
			$this->load->view('laporan/cetak_laporan_guru',$d);
		}	
		else
		{
			header('location:'.base_url().'');
		}
	}
}	