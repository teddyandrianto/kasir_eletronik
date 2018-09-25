  <!DOCTYPE html>
  <html class="full" lang="en">
  <!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Login | KASIR ELEKTRONIK</title>

      <link rel="shortcut icon" href="<?php echo base_url();?>assets/landing/img/LOGO_KE.png">
      <link href="<?php echo base_url();?>assets/landing/css/bootstrap.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/landing/css/font-awesome.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/landing/css/nav.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/landing/css/the-big-picture.css" rel="stylesheet">
       <script src="<?php echo base_url();?>assets/landing/js/jquery.js"></script>
      <script src="<?php echo base_url();?>assets/landing/js/bootstrap.js"></script>

    

  </head>

  <body>

     <div class="container">
    <div class="row">
    <?=$this->session->flashdata('pesan')?>       
      <div class="col-sm-4 col-sm-offset-4" style="margin-top: -15px;" >    
                  <div class="well" style="box-shadow: 5px 5px 4px #999999;">
                  
                    <img class="center-block" src="<?php echo base_url();?>assets/landing/img/LOGO_KE.png" width="40%">
                      <h4 class="text-center">Selamat Datang</h4>
                      <h3 class="text-center"><b>KASIR ELEKTRONIK</b></h3>

                      <div class="tab-content ">
                          <div class="tab-pane active in" id="login">
                            
                            <form style="margin-top: 20px;" action="<?php echo base_url('index.php/Login/proses')?>" method= "POST" >
                              
                              <div style="margin-bottom: 25px" class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                          <input id="username" type="text" class="form-control" name="username"  placeholder="Masukan Username" required>                                        
                                      </div> 
                              <div style="margin-bottom: 25px" class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                          <input id="password" type="password" class="form-control" name="password"  placeholder="Masukan Password" required>                                        
                                      </div> 
                               <button type="submit" class="btn btn-success btn-block">Masuk</button>
                            </form>
                          </div>
                      </div>
                    
      
      </div>
    </div>
  </div>
         <!-- Page Content -->

      
  </body>

  </html>
