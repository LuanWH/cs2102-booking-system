
<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');

  if($_POST["UserName"]==null&&$_POST["UserID"]==null){
    echo "alert(\"Please Enter User Name or User ID!\");";

  }
  if( $_POST["UserName"] || $_POST["UserID"] ){
    $sql = "SELECT DISTINCT * from TICKET WHERE UID = ".$_POST["UserID"];
    $stid = oci_parse ($dbh,$sql);
    oci_execute($stid,OCI_DEFAULT);
    $nrows = oci_fetch_all($stid, $results);
    if($nrows == 0){
      echo "Sorry, you havenot book any ticket yet, start ".
            "<p> <a href=\"main.html/\">Book Now !</a>
            </p>" ;
      return;
    }
    foreach ($results as $key => $value) {
      echo  "<tr>". 
            "<td>".$key[""]."</td>".
            "<td>".$key[""]."</td>".
            "<td>".$key[""]."</td>".
            "<td>".$key[""]."</td>".
            "<td>".$key[""]."</td>".
            "</tr>";
          }

    // while($row = oci_fetch_array($stid,oci_n){
    // echo 
    // } 
  }
  oci_free_statement($stid);
?>
          