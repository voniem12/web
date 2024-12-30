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
    <title>Viết truyện</title>
</head>
<body>
<?php require("vien_dau_trang.php") ?>
<h3 class="mt-5">Danh sách truyện đã đăng</h3>

<?php if (isset($truyen_cua_toi) && !empty($truyen_cua_toi)) : ?>
    <ul class="list-group">
        <?php foreach ($truyen_cua_toi as $item) : ?>
            <li class="list-group-item" >
                <a href="<?= base_url() ;?>index.php/dangtruyen_controller/themchapter/<?= $item['id'] ?>">
                    <?= $item['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Chưa có truyện nào được đăng.</p>
<?php endif; ?>

</body>
</html>