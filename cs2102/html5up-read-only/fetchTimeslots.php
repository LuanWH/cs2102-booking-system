<?php
	putenv('ORACLE_HOME=/oraclient');
	$dbh = ocilogon('A0119541','crse1410','sid3');

  	$cName = $_POST["cinemaName"];
  	$mName = $_POST["movieTitle"];
  	$sql = "SELECT DISTINCT TO_CHAR(O.STARTTIME, 'HH24:Mi:SS dd/mm/yyyy') AS STARTTIME, TO_CHAR(O.ENDTIME, 'HH24:Mi:SS dd/mm/yyyy') AS ENDTIME, O.HALLID AS HALLID FROM OCCUPY O, HALL H, CINEMA C WHERE O.MOVIETITLE= '".$mName."' AND O.HALLID = H.HALLID AND H.NAMEOFCINEMA = C.NAME AND H.LOCATIONOFCINEMA = C.LOCATION AND C.NAME = '".$cName."'";
    $stid = oci_parse ($dbh,$sql); 
    oci_execute($stid, OCI_DEFAULT);

    echo "[";
    $startBit = 1;
	while($row = oci_fetch_array($stid)){
		if($startBit != 1){
			echo ',';
		}
		$startBit = 0;
		echo '{"startTime": "'.$row['STARTTIME'].'", "endTime": "'.$row['ENDTIME'].'", "hallID": "'.$row['HALLID'].'"}';		
	}
	echo "]";
	oci_free_statement($stid);
	oci_close($dbh);
?>