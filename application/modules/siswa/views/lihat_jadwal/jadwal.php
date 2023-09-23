			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>absen" class="current">Lihat Nilai</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
							<div class="widget-title">
								
								<h5>Nilai Siswa</h5>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
        						<th>Guru</th>
        						<th>Mata Plejaran</th>
        						<th>Nilai</th>
								<th>Aksi</th>
      						</tr>
    					</thead>
    					<tbody>
							<?php
								$no=$tot+1;
								
								foreach($siswa->result_array() as $f)
								{
									if ($f['nis']==$this->session->userdata('nis'))
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
        						<td ><?php echo $f['nama']; ?></td>
        						<td ><?php echo $f['nama_pelajaran']; ?></td>
        						<td ><?php echo $f['nilai']; ?></td>
								<td>
	        						<div class="btn-group">
	          							<a class="btn btn-small small-box" href="<?php echo base_url(); ?>tatausaha/guru/detail/<?php echo $f['nis']; ?>"><i class="icon-ok-circle"></i>Detail</a>
	        						</div><!-- /btn-group -->
								</td>
    						</tr>
							<?php
	 							$no++;
	 							}
	 						}
	 						?>
						</tbody>
					</table>  
						<div class="control-group">
							<div class="controls">
			  					<a class="btn btn-primary" href="<?php echo base_url(); ?>siswa/lihat_jadwal/index/<?php  ?>">Kembali</a>
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
				<div class="row-fluid">
					<div id="footer" class="span12">
						  <p><?php echo $GLOBALS['site_footer']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
