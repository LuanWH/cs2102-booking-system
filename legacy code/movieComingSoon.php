<!DOCTYPE html>      
<html>   

  <head>
    <style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
   
    .tdp{
      margin-left: 5px;
    }
    </style>

    <title>Movie Coming Soon</title>
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
      <center>
        <table width ="100%">
        
        <tr>
          <th><p class = "tdp">Movie Title </p></th>
          <th><p class = "tdp">Director</p></th>
          <th><p class = "tdp">Actors</p></th>
          <th><p class = "tdp">Description</p></th>
        </tr>
        
          <?php
            $sql = "SELECT DISTINCT * from MOVIE where YEAR = 2015 ";
            $stid = oci_parse ($dbh,$sql);
            oci_execute($stid,OCI_DEFAULT);
            while($row = oci_fetch_array($stid)){
               echo "<tr>". 
                      "<td><p class = \"tdp\">".$row["TITLE"]."</p></td>".
                      "<td><p class = \"tdp\">".$row["DIRECTOR"]."</p></td>".
                      "<td><p class = \"tdp\">".$row["ACTORS"]."</p></td>".
                      "<td><p class = \"tdp\">".$row["DESCRIPTION"]."</p></td>".
                      "</tr>";
            }
            oci_free_statement($stid);
          ?>
         
        
      </table>
    </center>
    </div>
  </body> 

  <?php
    oci_close($dbh);
  ?>    

</html>            