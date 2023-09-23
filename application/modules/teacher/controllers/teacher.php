<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller 
{
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="guru")
		{
			$d['credit'] = $this->config->item('credit_aplikasi');
			$this->load->view('template_guru');
			$this->load->view('teacher/dashboard',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}