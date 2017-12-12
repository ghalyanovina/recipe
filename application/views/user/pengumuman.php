<?php 
$pengumuman = $this->db->get_where('tbl_adminberita', array('ID_BERITA'=>$id))->row();
$this->load->view('header', array('title'=>$pengumuman->JUDUL));
?>
<div class="container">
	<div class="row">
		<h2 class="page-heading"><?= $pengumuman->JUDUL ?></h2>
		<small class="info"> Diposting pada: <?= $pengumuman->WAKTU_POST ?></small>
		<p>
			<?= $pengumuman->ISI ?>
		</p>
		<span class="info">Diposting oleh admin: <?= $pengumuman->USERNAME ?></span>
	</div>
</div>
<?php 
$this->load->view('footer');
?>