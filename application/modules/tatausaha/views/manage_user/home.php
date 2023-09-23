		<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>dashboard" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
				<a href="<?php echo base_url(); ?>manage_user" class="current">Pengaturan Pengguna</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<div id="searchs">
									<?php echo form_open("guru/search", 'class="navbar-form pull-right"'); ?>
		  								<input type="text" class="span3" name="cari" placeholder="Masukkan kata kunci pencarian">
		  								<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari Data </button>
									<?php echo form_close(); ?>
								</div>
								<h5>Data Pengguna</h5>
								<div class="buttons">
									<a href="<?php echo base_url(); ?>manage_user/add" class="btn btn-primary"><i class="icon-plus icon-white"></i> Tambah Data </a>
								</div>
							</div>
				<section>			
  					<table class="table ">
    					<thead>
      						<tr>
        						<th>No.</th>
       						 	<th>Username</th>
        						<th>Nama Lengkap</th>
        						<th>Status</th>
								<th>Aksi</th>
      						</tr>
    					</thead>
    					<tbody>
							<?php
								$no=$tot+1;
								foreach($user->result_array() as $f)
								{
							?>
    						<tr>
       							<td ><?php echo $no; ?></td>
        						<td ><?php echo $f['username']; ?></td>
        						<td ><?php echo $f['nama_lengkap']; ?></td>
        						<td ><?php echo $f['stts']; ?></td>
	    							<td>
	        							<div class="btn-group">
	          								<a class="btn btn-small small-box" href="<?php echo base_url(); ?>manage_user/detail/<?php echo $f['id_user_login']; ?>"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          								<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          									<ul class="dropdown-menu">
	            									<li><a href="<?php echo base_url(); ?>manage_user/edit/<?php echo $f['id_user_login']; ?>" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
	            									<li><a href="<?php echo base_url(); ?>manage_user/delete/<?php echo $f['id_user_login']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
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
							<div class="pagination  pagination-centered btn-inverse">
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
