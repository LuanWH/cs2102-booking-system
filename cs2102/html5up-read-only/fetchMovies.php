<?php
	putenv('ORACLE_HOME=/oraclient');
	$dbh = ocilogon('A0119541','crse1410','sid3');

  	$cName = $_POST["cinemaName"];
    $sql = "SELECT DISTINCT MOVIETITLE FROM OCCUPY, HALL WHERE OCCUPY.HALLID = HALL.HALLID AND HALL.NAMEOFCINEMA = '".$cName."'";
    $stid = oci_parse ($dbh,$sql); 
    oci_execute($stid, OCI_DEFAULT);
	while($row = oci_fetch_array($stid)){
		echo "<option value =\"".$row["MOVIETITLE"]."\">".$row["MOVIETITLE"]."</option><br>"; 
	}
	oci_free_statement($stid);
	oci_close($dbh);
?>