
<!--
CSS: <div class= \"UserInfoHeader\">
 -->

<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');

  if($_POST["UserName"]==null&&$_POST["UserID"]==null){
    echo "alert(\"Please Enter User Name or User ID!\");";

  }
  if( $_POST["UserName"] || $_POST["UserID"] ){
<<<<<<< HEAD
      $sql = "select T.SUBSCRIBERID,S.USERNAME,O.MOVIETITLE AS MovieTile,Cn.NAME as CinemaName,Cn.LOCATION,H.HALLID,T.STARTTIME,T.ENDTIME 
      from Ticket T , Occupy O, Subscriber S, Cinema Cn, Hall H
      where 
      (T.STARTTIME = O.STARTTIME AND T.ENDTIME = O.ENDTIME AND T.HALLID = O.HALLID)
      AND (H.NAMEOFCINEMA  = Cn.NAME AND H.LOCATIONOFCINEMA = Cn.LOCATION)
      AND T.SUBSCRIBERID = S.SUBSCRIBERID
      AND S.SUBSCRIBERID = ".$_POST["UserID"];
  $stid = oci_parse ($dbh,$sql);
  oci_execute($stid,OCI_DEFAULT);
  if ($row = oci_fetch_array ($stid, OCI_BOTH)) {
          echo "<div class= \"UserInfoHeader\">User ID:".$row["SUBSCRIBERID"]."<br>".
               "User Name". $row["USERNAME"]."<br> </div>";
    do {
          echo "<tr>". 
          "<td>".$row["MovieTitle"]."</td>".
          "<td>".$row["CinemaName"]."</td>".
          "<td>".$row["LOCATION"]."</td>".
          "<td>".$row["HALLID"]."</td>".
          "<td>".$row["STARTTIME"]."</td>".
          "<td>".$row["ENDTIME"]."</td>".
          "</tr>";
    } while ($row = oci_fetch_array ($stmt, OCI_BOTH));
    } else {
          echo "Sorry, you havenot book any ticket yet, start ".
          "<p> <a href=\"main.html/\">Book Now !</a>
          </p>" ;
        return;
  }  

}
=======
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
>>>>>>> FETCH_HEAD
  oci_free_statement($stid);
?>
          