<style type="text/css">
#dd > a > .fa {
	color: gold;
}
</style>
<header class="intro-header" style="background-image: url('<?php echo base_url();?>fiture/img/4.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1> Food Recipe </h1>
                    <hr class="small">
                    <span class="subheading">Semua Orang Bisa Memasak</span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php 
$artikel = $this->db->query("SELECT t.judul as judul, t.foto as foto, t.isi as isi, t.waktu_post as waktu_post, t.daerah as daerah, k.kategori as kategori, u.nama as penulis, t.username as username, k.id_kategori as id_kategori FROM `tbl thread` as t LEFT JOIN `tbl kategori` as k ON t.id_kategori=k.id_kategori LEFT JOIN user as u ON t.username=u.username WHERE t.id_thread = '$id'")->row();
$this->load->view('header', array('title'=>$artikel->judul));
?>
<div class="container">
	<div class="row">
		<img src="/uploads/<?= $artikel->foto ?>" height="128">
		<h2 class="page-heading"><?= $artikel->judul ?></h2>
		<span class="info">Asal Masakan: <a href="/<?= $artikel->daerah ?>"><?= $artikel->daerah ?></a></span>
		<p>
			<span class="info">Kategori: <a href="/kategori/<?= $artikel->id_kategori ?>"><?= $artikel->kategori ?></a>  Diposting pada: <?= $artikel->waktu_post ?></span>
		</p>
		<p>
			<?= $artikel->isi ?>
		</p>
		<span class="info">Penulis: <a href="/<?= $artikel->username ?>"><?= $artikel->penulis ?></a></span>
	</div>
	<br>
	<?php 
	$uu = $this->db->query("SELECT count(id_rating) as jumlah_perating, sum(jumlah_rating) as total_rating FROM tbl_rating WHERE id_thread='$id'")->row();
	if($uu->jumlah_perating > 0) {
		$rating = $uu->total_rating/$uu->jumlah_perating;
	} else {
		$rating = 0;
	}
	?>
	<div class="row" id="dd">
		<a href="<?= base_url() ?>/tambah-rating?tambah=1&id_kul=<?= $id ?>"><i class="fa <?= round($rating) == 1 || round($rating) > 1 ? 'fa-star' : 'fa-star-o' ?>" id="1"></i></a>
		<a href="<?= base_url() ?>/tambah-rating?tambah=2&id_kul=<?= $id ?>"><i class="fa <?= round($rating) == 2 || round($rating) > 2 ? 'fa-star' : 'fa-star-o' ?>" id="2"></i></a>
		<a href="<?= base_url() ?>/tambah-rating?tambah=3&id_kul=<?= $id ?>"><i class="fa <?= round($rating) == 3 || round($rating) > 3 ? 'fa-star' : 'fa-star-o' ?>" id="3"></i></a>
		<a href="<?= base_url() ?>/tambah-rating?tambah=4&id_kul=<?= $id ?>"><i class="fa <?= round($rating) == 4 || round($rating) > 4 ? 'fa-star' : 'fa-star-o' ?>" id="4"></i></a>
		<a href="<?= base_url() ?>/tambah-rating?tambah=5&id_kul=<?= $id ?>"><i class="fa <?= round($rating) == 5 || round($rating) > 5 ? 'fa-star' : 'fa-star-o' ?>" id="5"></i></a>
		<script type="text/javascript">
		function bersihkan() {
			$('#5').removeClass('fa-star-o');
			$('#4').removeClass('fa-star-o');
			$('#3').removeClass('fa-star-o');
			$('#2').removeClass('fa-star-o');
			$('#1').removeClass('fa-star-o');
		}
			$(document).ready(function() {

				$('.fa#1').mousemove(function() {
					bersihkan();
					$('#1').addClass('fa-star');
					$('#2').addClass('fa-star-o');
					$('#3').addClass('fa-star-o');
					$('#4').addClass('fa-star-o');
					$('#5').addClass('fa-star-o');
				});
				$('.fa').mouseout(function() {
					bersihkan();
					<?php 
					for($i=1; $i<=5; $i++) {
						if($i<=round($rating)) {
							echo "$('#{$i}').addClass('fa-star');";
						} else {
							echo "$('#{$i}').addClass('fa-star-o');";
						}
					}
					?>
				});
				$('.fa#2').mousemove(function() {
					bersihkan();
					$('#1').addClass('fa-star');
					$('#2').addClass('fa-star');
					$('#3').addClass('fa-star-o');
					$('#4').addClass('fa-star-o');
					$('#5').addClass('fa-star-o');
				})
				/*$('.fa#2').mouseout(function() {
					$('#1').removeClass('fa-star');
					$('#1').addClass('fa-star-o');
					$('#2').removeClass('fa-star');
					$('#2').addClass('fa-star-o');
				})*/
				$('.fa#3').mousemove(function() {
					bersihkan();
					$('#1').addClass('fa-star');
					$('#2').addClass('fa-star');
					$('#3').addClass('fa-star');
					$('#4').addClass('fa-star-o');
					$('#5').addClass('fa-star-o');
				})
				/*$('.fa#3').mouseout(function() {
					$('#1').removeClass('fa-star');
					$('#1').addClass('fa-star-o');
					$('#2').removeClass('fa-star');
					$('#2').addClass('fa-star-o');
					$('#3').removeClass('fa-star');
					$('#3').addClass('fa-star-o');
				})*/
				$('.fa#4').mousemove(function() {
					bersihkan();
					$('#1').addClass('fa-star');
					$('#2').addClass('fa-star');
					$('#3').addClass('fa-star');
					$('#4').addClass('fa-star');
					$('#5').addClass('fa-star-o');
				})
				/*$('.fa#4').mouseout(function() {
					$('#1').removeClass('fa-star');
					$('#1').addClass('fa-star-o');
					$('#2').removeClass('fa-star');
					$('#2').addClass('fa-star-o');
					$('#3').removeClass('fa-star');
					$('#3').addClass('fa-star-o');
					$('#4').removeClass('fa-star');
					$('#4').addClass('fa-star-o');
				})*/
				$('.fa#5').mousemove(function() {
					bersihkan();
					$('#1').addClass('fa-star');
					$('#2').addClass('fa-star');
					$('#3').addClass('fa-star');
					$('#4').addClass('fa-star');
					$('#5').addClass('fa-star');
				})
				/*$('.fa#5').mouseout(function() {
					$('#1').removeClass('fa-star');
					$('#1').addClass('fa-star-o');
					$('#2').removeClass('fa-star');
					$('#2').addClass('fa-star-o');
					$('#3').removeClass('fa-star');
					$('#3').addClass('fa-star-o');
					$('#4').removeClass('fa-star');
					$('#4').addClass('fa-star-o');
					$('#5').removeClass('fa-star');
					$('#5').addClass('fa-star-o');
				})*/
			})
		</script>
	</div>
	<div class="row">
		<small>Rating: <?= number_format($rating, 2, ',','.') ?></small>
	</div>
	<br>
	<?php if($this->session->has_userdata('username')) { ?>
	<div class="row">
		<form action="/kirimkomentar" method="post" class="col-md-6">
			<input type="hidden" name="id_thread" value="<?= $id ?>">
			<div class="form-group">
				<label for="komentar">Komentar:</label>
				<textarea name="komentar" id="komentar" rows="5" class="form-control" placeholder="Tinggalkan komentar.."></textarea>
			</div>
			<div class="form-group"><button class="btn btn-success">Kirim</button></div>
		</form>
	</div>
	<?php } else { ?>
	<div class="row">
		<h5>Silahkan login untuk menambahkan komentar. <a href="/login">Login disini.</a></h5>
	</div>
	<?php } ?>
	<div class="row">
		<h3 class="page-header">Komentar</h3>
		<?php 
		$komentars = $this->db->query("SELECT k.isi as isi, u.username as username, u.nama as nama, u.foto as foto, k.tgl as tgl, k.id_komentar as id_komentar FROM tbl_komentar as k LEFT JOIN `tbl thread` as t ON k.id_thread = t.id_thread LEFT JOIN user as u ON u.username = k.username WHERE k.id_thread='$id' ORDER BY tgl DESC")->result();
		foreach ($komentars as $komentar) {
		?>
		<div class="media">
			<div class="media-left komentar"><img src="/pp/<?= $komentar->foto ?>" alt="" class="media-object" width="64" height="64"></div>
			<div class="media-body">
				<h4 class="media-heading"><a href="/<?= $komentar->username ?>"><?= $komentar->nama ?></a> <small><i>Diposting pada: <?= $komentar->tgl  ?></i></small></h4>
				<?= $komentar->isi ?><br>
				<?php if($this->session->username == $komentar->username) { ?>
				<a href="/hapuskomentar?id=<?= $komentar->id_komentar ?>&artikel=<?= $id ?>" class="text-danger" title="Hapus komentar"><small><i class="glyphicon glyphicon-sm glyphicon-trash"></i></small></a>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php 
$this->load->view('footer');
?>