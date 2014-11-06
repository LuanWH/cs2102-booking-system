<!DOCTYPE html>      
<html>   

  <head>

    <title>Movie of the Year</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- PHP Script -->
    <?php
      putenv('ORACLE_HOME=/oraclient');
      $dbh = ocilogon ('A0119541','crse1410','sid3');
      //$dbh = oci_pconnect("a0119541", "crse1410", "sid3.comp.nus.edu.sg");
      $userID = $_POST["userID"];
      $cName = $_POST["cinemaName"];
      $mName = $_pOST["movieName"];
      $sTime = $_POST["startTime"];
      $eTime = $_POST]"endTime"];
      $hallID = $_POST["hallID"];
      $sql = "INSERT INTO TICKET(SUBSCRIBERID, STARTTIME, ENDTIME, HALLID) VALUES(".$userID.",TO_DATE('".$sTime."', 'dd/mm/yyyy'),TO_DATE('".$eTime."', 'dd/mm/yyyy'),".$hallID.")"
      $stid = oci_parse ($dbh,$sql); 
      oci_execute($stid, OCI_DEFAULT);
      oci_free_statement($stid);



    ?>

  </head>
  <body>
    <font style = "font-size:30px">Book Your Tickets</font>

  </body> 

  <?php
    oci_close($dbh);
  ?>    

</html>           