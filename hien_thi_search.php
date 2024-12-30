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
    <title>Document</title>
</head>
<body>
<?php require("vien_dau_trang.php") ?>
<div class="container mt-4"> 
    <h2>Kết quả tìm kiếm:</h2>
    <div class="row">
    <?php if (isset($noidunghienthi) && !empty($noidunghienthi)) : ?>
    <?php foreach ($noidunghienthi as $row) : ?>
        <div class="col-md-3">
            <div class="card mb-3" style="height: 350px; overflow: hidden;"> 
                
                <div class="image-container" style="height: 150px; overflow: hidden;">
                    <img class="card-img-top img-fluid w-100" src="<?php echo $row->cover_image; ?>" alt="Cover Image" style="height: 100%; object-fit: cover;">
                </div>
                
                <div class="card-body" style="height: 200px; overflow: hidden;">
                    <h4 class="card-title tentruyen"><a href="<?php echo base_url(); ?>index.php/Truyentt/gioi_thieu_truyen/<?= $row->id ;?>" style="text-decoration:none; color:aquamarine"><?php echo $row->title ;?></a></h4>
                    <p class="card-text tacgia">Tác Giả: <?php echo $row->author ;?></p>
                    <p class="card-text theloai">Thể loại: <?php echo $row->category_name ;?></p>
                    <p class="card-text sochuong">Số chương: <?php echo $row->chapter_count;?> </p>
                    
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php else : ?>
        <p>Không có kết quả nào.</p>
    <?php endif; ?>
</div>

</div>
                        <a href="<?= base_url() ;?>index.php/Truyentt" class="btn btn-primary">Quay lại tìm kiếm</a>
            </div>
</body>
</html>