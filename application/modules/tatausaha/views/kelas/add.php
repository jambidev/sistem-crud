		<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>kelas" title="Go to kelas" class="tip-bottom"><i class="icon icon-user"></i> Kelas</a>
				<a href="#" class="current"> <?php echo $stts; ?> Data Kelas</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('tatausaha/kelas/save','class="form-horizontal"'); ?>
						<?php if(validation_errors()) { ?>
						<div class="alert alert-block">
	  						<button type="button" class="close" data-dismiss="alert">×</button>
	  						<h4>Terjadi Kesalahan!</h4>
						<?php echo validation_errors(); ?>
						</div>
						<?php } ?>
							<div class="widget-box">
								<div class="widget-title">
								<h5><?php echo $stts; ?> Data Kelas</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
										
									<label class="control-label" for="nama_kelas">Nama Kelas</label>
									<div class="controls">
										<input type="text" class="span6" name="nama_kelas" id="nama_kelas" value="<?php echo $nama_kelas; ?>" placeholder="Nama Kelas">
									</div>
									<label class="control-label" >Nama Jenjang</label>
										<div class="controls">
											<select data-placeholder="Nama Jenjang" class="chzn-select" style="width:500px;" tabindex="2" name="id_jenjang" id="id_jenjang">
          										<option value=""></option>
													<?php
														foreach($jenjang->result_array() as $f)
														{
															if($f['id_jenjang']==$id_jenjang)
																{
																	?>
																		<option value="<?php echo $f['id_jenjang']; ?>" selected="selected"><?php echo $f['nama_jenjang']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['id_jenjang']; ?>"><?php echo $f['nama_jenjang']; ?></option>
																	<?php
																}
														}
													?>
											</select>
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
