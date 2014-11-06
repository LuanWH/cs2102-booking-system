
<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');
  //$dbh = oci_pconnect("a0119541", "crse1410", "sid3.comp.nus.edu.sg");
  $userID = $_POST["userID"];
  $cName = $_POST["cinemaName"];
  $mName = $_pOST["movieName"];
  $sTime = $_POST["startTime"];
  $eTime = $_POST["endTime"];
  $hallID = $_POST["hallID"];
  $sql = "INSERT INTO TICKET(SUBSCRIBERID, STARTTIME, ENDTIME, HALLID) VALUES(".$userID.",TO_DATE('".$sTime."', 'HH24:Mi:SS dd/mm/yyyy'),TO_DATE('".$eTime."', 'HH24:Mi:SS dd/mm/yyyy'),".$hallID.")";
  echo $sql;
  $stid = oci_parse ($dbh,$sql); 
  oci_execute($stid, OCI_DEFAULT);
  oci_free_statement($stid);
  oci_close($dbh);
?>           