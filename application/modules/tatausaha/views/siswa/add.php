		<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>siswa" title="Go to Siswa" class="tip-bottom"><i class="icon icon-user"></i> Siswa</a>
				<a href="#" class="current"> <?php echo $status; ?> Data Siswa</a>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php echo form_open_multipart('tatausaha/siswa/save','class="form-horizontal"'); ?>
						<?php if(validation_errors()) { ?>
						<div class="alert alert-block">
	  						<button type="button" class="close" data-dismiss="alert">×</button>
	  						<h4>Terjadi Kesalahan!</h4>
						<?php echo validation_errors(); ?>
						</div>
						<?php } ?>
							<div class="widget-box">
								<div class="widget-title">
								<h5><?php echo $status; ?> Data Siswa</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal" />
										
									<label class="control-label" for="nis">NIS</label>
									<div class="controls">
										<input type="text" class="span6" name="nis" id="nis" value="<?php echo $nis; ?>" placeholder="NIS">
									</div>
									<label class="control-label">Nama Siswa</label>
									<div class="controls">
										<input type="text" class="span6" name="nama" id="nama" value="<?php echo $nama; ?>" placeholder="Nama Siswa">
									</div>
									<label class="control-label">Nama Panggilan</label>
									<div class="controls">
										<input type="text" class="span6" name="nama_panggilan" id="nama_panggilan" value="<?php echo $nama_panggilan; ?>" placeholder="Nama Panggilan">
									</div>
									<label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
									<div class="controls">
											<select data-placeholder="Jenis Kelamin" class="chzn-select" style="width:500px;" tabindex="2" name="jenis_kelamin" id="jenis_kelamin">
												<?php
												$laki="";$perempuan="";$kosong1="";
												if($jenis_kelamin=="Laki-Laki"){ $laki='selected="selected"';$perempuan="";$kosong1=""; }
												else if($jenis_kelamin=="Perempuan"){ $laki='';$perempuan='selected="selected"';$kosong1=""; }
												else { $laki='';$perempuan='';$kosong1='selected="selected"'; }
												?>
          											<option value="" <?php echo $kosong1; ?>></option>
          											<option value="Laki-Laki" <?php echo $laki; ?>>Laki-Laki</option>
          											<option value="Perempuan" <?php echo $perempuan; ?>>Perempuan</option>
											</select>
									</div>
									<label class="control-label" for="agama">Agama</label>
									<div class="controls">
											<select data-placeholder="Agama" class="chzn-select" style="width:500px;" tabindex="2" name="agama" id="agama">
												<?php
												$islam="";$hindu="";$budha="";$protestan="";$katolik="";$konghucu="";$lainnya="";$kosong="";$kristen="";
												if($agama==""){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kosong='selected="selected"';$kristen=""; }
												else if($agama=="Hindu"){ $islam='';$hindu='selected="selected"';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kristen="";$kosong=""; }
												else if($agama=="Budha"){ $islam='';$hindu='';$budha='selected="selected"';$protestan='';$katolik='';$konghucu='';$lainnya='';$kristen="";$kosong=""; }
												else if($agama=="Kristen"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kosong="";$kristen='selected="selected"'; }
												else if($agama=="Kristen Protestan"){ $islam='';$hindu='';$budha='';$protestan='selected="selected"';$katolik='';$konghucu='';$kristen="";$lainnya='';$kosong=""; }
												else if($agama=="Kristen Katolik"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='selected="selected"';$konghucu='';$kristen="";$lainnya='';$kosong=""; }
												else if($agama=="Konghucu"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='selected="selected"';$lainnya='';$kristen="";$kosong=""; }
												else if($agama=="Lainnya"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='selected="selected"';$kristen="";$kosong=""; }
												else if($agama=="Islam"){ $islam='selected="selected"';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kristen="";$kosong=""; }
												?>
          											<option value="" <?php echo $kosong; ?>></option>
          											<option value="Islam" <?php echo $islam; ?>>Islam</option>
          											<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
								          			<option value="Budha" <?php echo $budha; ?>>Budha</option>
								          			<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
								          			<option value="Kristen Protestan" <?php echo $protestan; ?>>Kristen Protestan</option>
								          			<option value="Kristen Katolik" <?php echo $katolik; ?>>Kristen Katolik</option>
								          			<option value="Konghucu" <?php echo $konghucu; ?>>Konghucu</option>
								          			<option value="Lainnya" <?php echo $lainnya; ?>>Lainnya</option>
											</select>
									</div>
									<label class="control-label">Tempat Lahir</label>
									<div class="controls">
										<input type="text" class="span6" name="tempat_lahir" id="tempat_lahir" value="<?php echo $tempat_lahir; ?>" placeholder="Tempat Lahir">
									</div>
                                    <label class="control-label">Tanggal Lahir</label>
                                    <div class="controls">
                                        <input type="text"  name="tanggal_lahir" data-date-format="dd-mm-yyyy" value="<?php echo $tanggal_lahir; ?>"class="datepicker" placeholder="Tanggal Lahir"/>
                                    </div>
                                    <label class="control-label" for="status_anak">Status Anak</label>
									<div class="controls">
											<select data-placeholder="Status Anak" class="chzn-select" style="width:500px;" tabindex="2" name="status_anak" id="status_anak">
												<?php
												$kandung="";$angkat="";$tiri="";$lainnya="";$kosong2="";
												if($status=="kandung"){ $kandung='selected="selected"';$angkat="";$tiri="";$lainnya="";$kosong2=""; }
												else if($status=="angkat"){ $kandung='';$angkat='selected="selected"';$tiri="";$lainnya="";$kosong2=""; }
												else if($status=="tiri"){ $kandung='';$angkat='';$tiri='selected="selected"';$lainnya="";$kosong2=""; }
												else if($status=="lainnya"){ $kandung='';$angkat='';$tiri='';$lainnya='selected="selected"';$kosong2=""; }
												else { $kandung='';$angkat='';$tiri="";$lainnya="";$kosong2='selected="selected"'; }
												?>
          											<option value="" <?php echo $kosong2; ?>></option>
          											<option value="Laki-Laki" <?php echo $kandung; ?>>Kandung</option>
          											<option value="Perempuan" <?php echo $angkat; ?>>Angkat</option>
          											<option value="Laki-Laki" <?php echo $tiri; ?>>Tiri</option>
          											<option value="Perempuan" <?php echo $lainnya; ?>>Lainya</option>
											</select>
									</div>
									<label class="control-label" for="riwayat">Riwayat Kesehatan</label>
									<div class="controls">
								  		<textarea class="span6" style="outline:none; resize:none;" name="riwayat" id="riwayat" placeholder= "Riwayat Kesehatan"><?php echo $riwayat; ?></textarea>
									</div>
									<label class="control-label" for="asal">Asal Sekolah</label>
									<div class="controls">
								  		<textarea class="span6" style="outline:none; resize:none;" name="asal" id="asal" placeholder= "Asal Sekolah"><?php echo $asal; ?></textarea>
									</div>
									<label class="control-label" for="alamat_lengkap">Alamat Lengkap</label>
									<div class="controls">
								  		<textarea class="span6" style="outline:none; resize:none;" name="alamat_lengkap" id="alamat_lengkap" placeholder= "Alamat"><?php echo $alamat_lengkap; ?></textarea>
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
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" class="span6" name="username" id="username" value="<?php echo $username; ?>" placeholder="Username">
									</div>
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" class="span6" name="password" id="password" value="<?php echo $password; ?>" placeholder="Password">
									</div>
									<label class="control-label">Status</label>
									<div class="controls">
										<input type="text" class="span6" name="stts" id="stts" value="<?php echo $stts; ?>" readonly>
									</div>
									<input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
									<input type="hidden" name="status" value="<?php echo $status; ?>">
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
