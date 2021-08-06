<?php
class connection
{
	private $con=null;
	function __construct()
	{
		$this->con=mysql_connect("localhost","root","");
		mysql_select_db("islamic",$this->con);
	}
	function executequery($qry)
	{
		$status="";
		$rs=mysql_query($qry,$this->con);
		if($rs)
		{
			$status="success";
		}
		else
		{
			$status="Fail";
		}
		return $status;
	}
	function readrecord($qry)
	{
		$rs=mysql_query($qry,$this->con);
		return $rs;
	}
	function gettable($qry,$page,$colname,$colindex)
	{
		$status="";
		$rs=mysql_query($qry,$this->con);
		$status.="<table  class='tab_auto table  table-responsive table-striped table-bordered mt-4'>";
			if(mysql_num_rows($rs)>0)
			{
			$colcount=mysql_num_fields($rs);
			$status.="<thead class='thead-dark '><tr>";
			for($p=0;$p<$colcount;$p++)
			{
				$status.="<th>".mysql_field_name($rs,$p)."</th>"; 
			}
				$status.="<th>$colname</th>";
				$status.="</tr></thead>";
			while($row=mysql_fetch_array($rs))
			{
				$status.="<tr>";
				for($p=0;$p<$colcount;$p++)
				{
					$status.="<td>".$row[$p]."</td>";
				}	
					$status.="<td><a href='$page?urlname=$row[$colindex]'>$colname</a></td>";      
					$status.="</tr>";		 
			}	  
				$status.="</table>";	
			}
		
		else
		{
			$status.="Record not found";
		}
		   return $status;
	 }
}


?>