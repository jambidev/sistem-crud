			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>guru" title="Go to Guru" class="tip-bottom"><i class="icon icon-user"></i> Absen</a>
				<a href="#" class="current"> <?php echo $stts; ?> Data Absen</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('tatausaha/absen/save','class="form-horizontal"'); ?>
						<?php if(validation_errors()) { ?>
						<div class="alert alert-block">
	  						<button type="button" class="close" data-dismiss="alert">×</button>
	  						<h4>Terjadi Kesalahan!</h4>
						<?php echo validation_errors(); ?>
						</div>
						<?php } ?>
							<div class="widget-box">
								<div class="widget-title">
								<h5><?php echo $stts; ?> Data Absen</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
										
									<label class="control-label" >NIS</label>
										<div class="controls">
											<select data-placeholder="NIS & Nama" class="chzn-select" style="width:500px;" tabindex="2" name="nis" id="nis">
          										<option value=""></option>
													<?php
														foreach($nis->result_array() as $f)
														{
															if($f['nis']==$nis)
																{
																	?>
																		<option value="<?php echo $f['nis']; ?>" selected="selected"><?php echo $f['nis']."&nbsp"."&nbsp".$f['nama']; ?><?php echo $f['nama']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['nis']; ?>"><?php echo $f['nis']."&nbsp"."&nbsp".$f['nama']; ?></option>
																	<?php
																}
														}
													?>
											</select>
										</div>	
                                    <label class="control-label">Tanggal Absen</label>
                                    <div class="controls">
                                        <input type="text" class="datepicker" name="tgl" data-date-format="dd-mm-yyyy" value="<?php echo $tgl; ?>" placeholder="Tanggal Absen"/>
                                    </div>
									<div class="control-group">
										<label class="control-label">Absen</label>
										<div class="controls">
											<label><input type="radio" name="absen" value="Sakit" /> Sakit</label>
											<label><input type="radio" name="absen" value="Ijin" /> Ijin</label>
											<label><input type="radio" name="absen" value="Alpa" /> Alpa</label>
											<label><input type="radio" name="absen" value="Terlambat"/> Terlambat</label>
										</div>
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
