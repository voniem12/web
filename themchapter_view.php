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
    <title>Thêm chương mới</title>
</head>
<body>
<?php require("vien_dau_trang.php") ?>
    <div class="container" >
        <div class="text-center">
            <h1>Tên truyện: <?= $tinhtrangtruyen->title ?></h1>  
            <p>Số chương đã có: <?= $tinhtrangtruyen->chapter_count ?></p> 
        </div>
        
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-6">
            <form action="<?= site_url('dangtruyen_controller/nhapnoidung_chaptervao_database'); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group row align-items-center mt-4" hidden>
                    <label for="story_id" class="col-sm-3 col-form-label text-right">story_id</label>
                    <div class="col-sm-9">
                        <input name="story_id" type="text" class="form-control" id="story_id" 
                        value="<?= $tinhtrangtruyen->id ?>" >
                    </div>
                </div>
                <div class="form-group row align-items-center mt-4">
                    <label for="id_chapter" class="col-sm-3 col-form-label text-right">Chương</label>
                    <div class="col-sm-9">
                        <input name="id_chapter" type="text" class="form-control" id="id_chapter" 
                        value="<?= $tinhtrangtruyen->chapter_count + 1 ?>" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center mt-4">
                    <label for="titlechuong" class="col-sm-3 col-form-label text-right">Tên chương</label>
                    <div class="col-sm-9">
                        <textarea name="titlechuong" class="form-control chapter"  placeholder="Nhập tên chương" rows="1"></textarea>
                       
                    </div>
                </div>
                <div class="form-group row align-items-center mt-4">
                    <label for="noidungchuong" class="col-sm-3 col-form-label text-right">Nội dung chương</label>
                    <div class="col-sm-9">
                        <textarea name="noidungchuong" class="form-control chapter" id="chapter1" placeholder="Nhập mô tả nội dung truyện" rows="5"></textarea>
                        <small class="text-muted" id="word-count-chapter1">0 từ</small>
                    </div>
                </div>


                <div class="form-group row mt-4">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Thêm chap mới</button>
                    </div>
                </div>
            </form>

                    <script src="<?= base_url() ;?>js/nhap_chapter.js"></script>
            </div>
            
            
        
</body>
</html>