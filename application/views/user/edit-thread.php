<?php 
$this->load->view('user/header');
$post = $this->db->query("SELECT * FROM `tbl thread` WHERE id_thread='".$id."'")->row();
?>
<div class="container">
	<div class="row">
		<h2>Edit Artikel</h2>
		<form class="form-horizontal" action="/user/updateThread" method="post" enctype="multipart/form-data">
			<fieldset>

				<!-- Form Name -->
				<legend></legend>

				<input type="hidden" value="<?php echo $post->id_thread ?>" name="id_thread">
				<!-- Text input-->
				<div class="form-group">
					<label  for="judul">Judul</label>
					<div>
						<input id="judul" name="judul" placeholder="Masukan judul" class="form-control input-md" required="" type="text" value="<?php echo $post->judul ?>">
						<span class="help-block"> </span>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<img src="/uploads/<?php echo $post->foto ?>" height="300"><br>
					<label  for="foto">Upload gambar</label>
					<div>
						<input id="foto" name="foto" placeholder="Masukan foto" class="form-control input-md" type="file">
						<span class="help-block"> </span>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label  for="isi">Isi</label>
					<div>
						<textarea name='isi' id='isi' class="form-control input-md" rows=10><?php echo $post->isi ?></textarea>
						<span class="help-block"> </span>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label  for="kategori">Kategori</label>
					<div>
						<select name='kategori' class="form-control">
						  	<?php 
						  	$kategori = $this->db->query("SELECT * FROM `tbl kategori`")->result();
						  	foreach ($kategori as $kat) {
						  	?>
						  	<option value='<?php echo $kat->id_kategori ?>' <?php echo $post->id_kategori == $kat->id_kategori ? 'selected' : '' ?>><?php echo $kat->kategori ?></option>
							<?php
						  	}
						  	 ?>
						</select>
						<span class="help-block"> </span>
					</div>
				</div>

				<div class="form-group">
					<label class=" control-label" for="daerah">Daerah</label>
					<div class="">
						<select name='daerah' class="form-control">
			              <?php 
			              $PROPINSI = PROPINSI;
			              for ($i=0; $i < count($PROPINSI); $i++) {
			              ?>
			              <option value='<?php echo $PROPINSI[$i] ?>' <?= $PROPINSI[$i] == $post->daerah ? 'selected' : '' ?>><?php echo $PROPINSI[$i] ?></option>
			              <?php
			              }
			              ?>
			            </select>
					</div>
				</div>

				<!-- Button -->
				<div class="form-group">
					<label  for="singlebutton"> </label>
					<div>
						<button id="singlebutton" name="singlebutton" class="btn btn-primary">Simpan</button>
					</div>
				</div>

			</fieldset>
		</form>

	</div>
</div>
<?php 
$this->load->view('user/footer');
?>
