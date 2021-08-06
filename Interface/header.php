
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Navbar Area -->
        <div class="mag-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="magNav">

                    <!-- Nav brand -->
                  <?
					$qry="select * from titlesetup limit 1";
					$rs=$con->readrecord($qry);
					while($row=mysql_fetch_array($rs))
					{
						echo " <a href='../admin/$row[6]' class='nav-brand'><img class='img-responsive' src='../admin/$row[6]'style='width:300px;'></a>";
					}
					?>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Nav Content -->
                    <div class="nav-content d-flex align-items-center">
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
								
                                   <?php
								$qry="select * from menu where mstatus='Active' order by morder";
								$rs=$con->readrecord($qry);
								while($row=mysql_fetch_array($rs))
								{
									echo "<li><a href='$row[2]'>$row[1]</a>";
								}
								?>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->