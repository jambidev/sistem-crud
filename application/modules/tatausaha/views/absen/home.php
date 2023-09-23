			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>absen" class="current">Absen</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<div id="searchs">
									<?php echo form_open("tatausaha/absen/search", 'class="navbar-form pull-right"'); ?>
		  								<input type="text" class="span3" name="cari" placeholder="Masukkan kata kunci pencarian">
		  								<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari Data Absen</button>
		  								
									<?php echo form_close(); ?>
								</div>
								<h5>Data absen</h5>
								<div class="buttons">
									<a href="<?php echo base_url(); ?>tatausaha/absen/add" class="btn btn-primary"><i class="icon-plus icon-white"></i> Tambah Data Absen</a>
								</div>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
        						<th>NIS</th>
        						<th>Nama</th>
        						<th>Tanggal</th>
								<th>Absen</th>
								
      						</tr>
    					</thead>
    					<tbody>
							<?php
								$no=$tot+1;
								foreach($absensi->result_array() as $f)
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
        						<td ><?php echo $f['nis']; ?></td>
        						<td ><?php echo $f['nama']; ?></td>
        						<td ><?php echo $f['tgl']; ?></td>
        						<td ><?php echo $f['absen']; ?></td>
	    							
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
