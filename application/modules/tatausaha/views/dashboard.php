			<div id="breadcrumb">
				<a href="#" title="Dashboard" class="tip-bottom" class="current"><i class="icon-home"></i> Dashboard</a>
			</div>
		<div class="container-fluid">	
			<div class="row-fluid">
					<div class="span12">
						<div class="alert alert-info">
							Selamat Datang <strong><?php echo $this->session->userdata('nama'); ?></strong>. Silahkan Mulai Untuk Melakukan Pengolahan Nilai Online Siswa
							<a href="#" data-dismiss="alert" class="close">×</a>
						</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title"></div>
							<div class="widget-content">
								<div class="hero-unit">
							       <p><?php echo $GLOBALS['site_welcome']; ?></p>
      							</div>
								
							</div>							
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
