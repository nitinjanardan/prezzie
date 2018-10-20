<?php include 'admin_header.php' ?>
	
<?php
$c=0;
$con=mysqli_connect("localhost","root","","fascination"); // connect to databse
$sel2="SELECT count(product_code) FROM product_detail" ;
			$qry=mysqli_query($con,$sel2);
			while($row=mysqli_fetch_array($qry))
			{
				$c=$row[0];
			}
			$c=$c+101;		
						
?>	
	
<body>
	<br /><br />
	
	<div class="jarallax contact-bottom" id="contact">
		<div class="col-md-12 contact-right-w3l">
			<h3 class="title-w3layouts white-agileits">Product <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell white-agileits" aria-hidden="true"></i></h3>
			<form action="database.php" method="post"  enctype="multipart/form-data">
				<input type="text" name="pc" placeholder="Product Code" value="<?php echo $c; ?>">
				<input type= "text" name = "pname" placeholder="Product Name">
				<input type = "text" name = "price" placeholder = "Amount">
				<div class = "col-md-12" >
					<div class= "form-group">
						<label style = "color:white"><h4>Photo</h4></label>
						<input type = "file" name="file" style= "color:white">
					</div>
				</div>	
				<div class = "col-md-12" >
					<div class= "form-group">
						<label style = "color:white"><h4>Category</h4></label>
						<select name="category">
							<option value="0">select category</option>
							<?php
								$sel = "SELECT * FROM category_detail" ; 
								$qry1 = mysqli_query($con,$sel);
								while($row1=mysqli_fetch_array($qry1))
								{
									echo "<option>$row1[1]</option>";
								}
							?>							
						</select> 
					</div>
				</div>	
				<textarea placeholder="Description"  name = "desc"></textarea>
				<input type="submit" value="Add" name = "add">
					</div>
				</div>
			</form>
		</div>
	</div>
	
</body>	
<?php include 'footer.php' ?>

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
<!-- for-Clients -->
		<script src="js/owl.carousel.js"></script>
			<!-- requried-jsfiles-for owl -->
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo2").owlCarousel({
									        items : 1,
									        lazyLoad : false,
									        autoPlay : true,
									        navigation : false,
									        navigationText :  false,
									        pagination : true,
									      });
									    });
									  </script>
			<!-- //requried-jsfiles-for owl -->
	<!-- //for-Clients -->
<!-- cart-js -->
	<script src="js/minicart.min.js"></script>
	<script>
		// Mini Cart
		paypal.minicart.render({
			action: '#'
		});

		if (~window.location.search.indexOf('reset=true')) {
			paypal.minicart.reset();
		}
	</script>
<!-- //cart-js --> 
<!-- video-bg -->
<script src="js/jquery.vide.min.js"></script>
<!-- //video-bg -->
<!-- Nice scroll -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- //Nice scroll -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
