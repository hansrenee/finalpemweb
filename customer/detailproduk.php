<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Booking Cerdas</title> 
	<meta name="description" content="Website, Corporate, Bekasi, Garment, Sablon, Konveksi"/>
	<meta name="keywords" content="Bahan, Pakaian, Baju, Sablon" />
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<script src="../js/jquery-1.8.2.js"></script>
	<!-- end: Facebook Open Graph -->

	<!-- start: CSS --> 
	<link rel="stylesheet" href="../css/tema.css"/>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
<?php include "header.php"; ?>
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">
 
			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Product Details</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	
      		<!-- start: Row -->
            
      		<div class="row">
            <div class="col-sm-6">
                    <?php                  
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
?>
        		<!--<div class="span4">-->
          			<!--<div class="icons-box">-->
                    <div class="hero-unit"  style="margin-left: 250px;">
                    <table>
                    <tr>
                        <td rowspan="7"><img src="../admin/<?php echo $data['gambar']; ?>" height="300" width="350" /></td>
                        </tr>
                        <tr>
                        <td colspan="4"><div class="title"><h2><?php echo $data['nama']; ?></h2></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td size="200"><h3>Harga</h3></td>
                        <td><h3>:</h3></td>
						<td><div><h3>Rp.<?php echo number_format($data['harga'],2,",",".");?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Stock</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php if ($data['stok'] >= 1){
	                           echo '<strong style="color: blue;">In Stock (Tersedia)</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Out Of Stock (Kosong)</strong>';	
                                }; ?></h3></div></td>
                        </tr>
                        <!--<tr>
                        <td></td>
                        <td><h3>Satuan</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php //echo $data['br_satuan']; ?></h3></div></td>
                        </tr>-->
                        <tr>
                        <td></td>
                        <td><h3>Keterangan</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php echo $data['jenis']; ?></h3></div></td>
                        </tr>
					<!--	<p>
						
						</p> -->
                        

                        <tr>
                        <td></td>
                        <td><h3>Size</h3></td>
                        <td><h3>:</h3></td>
                          <td><select id="size" name="size" class="form-control" required>
                            <option value="All Size">All Size</option>
                               </select></td>
                            </tr>

                        <tr>
                        	<td></td>
                        	
                        	<td><h3>Capacity</h3></td>
                            <td><h3>:</h3></td>
                            <td><select id="capacity" name="capacity" class="form-control" required>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="6">6</option>
                            
                            </select></td>
                        </tr>  

                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
						<td><div class="clear"> <a href="addtocart.php?kd=<?php echo $data['kode']; ?>" class="btn btn-lg btn-success">Buy</a></div></td>
                        </tr>                                  

                    </table>
                    </div>
                    <!--</div> -->
        		<!--</div> -->
<!---->
      		</div>
			<!-- end: Row -->
					
					
				</div>	
				
					
				</div>
				
                </div>
			</div>
			<!--end: Row-->
	
		</div>
		<!--end: Container-->
				
		<!--start: Container -->
    	<div class="container">	
      		
		<br>
			<h1>Ulasan</h1>
			<div class="kontener_review">

			<?php 
			//import koneksi PDO
			include('../conn.php');
			
			$id_produk_pilihan = $_GET['kd'];
			$dataMentah = $koneksi_PDO->query("select nama_reviewer, deskripsi_review, rating from pengulas_review where id_produk = $id_produk_pilihan");

			while($eh = $dataMentah->fetch()){
				echo '<h5>'.$eh['nama_reviewer'].'</h5><h4>['.$eh['rating'].'/5]</h4>';
				echo '<p>'.$eh['deskripsi_review'].'</p>';
				echo '<hr>';
			}
			
			
			
			?>
				<button id="tombol_tampil_ulasan" class="btn btn-lg" onclick="tampilForm()">Tulis Ulasan</button>
				<button id="tutup_tampil_ulasan" class="btn btn-lg" onclick="tutupForm()">Batal</button>
				<br><br>
				<form id="form_review" class="form_review" action="submit_form.php" method="POST">
					<input name="nama_review"class="field_review" value="<?php echo $_SESSION['fullname'] ?>"type="text" placeholder="Nama Pengulas" readonly>
					<br>
					<input name="skala_rating" class="field_review" min="1" max="5" type="number" placeholder="Masukan Skala Rating 1-5"><br>
					<textarea placeholder="Tulis Kesan disini" name="deskripsi_review" class="field_review" rows="10" cols="50"></textarea>
					<input type="hidden" name="passing_produk" value="<?php echo $_GET['kd']?>">
					<br>
					<button class="btn btn-lg" type="submit">Submit Ulasan</button>
				</form>
			</div>
			<hr>	
			
			
		
		</div>
		<!--end: Container-->	

	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						<a href="#"><img src="img/logo1.png" alt="logo" /></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">

							<li><a href="#">Kemeja</a></li>

							<li><a href="#">Kaos</a></li>

							<li><a href="#">Sweater</a></li>

							<li><a href="#">Jacket</a></li>
							
							<li><a href="#">Pants & Jeans</a></li>

						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<?php include "footer.php"; ?>

<script src="../js/bootstrap.js"></script>
<script src="../js/flexslider.js"></script>
<script src="../js/carousel.js"></script>
<script src="../js/jquery.cslider.js"></script>
<script src="../js/slider.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/tampil_ulasan.js"></script>





</body>
</html>	