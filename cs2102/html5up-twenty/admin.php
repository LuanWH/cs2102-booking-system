
<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');
  //$dbh = oci_pconnect("a0119541", "crse1410", "sid3.comp.nus.edu.sg");
  $id = $_POST["ID"];
  $sTime = $_POST["Start"];
  $eTime = $_POST["End"];
  $hallID = $_POST["Hall"];
  $sql = "DELETE FROM TICKET WHERE SUBSCRIBERID = ".$id." AND STARTTIME = TO_DATE('".$sTime."', 'HH24:Mi:SS dd/mm/yyyy') AND ENDTIME = TO_DATE('".$eTime."', 'HH24:Mi:SS dd/mm/yyyy') AND HALLID = ".$hallID;
  echo $sql;
  $stid = oci_parse ($dbh,$sql); 
  oci_execute($stid, OCI_DEFAULT);
  oci_free_statement($stid);
  oci_commit ($dbh);
  oci_close($dbh);
?>           