<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');
  if($_POST["key"]==null){
    echo "noInput";
  }
  if($_POST["key"] ){
      $sql = "SELECT * FROM MOVIE WHERE TITLE LIKE '%".$_POST["key"]."%'";
      $stid = oci_parse ($dbh,$sql);
      oci_execute($stid,OCI_DEFAULT);
      $start = 1;
      if ($row = oci_fetch_array ($stid, OCI_BOTH)) {
          echo "[";
          do {
              if($start!= 1){
                echo ',';
              }
              $start = 0;
              echo '{
                "Title": "'.$row['TITLE'].
                '", "Year": "'.$row['YEAR'].
                '", "Actors": "'.$row['ACTORS'].
                '", "Director": "'.$row['DIRECTOR'].
                '", "Description": "'.$row['DESCRIPTION'].
                '", "Producer": "'.$row['PRODUCER'].'"}';
          } while ($row = oci_fetch_array ($stid, OCI_BOTH));
          echo "]";
        } 
      else {
        echo "false";
         
      }  

}
  // oci_free_statement($stid);
  // oci_close($dbh);
?>
          