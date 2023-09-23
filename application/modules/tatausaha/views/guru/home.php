			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>guru" class="current">Guru</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<div id="searchs">
									<?php echo form_open("tatausaha/guru/search", 'class="navbar-form pull-right"'); ?>
		  								<input type="text" class="span3" name="cari" placeholder="Masukkan kata kunci pencarian">
		  								<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari Data Guru</button>
		  								
									<?php echo form_close(); ?>
								</div>
								<h5>Data Guru</h5>
								<div class="buttons">
									<a href="<?php echo base_url(); ?>tatausaha/guru/add" class="btn btn-primary"><i class="icon-plus icon-white"></i> Tambah Data Guru</a>
								</div>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
        						<th>Kode Guru</th>
       						 	<th>NIP</th>
        						<th>Nama Guru</th>
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
								foreach($guru->result_array() as $f)
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
       							<td ><?php echo $f['kode_guru']; ?></td>
        						<td ><?php echo $f['nip']; ?></td>
        						<td ><?php echo $f['nama']; ?></td>
        						<td ><?php echo $f['jenis_kelamin']; ?></td>
        						<td ><?php echo $f['agama']; ?></td>
        						<td ><?php echo $f['tempat_lahir']; ?></td>
        						<td ><?php echo $f['alamat_lengkap']; ?></td>
        						<td ><?php if ($f['stts_guru']== 1) 
        							{
        								echo "Aktif";
        							}
        								else
        								{
        								echo "Nonaktif";
        								}
        							 ?></td>
        						<td>
	        						<?php if($f['stts_guru']== 1) 
										{
											echo	'<div class="btn-group">';
	          								echo	'<a class="btn btn-small small-box btn btn-danger btn-mini" href="guru/nonaktif/'.$f['id_guru'].'"><i class="icon-ok-circle"></i>&nbspNon Aktif</a>';
		        							echo	'</div>';
		        							
										}
											else
												{
											echo	'<div class="btn-group">';
	          								echo	'<a class="btn btn-small small-box btn btn-success btn-mini" href="guru/aktif/'.$f['id_guru'].'"><i class="icon-ok-circle"></i>&nbspAktif</a>';
		        							echo	'</div>';
												}
        							?>
								</td>	
	    							<td>
	        							<div class="btn-group">
	          								<a class="btn btn-small small-box" href="<?php echo base_url(); ?>tatausaha/guru/detail/<?php echo $f['id_guru']; ?>"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          								<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          									<ul class="dropdown-menu">
	            									<li><a href="<?php echo base_url(); ?>tatausaha/guru/edit/<?php echo $f['id_guru']; ?>" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
	            									<li><a href="<?php echo base_url(); ?>tatausaha/guru/delete/<?php echo $f['id_guru']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
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
