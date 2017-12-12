<?php 
$this->load->view('header');
?>
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
		<?php 
		$user = $this->db->query("SELECT * FROM user WHERE username='".$username."'")->row();
		?>
		<img src="pp/<?= $user->foto ?>" height=300><br>
		<?php
		?>
		<?php if($username == $this->session->userdata('username')) { ?>
		<a href="<?= $this->session->userdata('username') ?>/editfoto" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i>Ganti Foto</a>
		<?php } ?>
		<h2><?= $user->nama ?></h2>
		<h5 class="text-muted"><?= $user->username ?></h5>
		<p><?= $user->bio ?></p>
		<?php if($username == $this->session->userdata('username')) { ?>
		<a href="<?= $this->session->userdata('username') ?>/editprofil" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i>Edit Profil</a>
		<?php } ?>
		<br>
	</div>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Kumpulan Post
			</div>
			<div class="panel-body">
				<table class="table" id="postingan">
					<thead>
						<tr>
							<th>No</th><th>Judul</th><th>Terakhir diperbarui</th>
							<?php if($username == $this->session->userdata('username')) { ?>
							<th>Aksi</th>
							<?php }	?>
						</tr>
					</thead>
					<tbody>
						<?php
						$this->load->database();
						$threads = $this->db->query("SELECT * FROM `tbl thread` WHERE username='".$username."' ORDER BY waktu_post DESC")->result();
						$no = 0;
						foreach ($threads as $thread) {
							$no++;
						?>
						<tr>
							<td><?= $no ?></td><td><a href="/artikel/<?= $thread->id_thread ?>"><?= $thread->judul ?></a></td><td><?=$thread->waktu_post ?></td>
							<?php if($username == $this->session->userdata('username')) { ?>
							<td><a href="/<?= $this->session->userdata('username') ?>/edit/<?= $thread->id_thread ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a><a href="/<?= $this->session->userdata('username') ?>/hapus/<?= $thread->id_thread ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a></td>
							<?php } ?>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
$this->load->view('footer');
?>