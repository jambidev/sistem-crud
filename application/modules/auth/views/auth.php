	<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SIAS :: Sistem Informasi Akademik Siswa</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/unicorn.login.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <div id="logo">
            <img src="<?php echo base_url(); ?>asset/img/logo.png" alt="" />
        </div>
        <?php if(validation_errors()) { ?>
    <div class="alert alert-error alert-block">
             <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Terjadi Kesalahan!</h4>
        <?php echo validation_errors(); ?>
    </div>
    <?php } ?>
    
    <?php if($this->session->flashdata('result_login')) { ?>
    <div class="alert alert-error alert-block">
       <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Terjadi Kesalahan!</h4>
        <?php echo $this->session->flashdata('result_login'); ?>
    </div>
    <?php } ?>
        <div id="loginbox">            
           <?php echo form_open('auth/index'); ?>
				<p>Enter username, password, log-as to continue.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input name="username" required="required" type="text" placeholder="Username" value="<?php echo set_value('username'); ?>"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input name="password" required="required" type="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                         <span class="add-on"><i class="icon-eye-open"></i></span>
                            <select name="stts" id="stts" required="required">
                            <option placeholder="">-- Pilih Status --</option>
                            <option value="administrator">Tata Usaha</option>
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
                </div>
            </form>
         <?php echo form_close(); ?>
        <script src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>  
        <script src="<?php echo base_url(); ?>asset/js/unicorn.login.js"></script> 
    </body>
</html>
