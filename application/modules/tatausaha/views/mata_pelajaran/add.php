		<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>mata_pelajaran" title="Go to Mata Pelajaran" class="tip-bottom"><i class="icon icon-user"></i>Mata Pelajaran</a>
				<a href="#" class="current"> <?php echo $stts; ?> Mata Pelajaran</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('tatausaha/mata_pelajaran/save','class="form-horizontal"'); ?>
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
									<label class="control-label">Kode Mata Pelajaran</label>
									<div class="controls">
										<input type="text" class="span6" name="id_mata_pelajaran" id="id_mata_pelajaran" value="<?php echo $id_mata_pelajaran; ?>" placeholder="Kode Mata Pelajaran" readonly="true">
									</div>
									<label class="control-label">Nama Mata Pelajaran</label>
									<div class="controls">
										<input type="text" class="span6" name="nama_pelajaran" id="nama_pelajaran" value="<?php echo $nama_pelajaran; ?>" placeholder="Nama Mata Pelajaran">
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
