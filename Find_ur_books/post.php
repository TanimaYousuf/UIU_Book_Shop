<?php
session_start();
ob_start();
include_once  'config.php';
if(!isset($_SESSION['usr_id']))
{
    header("Location: login.php");
}
$user_id=$_SESSION['usr_id'];
//if (isset($_SESSION['usr_id'])) {
//    header("Location: index.php");
//}
$error = false;
echo $error;
if (isset($_POST['save_post'])) {
    if(isset($_FILES["image"]))
    {
        echo "jsdlfj";
        $check= getimagesize($_FILES["image"]["tmp_name"]);
    if($check!==false)
    {
        $pic=$_FILES['image']['tmp_name'];
        $picContent= addslashes(file_get_contents($pic));
    }
    $postdataTime = date("Y-m-d h:i:s");
 
  // Insert record
     $post_type = mysqli_real_escape_string($conn, $_POST['post_type']);
    $book_name = mysqli_real_escape_string($conn,$_POST['book_name']);
    $author_name = mysqli_real_escape_string($conn, $_POST['author_name']);
    $book_isbn = mysqli_real_escape_string($conn, $_POST['book_isbn']);
    $edition = mysqli_real_escape_string($conn, $_POST['edition']);
    $category= mysqli_real_escape_string($conn,$_POST['category']);
    $description= mysqli_real_escape_string($conn,$_POST['description']);
    $orginal_price= mysqli_real_escape_string($conn,$_POST['orginal_price']);
    $your_price = mysqli_real_escape_string($conn,$_POST['your_price']);
    $conact_email = mysqli_real_escape_string($conn,$_POST['contact_email']);

    //name can contain only alpha characters and space
    if(!$post_type)
    {
        $error= true;
        $post_type_error= 'Type is not selected';
    }
    if(empty($book_name))
    {
        $error=true;
        $book_name_error = 'Book name is missing';
    }
    if(empty($author_name))
    {
        $error= true;
        $author_name_error= 'Author name is missing';
    }
    if(empty($book_isbn))
    {
        $error= true;
        $book_isbn_error= 'Book ISBN is missing';
    }
    if(empty($edition))
    {
        $error= true;
        $edition_error= 'Edition missing';
    }
    if(!$orginal_price)
    {
        $error= true;
        $orginal_price_error='Orginal price missing';
    }
    if(!$your_price)
    {
        $error= true;
        $your_price_error='Your price missing';
    }
    if(empty($conact_email))
    {
        $error= true;
        $conact_email_error= 'Contact email missing';
    }
    if (!$error) {
        if (mysqli_query($conn, "INSERT INTO `user_post`(user_id, book_title, author, isbn, edition, post_type, cover, description, orginal_price, your_price, contact_email, category,post_date_time) VALUES ('".$user_id."','".$book_name."','".$author_name."','".$book_isbn."','".$edition."','".$post_type."','".$picContent."','".$description."','".$orginal_price."','".$your_price."','".$conact_email."','".$category."','".$postdataTime."')")) {
            $successmsg = "Successfully Registered! <a href='home.php'>Click here to home</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
    
        
    }
    
  
  
  // Upload file
  
 }
    
//    
    
    

?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>SUIU Book Shop</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
			<!--	<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="products.html">SHOP NOW</a></p>-->
			</div><div class="agile-login">
				<ul>
                                    <?php if (isset($_SESSION['usr_id'])) { ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user"></span> 
                                    <strong><?php
                                        $usrname = $_SESSION['usr_first_name'];
                                        echo $usrname;
                                        ?></strong>
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                                <ul style="background-color:white;" class="dropdown-menu">
                                    <li>
                                        <div class="navbar-login">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <p class="text-center">
                                                        <span class="glyphicon glyphicon-user icon-size"></span>
                                                    </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="text-left"><strong><?php echo $usrname; ?></strong></p>

                                                    <p class="text-left">
                                                        <a href="user_profile.php" class="btn btn-primary btn-block btn-sm">Profile</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="navbar-login navbar-login-session">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>
                                                        <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                                        <!--<li><a class="navbar-text" href="user_profile.php">Signed in as <?php //echo $_session['name'];       ?></a></li>
                                            <li><a href="logout.php">Log Out</a></li>-->
                        <?php } else { ?>
                            <li><a href="registration.php"> Create Account </a></li>
                            <li><a href="login.php">Login</a></li>-->
                        <?php } ?>
                                    
                                    
					
					
				</ul>
			</div>
			<div class="product_list_header">  
					<form action="#" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form>  
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<!--<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>
					
				</ul>
			</div>-->
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">UIU Book Shop</a></h1>
			</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="search" name="Search" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
                                                                    <li class="active"><a href="index.php" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Post<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All Post</h6>
														<li><a href="groceries.html">Admin Post</a></li>
														<li><a href="groceries.html">User Post</a></li>
														<li><a href="groceries.html">Buy Post</a></li>
														<li><a href="groceries.html">Sell Post</a></li>
														<li><a href="groceries.html"> Exchange Post</a></li>
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All Shop</h6>
														<li><a href="household.html">Category</a></li>
														<li><a href="household.html">All Books</a></li>
														<li><a href="household.html">Book Related Equipment</a></li>
													</ul>
												</div>
												
												
											</div>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">News<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All News</h6>
														<li><a href="personalcare.html">Latest News</a></li>
														<li><a href="personalcare.html">Book Launch</a></li>
														<li><a href="personalcare.html">Upcoming Books</a></li>
														<li><a href="personalcare.html">Offer News</a></li>
													</ul>
												</div>
												
											</div>
										</ul>
									</li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Post</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Post</h2>
			<div class="login-form-grids">
				<h5>Book information</h5>
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="postform" enctype='multipart/form-data'>
                                    <b>Post Type </b>
                                    <select name="post_type"> 
                                        <option > Select Post Type</option>
                                        <option value="1">Buy</option>
                                        <option value="2">Sell</option>
                                        <option value="3">Exchange</option>
                                    </select>
                                    <br><br>
                                    <b>Book Name </b>
                                    <input type="text" name="book_name" placeholder="Book Name..." required value="<?php if ($error) echo $book_title; ?>  " >
                                        <span class="text-danger"><?php if (isset($book_title_error)) echo $book_name_error; ?></span>
                                        <br>
                                     <b>Author Name </b>   
                                     <input type="text" name="author_name" placeholder="Author..." required value="<?php if($error) echo $author_name; ?> " >
                                        <span class="text-danger"><?php if (isset($author_name_error)) echo $author_name_error; ?></span>
                                        <br>
                                        <b>Book ISBN </b>
                                        <input type="text" name="book_isbn" placeholder="ISBN... " required value="<?php if($error) echo $isbn; ?> ">
                                        <span class="text-danger"><?php if (isset($isbn_error)) echo $book_isbn_error; ?></span>
                                        <br>
                                        <b>Edition: </b>
                                        <input type="text " name="edition" placeholder="Enter Edition..." required value="<?php if($error) echo $edition; ?> " >
                                        <span class="text-danger"><?php if (isset($edition_error)) echo $edition_error; ?></span>
                                        <br>
                                        <br>
                                        <b>Category </b>
                                    <select name="category"> 
                                        <option > Select Category</option>
                                        <option value="1">Math</option>
                                        <option value="2">CSE</option>
                                        <option value="3">EEE</option>
                                    </select>
                                        <br>
                                        <br>
                                        <b>Book Cover </b>
                                        <input type="file" name="image" accept="image/jpeg" >
                                        <br>
                                        <b>Desciption </b>
                                        <textarea rows="4" cols="50" placeholder="Descripe here..." name="description" <?php if($error) echo $description; ?>></textarea>
                                        <span class="text-danger"><?php if (isset($description_error)) echo $description_error; ?></span>
                                        <br>
                                        <br>
                                        <b>Orginal Price</b>
                                        <input name="orginal_price" type="number" placeholder="Orginal price..." <?php if($error) echo $orginal_price; ?>>
                                        <span class="text-danger"><?php if (isset($orginal_price_error)) echo $orginal_price_error; ?></span>
                                        <br>
                                        <br>
                                        <b>Your Price</b>
                                        <input name="your_price" type="number" placeholder="Your Price" <?php if($error) echo $your_price; ?>>
                                        <span class="text-danger"><?php if (isset($your_price_error)) echo $your_price_error; ?></span>
                                        <br>
                                        <br>
                                        <b>Contact</b>
                                        <input name="contact_email" type="email" placeholder="Contact email..." <?php if($error) echo $contact_email; ?>>
                                        <span class="text-danger"><?php if (isset($contact_email_error)) echo $contact_email_error; ?></span>
                                        <br>
                                        <input type="submit" name="save_post" value="Submit">
                                        
                                         
				</form>
<!--				<div class="register-check-box">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
					</div>
-->				</div>
			</div>
			<div class="register-home">
                            <a href="index.php">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>abc <span>abc.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 </li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">About Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.html">FAQ's</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="groceries.html">Post</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="household.html">Shop</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="personalcare.html">News</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Store</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="checkout.html">My Cart</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.php">Login</a></li>
                                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="registration.php">Create Account</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				
			</div>
		</div>
		
	</div>
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
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
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 

</body>
</html>