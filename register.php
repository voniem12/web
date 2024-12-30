<!DOCTYPE html>
<html>
<head>
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="../css/register.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiper Example</title>
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
          <div class="container " style="height: 50vh;">
          <form id="formRegister" action="<?php echo site_url('Truyentt/process_register'); ?>" method="POST" enctype="multipart/form-data" class="mx-auto " style="max-width: 400px;">
          
              <h3 class="text-center">Đăng Kí Tài Khoản</h3>

              <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
              <div class="mb-3">
                <label for="avataruser" class="form-label">Avatar</label>
                <input type="file" name="avataruser" class="form-control" id="avataruser" placeholder="Chọn avatar" style="height: 30px;">
                <!-- <div id="usernameError" style="color: red; display: none;">Tên không được để trống</div> -->
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Họ và Tên</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Nhập họ và tên" style="height: 30px;">
                <div id="usernameError" style="color: red; display: none;">Tên không được để trống</div>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="text" class="form-control" id="email" placeholder="name@example.com" style="height: 30px;">
                <div id="emailError" style="color: red; display: none;">Email không được để trống</div>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="text" class="form-control" id="password" placeholder="Nhập password" style="height: 30px;">
                <div id="passwordError" style="color: red; display: none;">Password không được để trống</div>
              </div>
              <div class="mb-3">
                <label for="repassword" class="form-label">Nhập Lại Password</label>
                <input type="text" class="form-control" id="repassword" placeholder="" style="height: 30px;">
                <div id="repasswordError" style="color: red; display: none;">Password không được để trống</div>
              </div>
              <div>
                <button type="submit" class="btn btn-info" style="width: 100%;">Đăng Kí</button>
              </div>
              <p class="text-center">
                Bạn đã có tài khoản? <a href="<?= base_url() ;?>index.php/Truyentt/dangnhap">Đăng nhập</a>
              </p>
            </form>
            <!-- <script src="js/register.js"></script> -->
          </div>
</body>