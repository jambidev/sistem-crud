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
									
									<label class="control-label" >Kode Guru</label>
									<div class="controls">
										<input type="text" class="span6" name="kode_guru" value="<?php echo $kode_guru; ?>" placeholder="NIP" readonly="true">
									</div>	
									<label class="control-label" for="nip">NIP</label>
									<div class="controls">
										<input type="text" class="span6" name="nip" id="nip" value="<?php echo $nip; ?>" placeholder="NIP" disabled>
									</div>
									<label class="control-label">Nama Guru</label>
									<div class="controls">
										<input type="text" class="span6" name="nama" id="nama" value="<?php echo $nama; ?>" placeholder="Nama Guru" disabled>
									</div>
									<label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
									<div class="controls">
											<select data-placeholder="Jenis Kelamin" class="chzn-select" style="width:500px;" tabindex="2" name="jenis_kelamin" id="jenis_kelamin" disabled>
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
											<select data-placeholder="Agama" class="chzn-select" style="width:500px;" tabindex="2" name="agama" id="agama" disabled>
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
										<input type="text" class="span6" name="tempat_lahir" id="tempat_lahir" value="<?php echo $tempat_lahir; ?>" placeholder="Tempat Lahir" disabled>
									</div>
                                    <label class="control-label">Tanggal Lahir</label>
                                    <div class="controls">
                                        <input type="text"  name="tanggal_lahir" data-date-format="dd-mm-yyyy" value="<?php echo $tanggal_lahir; ?>"class="datepicker" placeholder="Tanggal Lahir"/ disabled>
                                    </div>
									<label class="control-label" for="alamat_lengkap">Alamat Lengkap</label>
									<div class="controls">
								  		<textarea class="span6" style="outline:none; resize:none;" name="alamat_lengkap" id="alamat_lengkap" placeholder= "Alamat" disabled><?php echo $alamat_lengkap; ?></textarea>
									</div>
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" class="span6" name="username" id="username" value="<?php echo $username; ?>" placeholder="Username" disabled>
									</div>
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" class="span6" name="password" id="password" value="<?php echo $password; ?>" placeholder="Password" disabled>
									</div>
									<label class="control-label">Status</label>
									<div class="controls">
										<input type="text" class="span6" name="stts" id="stts" value="<?php echo $stts; ?>" readonly>
									</div>
									<input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
									<input type="hidden" name="stts" value="<?php echo $stts; ?>">
										<div class="control-group">
											<div class="controls">
			  									<a class="btn btn-primary" href="<?php echo base_url(); ?>tatausaha/guru/index/<?php  ?>">Kembali</a>
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
