<?php
include("config.php");
$con = new connection();$filename=str_replace('.php','',basename($_SERVER['PHP_SELF']));

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
    <title>HADEES VIEW</title>

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
						<input type="hidden" id="filename" name="filename" value=<?php echo $filename; ?>/>

            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Hadees</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Hadees Post</li>
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
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

                        <!-- Single Catagory Post -->
                        <div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
                             <?php 
							 $id=$_GET["id"];
							 $status="";
							$qry="select * from htype  where htypeid='$id'";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								$status.="<div class='col-sm-12 col-md-12 col-lg-12 col-xl-12'>";
									$status.="<p class=' text-justify'>$row[2]</p>";
								$status.="</div>";
							}
							?>

                            <!-- Post Contetnt -->
                            <?php echo $status;?>
                        </div>

                    </div>
                </div>    
            </div>
        </div>
    </div>
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