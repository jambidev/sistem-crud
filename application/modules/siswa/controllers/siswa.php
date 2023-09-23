<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller 
{
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="siswa")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$this->load->view('template_siswa');
			$this->load->view('siswa/dashboard',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}