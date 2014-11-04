
<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');
?>
    
      
<?php
  if($_POST["UserName"]==null&&$_POST["UserID"]==null){
    echo "alert(\"Please Enter User Name or User ID!\");"

  }
  if( $_POST["UserName"] || $_POST["UserID"] ){
  $sql = "SELECT DISTINCT * from TICKET WHERE UID = ".$_POST["UserID"];
  $stid = oci_parse ($dbh,$sql);
  oci_execute($stid,OCI_DEFAULT);
  while($row = oci_fetch_array($stid)){
  echo 
  } 
}
  oci_free_statement($stid);
?>
          