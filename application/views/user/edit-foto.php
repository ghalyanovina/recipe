<?php
$this->load->view('user/header');
?>
<div class="container">
    <?php 
    $userinfo = $this->db->query("SELECT foto FROM `user` WHERE username='".$this->session->userdata('username')."'")->row();
    ?>
    <img src="/pp/<?= $userinfo->foto ?>" alt="Foto Profil" height=300>
    <form action="/user/updatefoto" method="post" enctype="multipart/form-data">
        <legend>Upload foto baru</legend>
        <div class="form-group">
            <label for="foto">Upload Foto</label>
            <input type="file" id="foto" name="foto">
        </div>
        <div class="form-group">
            <input type="submit" value="Ganti" class="btn btn-primary">
        </div>
    </form>
</div>
<?php
$this->load->view('user/footer');
?>