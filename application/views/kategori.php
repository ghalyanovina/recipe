<?php 
switch ($id) {
	case 1:
		$image = 1;
		break;
	case 2:
		$image = 2;
		break;
	case 3:
		$image = 3;
		break;

	default:
		$image = 0;
		break;
}
?>
<header class="intro-header" style="background-image: url('<?php echo base_url();?>fiture/img/<?= $image ?>.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1> <?php echo $nama_kategori ?> </h1>
                    <hr class="small">
                    <span class="subheading">Semua Orang Bisa Memasak</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
	<h2>Selamat datang di Food <?php echo $nama_kategori ?></h2>
	<div class="row">
		<form action="/search" method="get" class="form-inline">
			<div class="form-group">
				<input type="text" name="cari" id="query" class="form-control col-md-4" placeholder="Cari..">
				<button type="submit" class="btn btn-success">Cari</button>
			</div>
		</form>
	</div>
	<br>
	<div class="row">
		<?php 
		$perhal = 20;
		$semua = $this->db->query("SELECT count(id_thread) as total FROM `tbl thread`")->row();
		$jumlahHal = ceil($semua->total/$perhal);
		$query = "SELECT t.id_thread AS id_thread, t.judul AS judul, t.foto AS foto, t.isi AS isi, t.waktu_post AS waktu_post, k.kategori AS kategori, u.nama AS penulis from `tbl thread` as t LEFT JOIN `tbl kategori` AS k ON t.id_kategori=k.id_kategori LEFT JOIN user AS u ON u.username=t.username";
		if($id !== '') {
			$query = $query." WHERE t.id_kategori = '$id'";
		}
		if(isset($_GET['cari']) and $id == '') {
			$query = $query . " WHERE t.judul LIKE '%$ygdicari%' OR t.isi LIKE '%$ygdicari%'";
		} elseif(isset($_GET['cari'])) {
			$query = $query . "t.judul LIKE '%$ygdicari%' OR t.isi LIKE '%$ygdicari%'";
		}
		$query = $query. " ORDER BY waktu_post DESC";
		if($hal !== '') {
			$mulai = ($hal - 1) * $perhal;
			$query = $query." LIMIT $mulai, $perhal";
		} else {
			$hal=1;
			$query = $query." LIMIT 0, $perhal";
		}
		$thread = $this->db->query($query)->result();
		foreach ($thread as $post) {
		?>
		<div class="media">
			<div class="media-left">
				<img src="/uploads/<?php echo $post->foto ?>" height="128" width="128" class="media-object">
			</div>
			<div class="media-body">
				<a href="/artikel/<?= $post->id_thread ?>" class="media-heading"><h3 class="page-heading"><?php echo $post->judul ?></h3></a>
				<i><small class="info">Tanggal: <?php echo $post->waktu_post ?></small> <small mclass="info">Penulis: <?php echo $post->penulis ?></small><small class="info"><?php $post->kategori ?></small></i>
			</div>
		</div>
		<?php
		}
		?>
	</div>
	<div class="row">
		<ul class="pagination">
			<?php for ($i=0; $i < $jumlahHal; $i++) { ?>
			<li <?= $i+1 == $hal ? "class='active'" : '' ?>><a href='/page/<?= $i+1 ?>'><?= $i+1 ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>