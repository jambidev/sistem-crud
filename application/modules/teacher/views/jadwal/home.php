			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>teacher/jadwal" class="current">Jadwal Mengajar</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<h5>Jadwal Mengajar</h5>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
        						<th>Hari</th>
        						<th>Jam</th>
       						 	<th>NIP</th>
        						<th>Nama Guru</th>
								<th>Mata Pelajaran</th>
								<th>Kelas</th>
      						</tr>
    					</thead>
    					<tbody>
							<?php
								$no=$tot+1;
								foreach($jadwal->result_array() as $f)
								{
									if ($f['id_guru']==$this->session->userdata('id_guru'))
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
       							<td ><?php echo $f['nama_hari']; ?></td>
       							<td ><?php echo $f['jam']; ?></td>
        						<td ><?php echo $f['nip']; ?></td>
        						<td ><?php echo $f['nama']; ?></td>
        						<td ><?php echo $f['nama_pelajaran']; ?></td>
        						<td ><?php echo $f['nama_kelas']; ?></td>
    						</tr>
							<?php
	 							$no++;
	 							}
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
