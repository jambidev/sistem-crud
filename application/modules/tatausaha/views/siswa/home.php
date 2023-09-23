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
		  								<input type="text" class="span3" name="cari" placeholder="Masukkan kata kunci pencarian">
		  								<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari Data </button>
									<?php echo form_close(); ?>
								</div>
								<h5>Data Siswa</h5>
								<div class="buttons">
									<a href="<?php echo base_url(); ?>tatausaha/siswa/add" class="btn btn-primary"><i class="icon-plus icon-white"></i> Tambah Data </a>
								</div>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
      							<th>
      							<input type="checkbox" name="chk[]" />
      							</th>
        						<th>No.</th>
       						 	<th>NIS</th>
        						<th>Nama Siswa</th>
        						<th>Jenis Kelamin</th>
								<th>Agama</th>
								<th>Tempat Lahir</th>
								<th>Alamat</th>
								<th>Status</th>
								<th>Aksi</th>
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
    							<td><input type="checkbox" /></td>
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
        						<td>
	        						<?php if($f['stts_siswa']== 1) 
										{
											echo	'<div class="btn-group">';
	          								echo	'<a class="btn btn-small small-box btn btn-danger btn-mini" href="siswa/nonaktif/'.$f['nis'].'"><i class="icon-ok-circle"></i>&nbspAktif</a>';
		        							echo	'</div>';
		        							
										}
											else
												{
											echo	'<div class="btn-group">';
	          								echo	'<a class="btn btn-small small-box btn btn-success btn-mini" href="siswa/aktif/'.$f['nis'].'"><i class="icon-ok-circle"></i>&nbspAktif</a>';
		        							echo	'</div>';
												}
        							?>
								</td>	
	    							<td>
	        							<div class="btn-group">
	          								<a class="btn btn-small small-box" href="<?php echo base_url(); ?>tatausaha/siswa/detail/<?php echo $f['nis']; ?>"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          								<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          									<ul class="dropdown-menu">
	            									<li><a href="<?php echo base_url(); ?>tatausaha/siswa/edit/<?php echo $f['nis']; ?>" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
	            									<li><a href="<?php echo base_url(); ?>tatausaha/siswa/delete/<?php echo $f['nis']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
	          									</ul>
	        							</div><!-- /btn-group -->
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
