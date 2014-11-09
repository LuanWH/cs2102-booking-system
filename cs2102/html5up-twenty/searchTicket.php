<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');
  if($_POST["UserID"]==null){
    echo "noInput";
  }
  if($_POST["UserID"] ){
      $sql = "select T.SUBSCRIBERID,S.USERNAME,O.MOVIETITLE ,Cn.NAME ,Cn.LOCATION,H.HALLID,T.STARTTIME,T.ENDTIME 
             from Ticket T , Occupy O, Subscriber S, Cinema Cn, Hall H
             where 
             (T.STARTTIME = O.STARTTIME AND T.ENDTIME = O.ENDTIME AND T.HALLID = O.HALLID)
             AND (H.NAMEOFCINEMA  = Cn.NAME AND H.LOCATIONOFCINEMA = Cn.LOCATION)
             AND T.SUBSCRIBERID = S.SUBSCRIBERID
             AND H.HALLID = O.HALLID
             AND S.SUBSCRIBERID = ".$_POST["UserID"];
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
                "Movie": "'.$row['MOVIETITLE'].
                '", "Cinema": "'.$row['NAME'].
                '", "Location": "'.$row['LOCATION'].
                '", "Hall": "'.$row['HALLID'].
                '", "Start": "'.$row['STARTTIME'].
                '", "End": "'.$row['ENDTIME'].'"}';
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
          