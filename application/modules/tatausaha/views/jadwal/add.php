			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>mata_pelajaran" title="Go to Mata Pelajaran" class="tip-bottom"><i class="icon icon-user"></i>Jadwal</a>
				<a href="#" class="current"> <?php echo $stts; ?> Jadwal</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('tatausaha/jadwal/save','class="form-horizontal"'); ?>
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
								<h5><?php echo $stts; ?> Jadwal</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
									<label class="control-label" >Nama Guru</label>
										<div class="controls">
											<select data-placeholder="Nama Guru" class="chzn-select" style="width:500px;" tabindex="2" name="id_guru" id="id_guru">
          										<option value=""></option>
													<?php
														foreach($nip->result_array() as $f)
														{
															if($f['id_guru']==$id_guru)
																{
																	?>
																		<option value="<?php echo $f['id_guru']; ?>" selected="selected"><?php echo $f['nama']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['id_guru']; ?>"><?php echo $f['nama']; ?></option>
																	<?php
																}
														}
													?>
											</select>
										</div>
									<label class="control-label" >Mata Pelajaran</label>
										<div class="controls">
											<select data-placeholder="Mata Pelajaran" class="chzn-select" style="width:500px;" tabindex="2" name="id_mata_pelajaran" id="id_mata_pelajaran">
          										<option value=""></option>
													<?php
														foreach($mata_pelajaran->result_array() as $f)
														{
															if($f['id_mata_pelajaran']==$id_mata_pelajaran)
																{
																	?>
																		<option value="<?php echo $f['id_mata_pelajaran']; ?>" selected="selected"><?php echo $f['nama_pelajaran']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['id_mata_pelajaran']; ?>"><?php echo $f['nama_pelajaran']; ?></option>
																	<?php
																}
														}
													?>
											</select>
										</div>
									<label class="control-label" >Kelas</label>
										<div class="controls">
											<select data-placeholder="Kelas" class="chzn-select" style="width:500px;" tabindex="2" name="id_kelas" id="id_kelas">
          										<option value=""></option>
													<?php
														foreach($kelas->result_array() as $f)
														{
															if($f['id_kelas']==$id_kelas)
																{
																	?>
																		<option value="<?php echo $f['id_kelas']; ?>" selected="selected"><?php echo $f['nama_kelas']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['id_kelas']; ?>"><?php echo $f['nama_kelas']; ?></option>
																	<?php
																}
														}
													?>
											</select>
										</div>
										<label class="control-label" >Hari</label>
										<div class="controls">
											<select data-placeholder="Hari" class="chzn-select" style="width:500px;" tabindex="2" name="id_hari" id="id_hari">
          										<option value=""></option>
													<?php
														foreach($hari->result_array() as $f)
														{
															if($f['id_hari']==$id_hari)
																{
																	?>
																		<option value="<?php echo $f['id_hari']; ?>" selected="selected"><?php echo $f['nama_hari']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['id_hari']; ?>"><?php echo $f['nama_hari']; ?></option>
																	<?php
																}
														}
													?>
											</select>
										</div>
										<label class="control-label" >Jam Pelajaran </label>
										<div class="controls">
											<select data-placeholder="Jam Pelajaran " class="chzn-select" style="width:500px;" tabindex="2" name="id_jam" id="id_jam">
          										<option value=""></option>
													<?php
														foreach($jam->result_array() as $f)
														{
															if($f['id_jam']==$id_jam)
																{
																	?>
																		<option value="<?php echo $f['id_jam']; ?>" selected="selected"><?php echo $f['jam']; ?></option>
																	<?php
																}
															else
																{
																	?>
																		<option value="<?php echo $f['id_jam']; ?>"><?php echo $f['jam']; ?></option>
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
