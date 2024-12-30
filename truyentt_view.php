<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   
    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>jQueryfileupload/js/vendor/jquery.ui.widget.js"></script>
    <script src="<?php echo base_url(); ?>jQueryfileupload/js/jquery.fileupload.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/menu.css'); ?>">
    <style>
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
    </style>
    <title>Truyện TT</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url() ;?>index.php/Truyentt">TRUYENTT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
               
                <form class="d-flex mx-auto align-items-stretch" method="POST" action="Truyentt/search">
                    <div class="col-md-12">
                        <input class="form-control me-2" type="text" name="keyword" placeholder="Tìm Truyện" aria-label="Tìm Truyện">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-success" type="submit" name="btn">Tìm Truyện</button>
                    </div>
                </form>

    
        
<!--        
                        <?php if (isset($noidunghienthi) && !empty($noidunghienthi)) : ?>
                            <?php foreach ($noidunghienthi as $row) : ?>
                                <li><?php echo $row->cover_image; ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?> -->
                    </ul>
                </div>



                
                <ul class="navbar-nav me-auto" id="main-menu">
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
                                    <div><a href="<?= base_url() ;?>index.php/dangtruyen_controller/viettruyen" class="btn btn-success">Truyện đã viết</a></div>
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
            </div>
        </nav>

        <div class="container my-4">
            <div class="row">
                <!-- Danh sách thể loại -->
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item  " >
                            <a href=" <?= base_url() ;?>index.php/Truyentt/chu_de/huyen-huyen" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-magic"></i> Huyền Huyễn
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/kiem-hiep" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-shield-alt"></i> Kiếm Hiệp
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/lich-su" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-history"></i> Lịch Sử
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/ngon-tinh" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-heart"></i> Ngôn Tình
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/tien-hiep" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-dragon"></i> Tiên Hiệp
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/di-gioi" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-globe"></i> Dị Giới
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/do-thi" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-city"></i> Đô Thị
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/huyen-ao" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-cloud"></i> Huyền Ảo
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/trinh-tham" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-paw"></i> Trinh Thám
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/he-thong" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-cogs"></i> Hệ Thống
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/linh-di" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-ghost"></i> Linh Dị
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/khoa-huyen" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-vr-cardboard"></i> Khoa Huyễn
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url() ;?>index.php/Truyentt/chu_de/vong-du" class="d-flex justify-content-start w-100" style=" text-decoration: none; color: #333; ">
                                <i class="fas fa-globe"></i> Võng Du
                            </a>
                        </li>
                    </ul>
                </div>
            
        

            <div class="col-md-8" >
            <div class="container mt-4" style="background-color:#333; padding: 20px; border-radius: 5px;">
                    <h2 style="color:azure;">Truyện nổi bật</h2>

                    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="3000">
                        <div class="carousel-inner">
                            <?php if (isset($trinhdien) && !empty($trinhdien)) : ?>
                                <?php $active = true; ?>
                                <?php foreach ($trinhdien as $truyen) : ?>
                                    <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                                        <!-- Hiển thị ảnh -->
                                        <img src="<?php echo  $truyen->cover_image; ?>" class="d-block w-100" alt="Cover Image"  style="height: 400px; object-fit: cover;">

                                        <!-- Hiển thị tên truyện và nút đọc truyện -->
                                        <div class="text-center mt-3">
                                            <h5 style="color:aliceblue"><?php echo $truyen->title; ?></h5>
                                            <a href="<?php echo base_url(); ?>index.php/Truyentt/gioi_thieu_truyen/<?php echo $truyen->id  ;?>" class="btn btn-primary">Đọc truyện ngay</a>
                                        </div>
                                    </div>
                                    <?php $active = false; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Không có truyện nào để hiển thị.</p>
                            <?php endif; ?>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $('.carousel').carousel({
        interval: 3000 // 3seconds
    });
</script>

            </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>