<style type="text/css">
*{
font-family: Arial;
font-size:12px;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
table.grid{
width:29.70cm ;
font-size: 12pt;
border-collapse:collapse;
}
table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}
table.grid th{
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:center;
border:1px solid #000;
padding:7px;
}
table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
padding-right:2mm;
border-bottom:0.2mm solid #000;
border:1px solid #000;
}
h1{
font-size: 18pt;
}
h2{
font-size: 14pt;
}
h3{
font-size: 10pt;
}
.kop{
	font-size:12px;
	margin-bottom:5px;
	width:29.70cm ;
}
.kop h2{
	font-size:22px;
}
.header{
display: block;
width:29.70cm ;
margin-bottom: 0.3cm;
text-align: center;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:29.70cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:29.70cm ;
}
.page {
width:29.70cm ;
font-size:12px;
}

</style>
<?php

if($data->num_rows()>0){

$kop 	= "<h2>$nm_puskesmas</h2>";	
$kop 	.= "<p>$alamat, $nm_kecamatan</p>";
$kop 	.= "<p>$nm_kota - $nm_propinsi</p>";


$kop_kanan= '';

$judul_H = "LAPORAN BARANG KELUAR - APOTEK";
$judul_H .= "<p> Tanggal ".$tgl1." s/d ".$tgl2."</p>";

function myheader($kop,$kop_kanan,$judul_H){
?>
    <br/>
<div class="kop">
	<table width="100%">
    <tr style="text-align: left">
    	<td><?php echo $kop;?></td>
        <td><?php echo $kop_kanan;?></td>
   	</tr>
    </table>
</div>
<div class="header">
	<h2 style="text-align: center;"><?php echo $judul_H;?></h2>
</div>
<table class="grid">
<tr>
	<tr>
      <th>No.</th>
      <th>No Keluar</th>
      <th>Tanggal</th>
      <th>Kode Produk</th>
      <th>Nama Produk</th>
      <!--<th>Jumlah</th>-->
      <!--<th>Harga</th>-->
      <th>Jml Obat</th>
      <th>Satuan</th>
    </tr>
</tr>
<?php	
}
function myfooter(){	
?>
	</table>
<?php
}
	$no=1;
	$page =1;
	$total=0;
	$g_total = 0;
	foreach($data->result_array() as $dp){
	$total = $dp['jml'];
	$tgl = $this->m_crud->tgl_indo($dp['tgl_keluar']);
	
	if(($no%25) == 1){
   	if($no > 1){
        myfooter();
        echo "<div class=\"pagebreak\" align='right'>
		<div class='page' align='center'>Hal - $page</div>
		</div>";
        $page++;

  	}
   	myheader($kop,$kop_kanan,$judul_H);
	}
	?>
    <tr>
	  <td style="width: 20px; text-align: center;"><?php echo $no; ?></td>
      <td style="width: 50px;"><?php echo $dp['kd_keluar']; ?></td>
      <td style="width: 130px; text-align: center;"><?php echo $tgl; ?></td>
      <td style="width: 80px; text-align: center;"><?php echo $dp['kd_obat']; ?></td>
      <td style="width: 500px; text-align: left;"><?php echo $dp['nama_obat']; ?></td>
      <td style="width: 50px; text-align: center;"><?php echo number_format($total); ?></td>
      <td style="width: 20px; text-align: center;"><?php echo $dp['sat_kecil_obat'] ; ?></td>
	</tr>
    <?php
	$g_total = $g_total+$total;
	$no++;
	}
?>
	<tr>
    	<td colspan="5" align="right">Jumlah</td>
        <td align="center"><?php echo number_format($g_total);?></td>
    </tr>
<?php    
myfooter();	
?>   
    </table>

    <div class="page" align="center">Hal - <?php echo $page;?></div>
<?php
}else{
	echo "Tidak Ada Data";
}
?>