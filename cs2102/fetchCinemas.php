
<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');

  $sql = "SELECT DISTINCT name FROM cinema";
  $stid = oci_parse ($dbh,$sql);
  oci_execute($stid,OCI_DEFAULT);
  while($row = oci_fetch_array($stid)){
    echo "<option value =\"".$row["NAME"]."\">".$row["NAME"]."</option><br>"; 
  }
  oci_free_statement($stid);
  oci_close($dbh);
?>
        