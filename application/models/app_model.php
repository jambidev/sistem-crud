<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class app_model extends CI_Model
{
	public function __construct()
	{
		$dt = $this->db->get("tabel_rules");
		foreach($dt->result() as $d)
		{
			$GLOBALS[$d->tipe] = $d->content_setting;
		}
	}
	
	public function get_mata_pelajaran()
	{
		$q = $this->db->query("select MAX(RIGHT(id_mata_pelajaran,5)) as kd_max from tabel_mata_pelajaran");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%05s", $tmp);
			}
		}
		else
		{
			$kd = "00001";
		}	
		return "MK".$kd;
	}

	public function get_kode_guru()
	{
		$q = $this->db->query("select MAX(RIGHT(id_guru,5)) as kd_max from tabel_guru");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%05s", $tmp);
			}
		}
		else
		{
			$kd = "00001";
		}	
		return "KG".$kd;
	}
	public function get_jadwal()
	{
		$q = $this->db->query("select MAX(RIGHT(id_jadwal,5)) as kd_max from tabel_jadwal");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%05s", $tmp);
			}
		}
		else
		{
			$kd = "00001";
		}	
		return "JD".$kd;
	}
	
	function get_active_semester()
	{
		$this->db->select('id_semester');
		$this->db->where('nama_status', 1);
		return $this->db->get('tabel_semester');
	}

	function get_active_tahun()
	{
		$this->db->select('id_tahun');
		$this->db->where('status', 1);
		return $this->db->get('tabel_tahun');
	}
}
