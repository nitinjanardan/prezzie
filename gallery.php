<?php include 'user_header.php'?>
<!--					
					<div class="top-nav">
								<nav class="navbar navbar-default">
									<div class="container">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu						
										</button>
									</div>
									<!-- Collect the nav links, forms, and other content for toggling 
									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										<ul class="nav navbar-nav">
											<li class="home-icon"><a href="index.php"><span class="fa fa-home" aria-hidden="true"></span></a></li>
											<li><a href="about.php">About</a></li>
											<li><a href="gallery.php" class="active">Gallery</a></li>
											<li><a href="buynow.php">Buy</a></li>
											<li><a href="contact.php">Contact</a></li>
											<li><a href="login.php">Login</a></li>
											<li class="nav-cart-w3ls">
												<form action="#" method="post" class="last"> 
													<input type="hidden" name="cmd" value="_cart">
													<input type="hidden" name="display" value="1">
													<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
												</form> 
											</li>
										</ul>	
										<div class="clearfix"> </div>
									</div>	
								</nav>	
							</div>
						
					</div>
					<div class="clearfix"></div>
			    -->
				<!-- banner-text -->
		
			<!--banner Slider starts Here-->
      </div>
	 </div>
	 </div>
<!-- //banner -->
<!--Gallery -->
<div class="gallery" id="gallery">
	<div class="container">
		<div class="heading-setion-w3ls">
						<h3 class="title-w3layouts"> Gallery <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell" aria-hidden="true"></i></h3>
					</div>
		<div class="agileinfo_work_grids">
		<?php
			$c=0;
			$con=mysqli_connect("localhost","root","","fascination");
			$sel2="SELECT * FROM product_detail" ;
			$qry=mysqli_query($con,$sel2);
			while($row=mysqli_fetch_array($qry))
			{
				$c++;
				?>
			
			
				<div class="col-md-4 w3_agile_work_grid gallery1">
					<div class="wthree_work_grid1">
						<a href="user_order.php?id=<?php echo $row[0];?>">
							<div class="agile_work_grid w3_agileits_sub_work">
							<img src="upload/<?php echo $row[0];?>.jpg" style="height:300px;width:300px" class="img-responsive" />							
							</div>
						</a>
					</div>
				</div>		
			<?php
			if($c%3==0)
			{
				echo "<div>.</div>";
			}
			}
			?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>	


<!-- //Gallery -->
<!--footer-->
	<?php include 'footer.php' ?>
<!--//footer-->

	<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- script-for-swipebox -->
	<script src="js/jquery.swipebox.min.js"></script> 
	<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
	</script>
<!-- //script-for-swipebox -->
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
<!-- //for bootstrap working -->
</body>
</html>