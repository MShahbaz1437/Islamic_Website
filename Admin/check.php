<?php
include("config.php");
session_start();
$con = new connection();
$logid=$_SESSION["id"];
if(!isset($_SESSION["id"]))
{
	header("location:index.php");
}
extract($_POST);
extract($_GET);
if($check==1) 																				//INSERT
{
	
	$qry="insert into hadees (henglish,harabic,hurdu,hbaab,hrefrence,htypeid,hcid) values ('$tenglish','$tarabic','$turdu','$tbaab','$trefrence','$tbname','$thcname')";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	
	}
	else
	{
		echo "Error";
	}
}	

	
if($check==2)																								//VIEW
{
	$status="";
	$qry="select * from hadees order by htypeid";
	$rs=$con->readrecord($qry);
	$status.="<table class='table  table-responsive table-striped table-bordered mt-4'>";
	$status.="<thead class='thead-dark '>";
	$status.="<tr>";
	$status.="<th>Id</th>";
	$status.="<th>English</th>";
	$status.="<th>Arabi</th>";
	$status.="<th>Urdu</th>";
	$status.="<th>Baab</th>";
	$status.="<th>Refrence</th>";
	$status.="<th>Hadees Typeid</th>";
	$status.="<th>Hadees Chapter</th>";
	$status.="<th>Edit</th>";
	$status.="</tr>";$status.="</thead>";
	$a=1;
	while($row=mysql_fetch_array($rs))
	{
		$status.="<tr>";
		$status.="<td>$a</td>";
		$status.="<td>$row[1]</td>";
		$status.="<td>$row[2]</td>";
		$status.="<td>$row[3]</td>";
		$status.="<td>$row[4]</td>";
		$status.="<td>$row[5]</td>";
		$status.="<td>$row[6]</td>";
		$status.="<td>$row[7]</td>";
		$status.="<td><a href='hadeesupdate.php?id=$row[0]'><i class='fa fa-edit'></i></a> / <a href='hadeesdelete.php?id=$row[0]'><i class='fa fa-trash'></i></a></td>";
		$status.="</tr>";
		$a++;
	}
	$status.="</table>";
	echo $status;
}
if($check==4)														//DELETE
{
	$URLID=$_POST["hiid"];
	$qry="delete from hadees where hid='$URLID'";
	$rs=$con->readrecord($qry);
	if(!$rs)
	{
		echo "success";
	}
}

if($check==14)														//SELECT UPDATE FROM HADEES
{
	$urlid=$_POST["Url"];
	$qry="select * from hadees where hid='$urlid'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		echo json_encode($row);
	}
}

if($check==15)
{
	
	$qry="select * from htype order by htypeorder asc";
	$rs=$con->readrecord($qry);
	while($row=mysql_fetch_array($rs))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
}
if($check==60)
{
	
	$qry="select * from hadeeschapter";
	$rs=$con->readrecord($qry);
	while($row=mysql_fetch_array($rs))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
}
if ($check==16)														//SELECT UPDATE FROM HADEES
{
	$urlid=$_POST["hid"];
	$english=$_POST["tenglish"];
	$arabic=$_POST["tarabic"];
	$urdu=$_POST["turdu"];
	$baab=$_POST["tbaab"];
	$refrence=$_POST["trefrence"];
	$typeid=$_POST["tbname"];
	$qry="update hadees set henglish='$english',harabic='$arabic',hurdu='$urdu',hbaab='$baab',hrefrence='$refrence',htypeid='$typeid',hcid='$thcname' where hid='$urlid'";
	$rs=$con->executequery($qry);
	if(!$rs)
	{
		echo "Success";
	}	
	
}
if($check==8)															//SELECT DROP DOWN FROM HADEESTYPE
{
	$qry="select htypeid,hname from htype  order by htypeorder asc";
	$rs=$con->readrecord($qry);
	while($row=mysql_fetch_array($rs))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
}

if($check==59)															//SELECT DROP DOWN FROM HADEESTYPE
{
	$qry="select hcid,hcename from hadeeschapter";
	$rs=$con->readrecord($qry);
	while($row=mysql_fetch_array($rs))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
}	

										// HADEES ADD CODING END
										// HADEES ADD CODING END
										// HADEES ADD CODING END
										// HADEES ADD CODING END

											// HADEES TYPE ADD CODING START
											// HADEES TYPE ADD CODING START
											// HADEES TYPE ADD CODING START
											// HADEES TYPE ADD CODING START
											
											
if($check==5)
{
	$qry="insert into htype (hname,hdetail,hstatus,htypeorder) values ('$thbook','$thdetail','$thstatus','$thorder')"; //INSERT
	$rs=$con->executequery($qry);
	$data="Error To Insert".$rs;
	if($rs)
	{
		$data="Success";
	}
	echo $data;
}
if($check==6)																								//VIEW
{
	$status="";
	$qry="select * from htype order by htypeorder asc";
	$rs=$con->readrecord($qry);
	$status.="<table class='table  table-responsive table-striped table-bordered mt-4'>";
		$status.="<thead class='thead-dark '>";
			$status.="<tr>";
				$status.="<th>Id</th>";
				$status.="<th>Book NAme</th>";
				$status.="<th>Book Detail</th>";
				$status.="<th>Status</th>";
				$status.="<th>Order</th>";
				$status.="<th>Edit</th>";
			$status.="</tr>";
			$status.="</thead>";
			$a=1;
			while($row=mysql_fetch_array($rs))
			{
				$status.="<tr>";
				$status.="<td>$a</td>";
				$status.="<td>$row[hname]</td>";
				$status.="<td>$row[hdetail]</td>";
				$status.="<td>$row[hstatus]</td>";
				$status.="<td>$row[htypeorder]</td>";
				$status.="<td><a href='hadeestypeupdate.php?id=$row[htypeid]'><i class='fa fa-edit'></i></a>/<a href='hadeestypedelete.php?id=$row[htypeid]'><i class='fa fa-trash'></i></a></td>";
				$a++;
			$status.="</tr>";
			}
	$status.="</table>";
		echo $status;

}
if($check==7)																			//DELETE
{
	$urlid=$_POST["urldata"];
	$qry="delete from htype where htypeid='$urlid'";
	$rs=$con->readrecord($qry);
	if($rs)
	{
		echo $qry;
	}
} 

if($check==9)																			// UPDATE SELECT 
{
	$urlid=$_POST["url"];
	$qry="select * from htype where htypeid='$urlid'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		echo json_encode($row);
	}
} 
if($check==10)																			// UPDATE  
{
	$urlid=$_POST["htid"];
	$bookname=$_POST["thbook"];
	$bookdetail=$_POST["thdetail"];
	$bookorder=$_POST["thorder"];
	$bookstatus=$_POST["thstatus"];
	
	$qry="update htype set hname='$bookname',hdetail='$bookdetail',htypeorder='$bookorder',hstatus='$bookstatus' where htypeid='$urlid'";
	$rs=$con->executequery($qry);
	if(!$rs)
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}
} 							
	
										// HADEES TYPE ADD CODING END
										// HADEES TYPE ADD CODING END
										// HADEES TYPE ADD CODING END
										// HADEES TYPE ADD CODING END
										
										
										// TITLE CODING START
										// TITLE CODING START
										// TITLE CODING START
										// TITLE CODING START
										
if($check==11)								//TITLE INSERT
{
	$path="";
		if($_FILES["ttimage"]["error"]==0)
		{
			$path="images/".$_FILES["ttimage"]["name"];
			move_uploaded_file($_FILES["ttimage"]["tmp_name"],$path);
		}
	$qry="insert into titlesetup (tname,temail,tmobile,taddress,tpostcode,tlogo,tabout) values ('$ttname','$ttemail','$ttmobile','$ttaddress','$tpcode','$path','$tabout')";
	$rs=$con->executequery($qry);
	$data="Error into Insert".$rs;
	if($rs)
	{
		$data="Success";
	}
	echo $data;
}
if($check==12)																			//TITLE VIEW
{
	$status="";
	$qry="select * from titlesetup";
	$rs=$con->readrecord($qry);
	$status.="<table class='table  table-responsive table-striped table-bordered mt-4'>";
	$status.="<thead class='thead-dark '>";
	$status.="<tr>";
	$status.="<th>Id</th>";
	$status.="<th>Name</th>";
	$status.="<th>Email</th>";
	$status.="<th>Mobile</th>";
	$status.="<th>Address</th>";
	$status.="<th>Postcode</th>";
	$status.="<th>Image </th>";
	$status.="<th>About</th>";
	$status.="<th>Edit</th>";
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
		$status.="<td>$row[4]</td>";
		$status.="<td>$row[5]</td>";
		$status.="<td><img src='$row[6]' style='height:100px; width:150px;' /></td>";
		$status.="<td>$row[7]</td>";
		$status.="<td><a href='titleupdate.php?id=$row[0]'><i class='fa fa-edit'></i></a> / <a href='titledelete.php?id=$row[0]'><i class='fa fa-trash'></i></a></td>";
		$status.="</tr>";
		$a++;
	}
	$status.="</table>";
	echo $status;
}
if($check==13)
{
	$id=$_POST["urlid"];
	$qry="select tname,temail,tmobile,taddress,tpostcode,tabout from titlesetup where tid='$id'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}
if($check==17)
{
	$id=$_POST["ttid"];
	$name=$_POST["ttname"];
	$email=$_POST["ttemail"];
	$mobile=$_POST["ttmobile"];
	$address=$_POST["ttaddress"];
	$postcode=$_POST["tpcode"];
	$logo=$_POST["ttimage"];
	$about=$_POST["tabout"];
	$path="";
	if($_FILES["ttimage"]["error"]==0)
	{
		$path="images/".$_FILES["ttimage"]["name"];
		move_uploaded_file($_FILES["ttimage"]["tmp_name"],$path);
	}
	$image=$_FILES["ttimage"]["name"];
	if($image)
	{
		$qry="update titlesetup set tname='$ttname',temail='$ttemail',tmobile='$ttmobile',taddress='$ttaddress',tpostcode='$tpcode',tlogo='$path',tabout='$about' where tid='$id'";
	}
	else
	{
		$qry="update titlesetup set tname='$ttname',temail='$ttemail',tmobile='$ttmobile',taddress='$ttaddress',tpostcode='$tpcode',tabout='$about' where tid='$id'";
	}
	$rs=$con->executequery($qry);
	if($rs)
	{
		header("location:titleview.php");
	}
}

if($check==18)
{
	$id=$_POST["urlid"];
	$qry="delete from titlesetup where tid='$id'";
	$rs=$con->readrecord($qry);
	if($rs)
	{
		echo $qry;
	}
}
										// TITLE CODING END
										// TITLE CODING END
										// TITLE CODING END
										// TITLE CODING END

										// ALLAHNAME CODING START
										// ALLAHNAME CODING START
										// ALLAHNAME CODING START
										// ALLAHNAME CODING START
										
if($check==19)								//ALLAHNAME INSERT
{
	$qry="insert into allahname (anarabic,anenglish,anmeaning,anstatus,atranslation) values ('$tnarabic','$tnenglish','$tnmeaning','$tnstatus','$tntranslate')"; //INSERT
	$rs=$con->executequery($qry);
	$data="Error To Insert".$rs;
	if($rs)
	{
		$data="Success";
	}
	echo $data;
}

if($check==20)											////ALLAH NAME VIEW
{
	$status="";
	$qry="select * from allahname";
	$rs=$con->readrecord($qry);
	$status.="<table class='table  table-responsive table-striped table-bordered mt-4'>";
	$status.="<thead class='thead-dark '>";
	$status.="<tr>";
	$status.="<th>Id</th>";
	$status.="<th>Arabi </th>";
	$status.="<th>English</th>";
	$status.="<th>Meaning</th>";
	$status.="<th>Translate</th>";
	$status.="<th>Status</th>";
	$status.="<th>Edit</th>";
	$status.="</tr>";$status.="</thead>";
	$a=1;
	while($row=mysql_fetch_array($rs))
	{
		$status.="<tr>";
		$status.="<td>$a</td>";
		$status.="<td>$row[1]</td>";
		$status.="<td>$row[2]</td>";
		$status.="<td>$row[3]</td>";
		$status.="<td>$row[5]</td>";
		$status.="<td>$row[4]</td>";
		
		$status.="<td><a href='allahnameupdate.php?id=$row[0]'><i class='fa fa-edit'></i></a> / <a href='allahnamedelete.php?id=$row[0]'><i class='fa fa-trash'></i></a></td>";
		$status.="</tr>";
		$a++;
	}
	$status.="</table>";
	echo $status;
}
if($check==21) 												//ALLAH NAME
{
	$urlid=$_POST["url"];
	$qry="select * from allahname where anid='$urlid'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}

if($check==22) 											//ALLAH NAME
{
	$urlid=$_POST["tnid"];
	$arabic=$_POST["tnarabic"];
	$english=$_POST["tnenglish"];
	$meaning=$_POST["tnmeaning"];
	$status=$_POST["tnstatus"];
	$qry="update allahname set anarabic='$arabic',anenglish='$english',anmeaning='$meaning',anstatus='$status',atranslation='$tntranslate' where anid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "success";
	
	}
}

if($check==23)												//ALLAH NAME
{
	$id=$_POST["urlid"];
	$qry="delete  from allahname where anid='$id'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}

										// ALLAH NAME CODING END
										// ALLAH NAME CODING END
										// ALLAH NAME CODING END
										// ALLAH NAME CODING END
										
										
										// QUIZ CODING START
										// QUIZ CODING START
										// QUIZ CODING START
										// QUIZ CODING START
										

if($check==24) 										//QUIZ INSERT
{
	
	$qry="insert into  quiz (qquestion,qdetail,qstatus) values('$tquestion','$tanswer','$tqstatus')";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}

if($check==25)											//QUIZ VIEW
{
		echo $con->gettable("select qid as 'Id',qquestion as 'Question',qdetail as 'Answer',qstatus as 'Status' from quiz","quizupdatedelete.php","Edit",0);
}

if($check==26)												//UPDATE VIEW
{
	$urldata=$_POST["urlid"];	
	$qry="select * from quiz where qid='$urldata'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		echo json_encode($row);
	}
}

if($check==27)												//UPDATE
{
	$urldata=$_POST["qid"];
	$question=$_POST["tquestion"];
	$answer=$_POST["tanswer"];
	$status=$_POST["tqstatus"];
	$qry="update quiz set qquestion='$question',qdetail='$answer',qstatus='$status'  where qid='$urldata'";
	$rs=$con->readrecord($qry);
	if($rs)
	{
		echo "Success";
	}
}


if($check==32)						//QUIZ DELETE
{
	$id=$_POST["did"];
	$qry="delete from quiz where qid='$id'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}

										// QUIZ CODING END
										// QUIZ CODING END
										// QUIZ CODING END
										// QUIZ CODING END
										
										
										// VIDEO CODING START
										// VIDEO CODING START
										// VIDEO CODING START
										// VIDEO CODING START
										


if($check==28)								//INSERT
{
	$qry="insert into video (vtitle,vlink,vorder,vstatus,vtid) values ('$title','$tlink','$torder','$tstatus','$vtname')";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}
if($check==67)								//VIEW
{
	$qry="select vtid,vtname from videotype";
	$rs=$con->readrecord($qry);
	while($row=mysql_fetch_array($rs))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
}
if($check==29)								//VIEW
{
	echo $rs=$con->gettable("select vid as 'Id', vtitle as 'Title',vlink as 'Link',vorder as 'Order',vstatus as 'Status',vtid as 'Video type' from video order by vorder asc",'videoupdatedelete.php','Edit','0');
}

if($check==30)								// VIEW UPDATE
{
	$urlid=$_POST["jurl"];
	$qry="select vtitle,vlink,vorder,vstatus,vtid from video where vid='$urlid'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
	
}

if($check==31)								//  UPDATE
{
	$urlid=$_POST["tid"];
	$title=$_POST["title"];
	$link=$_POST["tlink"];
	$order=$_POST["torder"];
	$status=$_POST["tstatus"];
	$type=$_POST["vtname"];
	
	$qry="update video set vtitle='$title',vlink='$link',vorder='$order',vstatus='$status',vtid='$type' where vid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}	
}
if($check==43)						//UPDATE VIEW
{
	$urlid=$_POST["aid"];
	$qry="delete  from video where vid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
		
	}

}	
									
										// VIDEO CODING END
										// VIDEO CODING END
										// VIDEO CODING END
										// VIDEO CODING END
										
										
										
										// DAILYPOST CODING START
										// DAILYPOST CODING START
										// DAILYPOST CODING START
										// DAILYPOST CODING START
										
										
if($check==33)						//INSERT
{
	$date=date("y-m-d");
	$qry="insert into dailypost(dpname,dpdetail,dpdate,dpstatus) values('$tname','$tdetail','$date','$tstatus')";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}
if($check==34)						//VIEW 
{
	echo $rs=$con->gettable("select dpid as 'Id',dpname as 'Post Name',dpdetail as 'Post Detail',dpdate as 'Date',dpstatus as 'Status' from dailypost order by dpname asc","dailypostupdatedelete.php","Edit",0);

}
if($check==35)						//UPDATE VIEW
{
	$urldata=$_POST["url"];
	$qry="select * from dailypost where dpid='$urldata'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}

}


if($check==36)						//UPDATE VIEW
{
	$name=$_POST["tname"];
	$detail=$_POST["tdetail"];
	$status=$_POST["tstatus"];
	$urldata=$_POST["did"];
	$qry="update dailypost set dpname='$name',dpdetail='$detail',dpstatus='$status' where dpid='$urldata'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
		
	}
}

if($check==37)						//DELETE VIEW
{
	$urlid=$_POST["urldata"];
	$qry="delete  from dailypost where dpid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
		
	}

}										// DAILYPOST CODING END
										// DAILYPOST CODING END
										// DAILYPOST CODING END
										// DAILYPOST CODING END


								//DOCUMENT CODING 
								
if($check==38)						//INSERT VIEW
{
	$path="";
	if($_FILES["tdocument"]["error"]==0)
	{
		$path="document/".$_FILES["tdocument"]["name"];
		move_uploaded_file($_FILES["tdocument"]["tmp_name"],$path);
	}
	$qry="insert into document(dname,dpdf,dstatus) values('$tdname','$path','$tstatus')";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}
if($check==39)						//DOCUMENT VIEW
{
	
	echo $rs=$con->gettable("select did as 'id',dname as 'Document Name',dpdf as 'PDF',dstatus as 'Status' from document","documentupdate.php","Edit",0);
	
}
if($check==40)						//UPDATE VIEW
{
	$url=$_POST["urldata"];
	$qry="select * from document where did='$url'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}
if($check==41)						//UPDATE 
{
	$urlid=$_POST["tid"];
	$name=$_POST["tdname"];
	//$sdocument=$_POST["tdocument"];
	$status=$_POST["tstatus"];
	$path="";
	if($_FILES["tdocument"]["error"]==0)
	{
		$path="document/".$_FILES["tdocument"]["name"];
		move_uploaded_file($_FILES["tdocument"]["tmp_name"],$path);
	}
	$pdf=$_FILES["tdocument"]["name"];;
	if($pdf)
	{
		$qry="update document set dname='$name',dpdf='$path',dstatus='$status' where did='$urlid' ";
	}
	else
	{
		$qry="update document set dname='$name',dstatus='$status' where did='$urlid' ";
	
	}
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}

if($check==42)						//DELETE
{
	$urlid=$_POST["urlvalue"];
	$qry="delete  from document where did='$urlid'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
		
	}

}				
										//DOCUMENT CODING END
										//DOCUMENT CODING END
										//DOCUMENT CODING END
										
										
										// QUOTES CODING START
										// QUOTES CODING START
										// QUOTES CODING START

if($check==44) 			//INSERT
{
	$date=date("y-m-d");
	$qry="insert into quotes (quname,qudate,qustatus) values('$tquotes','$date','$tqstatus')";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}
if($check==45) 				//VIEW
{
	echo $rs=$con->gettable("select quid as 'Id',quname as 'Name',qudate as 'Date',qustatus as 'Status' from quotes","quotesupdate.php","Edit",0);
}
if($check==46) 				//VIEW
{
	$urldata=$_POST["urlid"];
	$qry="select * from quotes where quid='$urldata'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}
if($check==47) 			//INSERT
{
	$urldata=$_POST["qid"];
	$name=$_POST["tquotes"];
	$date=$_POST["tqdate"];
	$status=$_POST["tqstatus"];
	
	$qry="update quotes set quname='$name',qudate='$date',qustatus='$status' where quid='$urldata'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}
if($check==48) 				//VIEW
{
	$urldata=$_POST["urlvalue"];
	$qry="delete from quotes where quid='$urldata'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}

										//QUOTES CODING END
										//QUOTES CODING END
										//QUOTES CODING END

if($check==49) 			//INSERT
{
	$qry="insert into menu (mname,mdetail,morder,mstatus) values('$tmname','$tmdetail','$tmorder','$tmstatus')";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}

if($check==50) 				//VIEW
{
	echo $rs=$con->gettable("select mid as 'Id',mname as 'Name',mdetail as 'Detail',morder as 'Order',mstatus as 'Status' from menu order by morder","menuupdate.php","Edit",0);
}
if($check==51) 				//VIEW
{
	$urlid=$_POST["urldata"];
	$qry="select * from menu where mid='$urlid'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}

if($check==52) 				//VIEW
{
	$urlid=$_POST["mid"];
	$name=$_POST["tmname"];
	$detail=$_POST["tmdetail"];
	$order=$_POST["tmorder"];
	$status=$_POST["tmstatus"];
	$qry="update   menu set mname='$name',mdetail='$detail',morder='$order',mstatus='$status' where  mid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";

	}
}

if($check==53) 				//VIEW
{
	$urldata=$_POST["url"];
	$qry="delete from menu where mid='$urldata'";
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
}
										
										// MENU CODING END
										// MENU CODING END
										// MENU CODING END
										
										
										// HADEES CHAPTER CODING START
										// HADEES CHAPTER CODING START
										// HADEES CHAPTER CODING START
if($check==54) 				//INSEERT
{
	$qry="INSERT INTO hadeeschapter (hcename,status,htypeid) values('$hcname','$hcstatus','$tbname')";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";

	}
}	
if($check==55) 				//VIEW
{
	echo $rs=$con->gettable("select hcid as 'Id',hcename as 'Name',status as 'Status',htypeid as 'Chapter Id' from  hadeeschapter order by htypeid ","hadeeschapterupdate.php","Edit",0);
	
}
if($check==56) 				//UPDATE VIEW
{
	$urlid=$_POST["urldata"];
	$qry="select * from hadeeschapter where hcid='$urlid'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}											

if($check==57) 				//UPDATE
{
	$urlid=$_POST["hcid"];
	$name=$_POST["hcname"];
	$status=$_POST["hcstatus"];
	$cname=$_POST["thcname"];
	$qry="update hadeeschapter set hcename='$name',status='$status',htypeid='$cname' where hcid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Updated";
	}
	else
	{
		echo "Update Failed";
	}
}	

if($check==58) 				//DELETE
{
	$urlid=$_POST["urlvalue"];
	$qry="delete from hadeeschapter  where hcid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Delete Success";
	}
	else
	{
		echo "Delete Failed";
	}
}											
	
if($check==61) 				//CONTACT
{
	$status="";
	$qry="select * from contact order by cid desc";
	$rs=$con->readrecord($qry);
	$status.="<table class='table  table-responsive table-striped table-bordered mt-4'>";
	$status.="<thead class='thead-dark '>";
	$status.="<tr>";
	$status.="<th>Id</th>";
	$status.="<th>Name </th>";
	$status.="<th>Email</th>";
	$status.="<th>Mobile</th>";
	$status.="<th>Address</th>";
	$status.="<th>Message</th>";
	$status.="</tr>";$status.="</thead>";
	$a=1;
	while($row=mysql_fetch_array($rs))
	{
		$status.="<tr>";
		$status.="<td>$a</td>";
		$status.="<td>$row[1]</td>";
		$status.="<td>$row[2]</td>";
		$status.="<td>$row[3]</td>";
		$status.="<td>$row[4]</td>";
		$status.="<td>$row[5]</td>";
		$status.="</tr>";
		$a++;
	}
	$status.="</table>";
	echo $status;
	
}										
										// VIDEO  CODING START
										// VIDEO CODING START
										// VIDEO CODING START										

										// HADEES CHAPTER CODING START
if($check==62) 				//INSEERT
{
	$qry="INSERT INTO videotype (vtname,vtorder,vtstatus) values('$vname','$vorder','$vstatus')";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";

	}
}
if($check==63) 				//VIEW
{
	echo $rs=$con->gettable("select vtid as 'Id',vtname as 'Type Name' ,vtorder as 'Order',vtstatus as 'Status' from videotype" ,"videotypeupdate.php","Edit",0);
}
if($check==64) 				//VIEW
{
	$url=$_POST["urlid"];
	$qry="select * from videotype where vtid='$url'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}

if($check==65) 				//VIEW
{
	$url=$_POST["vtid"];
	$name=$_POST["vname"];
	$order=$_POST["vorder"];
	$status=$_POST["vstatus"];
	$qry="update videotype set vtname='$name',vtorder='$order',vtstatus='$status' where vtid='$url'";
	$rs=$con->executequery($qry);                                                                                
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}
}

if($check==66) 				//DELETE
{
	$urlid=$_POST["uid"];
	$qry="delete from videotype  where vtid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Delete Success";
	}
	else
	{
		echo "Delete Failed";
	}
}
										// DUA TYPE  CODING START
										// DUA TYPE CODING START
										// DUA TYPE CODING START	
										
if($check==68) 				//INSERT
{
	$qry="INSERT INTO duatype (duattitle,duatstatus) values('$dtname','$dtstatus')";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";

	}
}

if($check==69) 				//VIEW
{
	echo $rs=$con->gettable("select duatid as 'Id',duattitle as 'Type Name',duatstatus as 'Status' from duatype" ,"duatypeupdate.php","Edit",0);
}
if($check==70)				//UPDATE VIEW
{
	$urlid=$_POST["urldata"];
	$qry="select * from duatype where duatid='$urlid'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs))
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}
if($check==71)				//UPDATE 
{
	$urlid=$_POST["dtid"];
	$title=$_POST["dtname"];
	$status=$_POST["dtstatus"];
	$qry="UPDATE DUATYPE SET duattitle='$title',duatstatus='$status'  where duatid='$urlid'";
	$rs=$con->executequery($qry);                                                                                
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}
}
if($check==72) 				//DELETE
{
	$urlid=$_POST["urlvalue"];
	$qry="delete from duatype  where duatid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Delete Success";
	}
	else
	{
		echo "Delete Failed";
	}
}												
											// DUA CODING START	
											// DUA CODING START	
											// DUA CODING START	


if($check==73)				// DUA TYPE VIEW	
{
	$qry="select * from duatype where duatstatus='Active'";
	$rs=$con->readrecord($qry);
	while($row=mysql_fetch_array($rs))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
	
}	

if($check==74)
{
	$path="";
	if($_FILES["image"]['error']==0)
	{
		$path="duaimage/".$_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"],$path);
	}
	$qry="insert into dua (duatitle,duadetail,duaimage,duastatus,dtid) values('$dutitle','$dudetail','$path','$dustatus','$duatype')";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";

	} 
}	

if($check==75) 				//VIEW
{
	$status="";
	$qry="select * from dua";
	$rs=$con->readrecord($qry);
	$status.="<table class='table  table-responsive table-striped table-bordered mt-4'>";
	$status.="<thead class='thead-dark '>";
	$status.="<tr>";
	$status.="<th>Id</th>";
	$status.="<th>Title</th>";
	$status.="<th>Detail</th>";
	$status.="<th>Image</th>";
	$status.="<th>Status</th>";
	$status.="<th>Dua Type</th>";
	$status.="<th>Edit</th>";
	$status.="</tr>";
	$status.="</thead>";
	$a=1;
	while($row=mysql_fetch_array($rs))
	{
		$status.="<tr>";
		$status.="<td>$a</td>";
		$status.="<td>$row[1]</td>";
		$status.="<td>$row[2]</td>";
		$status.="<td><a href='$row[3]'><img src='$row[3]' style='height:100px; width:150px;' /></a></td>";
		$status.="<td>$row[4]</td>";
		$status.="<td>$row[5]</td>";
		$status.="<td><a href='duaupdate.php?id=$row[0]'>Edit</a> </td>";
		$status.="</tr>";
		$a++;
	}
	$status.="</table>";
	echo $status;
}
if($check==76)
{
	$id=$_POST["urlid"];
	$qry="select * from dua where duaid='$id'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs))
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}

if($check==77)
{
	$urlid=$_POST["did"];
	$dtype=$_POST["duatype"];
	$title=$_POST["dutitle"];
	$detail=$_POST["dudetail"];
	$status=$_POST["dustatus"];
	
	$path="";
	if($_FILES["image"]['error']==0)
	{
		$path="duaimage/".$_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"],$path);
	}
	$images=$_FILES["image"]["name"];
	if($images)
	{
		$qry="UPDATE DUA SET duatitle='$title',duadetail='$detail',duaimage='$path',duastatus='$status',dtid='$dtype',duastatus='$status'  where  duaid='$urlid'";
	}
	else
	{
	$qry="UPDATE DUA SET duatitle='$title',duadetail='$detail',duastatus='$status',dtid='$dtype',duastatus='$status'  where  duaid='$urlid'";
	}
	$rs=$con->executequery($qry);                                                                                
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}
}

if($check==77) 				//DELETE
{
	$urlid=$_POST["urldata"];
	$qry="delete from dua  where duaid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Delete Success";
	}
	else
	{
		echo "Delete Failed";
	}
}
											// CATEGORY CODING START	
											// CATEGORY CODING START	
											// CATEGORY CODING START	

if($check==78)				// MENU  VIEW	
{
	$qry="select * from menu where mname='more'";
	$rs=$con->readrecord($qry);
	while($row=mysql_fetch_array($rs))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
	
}
if($check==79) 			//INSERT
{
	$qry="insert into category (catname,catorder,catstatus) values('$tcname','$tcorder','$tcstatus')";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed".$qry;
	}
}	

if($check==80) 				//VIEW
{
	echo $rs=$con->gettable("select catid as 'Id',catname as 'Name',catorder as 'Order',catstatus as 'Status' from category order by catorder","categoryupdate.php","Edit",0);
}	

if($check==81) 				//VIEW
{
	$urlid=$_POST["urldata"];
	$qry="select * from category where catid='$urlid'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}

if($check==82) 				//VIEW
{
	$urlid=$_POST["mid"];
	$name=$_POST["tcname"];
	$order=$_POST["tcorder"];
	$status=$_POST["tcstatus"];
	$qry="update category set catname='$name',catorder='$order',catstatus='$status' where  catid='$urlid'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";

	}
	else
	{
		echo "Failed".$qry;

	}
}

if($check==83) 				//VIEW
{
	$urldata=$_POST["url"];
	$qry="delete from category where catid='$urldata'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}	
}

											// DATA CODING START	
											// DATA CODING START	
											// DATA CODING START

if($check==84)				// MENU  VIEW	
{
	$qry="select * from CATEGORY where catstatus='Active'";
	$rs=$con->readrecord($qry);
	while($row=mysql_fetch_array($rs))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
	
}

if($check==85)				//INSERT
{
	$path="";
	if($_FILES["image"]['error']==0)
	{
		$path="dataimage/".$_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"],$path);
	}
	$qry="insert into categorydata (cdtitle,cddetail,cdimage,cdstatus,catid) values('$dtitle','$ddetail','$path','$dstatus','$cattype')";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed".$qry;

	} 
}

if($check==86) 				//VIEW
{
	$status="";
	$qry="select * from categorydata order by catid";
	$rs=$con->readrecord($qry);
	$status.="<table class='table  table-responsive table-striped table-bordered mt-4'>";
	$status.="<thead class='thead-dark '>";
	$status.="<tr>";
	$status.="<th>Id</th>";
	$status.="<th>Title</th>";
	$status.="<th>Detail</th>";
	$status.="<th>Image</th>";
	$status.="<th>Status</th>";
	$status.="<th>Dua Type</th>";
	$status.="<th>Edit</th>";
	$status.="</tr>";
	$status.="</thead>";
	$a=1;
	while($row=mysql_fetch_array($rs))
	{
		$status.="<tr>";
		$status.="<td>$a</td>";
		$status.="<td>$row[1]</td>";
		$status.="<td>$row[2]</td>";
		$status.="<center><td><a href='$row[3]'><img src='$row[3]' style='height:150px; width:150px;' /></a></td></center>";
		$status.="<td>$row[4]</td>";
		$status.="<td>$row[5]</td>";
		$status.="<td><a href='categorydataupdate.php?id=$row[0]'>Edit</a> </td>";
		$status.="</tr>";
		$a++;
	}
	$status.="</table>";
	echo $status;
}
if($check==87) 						// VIEW DATA
{
	$id=$_POST["urlid"];
	$qry="select * from categorydata where cdid='$id'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs))
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}
if($check==88)
{
	$urlid=$_POST["did"];
	$ctype=$_POST["cattype"];
	$title=$_POST["dtitle"];
	$detail=$_POST["ddetail"];
	$status=$_POST["dstatus"];
	
	$path="";
	if($_FILES["image"]['error']==0)
	{
		$path="dataimage/".$_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"],$path);
	}
	$images=$_FILES["image"]["name"];
	if($images)
	{
		$qry="UPDATE categorydata SET cdtitle='$title',cddetail='$detail',cdimage='$path',cdstatus='$status',catid='$ctype',cdstatus='$status'  where  cdid='$urlid'";
	}
	else
	{$qry="UPDATE categorydata SET cdtitle='$title',cddetail='$detail',cdstatus='$status',catid='$ctype',cdstatus='$status'  where  cdid='$urlid'";
	}
	$rs=$con->executequery($qry);                                                                                
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed".$qry;
	}
}

if($check==89) 				//VIEW
{
	$urldata=$_POST["url"];
	$qry="delete from categorydata where cdid='$urldata'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}	
}

											// DONATION CODING START	
											// DONATION CODING START	
											// DONATION CODING START
											// DONATION CODING START
if($check==90)
{
	$path="";
	if($_FILES["paimage"]['error']==0)
	{
		$path="donationimage/".$_FILES["paimage"]["name"];
		move_uploaded_file($_FILES["paimage"]["tmp_name"],$path);
	}
	$path1="";
	if($_FILES["phimage"]['error']==0)
	{
		$path1="donationimage/".$_FILES["phimage"]["name"];
		move_uploaded_file($_FILES["phimage"]["tmp_name"],$path1);
	}
	$qry="insert into donation (dodetail,dopaytm,dophonepay,dostatus) values('$dodetail','$path','$path1','$dostatus')";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";

	}
}	


if($check==91) 				//VIEW
{
	$status="";
	$qry="select * from donation";
	$rs=$con->readrecord($qry);
	$status.="<table class='table  table-responsive table-striped table-bordered mt-4'>";
	$status.="<thead class='thead-dark '>";
	$status.="<tr>";
	$status.="<th>Id</th>";
	$status.="<th>Detail</th>";
	$status.="<th>Paytm</th>";
	$status.="<th>Phone Pay</th>";
	$status.="<th>Status</th>";
	$status.="<th>Edit</th>";
	$status.="</tr>";
	$status.="</thead>";
	$a=1;
	while($row=mysql_fetch_array($rs))
	{
		$status.="<tr>";
		$status.="<td>$a</td>";
		$status.="<td>$row[1]</td>";
		$status.="<center><td><a href='$row[2]'><img src='$row[2]' style='height:150px; width:150px;' /></a></td></center>";
		$status.="<center><td><a href='$row[3]'><img src='$row[3]' style='height:150px; width:150px;' /></a></td></center>";
		$status.="<td>$row[4]</td>";
		$status.="<td><a href='donationupdate.php?id=$row[0]'>Edit</a> </td>";
		$status.="</tr>";
		$a++;
	}
	$status.="</table>";
	echo $status;
}
if($check==92)
{
	$id=$_POST["urlid"];
	$qry="select * from donation where doid='$id'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs))
	{
		while($row=mysql_fetch_array($rs))
		{
			echo json_encode($row);
		}
	}
}
if($check==93)
{
	$detail=$_POST["dodetail"];
	$status=$_POST["dostatus"];
	$paytm="";
	if($_FILES["paimage"]["error"]==0)
	{
			$paytm="donationimage/".$_FILES["paimage"]["name"];
			move_uploaded_file($_FILES["paimage"]["tmp_name"],$paytm);
	}
	$phonepay="";
	if($_FILES["phimage"]["error"]==0)
	{
			$phonepay="donationimage/".$_FILES["phimage"]["name"];
			move_uploaded_file($_FILES["phimage"]["tmp_name"],$phonepay);
	}
	$id=$_POST["doid"];
	 $image=$_FILES["paimage"]["name"];
	$image2=$_FILES["phimage"]["name"];
	if($image)
	{
		$qry="update donation set dodetail='$detail',dopaytm='$paytm',dostatus='$status' where doid='$id'";
	} 
	else if($image2)
	{
		$qry="update donation set dodetail='$detail',dophonepay='$phonepay',dostatus='$status' where doid='$id'";
	}
	else
	{
		$qry="update donation set dodetail='$detail',dostatus='$status' where doid='$id'";
	}
	
	$rs=$con->executequery($qry);
	if($rs)
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}
}
if($check==94)
{
	$id=$_POST["urlid"];
	$qry="delete from donation where doid='$id'";
	$rs=$con->executequery($qry);
	if($rs=="success")
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}
}
?>












