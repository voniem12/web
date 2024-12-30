<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    
   

    
    <link rel="stylesheet" href="<?= base_url('css/menu.css'); ?>">

</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href=" <?= base_url() ;?>index.php/Truyentt">TRUYENTT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                

                <ul class="navbar-nav ms-auto" id="main-menu">
                    <li class="nav-item me-5">
                    <a class="fas fa-book-open" href="#"></a>
                    </li>
                    <li class="nav-item me-5">
                    <a class="far fa-bell" href="#"></a>
                    </li>
                    <li class="nav-item me-5">
                    <a class="fas fa-plus" href="<?= base_url() ;?>index.php/dangtruyen_controller"></a>
                    </li>
                    <li class="nav-item">
                        <?php if ($this->session->userdata('user_id')): ?>
                            <!-- Người dùng đã đăng nhập, hiển thị avatar -->
                            <a class="nav-link" href="javascript:void(0);">
                                <img src="<?= $this->session->userdata('avatar'); ?>" alt="Avatar" class="rounded-circle" width="30" height="30">
                            </a>
                            <ul class="sub-menu">
                                <li class="user-info">
                                    <img src="<?= $this->session->userdata('avatar'); ?>" alt="Avatar" class="rounded-circle" width="50" height="50">
                                    <h2><?= $this->session->userdata('username'); ?></h2>
                                </li>
                                <li class="grid-container">
                                    <div><a href="" class="btn btn-warning">Sửa thông tin</a></div>
                                    <div><a href="" class="btn btn-success">Truyện đã viết</a></div>
                                    <div><a href="" class="btn btn-danger">Linh thạch</a></div>
                                    <div><a href="<?= base_url(); ?>index.php/Truyentt/logout" class="btn btn-secondary">Đăng xuất</a></div>
                                </li>
                            </ul>
                        <?php else: ?>
                            <!-- Người dùng chưa đăng nhập, điều hướng đến trang đăng nhập -->
                            <a class="fas fa-user" href="<?= base_url(); ?>index.php/Truyentt/dangnhap"></a>
                        <?php endif; ?>
                    </li>



                </ul>
            </div>
</nav>