<?php
$this->load->view("admin/header");
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary" style="border: 1px solid #da4453">
				<div class="panel-heading" style="background-color: #da4453; border-bottom: 1px solid #f6bb42">Artikel yang paling digemari</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th><th>Judul</th><th>Asal Daerah</th><th>Rating</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $query = $this->db->query("select t.id_thread, t.judul, ifnull(sum(r.jumlah_rating),0)/count(r.id_rating) jumlahrr, t.daerah from `tbl thread` t left join tbl_rating r on r.id_thread=t.id_thread group by t.id_thread order by jumlahrr desc limit 10")->result();
            foreach ($query as $data) {
            ?>
            <tr>
              <td><?= $no++ ?></td><td><?= $data->judul ?></td><td><?= $data->daerah ?></td><td><?= number_format($data->jumlahrr, 2, ',','.') ?></td><td></td>
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
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-primary" style="border: 1px solid #f6bb42">
				<div class="panel-heading" style="background-color: #f6bb42; border-bottom: 1px solid #f6bb42">Jumlah Artikel per daerah</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th><th>Daerah</th><th>Jumlah Artikel</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach (PROPINSI as $provinsi) {
              $artikel = $this->db->query("SELECT count(*) jumlah FROM `tbl thread` WHERE daerah='$provinsi'")->row();
            ?>
            <tr>
              <td><?= $no++ ?></td><td><?= $provinsi ?></td><td><?= $artikel->jumlah ?></td>
            </tr>
            <?php 
            }
            ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
/*$hariIni = date('Y-m-d');
for ($i=0; $i < 7; $i++) { 
	$tgl = date('Y-m-d', strtotime($hariIni . " -$i days"));
	$query = $this->db->query("SELECT count(id_thread) as total FROM `tbl thread` WHERE date(waktu_post) = '$tgl'")->row();
	$data[] = array('tgl' => $tgl, 'nilai' => $query->total);
}
for ($i=0; $i < 7; $i++) { 
	$tgl = date('Y-m-d', strtotime($hariIni . " -$i days"));
	$query = $this->db->query("SELECT count(username) as total FROM `user` WHERE date(tgldftar) = '$tgl'")->row();
	$datauser[] = array('tgl' => $tgl, 'nilai' => $query->total);
}
for ($i=0; $i < 7; $i++) { 
	$tgl = date('Y-m-d', strtotime($hariIni . " -$i days"));
	$query = $this->db->query("SELECT count(id_komentar) as total FROM `tbl_komentar` WHERE date(tgl) = '$tgl'")->row();
	$datakomen[] = array('tgl' => $tgl, 'nilai' => $query->total);
}*/
?>
<!--<script>
	new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'statistik-posting',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
    <?php echo json_encode($data) ?>
  ,
  // The name of the data record attribute that contains x-values.
  xkey: 'tgl',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['nilai'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Jumlah'],
  pointFillColors: ['#da4453'],
  lineColors: ['#ed5565']
});
new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'statistik-user',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
    <?php echo json_encode($datauser) ?>
  ,
  // The name of the data record attribute that contains x-values.
  xkey: 'tgl',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['nilai'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Jumlah'],
  pointFillColors: ['#f6bb42'],
  lineColors: ['#ffce5']
});
new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'statistik-komentar',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
    <?php echo json_encode($datakomen) ?>
  ,
  // The name of the data record attribute that contains x-values.
  xkey: 'tgl',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['nilai'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Jumlah']
});
</script>-->
<?php
$this->load->view("admin/footer");
?>
