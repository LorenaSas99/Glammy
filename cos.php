<?php
    session_start();
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
  
  
  <title>Cos</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<body>
  
  <section class="menu menu3 cid-sgDdtHo9PO" once="menu" id="menu3-c">
    
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
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="cont.php"><span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn"></span>Cont</a>
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

<section class="features9 cid-sgDnlPdUpf" id="features10-j">
    <!---->
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style mb-0 display-2">
                <strong>Cos de cumparaturi</strong></h3>
            
        </div>
        <div class="row mt-4">
            <?php
                include "db_connection.php";
                if(!isset($_SESSION['tw_id'])) {
                    // nu sunt logat si fac redirect la login
                    header("location: http://localhost/TW_Project/cont.php");
                } else {
                    $connection = mysqli_connect($db_hostname, $db_username, $db_password);
                    if(!$connection) {
                        echo"Database Connection Error...".mysqli_connect_error();
                    } else {
                        $user_id = $_SESSION['tw_id'];
                        $sql = "SELECT * FROM Glammy.Cos WHERE user_id=$user_id";
                        $retval = mysqli_query($connection, $sql);
                        if(!$retval) {
                            echo "Err".mysqli_error($connection);
                        } else {
                            // Deseneaza pe browser produsele din cosul utilizatorului logat
                            $total = 0.0;
                            while ($row = mysqli_fetch_assoc($retval)) {
                                $title = $row['name'];
                                $pret = $row['pret'];
                                $desc = $row['descriere'];
                                $total += $pret;
                                echo '<div class="card col-12">'.
                                    '<div class="card-wrapper">'.
                                '<div class="top-line row">'.
                                    '<div class="col">'.
                                        "<h4 class=\"card-title mbr-fonts-style display-5\"><strong>$title</strong></h4>".
                                    '</div>'.
                                    '<div class="col-auto">'.
                                        "<p class=\"price mbr-fonts-style display-5\">$$pret</p>".
                                    '</div>'.
                                '</div>'.
                                '<div class="bottom-line">'.
                                    "<p class=\"mbr-text mbr-fonts-style display-7\">$desc</p>".
                                '</div>'.
                            '</div>'.
                            '</div>';
                            }
                            echo '<div class="card col-12">'.
                                '<div class="card-wrapper">'.
                                '<div class="row top-line">'.
                                    '<div class="col"><h2><strong>Total</strong></h2></div>'.
                                    "<div class=\"col-auto\"><h1><span class=\"badge badge-danger\">$total</span></h1>".
                                    '<button type="button" class="btn btn-warning">Checkout</button></div>'.
                                '</div>'.
                                '</div>'.
                            '</div>';
                        }
                    }
                    mysqli_close($connection);
                }
            ?>
        </div>
    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/i" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;">Build a free site with <a href="https://mobirise.site/z" style="color:#aaa;">Mobirise</a></p></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>  
  
  
</body>
</html>