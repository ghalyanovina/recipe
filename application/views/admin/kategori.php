<?php
$this->load->view("admin/header");
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-6">
            <form <?php echo $id == '' ? "action=\"/admin/simpankategori\"" : "action=\"/admin/updatekategori\"" ?>  method="post">
                <legend>Tambah kategori</legend>
                <?php if($id !== '') { ?>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <?php $kategori = $this->db->query("SELECT * FROM `tbl kategori` WHERE id_kategori='$id'")->row();
                ?>
                <?php } ?>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" placeholder="Kategori.." id="kategori" class="form-control" value="<?= $id == '' ? '' : $kategori->kategori ?>">
                </div>
                <div class="form-group">
                    <?php if ($id !== '') { ?>
                    <button onclick="location.href('/admin/kategori')" class="btn btn-success">Tambah baru</button>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary"><?php echo $id==''? "Simpan" : "Ganti" ?></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Kategori</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th><th>Kategori</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = $this->db->query("SELECT * FROM `tbl kategori`")->result();
                        $no = 0;
                        foreach($query as $kategori) {
                            $no++;
                        ?>
                        <tr>
                            <td><?= $no ?></td><td><?= $kategori->kategori ?></td><td><div class="btn-group"><a href="/admin/kategori/<?php echo $kategori->id_kategori ?>"class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></a><a href="/admin/hapuskategori/<?php echo $kategori->id_kategori ?>"class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></div></td>
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