<!DOCTYPE html>      
<html>   

  <head>

    <title>Ticket Booking</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- PHP Script -->
    <?php
      putenv('ORACLE_HOME=/oraclient');
      $dbh = ocilogon ('A0119541','crse1410','sid3');
      //$dbh = oci_pconnect("a0119541", "crse1410", "sid3.comp.nus.edu.sg");
    ?>

  </head>
  <body>
    <div class="table-responsive">
      <font style = "font-size:20px">Book Your Tickets</font>
      <form>
        <p>User Name: <input type="text" name="UserName" id="UserName"></p>  
        <select name="Cinema"> 
          <option value="">Select Cinema</option>
          <?php
            $sql = "SELECT DISTINCT name FROM cinema";
            $stid = oci_parse ($dbh,$sql);
            oci_execute($stid,OCI_DEFAULT);
            while($row = oci_fetch_array($stid)){
              echo "<option value =\"".$row["NAME"]."\">".$row["NAME"]."</option><br>"; 
            }
            oci_free_statement($stid);
          ?>
        </select>
        <input type="radio" name="Format" id="Format1" value="hardcover">hardcover 
        <input type="radio" name="Format" id="Format2" value="paperback">paperback
        <input type="submit" name="formSubmit" value="Search" > 
      </form>
    </div>
  </body> 

  <?php
    oci_close($dbh);
  ?>    

</html>            