<?php
include("config.php");
$con = new connection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>QUOTES</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <?php include("header.php");?>
    <!-- ##### Header Area End ##### -->


    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/hadeesbook.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Quiz Answer</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quiz Answer</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Archive Post Area Start ##### -->
    <div class="archive-post-area">
        <div class="container">
		<div class="row bg-white mb-5">
		<div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 ml-5">
			 <?php
							$uid=$_GET["id"];							 
							 $status="";
							$qry="select * from quiz where qid='$uid'";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								 $status.="<div class='single-catagory-post d-flex flex-wrap>";
								$status.="<div class='post-content'>";
                                $status.="<div class=post-meta'>";    
                                $status.="</div>";
                                $status.="<center><p class='post-title text-justify pl-10'>$row[1]</p>";
								$status.="<p class='post-title text-justify pl-10'>$row[2]</p>";
                            $status.="</div></center></div>";
							}
							echo $status;?>   
        </div>
    </div></div></div>
    <!-- ##### Archive Post Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   <?php include("footer.php");?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>