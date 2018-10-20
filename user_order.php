<?php include 'user_header.php' ?>

<?php
$c=0;
$con=mysqli_connect("localhost","root","","fascination"); // connect to databse
$sel2="SELECT count(order_id) FROM order_detail" ;
			$qry=mysqli_query($con,$sel2);
			while($row=mysqli_fetch_array($qry))
			{
				$c=$row[0];
			}
			$c=$c+101;		
			$d= date("d/m/y");
			$pid = $_GET['id'];
			$sel = "SELECT product_code,product_name,price from product_detail where product_code ='$pid'";
			$qry1= mysqli_query($con,$sel);
			while($num=mysqli_fetch_array($qry1))
			{
				$pc = $num[0];
				$pname =$num[1];
				$price = $num[2];
			}
?>	

<body>
<script>
function getPrice()
{
	var t1=document.getElementById("t1").value;
	var s1=document.getElementById("s1").value;
	var qty=parseInt(s1);
	var pr=parseInt(t1);
	document.getElementById("t2").value=qty*pr;
}
</script>

	<br /><br />
	<div class="jarallax contact-bottom" id="contact">
		<div class="col-md-12 contact-right-w3l">
			<h3 class="title-w3layouts white-agileits">Order <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell white-agileits" aria-hidden="true"></i></h3>
			<form action="database.php" method="post">
				<input type="text" name="oid" value= "<?php echo $c ?>" >
				<input type="text" name="curr_date" value = "<?php echo $d ?>" >
				<input type="text" name="pcode" value = "<?php echo $pc ?>" >
				<input type="text" name="name" value = "<?php echo $pname ?>" >
				<input type="text" name="price" value = "<?php echo $price ?>" id="t1">
				<div class = "col-md-12" >
					<div class= "form-group">
						<label style = "color:white"><h4>Quantity</h4></label>
						<select name="quant" onchange="getPrice()" id="s1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
				</div>	
								
				<input type="text" name="total_price" value = "<?php echo $price ?>"  id="t2">
				<br>
				<input type="submit" value="Order" name = "order">
			
			</form>
			
			<?php
				if(isset($_GET['msg1']))
				{
					echo"<script>alert('".$_GET['msg1']."')</script>";
				}	
			?>
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
