		<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>manage_user" title="Go to Mata Pelajaran" class="tip-bottom"><i class="icon icon-user"></i>Pengaturan Pengguna</a>
				<a href="#" class="current"> <?php echo $stts; ?> Pengguna</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('manage_user/save','class="form-horizontal"'); ?>
						<?php if(validation_errors()) { ?>
							<div class="alert alert-block">
	  							<button type="button" class="close" data-dismiss="alert">×</button>
	  							<h4>Terjadi Kesalahan!</h4>
								<?php echo validation_errors(); ?>
							</div>
						<?php } ?>
								
						<?php if($this->session->flashdata('gagal')) { ?>
    						<div class="alert alert-error alert-block">
       							<button type="button" class="close" data-dismiss="alert">×</button>
        						<?php echo $this->session->flashdata('gagal'); ?>
    						</div>
    					<?php } ?>
							<div class="widget-box">
								<div class="widget-title">
								<h5><?php echo $stts; ?> Mata Pelajaran</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" class="span6" name="username" id="username" value="<?php echo $username; ?>" placeholder="Username">
									</div>
									<label class="control-label">Nama Lengkap</label>
									<div class="controls">
										<input type="text" class="span6" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap; ?>" placeholder="Nama Lengkap">
									</div>
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" class="span6" name="password" id="password" value="<?php echo $password; ?>" placeholder="Password">
									</div>
									<input type="hidden" name="stts" value="<?php echo $stts; ?>">
										<div class="control-group">
											<div class="controls">
			  									<button type="submit" class="btn btn-primary">Simpan Data</button>
			  									<button type="reset" class="btn">Hapus Data</button>
											</div>
		  								</div>
								</form>
							</div>
						</div>						
					</div>
				</div>
				
			<?php echo form_close(); ?>

				<div class="row-fluid">
					<div id="footer" class="span12">
						<p><?php echo $GLOBALS['site_footer']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
