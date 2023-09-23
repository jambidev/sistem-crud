		<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>guru" title="Go to Guru" class="tip-bottom"><i class="icon icon-user"></i> Jenis Pembayaran</a>
				<a href="#" class="current"> <?php echo $stts; ?> Jenis Pembayaran</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('tatausaha/jenis_pembayaran/save','class="form-horizontal"'); ?>
						<?php if(validation_errors()) { ?>
						<div class="alert alert-block">
	  						<button type="button" class="close" data-dismiss="alert">×</button>
	  						<h4>Terjadi Kesalahan!</h4>
						<?php echo validation_errors(); ?>
						</div>
						<?php } ?>
							<div class="widget-box">
								<div class="widget-title">
								<h5><?php echo $stts; ?> Jenis Pembayaran</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
										
									<label class="control-label" >Jenis Pembayaran</label>
									<div class="controls">
										<input type="text" class="span6" name="nama_pembayaran" value="<?php echo $nama_pembayaran; ?>" placeholder="Jenis Pembayaran">
									</div>
									<label class="control-label" >Harga</label>
									<div class="controls">
										<input type="text" class="span6" name="harga"  value="<?php echo $harga; ?>" placeholder="Harga">
									</div>
									<input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
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
