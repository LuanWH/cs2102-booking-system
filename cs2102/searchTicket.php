
<!--
CSS: <div class= \"UserInfoHeader\">
 -->

<?php
  putenv('ORACLE_HOME=/oraclient');
  $dbh = ocilogon ('A0119541','crse1410','sid3');
?>
    
      
<?php
  if($_POST["UserID"]==null){
    echo '<p>Please Enter User ID!</p>';
  }
  if($_POST["UserID"] ){
      $sql = "select T.SUBSCRIBERID,S.USERNAME,O.MOVIETITLE ,Cn.NAME ,Cn.LOCATION,H.HALLID,T.STARTTIME,T.ENDTIME 
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
               "User Name:". $row["USERNAME"]."<br> </div>";
          do {
          echo "
            <table style = \"width:100%\">
              <tr>
                <th>Movie Title  </th>
                <th>Cinema Name  </th> 
                <th>Cinema Location  </th>
                <th>Hall ID  </th>
                <th>Start Time  </th>
                <th>End Time  </th>
              </tr>
              <tr> 
                <td>".$row["MOVIETITLE"]."</td>
                <td>".$row["NAME"]."</td>
                <td>".$row["LOCATION"]."</td>
                <td>".$row["HALLID"]."</td>
                <td>".$row["STARTTIME"]."</td>
                <td>".$row["ENDTIME"]."</td>
              </tr>
            </table>";
          } while ($row = oci_fetch_array ($stid, OCI_BOTH));
        } 
      else {
          echo "Sorry, you have not registered or you havenot book any ticket yet, start ".
          "<p> <a href=\"booking.php\">Book Now !</a>
          </p>" ;
        return;
      }  

}

?>
          