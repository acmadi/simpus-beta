<?php if($this->session->flashdata('flash_message') != ""):?>
 		<script>
			jAlert('<?php echo $this->session->flashdata('flash_message'); ?>', 'Informasi');
		</script>
<?php endif;?>
<div class="rightpanel">
	<div class="breadcrumbwidget">
    	<ul class="breadcrumb">
        	<li><a href="#">Home</a> <span class="divider">/</span></li>
            <li><a href="#">Laporan Bulanan</a> <span class="divider">/</span></li>
            <li class="active"><?php echo $page_title; ?></li>
        </ul>
	</div><!--breadcrumbwidget-->
    <div class="pagetitle">
    	<h1><?php echo $page_title; ?></h1> <span>Halaman laporan register harian</span>
    </div><!--pagetitle-->
     
    <div class="maincontent">
    	<div class="contentinner content-dashboard">
        	<div class="row-fluid">
            	<div class="span12">
					<div id="tabs">
  	 					<ul>
      						<li class="ui-tabs-active"><a href="#list"><i class="icon-align-justify"></i> Download Laporan</a></li>
                        </ul>
                        
                        <!---- CETAK register START ---->
   						<div id="list">
                        	<h4 class="widgettitle nomargin shadowed">Rekap Penyakit Per Minggu</h4>
                            <div class="widgetcontent bordered shadowed nopadding">
                                <?php echo form_open('cont_cetak_lap_mingguan/rekap_penyakit/cetak', array('class' => 'stdform stdform2', 'id' => 'form_input')); ?>
                                       
                                     <table style="border:1px solid grey; background-color:#ccff99; color:black; font-size:10pt;" width="67.5%">
		<tr>
		  <td width="90" style="padding:15px;"><strong>Dari Tanggal</strong></td>
		  <td width="120" >: <input type="text" name="tgl_mulai" id="tgl_mulai"  style="width:80px; font-size: 13px; background-color:#FFFFE0; font-weight: bold; text-align:center;"></td>
		  <td width="30"><strong>s/d</strong></td>
		  <td width="130"><input type="text"  name="tgl_akhir" id="tgl_akhir" style="width:80px; font-size: 13px; background-color:#FFFFE0; font-weight: bold; text-align:center;"></td>
		  		 
		</tr>
	  </table>   
                                       
                                                           
                                        <p class="stdformbutton">
                                            <button class="btn btn-primary">Proses</button>
                                            <button type="reset" class="btn">Reset</button>
                                        </p>
                               	<?php echo form_close();  ?>
                                </div><!--widgetcontent-->
                        </div>
                        <!---- END CETAK LB2 ---->
                        
                	</div><!--tabs-->
                </div><!--span12-->
            </div><!--row-fluid-->
        </div><!--contentinner-->
    </div><!--maincontent-->
</div><!--mainright-->