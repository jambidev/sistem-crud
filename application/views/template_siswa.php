<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SIAS :: Sistem Informasi Akademik Siswa</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/uniform.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/select2.css" />	
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/datepicker.css" />	
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/unicorn.main.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/unicorn.grey.css" class="skin-color" />	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
		<div id="header">
			<h1><a href="./dashboard.html">Unicorn Admi</a></h1>		
		</div>
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
            	<li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text"><?php echo $this->session->userdata('nama'); ?></span>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>auth/setting_account"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
                       	<li><a href="<?php echo base_url(); ?>manage_user"><i class="icon-tasks"></i> Manajemen User</a></li>
                    </ul>
                </li>
                <li class="btn btn-inverse"><a title="" href="<?php echo base_url(); ?>auth/logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
            
		<div id="sidebar">
			<a href="#" class="visible-phone"><i class="icon icon-th-list"></i> Tables</a>
			<ul>
				<li><a href="<?php echo base_url(); ?>teacher"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>
				<li><a href="<?php echo base_url(); ?>siswa/lihat_nilai"><i class="icon-book"></i> <span>Lihat Nilai</span></a></li>
				<li><a href="<?php echo base_url(); ?>siswa/lihat_jadwal"><i class="icon-list-alt"></i> <span>Lihat Jadwal</span></a></li>
				<li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Bantuan</span></a></li>
			</ul>
		</div>
		<div id="content">
            <script src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/jquery.ui.custom.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/bootstrap-datepicker.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/bootstrap-colorpicker.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/jquery.uniform.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/select2.min.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/unicorn.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/unicorn.tables.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/unicorn.form_common.js"></script>
	</body>
</html>
