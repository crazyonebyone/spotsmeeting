<?php
	header("Content-type: text/html; charset=utf-8"); 
	error_reporting(E_ALL || ~E_NOTICE);
	$con = mysql_connect("localhost","cai","caichen");
	if(!$con){
		echo "链接失败";
		
	}else{
//		echo "链接成功！";
		$result = array();
		$meet = array();
		$yes = "恭喜你";
//		$json = file_get_contents("php://input");
//		$json = $_POST['input'];
		$posi = $_POST['posi'];
		$obj = $_POST['obj'];
//		$obj = json_decode($json);
//		$input = $obj->input;
//		$result["result"]="this is susseful:$posi";
		
		mysql_select_db("sportmeet",$con);
		mysql_query("set names utf-8");
		$sql ="insert into meetPlace set obj='$obj',posi='$posi'";
		$result = mysql_query($sql,$con);
		$sql="select * from meetPlace";
		$result = mysql_query($sql,$con);
		while($row = mysql_fetch_array($result)){
			$id = $row['id']; 
			$obj = $row['obj'];
			$posi = $row['posi']; 
//			$meet=('id'=>$id,'posi'=>$obj, 'obj'=>$posi);
		}
		
		
		echo json_encode($meet);
//		echo "<p>$obj</p>";
	
	}
?>