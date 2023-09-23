<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tatausaha extends CI_Controller 
{
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$this->load->view('template_header');
			$this->load->view('tatausaha/dashboard',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}