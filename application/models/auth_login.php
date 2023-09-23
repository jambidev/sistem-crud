<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_login extends CI_Model 
	{

		public function getLoginData($data)
		{
			$stts = $data['stts'];
			if($stts=="administrator")
			{
				$login['username'] = mysql_real_escape_string($data['username']);
				$login['password'] = md5($data['password'].'AppSimpeg32');
				$login['stts'] = $data['stts'];
				$cek = $this->db->get_where('tabel_user', $login);
				if($cek->num_rows()>0)
				{
					foreach($cek->result() as $qad)
					{
						$sess_data['logged_in'] = 'yesGetMeLoginBaby';
						$sess_data['id_user'] = $qad->id_user_login;
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama_lengkap;
						$sess_data['stts'] = $qad->stts;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'');
				}
				else
				{
					$this->session->set_flashdata('result_login', 'username dan password salah.');
					header('location:'.base_url().'');
				}
			}
			else if($stts=="guru")
			{
				$login['username'] = mysql_real_escape_string($data['username']);
				$login['password'] = md5($data['password'].'#$aV(*)L!C4-5i');
				$login['stts'] = $data['stts'];
				$cek = $this->db->get_where('tabel_guru', $login);
				if($cek->num_rows()>0)
				{
					foreach($cek->result() as $qad)
					{
						$sess_data['logged_in'] = 'yesGetMeLoginBaby';
						$sess_data['id_guru'] = $qad->id_guru;
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama;
						$sess_data['stts'] = $qad->stts;
						$sess_data['stts_guru'] = $qad->stts_guru;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'');
				}
				else
				{
					$this->session->set_flashdata('result_login', 'username dan password salah.');
					header('location:'.base_url().'');
				}
			}
			else if($stts=="siswa")
			{
				$login['username'] = mysql_real_escape_string($data['username']);
				$login['password'] = md5($data['password'].'#$aV(*)L!C4-5i');
				$login['stts'] = $data['stts'];
				$cek = $this->db->get_where('tabel_siswa', $login);
				if($cek->num_rows()>0)
				{
					foreach($cek->result() as $qad)
					{
						$sess_data['logged_in'] = 'yesGetMeLoginBaby';
						$sess_data['nis'] = $qad->nis;
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama;
						$sess_data['stts'] = $qad->stts;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'');
				}
				else
				{
					$this->session->set_flashdata('result_login', 'username dan password salah.');
					header('location:'.base_url().'');
				}
			}	
		}		
	}
