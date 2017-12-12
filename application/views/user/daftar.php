<?php $this->load->view("user/header") ?>

	<div class="container">
		<div class="row">
			<h2>Daftar akun Food Recipe</h2>

			<form class="form-horizontal" action="/user/doDaftar" method="post" id="formDaftar" name='formdaftar'>
				<fieldset>

					<!-- Form Name -->
					<legend>Daftar disini</legend>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="nama">Username</label>
						<div class="col-md-4">
							<input id="nama" name="username" placeholder="Masukan username" class="form-control input-md" required type="text" oninvalid="this.setCustomValidity('Username harus diisi dan tidak boleh menggunakan spasi!')" oninput="setCustomValidity('')" pattern=^[A-Za-z0-9]{1,25}$>
							<span class="help-block"> </span>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Nama</label>
						<div class="col-md-4">
							<input id="textinput" name="nama" placeholder="Masukan nama" class="form-control input-md" required="" type="text" oninvalid="this.setCustomValidity('Masukan email yang sah!')" oninput="setCustomValidity('')">
							<span class="help-block"> </span>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Email</label>
						<div class="col-md-4">
							<input id="textinput" name="email" placeholder="Masukan email" class="form-control input-md" required="" type="email" title="Harus menggunakan email yang sah!" oninvalid="this.setCustomValidity('Masukan email yang sah!')" oninput="setCustomValidity('')">
							<span class="help-block"> </span>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Password</label>
						<div class="col-md-4">
							<input id="password1" name="password" placeholder="Masukan Password" class="form-control input-md" required="" type="password" oninvalid="this.setCustomValidity('Password harus diisi!')" oninput="setCustomValidity('')">
							<span class="help-block"> </span>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Konfirmasi Password</label>
						<div class="col-md-4">
							<input id="password2" name="kpassword" placeholder="Konfirmasi Password" class="form-control input-md" required="" type="password" oninvalid="this.setCustomValidity('Password harus diisi!')" oninput="setCustomValidity('')">
							<span class="help-block"> </span>
						</div>
					</div>

					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="singlebutton"> </label>
						<div class="col-md-4">
							<button id="singlebutton" name="singlebutton" class="btn btn-primary">Daftar</button>
						</div>
					</div>
				</fieldset>
			</form>

		</div>
	</div>
<?php $this->load->view("user/footer"); ?>
<script type="text/javascript">
		$('form').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '/user/cekUser',
				type: 'GET',
				data: {
					username: $('#nama').val()
				},
				success: function(data) {
					if(data == '1') {
						alert("Username sudah ada, silakan masukan yang lain.");
						$('#nama').focus();
					} else {
						document.formdaftar.submit();
					}
				}
			});
		});
	</script>