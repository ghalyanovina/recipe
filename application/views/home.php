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

<div class="container">
	
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">Pengumuman Admin</div>
			<div class="panel-body">
				<table class="table" id="pengumuman">
					<thead>
						<tr>
							<th>No</th><th>Judul</th><th>Dibuat pada</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$data = $this->db->order_by('WAKTU_POST', 'DESC')->get("tbl_adminberita")->result();
						$no = 0;
						foreach ($data as $pengumuman) {
							$no++;
						?>
						<tr>
							<td><?= $no ?></td><td><a href="/pengumuman/<?= $pengumuman->ID_BERITA ?>"><?= $pengumuman->JUDUL ?></a></td><td><?= $pengumuman->WAKTU_POST ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
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
		if(isset($_GET['cari'])) {
			$query = $query . " WHERE t.judul LIKE '%$ygdicari%' OR t.isi LIKE '%$ygdicari%'";
		}
		$query = $query . " order by waktu_post desc";
		if($hal !== '') {
			$mulai = ($hal - 1) * $perhal;
			$query = $query." LIMIT $mulai, $perhal";
		} else {
			$hal=1;
			$query = $query." LIMIT 0, $perhal";
		}

		$thread = $this->db->query($query)->result();
		if(count($thread) > 0) {
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
	<?php } else { ?>
		<h2>Data tidak ditemukan</h2>
	</div>
	<?php } ?>
</div>