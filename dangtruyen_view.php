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
    <title>Đăng Truyện</title>
</head>
<body>
<?php require("vien_dau_trang.php") ?>
    <div class="container">
        <div class="text-center">
            <h3 class="display-3">Đăng Truyện</h3>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form action="dangtruyen_controller/dangtruyen" method="post" enctype="multipart/form-data"">
                    <div class="form-group row align-items-center">
                        <label for="anhavatar" class="col-sm-3 col-form-label text-right">Ảnh đại diện</label>
                        <div class="col-sm-9">
                            <input name="anhavatar" type="file" class="form-control" id="anhavatar" placeholder="Upload ảnh">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mt-4">
                        <label for="tentruyen" class="col-sm-3 col-form-label text-right">Tên truyện</label>
                        <div class="col-sm-9">
                            <input name="tentruyen" type="text" class="form-control" id="tentruyen" placeholder="Tên truyện">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mt-4">
                        <label for="theloaitruyen" class="col-sm-3 col-form-label text-right">Thể loại truyện</label>
                        <div class="col-sm-9">
                            <select name="theloaitruyen" class="form-control" id="theloaitruyen">
                                <option value="" disabled selected>Chọn thể loại truyện</option>
                                <option value="huyen-huyen">Huyền Huyễn</option>
                                <option value="kiem-hiep">Kiếm Hiệp</option>
                                <option value="lich-su">Lịch Sử</option>
                                <option value="ngon-tinh">Ngôn Tình</option>
                                <option value="tien-hiep">Tiên Hiệp</option>
                                <option value="di-gioi">Dị giới</option>
                                <option value="do-thi">Đô Thị</option>
                                <option value="huyen-ao">Huyền ảo</option>
                                <option value="trinh-tham">Trinh Thám</option>
                                <option value="co-dai">Cổ đại</option>
                                <option value="he-thong">Hệ thống</option>
                                <option value="khoa-huyen">Khoa huyễn</option>
                                <option value="quan-su">Quân sự</option>
                                <option value="vong-du">Võng du</option>
                                <option value="xuyen-khong">Xuyên không</option>
                                <option value="co-tien-hiep">Cổ tiên hiệp</option>
                                <option value="linh-di">Linh Dị</option>
                                <option value="ma-phap">Ma pháp</option>
                                <option value="mat-the">Mạt thế</option>
                                <option value="quan-truong">Quan trường</option>
                                <option value="the-thao">Thể thao</option>
                                <option value="sac-hiep">Sắc hiệp</option>
                                <option value="da-su">Dã sử</option>
                                <option value="hai-huoc">Hài hước</option>
                                <option value="thanh-xuan">Thanh xuân</option>
                                <option value="tieu-thuyet-lang-man-phuong-tay">Tiểu thuyết lãng mạn phương Tây</option>

                                
                                <option value="vo-thuat">Võ Thuật</option>
                                <option value="van-hoc-viet-nam">Văn học Việt Nam</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mt-4">
                        <label for="tacgia" class="col-sm-3 col-form-label text-right">Tác giả</label>
                        <div class="col-sm-9">
                            <input name="tacgia" type="text" class="form-control" id="tacgia" placeholder="Tên tác giả">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mt-4">
                        <label for="mota" class="col-sm-3 col-form-label text-right">Mô tả truyện</label>
                        <div class="col-sm-9">
                            <textarea name="mota" class="form-control" id="mota" placeholder="Nhập mô tả truyện" rows="5" maxlength="500"></textarea>
                            <small class="text-muted" id="word-count-mota">0/500 từ</small>
                        </div>
                    </div>



                    <div class="form-group row mt-4">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Đăng truyện</button>
                            <a href="<?= base_url() ;?>index.php/dangtruyen_controller/viettruyen" class="btn btn-danger">Bắt đầu viết</a>
                        </div>
                    </div>
                </form>
                
                    <!-- <script src="<?= base_url() ;?>js/nhap_chapter.js"></script> -->
            </div>
            <!-- Hiển thị danh sách truyện -->
            
    
    
</body>
</html>