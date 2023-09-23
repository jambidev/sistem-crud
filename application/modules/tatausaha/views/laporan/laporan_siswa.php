			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>siswa" class="current">Siswa</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<div id="searchs">
									<?php echo form_open("tatausaha/guru/search", 'class="navbar-form pull-right"'); ?>
										<div class="controls">
											<select data-placeholder="Kelas" class="chzn-select" style="width:100px;" tabindex="2" name="id_kelas" id="id_kelas">
          										<option value=""></option>
													<?php
														foreach($siswa->result_array() as $f)
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
		  								<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari Data </button>
									<?php echo form_close(); ?>
								</div>
								<h5>Data Siswa</h5>
								<div class="buttons">
									<a href="<?php echo base_url(); ?>tatausaha/laporan_siswa/prin" class="btn btn-success"><i class="icon-print icon-white"></i> Cetak Data </a>
								</div>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
       						 	<th>NIS</th>
        						<th>Nama Siswa</th>
        						<th>Jenis Kelamin</th>
								<th>Agama</th>
								<th>Tempat Lahir</th>
								<th>Alamat</th>
								<th>Status</th>
      						</tr>
    					</thead>
    					<tbody>
							<?php
								$no=$tot+1;
								foreach($siswa->result_array() as $f)
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
        						<td ><?php echo $f['nis']; ?></td>
        						<td ><?php echo $f['nama']; ?></td>
        						<td ><?php echo $f['jenis_kelamin']; ?></td>
        						<td ><?php echo $f['agama']; ?></td>
        						<td ><?php echo $f['tempat_lahir']; ?></td>
        						<td ><?php echo $f['alamat_lengkap']; ?></td>
        						<td ><?php if ($f['stts_siswa']== 1) 
        							{
        								echo "Aktif";
        							}
        								else
        								{
        								echo "Nonaktif";
        								}
        							 ?>
        						</td>
    						</tr>
							<?php
	 							$no++;
	 							}
	 						?>
						</tbody>
					</table>  
							<div class="pagination pagination-centered">
								<ul>
									<?php
										echo $paginator;
									?>
								</ul>
							</div>
				</section>
				</div>
			</div>
		</div>
	</div>
				<div class="row-fluid">
					<div id="footer" class="span12">
						<p><?php echo $GLOBALS['site_footer']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
