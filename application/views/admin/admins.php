<?php
$this->load->view("admin/header");
?>
<div id="page-wrapper">
    <div class="row">
        <form action="/admin/simpanadmin" method="post" class="col-md-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" placeholder='Username..' name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" placeholder='Password..' name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_konfirm">Konfirmasi password</label>
                <input type="password" placeholder='Ketik ulang password..' name="password_konfirm" id="password_konfirm" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Data Admins</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th><th>Username</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $admins = $this->db->get('tbl_admin')->result();
                        $no = 0;
                        foreach ($admins as $admin) {
                            $no++;
                        ?>
                        <tr>
                            <td><?= $no ?></td><td><?= $admin->USERNAME ?></td><td><a href="/admin/hapusadmin/<?= $admin->USERNAME ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
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