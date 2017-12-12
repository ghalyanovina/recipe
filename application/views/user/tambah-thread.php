<?php $this->load->view('user/header') ?>

<div class="container">
	<div class="row">
		<h2>Tambah Artikel</h2>

		<form action="/<?= $this->session->userdata('username') ?>/simpanThread" method="post" enctype="multipart/form-data">
			<fieldset>

				<!-- Form Name -->
				<legend></legend>

				<!-- Text input-->
				<div class="form-group">
					<label for="judul">Judul</label>
					<div>
						<input id="judul" name="judul" placeholder="Masukan judul" class="form-control input-md" required="" type="text">
						<span class="help-block"> </span>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label for="foto">Upload gambar</label>
					<div>
						<input id="foto" name="foto" placeholder="Masukan foto" class="form-control input-md" type="file">
						<span class="help-block"> </span>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label for="isi">Isi</label>
					<div>
						<textarea name='isi' id='isi' class="form-control input-md" style="height: 200px"></textarea>
						<span class="help-block"> </span>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class=" control-label" for="kategori">Kategori</label>
					<div class="">
						<select name='kategori' class="form-control">
              <?php 
              foreach ($kategori as $kat) {
              ?>
              <option value='<?php echo $kat->id_kategori ?>'><?php echo $kat->kategori ?></option>
              <?php
              }
              ?>
            </select>
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class=" control-label" for="daerah">Daerah</label>
					<div class="">
						<select name='daerah' class="form-control">
			              <?php 
			              $PROPINSI = PROPINSI;
			              for ($i=0; $i < count($PROPINSI); $i++) {
			              ?>
			              <option value='<?php echo $PROPINSI[$i] ?>'><?php echo $PROPINSI[$i] ?></option>
			              <?php
			              }
			              ?>
			            </select>
					</div>
				</div>
				
				<!-- Button -->
				<div class="form-group">
					<label for="singlebutton"> </label>
					<div>
						<button id="singlebutton" name="singlebutton" class="btn btn-primary">Tambah</button>
					</div>
				</div>

			</fieldset>
		</form>

	</div>
</div>
<?php $this->load->view('user/footer') ?>
