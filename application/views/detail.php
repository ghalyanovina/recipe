<?php 

?>
<html>
<head>
	<title><?php echo $thread->judul ?></title>
	<link rel="stylesheet" href="<?php echo base_url()."fiture/vendor/bootstrap/css/bootstrap.min.css";?>" >
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-8">
<h2 class="page-header">
<?php echo $thread->judul ?>
</h2>
<div class="info">
Penulis: <?php echo $thread->username ?><br>
Waktu post: <?php echo $thread->waktu_post ?>
</div>
<div class="page-body">
	<?php echo $thread->isi ?>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url();?>fiture/vendor/jquery/jquery.min.js"> </script>	
<script src="<?php echo base_url();?>fiture/vendor/bootstrap/js/bootstrap.min.js"> </script>
</body>
</html>