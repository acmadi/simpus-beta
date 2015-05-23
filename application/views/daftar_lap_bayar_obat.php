<style type="text/css">
table {
	margin-top:5px;
	font-size:100%;
}
.table tr th {
	text-align:center;
	background-color:#000;
	color:#fff;
}
.table tr td {
	color:#000;
}
</style>
<section>
<table class="table table-hover table-striped" width="100%">
  <thead>
    <tr>
      <th>No.</th>
      <th>No Pembayaran</th>
      <th>Tanggal</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Satuan</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $g_total=0;
	  $no=1;
      foreach($data->result_array() as $dp){
		  $total = $dp['jml']*$dp['harga_jual'];
		  $tgl = $this->m_crud->tgl_indo($dp['tgl_bayar']);
  ?>
    <tr>
      <td width="50"><center><?php echo $no; ?></center></td>
      <td><center><?php echo $dp['kd_bayar']; ?></center></td>
      <td><center><?php echo $tgl; ?></center></td>
      <td><center><?php echo $dp['kd_obat']; ?></center></td>
      <td><?php echo $dp['nama_obat']; ?></td>
      <td><center><?php echo $dp['sat_kecil_obat']; ?></center></td>
      <td><center><?php echo $dp['jml']; ?></center></td>
      <td><center><?php echo number_format($dp['harga_jual']); ?></center></td>
      <td><center><?php echo number_format($total); ?></center></td>
    </tr>
   <?php
          $g_total = $g_total+$total;
		  $no++;
      }
   ?>
  </tbody>
<tr>
<td colspan="8" align="center"><b>Total</b></td>
<td align="right"><?php echo number_format($g_total);?></td>
<input type="hidden" id="g_total" value="<?php echo $g_total;?>" />
</tr>
</table>
</section>