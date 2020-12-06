<?php
include "db_connection.php";
$login_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start();
	$username = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM $database.Users WHERE email = '$username' and password = '$password'";
	$connection = mysqli_connect($db_hostname, $db_username, $db_password);
	if(!$connection) {
		echo "Database Connection Error...".mysqli_connect_error();
	} else {
		$user = mysqli_query( $connection, $sql );
		if(! $user ) {
			echo "Error access in table Users ".mysqli_error($connection);
		}
		$count = mysqli_num_rows($user);
		
		if($count == 1 ) {
			$user_id = 0;
			while($row = mysqli_fetch_assoc($user)) {
				$user_id = $row["id"];
			}
			
			$_SESSION['tw_id'] = $user_id;
			// Redirect to Home page
			header("location: http://localhost/TW_Project");
			
		} else {
			$login_err = "The username or password is not correct!";
		}
		if (!$connection)
			mysqli_close($connection);
	}
}
?>

<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/55633888-390263088462151-7992124738384166912-n-1.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Cont</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<body>
  
  <section class="menu menu3 cid-sgDdl38J5X" once="menu" id="menu3-a">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                        <img src="assets/images/55633888-390263088462151-7992124738384166912-n-1.png" alt="" style="height: 3.1rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-danger text-primary display-5" href="index.php">Glammy</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">Femei</a><div class="dropdown-menu"><a class="text-black dropdown-item text-primary display-4" href="femeiaccesorii.html">Accesorii</a><a class="text-black dropdown-item text-primary display-4" href="femeicosmetice.html">Cosmetice</a></div></li>
                    <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">
                            Barbati</a><div class="dropdown-menu"><a class="text-black dropdown-item text-primary display-4" href="barbatiaccesorii.html">Accesorii</a><a class="text-black dropdown-item text-primary display-4" href="barbatiincaltaminte.html">Incaltaminte</a></div></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="cont.html"><span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn"></span>Cont</a>
                    </li><li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="cos.php"><span class="mobi-mbri mobi-mbri-shopping-cart mbr-iconfont mbr-iconfont-btn"></span>Cos</a></li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="https://facebook.com" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                    
                    
                    
                </div>
                
            </div>
        </div>
    </nav>
</section>

<section class="form6 cid-sgDmGvl36f" id="form6-i">
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Login</strong></h3>
            
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" >
                <form action="" method="POST" class="mbr-form form-with-styler mx-auto" >
                    <input type="hidden" name="email" value="CXdwvSLQD/vbxtG6jBUC7SIa0pMjl1Wuq7LgEm2WGGBQQQIbwSYiquG9/FBRZ26YSq6WarplbE3G6yBNh3LVh8oBqO3JN+7nz4vQs6n30ZE+T3t9+RMi6LuGQh1UtKDm">
                    <div class="">
                        <div hidden="hidden"  class="alert alert-success col-12">Thanks for filling
                            out the form!</div>
                        <div hidden="hidden"  class="alert alert-danger col-12">Oops...! some
                            problem!</div>
                    </div>
                    <div class="dragArea row">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" >
                            <input type="email" name="email" placeholder="Email"  class="form-control" value="" >
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="password" name="password" placeholder="Password"  class="form-control" value="" >
                        </div>
                        <div class="col-auto mbr-section-btn align-center"><button type="submit" class="btn btn-primary display-4">Login</button></div>
                    </div>
                </form>
                <br>
                <p class="text-center text-muted small">Don't have an account? <a href="http://localhost/TW_Project/register.php">Sign up here!</a></p>
            </div>
        </div>
    </div>
</section>

<section class="contacts1 cid-sgDtCeYQbD" id="contacts1-p">

    

    
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Contact Us</strong>
            </h3>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="card col-12 col-lg-6">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="image-wrapper">
                            <span class="mbr-iconfont mobi-mbri-letter mobi-mbri"></span>
                        </div>
                        <h4 class="card-title mbr-fonts-style mb-2 display-2">
                            <strong>Email</strong>
                        </h4>
                        <p class="mbr-text mbr-fonts-style mb-2 display-4">
                            We will reply as soon as possible</p>
                        <h5 class="link mbr-fonts-style display-7"><a href="mailto:roberta.ciurdea99@e-uvt.ro" class="text-primary">Send us an
                                email</a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-lg-6">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="image-wrapper">
                            <span class="mbr-iconfont mobi-mbri-mobile-2 mobi-mbri"></span>
                        </div>
                        <h4 class="card-title mbr-fonts-style align-center mb-2 display-2">
                            <strong>Phone</strong>
                        </h4>
                        <p class="mbr-text mbr-fonts-style mb-2 display-4">
                            Mon - Fri 09:00 - 18:00</p>
                        <h5 class="link mbr-black mbr-fonts-style display-7">
                            <a href="tel:+12345678910" class="text-primary">Call (800) 123 45 67</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/z" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;"><a href="https://mobirise.site/t" style="color:#aaa;">Created</a> with Mobirise free web theme</p></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/formstyler/jquery.formstyler.js"></script>  <script src="assets/formstyler/jquery.formstyler.min.js"></script>  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  
  
  
</body>
</html>