			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>teacher" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="#" class="current">Pilih Tahun</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('siswa/lihat_nilai/cari_nilai','class="form-horizontal"'); ?>
							<div class="widget-box">
								<div class="widget-title">
								<h5>Pilih Tahun</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
									<label class="control-label" >Pilih Tahun</label>
										<div class="controls">
											<select data-placeholder="Pilih Tahun" class="chzn-select" style="width:500px;" tabindex="2" name="pilih_tahun" >
          										<option value=""></option>
													<?php
														foreach($pilih_tahun->result_array() as $f)
														{
															if ($f['nis']==$this->session->userdata('nis'))
															{
																if($f['id_tahun']==$id_tahun)
																{
																	?>
																		<option value="<?php echo $f['id_tahun']; ?>" selected="selected"><?php echo tahun_akademik($f['tahun']); ?></option>
																	<?php
																}
																else
																{
																	?>
																		<option value="<?php echo $f['id_tahun']; ?>"><?php echo tahun_akademik($f['tahun']); ?></option>
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