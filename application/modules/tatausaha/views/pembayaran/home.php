			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>jadwal" class="current">Pembayaran</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<h5>Data Pembayaran</h5>
								<div class="buttons">
									<a href="<?php echo base_url(); ?>tatausaha/pembayaran/add" class="btn btn-primary"><i class="icon-plus icon-white"></i> Tambah </a>
								</div>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
        						<th>Nis</th>
        						<th>Tahun</th>
       						 	<th>Jenis Pembayaran</th>
       						 	<th>Harga</th>
        						<th>Dibayar</th>
								<th>Bulan</th>
								<th>Status</th>
								<th>Aksi</th>
      						</tr>
    					</thead>
    					<tbody>
							<?php
								$no=$tot+1;
								foreach($jadwal->result_array() as $f)
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
       							<td ><?php echo $f['nis']; ?></td>
       							<td ><?php echo $f['tahun']; ?></td>
        						<td ><?php echo $f['nama_pembayaran']; ?></td>
        						<td ><?php echo rupiah($f['harga']); ?></td>
        						<td ><?php echo $f['dibayar']; ?></td>
        						<td ><?php echo $f['nama_bulan']; ?></td>
        						<td ><?php if ($f['dibayar']>=$f['harga']) 
        							{
        								echo	'<div class="btn-group">';
        								echo 	'<a class="btn btn-small small-box btn btn-success btn-mini" <i class="icon-ok-circle "></i>&nbspLunas</a>';
        								echo	'</div>';
        							}
        								else
        								{
        								echo	'<div class="btn-group">';
        								echo 	'<a class="btn btn-small small-box btn btn-danger btn-mini" <i class="icon-ok-circle "></i>&nbspHutang</a>';
        								echo	'</div>';
        								}
        							 ?></td>
	    							<td>
	        							<div class="btn-group">
	          								<a class="btn btn-small small-box" href="<?php echo base_url(); ?>tatausaha/pemabayaran/detail/<?php echo $f['id_pembayaran']; ?>"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          								<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          									<ul class="dropdown-menu">
	            									<li><a href="<?php echo base_url(); ?>tatausaha/pemabayaran/edit/<?php echo $f['id_pembayaran']; ?>" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
	            									<li><a href="<?php echo base_url(); ?>tatausaha/pemabayaran/delete/<?php echo $f['id_pembayaran']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
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
							<div class="pagination  pagination-centered">
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
