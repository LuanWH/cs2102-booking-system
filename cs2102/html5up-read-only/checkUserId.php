<?php
	putenv('ORACLE_HOME=/oraclient');
	$dbh = ocilogon('A0119541','crse1410','sid3');

  	$cName = $_POST["id"];
  	
  	$sql = "SELECT COUNT(*) AS NUM FROM SUBSCRIBER WHERE SUBSCRIBERID = ".$cName;
    $stid = oci_parse ($dbh,$sql); 
    oci_execute($stid, OCI_DEFAULT);
    $count = 0;

	while($row = oci_fetch_array($stid)){
		$count = 1;
		if($row["NUM"] == '1' || $row["NUM"] == 1){
			echo "[{'validation':'true'}]";
		} else {
			echo "[{'validation':'false'}]";
		}		
	}
	if($count == 0){
		echo "[{'validation':'false'}]";
	}
	oci_free_statement($stid);
	oci_close($dbh);
?>