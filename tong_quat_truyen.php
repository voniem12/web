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
    <title>Giới thiệu truyện</title>
</head>
<body>
    <?php require('vien_dau_trang.php') ;?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Ảnh bìa -->
                <img src="<?= $tongquat->story->cover_image ;?>" class="img-fluid" alt="Bìa truyện" style="height: 300px; object-fit: cover;">
            </div>
            <div class="col-md-9">
                <!-- Tiêu đề và thông tin truyện -->
                <h3><?= $tongquat->story->title ;?></h3>
                <p class="text-muted"><?= $tongquat->story->author ;?></p>
                
                <div class="d-flex flex-wrap mb-2">
                    <!-- Thẻ thể loại -->
                    <span class="badge bg-info me-1"><?= $tongquat->story->category_name ;?></span>
                   
                </div>
                
                <div class="d-flex flex-wrap mb-3">
                    <!-- Trạng thái và số chương -->
                    <span class="badge bg-success me-2"><?= $tongquat->story->status ;?></span>
                    <span class="badge bg-danger me-2">TT-Dịch</span>
                    <span class="badge bg-secondary me-2">#QBCC</span>
                    <span><?= $tongquat->story->chapter_count ;?> Chương</span>
                    <span class="ms-3"> <?= $tongquat->story->views ;?> Lượt Xem</span>
                    <span class="ms-3"><?= $tongquat->story->likes ;?> Lượt Thích</span>
                </div>
                
                <div class="d-flex align-items-center mb-3">
                    <!-- Điểm số và đánh giá -->
                    <h4 class="me-3">96/100</h4>
                    <div>
                        <span class="text-warning">★★★★★</span>
                        <span>21 đề cử</span>
                    </div>
                </div>
                
                <div class="d-flex">
                    <!-- Nút hành động -->
                    <a href="<?= base_url() ;?>index.php/Truyentt/doc_tu_dau/<?= $tongquat->story->id;?>/1" class="btn btn-primary me-2">Đọc Từ Đầu</a>
                    <a href="#" class="btn btn-warning">Mua Chương VIP </a>
                </div>
            </div>
        </div>
        
        <hr>
        
        <div class="row">
            <div class="col-12">
                <!-- Giới thiệu -->
                <h5>Giới Thiệu</h5>
                <p>
                    <?= $tongquat->story->description ;?>
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
            <h3>Danh sách chương</h3>
            <hr>
            <div class="row">
                <?php foreach ($tongquat->chapters as $index => $chapter): ?>
                    <!-- Mỗi chương chiếm 1/3 hàng -->
                    <div class="col-md-4 mb-3">
                        <div class="chapter-box">
                            <h6 class="small"><a href="<?= base_url() ;?>index.php/Truyentt/doc_tu_dau/<?= $tongquat->story->id;?>/<?= $chapter->chapter_number;?>" style="text-decoration:none">Chương <?= $chapter->chapter_number; ?>: <?= $chapter->title; ?></a></h6>
                            <p class="text-muted small">Ngày tạo: <?= date('Y-m-d H:i:s', strtotime($chapter->created_at)); ?></p>
                            
                        </div>
                    </div>

                    <!-- Tạo hàng mới sau mỗi 3 chương -->
                    <?php if (($index + 1) % 3 == 0): ?>
                        </div><div class="row">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>