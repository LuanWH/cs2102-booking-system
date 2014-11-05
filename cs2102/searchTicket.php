
<!--
CSS: <div class= \"UserInfoHeader\">
 -->

<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');
?>
    
      
<?php
  if($_POST["UserName"]==null&&$_POST["UserID"]==null){
    echo "alert(\"Please Enter User Name or User ID!\");";

  }
  if( $_POST["UserName"] || $_POST["UserID"] ){
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
  oci_free_statement($stid);
?>
          