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
			$status="Success";
		}
		else
		{
			$status="Failed";
			
		}
		
	}
	function readrecord($qry)
	{
		$rs=mysql_query($qry,$this->con);
		return $rs;
	}
}



?>