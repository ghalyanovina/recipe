<?php
$this->load->view("admin/header");
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-md-8">
			<form class="form-horizontal" <?= $id == '' ? "action='/admin/simpanBerita'" : "action='/admin/updateBerita'" ?> method="post" id="formDaftar" enctype="multipart/form-data">
				<!-- Form Name -->
				<legend>Tambah Berita</legend>
				<fieldset>
					<?php
					if($id !== '') {
						$query = $this->db->get_where("TBL_ADMINBERITA", array('ID_BERITA'=>$id))->row();
						echo "<input type='hidden' name='id' value='$id'>";
					}
					?>
					<!-- Text input-->
					<div class="form-group">
						<label for="judul">Judul</label>
						<div>
							<input id="judul" name="judul" placeholder="Masukan judul" class="form-control input-md" required type="text" value="<?= $id == '' ? '' : $query->JUDUL ?>">
							<span class="help-block"> </span>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label for="isi">Isi</label>
						<div>
							<textarea name='isi' id='isi' class="form-control input-md" rows=10><?= $id == '' ? '' : $query->ISI ?></textarea>
							<span class="help-block"></span>
						</div>
					</div>

					<!-- Button -->
					<div class="form-group">
						<?php if($id !== "") { ?>
						<a href="/admin/berita" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Berita baru</a>
						<?php } ?>
						<button class="btn btn-primary"><?= $id==''? "Tambah" : "Update" ?></button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading">Daftar Berita</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>No</th><th>Judul</th><th>Tanggal</th><th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$data = $this->db->get("TBL_ADMINBERITA")->result();
							$no = 0;
							foreach ($data as $berita) {
								$no++;
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $berita->JUDUL ?></td>
								<td><?= $berita->WAKTU_POST ?></td>
								<td><a href="/admin/berita/<?= $berita->ID_BERITA ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i></a><a href="/admin/hapusberita/<?= $berita->ID_BERITA ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
</div>
<?php
$this->load->view("admin/footer");
?>
