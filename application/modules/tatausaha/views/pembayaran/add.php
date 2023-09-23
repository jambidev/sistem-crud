<script src="<?php echo base_url(); ?>asset/js/jquery.price_format.js"></script>
<script type="text/javascript">

    $(function(){
        $('#example1').priceFormat();
    });

</script>			
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>mata_pelajaran" title="Go to Mata Pelajaran" class="tip-bottom"><i class="icon icon-user"></i>Pembayaran</a>
				<a href="#" class="current"> <?php echo $stts; ?> Pembayaran</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('tatausaha/pembayaran/save','class="form-horizontal"'); ?>
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
								<h5><?php echo $stts; ?> Pembayaran</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
									<label class="control-label" >NIS</label>
										<div class="controls">
											<select data-placeholder="NIS" class="chzn-select" style="width:500px;" tabindex="2" name="nis" >
          										<option value=""></option>
													<?php
														foreach($nis->result_array() as $f)
														{
															if($f['nis']==$nis)
																{
																	?>
																		<option value="<?php echo $f['nis']; ?>" selected="selected"><?php echo $f['nis'].'&nbsp'.$f['nama']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['nis']; ?>"><?php echo $f['nis'].'&nbsp'.$f['nama']; ?></option>
																	<?php
																}
														}
													?>
											</select>
										</div>
									<label class="control-label" >Jenis Pembayaran</label>
										<div class="controls">
											<select data-placeholder="Jenis Pembayaran" class="chzn-select" style="width:500px;" tabindex="2" name="id_jenis_pembayaran">
          										<option value=""></option>
													<?php
														foreach($jenis_pembayaran->result_array() as $f)
														{
															if($f['id_jenis_pembayaran']==$id_jenis_pembayaran)
																{
																	?>
																		<option value="<?php echo $f['id_jenis_pembayaran']; ?>" selected="selected"><?php echo $f['nama_pembayaran']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['id_jenis_pembayaran']; ?>"><?php echo $f['nama_pembayaran']; ?></option>
																	<?php
																}
														}
													?>
											</select>
										</div>
									<label class="control-label">Dibayar</label>
									<div class="controls">
										<input type="text" class="span6" name="dibayar" id="example1" value="<?php echo $dibayar; ?>" placeholder="Dibayar">
									</div>	
									<label class="control-label" >Bulan</label>
										<div class="controls">
											<select data-placeholder="Bulan" class="chzn-select" style="width:500px;" tabindex="2" name="id_bulan">
          										<option value=""></option>
													<?php
														foreach($bulan->result_array() as $f)
														{
															if($f['id_bulan']==$id_bulan)
																{
																	?>
																		<option value="<?php echo $f['id_bulan']; ?>" selected="selected"><?php echo $f['nama_bulan']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['id_bulan']; ?>"><?php echo $f['nama_bulan']; ?></option>
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
