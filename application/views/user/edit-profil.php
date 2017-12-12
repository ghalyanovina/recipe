<?php
$this->load->view("user/header");
?>
<div class="container">
	<?php
	$profil = $this->db->query("SELECT * FROM user WHERE username='".$this->session->userdata('username')."'")->row();
	?>
	<form action="/user/updateprofil" method="post" class="col-md-6">
	<legend><h1>Update bio data</h1></legend>
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= $profil->nama ?>">
		</div>
		<div class="form-group">
			<label for="bio">Bio</label>
			<textarea name="bio" id="bio" cols="30" rows="10" class="form-control" placeholder="Info bio.."><?= $profil->bio ?></textarea>
		</div>
		<div class="form-group">
			<input type="submit" value="Batal" onclick="history.back()" class="btn btn-warning">
			<input type="submit" class="btn btn-primary pull-right" value="Simpan">
		</div>
	</form>
</div>
<?php
$this->load->view("user/footer");
?>