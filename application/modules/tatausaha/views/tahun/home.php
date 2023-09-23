			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>guru" class="current">Tahun Ajaran</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<div id="searchs">
									<?php echo form_open("tatausaha/tahun/search", 'class="navbar-form pull-right"'); ?>
		  								<input type="text" class="span3" name="cari" placeholder="Masukkan kata kunci pencarian">
		  								<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari Tahun Ajaran</button>
		  								
									<?php echo form_close(); ?>
								</div>
								<h5>Tahun Ajaran</h5>
								<div class="buttons">
									<a href="<?php echo base_url(); ?>tatausaha/tahun/add" class="btn btn-primary"><i class="icon-plus icon-white"></i> Tambah Tahun Ajaran</a>
								</div>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
       						 	<th>Tahun</th>
       						 	<th>Status</th>
       						 	<th>Aksi</th>
       						 	<th>Aksi</th>
      						</tr>
    					</thead>
    					<tbody>
							<?php
								$no=$tot+1;
								foreach($tahun->result_array() as $f)
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
        						<td ><?php echo $f['tahun']; ?></td>
        						<td ><?php if ($f['status']== 1) 
        							{
        								echo "Aktif";
        							}
        								else
        								{
        								echo "Nonaktif";
        								}
        							 ?></td>
        						<td>
	        							
	        						<?php if($f['status']== 1) 
										{
											echo	'<div class="btn-group">';
	          								echo	'<button class="btn btn-small small-box btn btn-danger btn-mini" href="#'.$f['id_tahun'].'"><i class="icon-ok-circle "></i>&nbspNonaktif</button>';
		        							echo	'</div>';
		        							
										}
											else
												{
											echo	'<div class="btn-group">';
	          								echo	'<a class="btn btn-small small-box btn btn-success btn-mini" href="tahun/aktif/'.$f['id_tahun'].'"><i class="icon-ok-circle"></i>&nbspAktif</a>';
		        							echo	'</div>';
												}
        							?>
								</td>	 
	    							<td>
	        							<div class="btn-group">
	          								<a class="btn btn-small small-box" href="<?php echo base_url(); ?>tatausaha/tahun/detail/<?php echo $f['id_tahun']; ?>"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          								<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          									<ul class="dropdown-menu">
	            									<li><a href="<?php echo base_url(); ?>tatausaha/tahun/edit/<?php echo $f['id_tahun']; ?>" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
	            									<li><a href="<?php echo base_url(); ?>tatausaha/tahun/delete/<?php echo $f['id_tahun']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
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
