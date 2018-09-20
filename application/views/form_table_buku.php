<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Dashboard</title>

<link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url()."assets/css/"; ?>datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url()."assets/css/"; ?>bootstrap-table.css" rel="stylesheet">
<link href="<?php echo base_url()."assets/css/"; ?>styles.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url()."assets/js/"; ?>lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<!-- nav -->
	<?php include "nav.php" ?>
	<!-- end nav -->
		
	<!-- side bar -->
	<?php include "sidebar.php" ?>
	<!-- end side bar -->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Daftar Buku</div> 
					<div class="panel-body">

						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<a class="btn btn-primary" href="<?php echo base_url()."index.php/admin/add_buku"; ?>" >Tambah buku</a>
						    <thead>
						    <tr>  
						        <th  width="100px">KODE</th>
						        <th  width="100px">JUDUL BUKA</th>
						        <th  width="100px">PENGARANG</th>
						        <th  width="100px">KETERANGAN</th>
						        <th width="100px">JUMLAH BUKU</th>
						        
						        <th  width="200px">AKSI</th>
						    </tr>
						    </thead>
						    <?php foreach ($buku as $data) { ?>
                                            <tr>
                                       
                                            <td><?php echo $data['kode_buku']; ?></td>
                                            <td><?php echo $data['judul']; ?></td>
                                            <td><?php echo $data['pengarang']; ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td><?php echo $data['jumlah_buku']; ?></td>
                                            <td>
                                               
                                              <a class="btn btn-success" href="<?php echo base_url()."index.php/admin/edit_buku/".$data['kode_buku']; ?>">Edit Buku</a> -
                                              <a class="btn btn-danger" href="<?php echo base_url()."index.php/admin/delete_buku/".$data['kode_buku']; ?>">Hapus Buku</a>
                                            </td>
                                            </tr>

                                        <?php } ?>
						     
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->							
		
	</div>	<!--/.main-->

	<script src="<?php echo base_url()."assets/js/"; ?>jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url()."assets/js/"; ?>bootstrap.min.js"></script>
	<script src="<?php echo base_url()."assets/js/"; ?>chart.min.js"></script>
	<script src="<?php echo base_url()."assets/js/"; ?>chart-data.js"></script>
	<script src="<?php echo base_url()."assets/js/"; ?>easypiechart.js"></script>
	<script src="<?php echo base_url()."assets/js/"; ?>easypiechart-data.js"></script>
	<script src="<?php echo base_url()."assets/js/"; ?>bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url()."assets/js/"; ?>bootstrap-table.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
