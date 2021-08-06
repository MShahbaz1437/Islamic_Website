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
    <title>Index</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
	<style type="text/css">
	#div1
	{
		float:right; height:30px; width:100px; background-color:#ed3974; margin:5px; border-radius:5px 5px;padding:2px;
	}
	#viewall
	{
		color:#ffffff; 
	}
	</style>
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

  
    <!-- ##### Mag Posts Area Start ##### -->
    <section class="mag-posts-area mt-30 d-flex flex-wrap">
	<div class="container-fluid">
	
       <div class="row justify-content-center  h-1">
			<div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
				<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                        <div class="section-heading">
                            <a href="dailypost"><h5>Today Post</h5></a>
                        </div>
                        <div class="single-catagory-post d-flex flex-wrap">
							<?php 
							 $status="";
							$qry="select * from dailypost  where dpstatus='Active' order by dpid desc limit 1";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								$status.="<div>";
                                $status.="<center><a href='dailypostfullview?id=$row[0]'>$row[1]</a></center>";
								$status.="<p>".substr($row[2],0,300)."</p>";
								$status.="<a href='dailypostfullview?id=$row[0]' class='btn btn-sm btn-dark'>Read More </a>";
                            $status.="</div>";
							}
							echo $status;?>
                        </div>

				</div>
			</div>
		</div>	
		<div class="row justify-content-center  h-1">
			<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
				<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                        <div class="section-heading">
                            <a href="dailypost"><h5>Donate Us</h5></a>
                        </div>
                        <div class="single-catagory-post d-flex flex-wrap">
							
							<marquee>
								
								<?php
								
								$qry="select dopaytm,dophonepay from donation where dostatus='active' order by doid desc limit  1";
								$rs=$con->readrecord($qry);
								while($row=mysql_fetch_array($rs))
								{
									echo "<div class=single-trending-post'>";
										echo "<img src='../admin/$row[0]' style= 'height:200px; margin:5px;' >";
										  echo "<img src='../admin/$row[1]' style= 'height:200px; ' >";
									echo " </div>";
								}
							
							?>
							</marquee>
                        </div>

				</div>
			</div>
		</div>	
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
					<div id="div1">
						<center>
							<a id="viewall" href="video">View All <i class='fa fa-arrow-right' aria-hidden='true'> </i></a>
						</center> 
					</div>
					<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
						<div class="section-heading mt-3">
								<a href="video"><h5>Video</h5></a>
						</div>
                        <div class="single-catagory-post d-flex flex-wrap">
                             <?php 
									$status="";
									$qry="select * from video where vstatus='Active' order by vid desc limit 3";
									$rs=$con->readrecord($qry);
									while($row=mysql_fetch_array($rs))
									{ 
										$status.="<div class='col-sm-4 col-lg-4 col-md-4 col-xl-4'>";
										$status.="<div class='single-blog-post style-4 mb-30'>";
										$status.="<div class='post-thumbnail'>";
											$status.="<iframe class='ml-4' src='$row[2]' width='200' > </iframe></div>";
										$status.="<div class='post-content pl-4'>";
											$status.="<a href='video' class='post-title '>$row[1]</a>";
										$status.="</div></div> </div>";
									}
								 echo $status;?>
                        </div>
                    </div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-sm-12 col-lg-10 col-md-10 col-xl-10">
				<div id="div1">
					<center>
						<a id="viewall" href="hadees">View All <i class='fa fa-arrow-right' aria-hidden='true'> </i></a>
					</center> 
				</div>
				<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
					<div class="section-heading mt-3">
							<a href="hadees"><h5>Hadees</h5></a>
					</div>
                       <!-- Single Catagory Post -->
					<div class="single-catagory-post d-flex flex-wrap">
						<!-- Thumbnail -->
						<?php 
								$status="";
								$qry="select * from htype  where hstatus='Active' order by htypeorder limit 4";
								$rs=$con->readrecord($qry);
								while($row=mysql_fetch_array($rs))
								{
									$status.="<div class='col-sm-6 col-md-6 col-lg-4 col-xl-6'>";
									$status.="<blockquote><a href='hadeesview?urlid=$row[0]' class='post-title p-15'><h6>$row[1]</h6></a></blockquote></div>";
								}
							 echo $status;?>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-sm-10 col-lg-10 col-md-10 col-xl-10">
				<div id="div1">
					<center>
						<a id="viewall" href="document">View All <i class='fa fa-arrow-right' aria-hidden='true'> </i></a>
					</center> 
				</div>
				<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
					<div class="section-heading mt-3">
							<a href="document"><h5>Documents</h5></a>
					</div>
					<!-- Single Catagory Post -->
					<div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
						<?php 
							$status="";
							$qry="select * from document where dstatus='Active' order by dname limit 2";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								
								$status.="<div class='col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                $status.="<blockquote><a href='document' class='post-title p-15'><h3>$row[1]</h3></a></blockquote></div>";
								
							}
							echo $status;
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-sm-10 col-lg-10 col-md-10 col-xl-10">
				<div id="div1">
					<center>
						<a id="viewall" href="quotes">View All <i class='fa fa-arrow-right' aria-hidden='true'> </i></a>
					</center> 
				</div>
				<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
					<div class="section-heading mt-3">
							<a href="quotes"><h5>Quotes</h5></a>
					</div>
					<!-- Single Catagory Post -->
					<div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
						<?php 
							$status="";
							$qry="select * from quotes where qustatus='Active' order by quid desc limit 2";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								
								$status.="<div class='col-sm-12 col-md-12 col-lg-12 col-xl-12'>";
                                $status.="<a href='quotes' class='post-title p-15'><h3>$row[1]</h3></a></div>";
								
							}
							echo $status;
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-sm-12 col-lg-10 col-md-10 col-xl-10">
				<div id="div1">
					<center>
						<a id="viewall" href="quiz">View All <i class='fa fa-arrow-right' aria-hidden='true'> </i></a>
					</center> 
				</div>
				<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
					<div class="section-heading mt-3">
							<a href="quiz"><h5>Quiz</h5></a>
					</div>
                       <!-- Single Catagory Post -->
					<div class="single-catagory-post d-flex flex-wrap">
						<!-- Thumbnail -->
						<?php 
							$status="";
							$qry="select * from quiz  where qstatus='Active' order by qid desc limit 2";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								$status.="<div class='col-sm-6 col-md-6 col-lg-4 col-xl-6'>";
                                
                                $status.="<p href='hadeesview?id=$row[0]' class='post-title p-15'><h6>$row[1]</h6></p>";
								$status.="<p><a href='quizanswer?id=$row[0]' class='btn btn-primary btn-sm'>Get Answer</a></p></div>";
							}
							echo $status;?>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-sm-12 col-lg-10 col-md-10 col-xl-10">
				<div id="div1">
					<center>
						<a id="viewall" href="hadees">View All <i class='fa fa-arrow-right' aria-hidden='true'> </i></a>
					</center> 
				</div>
				<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
					<div class="section-heading mt-3">
							<a href="allah"><h5>ALLAH NAME</h5></a>
					</div>
                       <!-- Single Catagory Post -->
						<!-- Thumbnail -->
						 <?php
						$status="";
							$qry="select * from allahname limit 2";
							$rs=$con->readrecord($qry);
						$status.="<div class='col-sm-12 col-md-12 col-xl-12 mb-5'>";	
						$status.="<table class='table  table-responsive table-striped table-bordered mt-4 '>";
							$status.="<thead style='background-color:#ed3974; color:white;'>";
								$status.="<tr>";
									$status.="<th>Id</th>";
									$status.="<th>Arabic </th>";
									$status.="<th>English</th>";
									$status.="<th>Meaning</th>";
									$status.="<th>Translate</th>";
								$status.="</tr>";
							$status.="</thead>";
							$a=1;
							while($row=mysql_fetch_array($rs))
							{
								$status.="<tr>";
									$status.="<td>$a</td>";
									$status.="<td>$row[1]</td>";
									$status.="<td>$row[2]</td>";
									$status.="<td>$row[3]</td>";
									$status.="<td>$row[5]</td>";
								$status.="</tr>";
								$a++;
							}
						$status.="</table> </div>";
							echo $status;
						?>
				</div>
			</div>
		</div>
	</div>	
    </section>
    <!-- ##### Mag Posts Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
	<? include("footer.php");?>
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