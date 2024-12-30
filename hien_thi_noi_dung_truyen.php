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
    <title>Chương</title>
</head>
<body>
    

    
        <?= require('header_dau_trang_nd.php') ;?>


    <div class="container">
        <div>
            <div>
                <div class="d-flex justify-content-between mt-6">
                    
                    <?php if ($hienthinoidungchuong->chapter_number > 1): ?>
                        <a href="<?= base_url(); ?>index.php/Truyentt/doc_tu_dau/<?= $hienthinoidungchuong->id; ?>/<?= $hienthinoidungchuong->chapter_number - 1; ?>" class="btn btn-secondary">< Chương trước </a>
                    <?php else: ?>
                        <a href="<?= base_url(); ?>index.php/Truyentt/gioi_thieu_truyen/<?= $hienthinoidungchuong->id; ?>" class="btn btn-secondary">< Chương trước </a>
                    <?php endif; ?>

                    
                    <?php if ($hienthinoidungchuong->chapter_number < $hienthinoidungchuong->chapter_count): ?>
                        <a href="<?= base_url(); ?>index.php/Truyentt/doc_tu_dau/<?= $hienthinoidungchuong->id; ?>/<?= $hienthinoidungchuong->chapter_number + 1; ?>" class="ms-auto btn btn-warning"> Chương sau ></a>
                    <?php else: ?>
                        <a href="<?= base_url(); ?>index.php/Truyentt/gioi_thieu_truyen/<?= $hienthinoidungchuong->id; ?>" class="ms-auto btn btn-warning"> Chương sau ></a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
                    <div>
                        <h4>Chương <?= $hienthinoidungchuong->chapter_number ;?>: <?= $hienthinoidungchuong->chapter_title ;?></h4>
                    </div>
                    <div style="font-size: 22px;">
                        <p >
                            <?= $hienthinoidungchuong->content ;?>
                        </p>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between mt-6">
                            <a href="" class="btn btn-secondary">< Chương trước</a>
                            <a href="" class="ms-auto btn btn-warning" > Chương sau ></a>
                        </div>
                        <hr>
                    </div>
    </div>
    

</body>
</html>