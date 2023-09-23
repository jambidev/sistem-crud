			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>guru" title="Go to Guru" class="tip-bottom"><i class="icon icon-user"></i> Guru</a>
				<a href="#" class="current">Detail Data Guru</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('guru/save','class="form-horizontal"'); ?>
						<?php if(validation_errors()) { ?>
						<div class="alert alert-block">
	  						<button type="button" class="close" data-dismiss="alert">×</button>
	  						<h4>Terjadi Kesalahan!</h4>
						<?php echo validation_errors(); ?>
						</div>
						<?php } ?>
							<div class="widget-box">
								<div class="widget-title">
								<h5>Detail Data Guru</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
										
									<label class="control-label" for="tahun">NIP</label>
									<div class="controls">
										<input type="text" class="span6" value="<?php echo $tahun; ?>" placeholder="NIP" disabled>
									</div>
										<div class="control-group">
											<div class="controls">
			  									<a class="btn btn-primary" href="<?php echo base_url(); ?>tatausaha/tahun/index/<?php  ?>">Kembali</a>
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
