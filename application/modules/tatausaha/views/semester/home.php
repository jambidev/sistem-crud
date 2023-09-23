
		<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>guru" class="current">Semester</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<div id="searchs">
									<?php echo form_open("tatausaha/guru/search", 'class="navbar-form pull-right"'); ?>
									<?php echo form_close(); ?>
								</div>
								<h5>Data Semester</h5>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No</th>
       						 	<th>Semester</th>
       						 	<th>Status</th>
       						 	<th>Singkatan</th>
								<th>Aksi</th>
      						</tr>
    					</thead>
    					<tbody>
							<?php
								$no=$tot+1;
								foreach($semester->result_array() as $f)
								{
							?>
    						<tr>
    							<td ><?php echo $no; ?></td>
       							<td ><?php if ($f['id_semester']== 1) 
        							{
        								echo "Ganjil";
        							}
        								else
        								{
        								echo "Genap";
        								}
        							 ?></td>
        						<td ><?php if ($f['nama_status']== 1) 
        							{
        								echo "Aktif";
        							}
        								else
        								{
        								echo "Nonaktif";
        								}
        							 ?></td>
        						<td ><?php echo $f['singkat']; ?></td>
        						
	    						<td>
	        							
	        						<?php if($f['nama_status']== 1) 
										{
											echo	'<div class="btn-group">';
	          								echo	'<a class="btn btn-small small-box btn btn-danger btn-mini" href="semester/nonaktif/'.$f['id_semester'].'"><i class="icon-ok-circle "></i>&nbspNonaktif</a>';
		        							echo	'</div>';
		        							
										}
											else
												{
											echo	'<div class="btn-group">';
	          								echo	'<a class="btn btn-small small-box btn btn-success btn-mini" href="semester/aktif/'.$f['id_semester'].'"><i class="icon-ok-circle"></i>&nbspAktif</a>';
		        							echo	'</div>';
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
