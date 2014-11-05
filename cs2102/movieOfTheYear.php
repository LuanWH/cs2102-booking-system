<!DOCTYPE html>      
<html>   

  <head>
    <style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    th, td {
      padding: 15px;
    }
    </style>

    <title>Movie of the Year</title>
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
          <th>Movie Title</th>
          <th>Year</th>
          <th>Director</th>
          <th>Actors</th>
          <th>Description</th>
        </tr>
        
          <?php
            $sql = "SELECT DISTINCT * from MOVIE where YEAR = 2014 ";
            $stid = oci_parse ($dbh,$sql);
            oci_execute($stid,OCI_DEFAULT);
            while($row = oci_fetch_array($stid)){
               echo "<tr>". 
                      "<td>".$row["TITLE"]."</td>".
                      "<td>".$row["YEAR"]."</td>".
                      "<td>".$row["DIRECTOR"]."</td>".
                      "<td>".$row["ACTORS"]."</td>".
                      "<td>".$row["DESCRIPTION"]."</td>".
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