			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>teacher" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="#" class="current">Lihat Nilai</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('teacher/lihat_nilai/nilai','class="form-horizontal"'); ?>
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
								<h5>Lihat Nilai</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
									<label class="control-label" >Mata Pelajaran</label>
										<div class="controls">
											<select data-placeholder="Mata Pelajaran" class="chzn-select" style="width:500px;" tabindex="2" name="id_mata_pelajaran" id="id_mata_pelajaran">
          										<option value=""></option>
													<?php
														foreach($mata_pelajaran->result_array() as $f)
														{
															if ($f['id_guru']==$this->session->userdata('id_guru'))
															{
																if($f['id_mata_pelajaran']==$nama)
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
														}
													?>
											</select>
										</div>
									<label class="control-label" >Kelas</label>
										<div class="controls">
											<select data-placeholder="Kelas" class="chzn-select" style="width:500px;" tabindex="2" name="id_kelas" >
          										<option value=""></option>
													<?php
														foreach($kelas->result_array() as $f)
														{
															if ($f['id_guru']==$this->session->userdata('id_guru'))
															{
																if($f['id_kelas']==$nama)
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
														}
													?>
											</select>
										</div>			
										<div class="control-group">
											<div class="controls">
			  									<button type="submit" class="btn btn-primary">Cari Data</button>
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