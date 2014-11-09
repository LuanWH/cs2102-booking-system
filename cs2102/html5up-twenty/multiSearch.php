<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');
  if($_POST["TITLE"]==null&&
     $_POST["DIRECTOR"]==null&&
     $_POST["ACTORS"]==null&&
     $_POST["YEAR"]==null
     ){
    echo "noInput";
  }
  else{
      $sql = "SELECT * FROM MOVIE WHERE TITLE LIKE '%".$_POST["TITLE"]."%' AND DIRECTOR LIKE '%".
      $_POST["DIRECTOR"]."%' AND ACTORS LIKE '%".$_POST["ACTORS"]."%' AND YEAR=".$_POST["YEAR"].";";
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
          