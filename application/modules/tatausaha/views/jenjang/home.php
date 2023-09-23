		<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>mata_pelajaran" class="current">Jenjang Pendidikan</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<h5>Data Jenjang</h5>
								<div class="buttons">
									<a href="<?php echo base_url(); ?>tatausaha/jenjang/add" class="btn btn-primary"><i class="icon-plus icon-white"></i> Tambah Data </a>
								</div>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
        						<th>Jenjang Pendidikan</th>
								<th>Aksi</th>
      						</tr>
    					</thead>
    					<tbody>
							<?php
								$no=$tot+1;
								foreach($jenjang->result_array() as $f)
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
        						<td ><?php echo $f['nama_jenjang']; ?></td>
	    							<td>
	        							<div class="btn-group">
	          								<a class="btn btn-small small-box" href="<?php echo base_url(); ?>tatausaha/jenjang/detail/<?php echo $f['id_jenjang']; ?>"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          								<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          									<ul class="dropdown-menu">
	            									<li><a href="<?php echo base_url(); ?>tatausaha/jenjang/edit/<?php echo $f['id_jenjang']; ?>" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
	            									<li><a href="<?php echo base_url(); ?>tatausaha/jenjang/delete/<?php echo $f['id_jenjang']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
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
