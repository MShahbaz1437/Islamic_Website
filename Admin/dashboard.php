<?php
include("config.php");
session_start();
$con = new connection();
$logid=$_SESSION["id"];
if(!isset($_SESSION["id"]))
{
	header("location:index.php");
}
$name="";
$email="";
$username="";
$password="";
$mobile="";
$secquestion="";
$secanswer="";
$photo="";
$status="";

	$qry="select * from admin where aid='$logid'";
	$rs=$con->readrecord($qry);
	while($row=mysql_fetch_array($rs))
		{
			$name=$row[1];
			$email=$row[2];
			$username=$row[3];
			$password=$row[4];
			$mobile=$row[5];
			$question=$row[6];
			$answer=$row[7];
			$photo=$row[8];
		}
		
	if(isset($_POST["btn1"]))
	{
		extract($_POST);
		$path="";
		if($_FILES["timage"]["error"]==0)
		{
			$path="images/".$_FILES["timage"]["name"];
			move_uploaded_file($_FILES["timage"]["tmp_name"],$path);
		}
		$image=$_FILES["timage"]["name"];
		if($image)
		{
			$qry1="update admin set aname='$tname',aemail='$temail',ausername='$tusername',apwd='$tpwd',amobile='$tmobile',asecque='$tsque',asecans='$tsans',aphoto='$path' where aid='$logid'";
		}
		else
		{
			$qry1="update admin set aname='$tname',aemail='$temail',ausername='$tusername',apwd='$tpwd',amobile='$tmobile',asecque='$tsque',asecans='$tsans' where aid='$logid'";
		}
		$rs=$con->executequery($qry1);
		if($rs)
		{
			$status="Update Success";
		}
		else
		{
			$status="Update Failed";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PB Dashboard Home | Bootstrap Admin Theme</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css" />

    <link id="themecss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />

    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <link rel="stylesheet" type="text/css" href="css/dashboard.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body style="background-color:#eef5f9;">
    <div id="wrapper">
        <?php include("header.php");?>
        <div id="wrapper">

        <div id="page-wrapper">
			<div class="row">
			<center>
			<div class="col-sm-2 col-md-10">
					
					<?php
						echo "<a href='$photo'><img src='$photo' style='height:150px; width:200px; margin-top:5px;'></a> ";
					
					?>
					
				</div>
				</center>
			</div>				<br>

            <div class="row">
			<div class="col-sm-2"></div>
                <div class="col-md-6">
                   
                    <div class="well">
                        <form action="" method="post" id="frm" name="frm" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label mb-1">Name</label>
								<input id="tname" name="tname" type="text" class="form-control" value="<?php echo $name; ?>">
							</div>
							<div class="form-group">
								<label class="control-label mb-1">Email</label>
								<input id="temail" name="temail" type="text" class="form-control" value="<?php echo $email; ?>">
							</div>
							<div class="form-group">
								<label class="control-label mb-1">Username</label>
								<input id="tusername" name="tusername" type="text" class="form-control" value="<?php echo $username; ?>">
							</div>
							<div class="form-group">
								<label  class="control-label mb-1">Password</label>
								<input id="tpwd" name="tpwd" type="password" class="form-control" value="<?php echo $password; ?>">
							</div>
							<div class="form-group">
								<label  class="control-label mb-1">Mobile</label>
								<input id="tmobile" name="tmobile" type="text" class="form-control" value="<?php echo $mobile; ?>">
							</div>
							<div class="form-group">
								<label  class="control-label mb-1">Security Question</label>
								<input id="tsque" name="tsque" type="text" class="form-control" value="<?php echo $question; ?>">
							</div>
							<div class="form-group">
								<label  class="control-label mb-1">Security Answer</label>
								<input id="tsans" name="tsans" type="text" class="form-control" value="<?php echo $answer; ?>">
							</div>
							<div class="form-group">
								<label  class="control-label mb-1">Photo </label><br>
								<input id="timage" name="timage" type="file">
							</div>	
							<div>
								<input type="submit" class="btn btn-success" name="btn1" value="Update">
							</div>
							
						</form>
						
						<?php echo $status; ?>
                    </div>
					<div id="result"></div>
                   
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

    <script type="text/javascript" src="js/theme.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		$("#frm").on('submit',function(e)
		{
			e.preventDefault;
			$.ajax(
			{
				url:"check.php",
				method:"POST",
				data:new FormData(this),
				processData:false,
				contentType:false,
				success:function(data)
				{
					$("result").html(data);
				}
			});
		});
	});
	
        jQuery(function ($) {
            $("#chart_live").shieldChart({
                seriesPalette: ["#67A9CE", "#4063AD"],
                exportOptions: {
                    image: false,
                    print: false
                },
                axisX: {
                    categoricalValues: ['2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012']
                },
                axisY: {
                    axisTickText: {
                        format: "{text:c}"
                    },
                    title: {
                        text: "Price (EUR per kWh)"
                    }
                },
                tooltipSettings: {
                    chartBound: true
                },
                primaryHeader: {
                    text: "Electricity prices"
                },
                dataSeries: [{
                    seriesType: 'splinearea',
                    applyAnimation: false,
                    collectionAlias: 'Households',
                    data: [0.164, 0.173, 0.184, 0.167, 0.177, 0.189, 0.180, 0.183, 0.188, 0.160, 0.176, 0.178]
                }, {
                    seriesType: 'splinearea',
                    applyAnimation: false,
                    collectionAlias: 'Industry',
                    data: [0.103, 0.105, 0.112, 0.111, 0.102, 0.099, 0.110, 0.113, 0.117, 0.119, 0.123, 0.117]
                }]
            });

            $("#chart_browsers").shieldChart({
                seriesPalette: ["#4063AD", "#6AC16E", "#67A9CE", "#F2C73E", "#D8494C"],
                exportOptions: {
                    image: false,
                    print: false
                },
                chartAreaPaddingTop: 0,
                chartAreaPaddingBottom: 0,
                chartAreaPaddingLeft: 0,
                chartAreaPaddingRight: 0,
                primaryHeader: {
                    text: ""
                },
                chartLegend: {
                    enabled: false
                },
                seriesSettings: {
                    pie: {
                        enablePointSelection: true,
                        dataPointText: {
                            enabled: false
                        }
                    }
                },
                dataSeries: [{
                    seriesType: "pie",
                    applyAnimation: false,
                    collectionAlias: "Usage",
                    data: [
                        ["IE", 9.0],                        
                        { collectionAlias: "Firefox", y: 26.8, selected: true },
                        ["Chrome", 55.8],
                        ["Safari", 3.8],
                        ["Opera", 1.9]
                    ]
                }]
            });

            $("#progress").shieldProgressBar({
                value: 75,
                layout: "circular",
                layoutOptions: {
                    circular: {
                        borderWidth: 0,
                        color: "#4063AD",
                        backgroundColor: "#A2E6D7"
                    }
                },
                text: {
                    enabled: true,
                    template: '<b style="color:#363636;">{0:c0}%</b>'
                }
            });

            $("#tagcloud").shieldTagCloud({
                dataSource: {
                    data: [
                        {"name":"Barcode","groups":1,"demos":4,"url":"http://demos.shieldui.com/web/barcode/basic-usage"},
                        {"name":"Calendar","groups":1,"demos":5,"url":"http://demos.shieldui.com/web/calendar/basic-usage"},
                        {"name":"Chart","groups":25,"demos":131,"url":"http://demos.shieldui.com/web/area-chart/axis-marker"},
                        {"name":"ColorPicker","groups":1,"demos":8,"url":"http://demos.shieldui.com/web/colorpicker/basic-usage"},
                        {"name":"ComboBox","groups":1,"demos":7,"url":"http://demos.shieldui.com/web/combobox/basic-usage"},
                        {"name":"ContextMenu","groups":1,"demos":1,"url":"http://demos.shieldui.com/web/contextmenu/basic-usage"},
                        {"name":"DataSource","groups":1,"deos":5,"url":"http://demos.shieldui.com/web/datasource/basic-usage"},
                        {"name":"DatePicker","groups":1,"demos":4,"url":"http://demos.shieldui.com/web/datepicker/basic-usage"},
                        {"name":"Editor","groups":1,"demos":5,"url":"ttp://demos.shieldui.com/web/editor/basic-usage"},
                        {"name":"Grid","groups":8,"demos":56,"url":"http://demos.shieldui.com/web/grid-general/basic-usage"},
                        {"name":"MaskedTextBox","groups":1,"demos":4,"url":"http://demosshieldui.com/web/maskedtextbox/basic-usage"},
                        {"name":"Menu","groups":1,"demos":5,"url":"http://demos.shieldui.com/web/menu/basic-usage"},
                        {"name":"MonthYearPicker","groups":1,"demos":3,"url":"http://demos.shieldi.com/web/monthyearpicker/basic-usage"},
                        {"name":"NumericTextBox","groups":1,"demos":3,"url":"http://demos.shieldui.com/web/numerictextbox/basic-usage"}
                    ]
                },
                textTemplate: "{name}",
                frequencyTemplate: "{demos}",
                hrefTemplate: "{url}"
            });

            $("#calendar1").shieldCalendar();

			$("#switch1").shieldSwitch({
				onText: "",
				offText: "",
				cls: "pbd-switch btn-default"
			});
			$("#switch2").shieldSwitch({
				onText: "",
				offText: "",
				cls: "pbd-switch btn-success"
			});
            $("#switch3").shieldSwitch({
				onText: "",
				offText: "",
				cls: "pbd-switch btn-primary"
			});
            $("#switch4").shieldSwitch({
				onText: "",
				offText: "",
				cls: "pbd-switch btn-info"
			});
            $("#switch5").shieldSwitch({
				onText: "",
				offText: "",
				cls: "pbd-switch btn-warning"
			});
            $("#switch6").shieldSwitch({
				onText: "",
				offText: "",
				cls: "pbd-switch btn-danger"
			});
        });
    </script>
</body>
</html>
