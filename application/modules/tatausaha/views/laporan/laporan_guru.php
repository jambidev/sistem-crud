			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>guru" class="current">Laporan Guru</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<div id="searchs">
								</div>
								<h5>Laporan Data Guru</h5>
								<div class="buttons">
									<a href="<?php echo base_url(); ?>tatausaha/laporan_guru/prin" class="btn btn-success"><i class="icon-print icon-white"></i> Cetak Data Guru</a>
								</div>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
       						 	<th>NIP</th>
        						<th>Nama Guru</th>
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
								foreach($guru->result_array() as $f)
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
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
