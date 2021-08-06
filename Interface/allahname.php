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
    <title>Allah</title>

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
		<div class="row justify-content-center">
			 <div class="col-sm-11 col-md-11 col-lg-11 col-xl-11">
				<div class="related-post-area bg-white mb-30 px-30 pt-30 pb-0 box-shadow">
					<p>The first pillar of <em>imaan</em> (faith) in Islam is <strong>Belief in Allah</strong>. As Muslims, we believe in Allah in accordance with His beautiful names and attributes. Allah has revealed His names repeatedly in the Holy Quran primarily for us to understand who He is. Learning and memorizing the names of Allah will help us to identify the correct way to believe in Him. There is nothing more sacred and blessed than understanding the names of Allah and living by them. How do we expect to worship, love, fear and trust our Lord, The Almighty Allah, if we don&#8217;t know who He is?</p>
					<p><strong>Allah says in the Quran:</strong></p>
					<blockquote><p>And to Allah belong the best names, so invoke Him by them.. (Quran 7:180)</p></blockquote>
					<blockquote><p>Allah &#8211; there is no deity except Him. To Him belong the best names. (Quran 20:8)</p></blockquote>
					<blockquote><p>He is Allah, the Creator, the Inventor, the Fashioner; to Him belong the best names. (Quran 59:24) </p></blockquote>
					<p><em>Prophet Muhammad (ﷺ) said, &#8220;Allah has ninety-nine names, i.e. one-hundred minus one, and whoever knows them will go to Paradise.&#8221;<br />
					(<a href="" rel="noopener noreferrer" target="_blank">Sahih Bukhari 50:894</a>)</em></p>
					<p><em>Abu Huraira reported Allah&#8217;s Messenger (ﷺ) as saying: There are ninety-nine names of Allah; he who commits them to memory would get into Paradise. Verily, Allah is Odd (He is one, and it is an odd number) and He loves odd number..&#8221;<br />
					(<a href="" rel="noopener noreferrer" target="_blank">Sahih Muslim Book-48 Hadith-5</a>)</em></p>
					<p style="background-color: #f0f0f0;"><em>For Islamic reminders, follow us on: <a href="https://www.instagram.com/kahaya_of_islam/" rel="noopener noreferrer" target="_blank"><strong>instagram</strong></a>, 
					<div class="row"></div>
						
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-sm-11 col-md-11 col-lg-11 col-xl-11">
				<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
					<h2>99 names of ALLAH &#8211; Meaning and Explanation</h2>

						 <?php
						$status="";
							$qry="select * from allahname  ";
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