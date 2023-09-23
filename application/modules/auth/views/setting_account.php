			<div id="breadcrumb">
				<a href="#" title="Dashboard" class="tip-bottom" class="current"><i class="icon-home"></i> Dashboard</a>
			</div>
		<div class="container-fluid">	
			<div class="row-fluid">
					<div class="span12">
						<div class="alert alert-info">
							Selamat Datang <strong><?php echo $this->session->userdata('nama'); ?></strong>. Silahkan Mulai Untuk Melakukan Pengolahan Nilai Online Siswa
							<a href="#" data-dismiss="alert" class="close">×</a>
						</div>
					</div>
						<div class="widget-box">
                            <div class="widget-title">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab1">Profil Pengguna</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Pengaturan Akun</a></li>
                                    <li><a data-toggle="tab" href="#tab3">Pengaturan Password</a></li>
                                </ul>
                            </div>
                            <div class="widget-content tab-content">
                               	<div id="tab1" class="tab-pane active">
									<ul class="site-stats span4">
										<li><i class="icon-user"></i> Nama Lengkap : <small><?php echo $this->session->userdata('nama'); ?></small></li>
										<li><i class="icon-arrow-right"></i> Status : <small><?php echo $this->session->userdata('stts'); ?></small></li>
										<li class="divider"></li>
										<li><i class="icon-shopping-cart"></i> Username : <small><?php echo $this->session->userdata('username'); ?></small></li>
									</ul>
								</div>
                                <div id="tab2" class="tab-pane">
                                	<ul class="site-stats span4">
										<li><i class="icon-user"></i> Nama Lengka : <small><?php echo $this->session->userdata('nama'); ?></small></li>
										<li><i class="icon-arrow-right"></i> Status : <small><?php echo $this->session->userdata('stts'); ?></small></li>
										<li class="divider"></li>
										<li><i class="icon-shopping-cart"></i> Username : <small><?php echo $this->session->userdata('username'); ?></small></li>
									</ul>
								</div>
                                <div id="tab3" class="tab-pane">
                                	<div class="widget-content nopadding">
                                	<form class="form-horizontal" />
										<?php echo form_open('auth/save_pass'); ?>
											<div class="control-group">
												<label class="control-label" for="pass_lama">Username</label>
													<div class="controls">
					  									<input type="text" value="<?php echo $this->session->userdata('username'); ?>" class="span6" name="username" id="username" placeholder="Username" readonly="true">
													</div>
												<label class="control-label" for="pass_lama">Password Lama</label>
													<div class="controls">
					  									<input type="password" class="span6" name="pass_lama" id="pass_lama" placeholder="Password Lama">
													</div>
												<label class="control-label" for="pass_lama">Password Baru</label>
													<div class="controls">
					  									<input type="password" class="span6" name="pass_baru" id="pass_baru" placeholder="Password Baru">
													</div>
												<label class="control-label" for="pass_lama">Ulangi Password Baru</label>
													<div class="controls">
					  									<input type="password" class="span6" name="ulangi_pass_baru" id="ulangi_pass_baru" placeholder="Ulangi Password Baru">
													</div>
			  								</div>
											<div class="control-group">
												<div class="controls">
			  										<button type="submit" class="btn btn-primary">Simpan Data</button>
			  										<button type="reset" class="btn">Hapus Data</button>
												</div>
		  									</div>
										<?php echo form_close(); ?>
									</form>
									</div>
								</div>
                            </div>                            
                        </div>
				