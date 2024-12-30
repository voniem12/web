<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="../css/register.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   
    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>jQueryfileupload/js/vendor/jquery.ui.widget.js"></script>
    <script src="<?php echo base_url(); ?>jQueryfileupload/js/jquery.fileupload.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    </head>
    <body>
    <?php require('vien_dau_trang.php') ;?>
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form id="formLogin" action="<?php echo site_url('Truyentt/process_login'); ?>" method="POST" enctype="multipart/form-data" style="width: 400px;">
              <h3 class="text-center">Đăng Nhập</h3>
              <!-- Hiển thị thông báo thành công -->
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

              <div class="mb-3">
                <label for="email"  class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com" style="height: 30px;">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" id="password" placeholder="Nhập password" style="height: 30px;">
              </div>
              <div id="alertError" class="alert alert-danger" role="alert" style="display: none; width: 100%;">
                Email hoặc mật khẩu không đúng
              </div>
              <div>
                <button type="submit" class="btn btn-info" style="width: 100%;">Đăng Nhập</button>
              </div>
              <p class="text-center">
                Bạn chưa có tài khoản? <a href="<?= base_url() ;?>index.php/Truyentt/dangky">Đăng Kí</a>
              </p>
            </form>
            <!-- <script src="js/login.js"></script> -->
          </div>
    </body>
</html>