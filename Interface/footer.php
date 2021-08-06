 <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
               
                
                <!-- Footer Widget Area
				<div class="col-xl-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="footer-widget">
                        <h6 class="widget-title">Categories</h6>
                        <nav class="footer-widget-nav">
                            <ul class="catagory-widgets">
							<?php 
							/*  $status="";
							$qry="select * from menu  where mstatus='Active'";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								echo  "<li><a href='$row[2]'><span><i class='fa fa-angle-double-right' aria-hidden='true'></i> $row[1] </span> </a></li>";
							} */
							?>   
                            </ul>
                        </nav>
                    </div>
                </div> -->
                <div class="col-xl-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="footer-widget">
                        <h6 class="widget-title">Categories</h6>
                        <nav class="footer-widget-nav">
                            <ul class="catagory-widgets">
							<?php 
							 $status="";
							$qry="select * from category  where catstatus='Active'";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								echo  "<li><a href='category?id=$row[0]'><span><i class='fa fa-angle-double-right' aria-hidden='true'></i> $row[1] </span> </a></li>";
							}
							?>   
                            </ul>
                        </nav>
                    </div>
                </div> 
                <!-- Footer Widget Area -->
                <div class="col-xl-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title"> Videos</h6>
                        <!-- Single Blog Post -->
							<?php
							$status="";
							$qry="select  * from video where vstatus='Active' order by vid desc limit 2";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								echo  "<div class='single-blog-post style-2 d-flex'>";
								echo " <div class='post-thumbnail'>";
								echo "<iframe src='$row[2]' height='80px' width='80px'></iframe></div>";
							?>
                            <div class="post-content">
							<a href="video.php" class="post-title"><?php echo $row[1]."</div></div>"; }?></a>
					</div>
				</div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>