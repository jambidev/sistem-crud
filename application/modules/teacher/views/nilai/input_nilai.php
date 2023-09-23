			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>absen" class="current">Input Nilai</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						
							<div class="widget-title">
								<div id="searchs">
									<?php echo form_open("tatausaha/absen/search", 'class="navbar-form pull-right"'); ?>
		  								<input type="text" class="span3" name="cari" placeholder="Masukkan kata kunci pencarian">
		  								<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari Data Nilai</button>
		  								
									<?php echo form_close(); ?>
									<?php echo form_open_multipart('teacher/nilai/save','class="form-horizontal"'); ?>
								</div>
								<h5>Nilai Siswa</h5>
							</div>
							<div class="controls">
								<input type="hidden" class="span6" name="id_guru"  value="<?php echo $this->session->userdata('id_guru')?>" placeholder="Guru">
							</div>
							<div class="controls">
								<input type="hidden" class="span6" name="kelas"  value="<?php echo $kelas; ?>" placeholder="NILAI">
							</div>
							<div class="controls">
								<input type="hidden" class="span6" name="id_mata_pelajaran"  value="<?php echo $id_mata_pelajaran; ?>" placeholder="NILAI">
							</div>
							<input type="hidden" name="status" value="<?php echo $status; ?>">
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
        						<th>NIS</th>
        						<th>Nama</th>
        						<th>Nilai</th>
								<th>Aksi</th>
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
        						<td >
									<div class="controls">
										<input type="hidden" class="span3" name='nis[]' id="nis" value="<?php echo $f['nis']; ?>"><?php echo $f['nis']; ?>
									</div>
								</td>
        						<td ><?php echo $f['nama']; ?></td>
        						<td >
									<div class="controls">
										<input type="text" class="span3" name="nilai[]" id="nilai" value="<?php echo $nilai; ?>" placeholder="NILAI">
									</div>
								</td>
								<td>
	        						<div class="btn-group">
	          							<a class="btn btn-small small-box" href="<?php echo base_url(); ?>tatausaha/guru/detail/<?php echo $f['nis']; ?>"><i class="icon-ok-circle"></i>Detail</a>
	        						</div><!-- /btn-group -->
								</td>
    						</tr>
							<?php
	 							//$no++;
	 							$jumMhs = $no++;
	 							}
	 						?>
						</tbody>
					</table>  
					<input type="hidden" name="n" value="<?php echo $jumMhs ?>" />
						<div class="control-group">
							<div class="controls">
			  					<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
		  				</div>
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
