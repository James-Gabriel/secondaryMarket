<?php session_start();

function verify($userName, $con){
	if(!$userName){
		print "please <a href=\"../userSys/login.html\">Login</a> first<br>\n";
		exit;
	}

	$sql = "select isadmin from user where name = '$userName'";
	$result = $con->query($sql);

	if($row = $result->fetch_assoc())
	{
		if($row[isadmin]==='0'){
			print "dear ".$userName.", you are not admin<br>\n";
			exit;
		}
	}
	else
	{
		print "invalid userName<br>\n";
		exit;
	};
}

?>
