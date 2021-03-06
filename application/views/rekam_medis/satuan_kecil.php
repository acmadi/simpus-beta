<?php if($this->session->flashdata('flash_message') != ""):?>
 		<script>
			jAlert('<?php echo $this->session->flashdata('flash_message'); ?>', 'Informasi');
		</script>
<?php endif;?>
<div class="rightpanel">
	<div class="breadcrumbwidget">
    	<ul class="breadcrumb">
        	<li><a href="#">Home</a> <span class="divider">/</span></li>
            <li><a href="#">Master Satuan Kecil Obat</a> <span class="divider">/</span></li>
            <li class="active"><?php echo $page_title; ?></li>
        </ul>
	</div><!--breadcrumbwidget-->
    <div class="pagetitle">
    	<h1><?php echo $page_title; ?></h1> <span>Halaman manajemen data satuan kecil obat</span>
    </div><!--pagetitle-->
     
    <div class="maincontent">
    	<div class="contentinner content-dashboard">
        	<div class="row-fluid">
            	<div class="span12">
					<div id="tabs">
  	 					<ul>
                        	<?php if(isset($edit_satuan_kecil)):?>
            				<li class="ui-tabs-active"><a href="#ubah"><i class="icon-edit"></i> Ubah Data Satuan Kecil Obat</a></li>
            				<?php endif;?>
      						
                            <li class="<?php if(!isset($edit_satuan_kecil))echo 'ui-tabs-active';?>"><a href="#list"><i class="icon-align-justify"></i> Daftar Satuan Kecil Obat</a></li>
                            <li class=""><a href="#tambah"><i class="icon-plus"></i> Tambah Satuan Kecil Obat</a></li>
                        </ul>
                        
                        <!----EDITING FORM STARTS---->
        				<?php if(isset($edit_satuan_kecil)):?>
                        <div id="ubah">
                       	<h4 class="widgettitle">Ubah Data Satuan Kecil Obat</h4>
                        <div class="row-fluid">
			<div class="span6">
			<?php foreach ($edit_satuan_kecil as $row): ?>
                        <?php echo form_open('cont_master_farmasi/satuan_kecil/ubah/do_update/'.$row['kd_sat_kecil_obat'], array('class' => 'stdform stdform2', 'id' => 'form_edit')); ?>
                        <table class="table table-bordered table-invoice">
				<tr>
					<td>Kode Satuan Kecil Obat</td>
					<td><input type="text" name="kd_sat_kecil_obat" id="kd_sat_kecil_obat" value="<?php echo $row['kd_sat_kecil_obat']; ?>" class="input-small" /></td>
				</tr>
				<tr>
					<td>Nama Satuan</td>
					<td><input type="text" name="sat_kecil_obat" id="sat_kecil_obat" value="<?php echo $row['sat_kecil_obat']; ?>" class="input-large" /></td>
				</tr>
			</table>
			<p class="stdformbutton">
                                <button class="btn btn-inverse"><i class="icon-ok-circle icon-white"></i> Perbaharui</button>
                            <!--<button type="reset" class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Reset</button>-->
                        </p>               
                            	<?php echo form_close(); ?>
                            <?php endforeach; ?>
                        	</div></div></div>
                        <?php endif;?>
                        <!---- END EDITING FORM ---->
                        
                        <!---- DAFTAR SATUAN KECIL OBAT START ---->
   						<div id="list">
                        	<?php echo $this->table->generate(); ?>
							<script type="text/javascript">
                                jQuery(document).ready(function () {
                                    var oTable = jQuery('#dyntable').dataTable({
                                        "bProcessing": true,
                                        "bServerSide": true,
                                        "sAjaxSource": '<?php echo base_url(); ?>datatable_master/satuan_kecil',
                                        "bJQueryUI": false,
                                        "sPaginationType": "full_numbers",
                                        //"aaSortingFixed": [[0,'asc']],
                                        "fnDrawCallback": function(oSettings) {
                                            jQuery.uniform.update();
                                        },
                                        "iDisplayStart ": 10,
                                        "oLanguage": {
                                            "sProcessing": "<center><img src='<?php echo base_url(); ?>assets/img/loaders/loader_blue.gif' /></center>"
                                        },
                                        "fnInitComplete": function () {
                                            //oTable.fnAdjustColumnSizing();
                                        },
                                        'fnServerData': function (sSource, aoData, fnCallback) {
                                            jQuery.ajax
                                            ({
                                                'dataType': 'json',
                                                'type': 'POST',
                                                'url': sSource,
                                                'data': aoData,
                                                'success': fnCallback
                                            });
                                        }
                                    });
                                });
                            </script>
                        </div>
                         <!---- END DAFTAR SATUAN KECIL OBAT---->
                        
                        <!---- TAMBAH SATUAN KECIL OBAT START ---->
                        <div id="tambah">
                       		<h4 class="widgettitle">Data Satuan Kecil Obat</h4>
			<div class="row-fluid">
			<div class="span6">
			<?php echo form_open('cont_master_farmasi/satuan_kecil/tambah', array('class' => 'stdform stdform2', 'id' => 'form_input')); ?>
                        <table class="table table-bordered table-invoice">
				<tr>
					<td>Kode Satuan Kecil</td>
					<td><input type="text" name="kd_sat_kecil_obat" id="kd_sat_kecil_obat" class="input-small" /></td>
				</tr>
				<tr>
					<td>Nama Satuan</td>
					<td><input type="text" name="sat_kecil_obat" id="sat_kecil_obat" class="input-large" /></td>
				</tr>
			</table>
			<p class="stdformbutton">
				<button class="btn btn-inverse"><i class="icon-ok-circle icon-white"></i> Simpan</button>
				<button id="growl" type="reset" class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Reset</button>
                        </p>
                               	<?php echo form_close();  ?>
                        </div></div>
			
                        <!---- END TAMBAH TERAPI OBAT---->
                	</div><!--tabs-->
                </div><!--row-fluid-->
        </div><!--contentinner-->
    </div><!--maincontent-->
</div><!--mainright-->
</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	// With Form Validation
	jQuery("#form_edit").validate({
		rules: {
			kd_sat_kecil_obat: "required",
			sat_kecil_obat: "required",
			
		},
		messages: {
			kd_sat_kecil_obat: "Kode satuan kecil obat harus diisi!",
			sat_kecil_obat: "Nama satuan kecil obat harus diisi!",
		},
		highlight: function(label) {
			jQuery(label).closest('p').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('Ok!').addClass('valid')
	    		.closest('p').addClass('success');
	    }
	});
	
	jQuery("#form_input").validate({
		rules: {
			kd_sat_kecil_obat: "required",
			sat_kecil_obat: "required",
			
		},
		messages: {
			kd_sat_kecil_obat: "Kode satuan kecil obat harus diisi!",
			sat_kecil_obat: "Nama satuan kecil obat harus diisi!",
		},
		highlight: function(label) {
			jQuery(label).closest('p').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('Ok!').addClass('valid')
	    		.closest('p').addClass('success');
	    }
	});
	
});

</script>