
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
               "User Name:". $row["USERNAME"]."<br> </div>
               <table style = \"width:100%\">";
          echo  "<tr>
                <th><p class=\"tdp\">Movie Title      </p></th>
                <th><p class=\"tdp\">Cinema Name      </p></th> 
                <th><p class=\"tdp\">Cinema Location  </p></th>
                <th><p class=\"tdp\">Hall ID          </p></th>
                <th><p class=\"tdp\">Start Time       </p></th>
                <th><p class=\"tdp\">End Time         </p></th>
                </tr>";
          do {
          echo 
            
              "<tr> 
                <td><p class=\"tdp\">".$row["MOVIETITLE"]."</p></td>
                <td><p class=\"tdp\">".$row["NAME"]."</p></td>
                <td><p class=\"tdp\"><p class=\"tdp\">".$row["LOCATION"]."</p></td>
                <td><p class=\"tdp\">".$row["HALLID"]."</p></td>
                <td><p class=\"tdp\">".$row["STARTTIME"]."</p></td>
                <td><p class=\"tdp\">".$row["ENDTIME"]."</p></td>
              </tr>";
          } while ($row = oci_fetch_array ($stid, OCI_BOTH));
          echo " </table>";
        } 
      else {
          echo "Sorry, you have not registered or you havenot book any ticket yet, start ".
          "<p> <a href=\"booking.php\">Book Now !</a>
          </p>" ;
        return;
      }  

}

?>
          