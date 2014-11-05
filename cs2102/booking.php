<!DOCTYPE html>      
<html>   

  <head>

    <title>Ticket Booking</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <!-- PHP Script -->
    <?php
      putenv('ORACLE_HOME=/oraclient');
      $dbh = ocilogon ('A0119541','crse1410','sid3');
      //$dbh = oci_pconnect("a0119541", "crse1410", "sid3.comp.nus.edu.sg");
    ?>

    <script>
      $(document).ready(function(){
        $( "#Cinema" ).change(function() {
          var selectedCinema = $('#Cinema').val();
        });
      });

      function fetchCinema(name) {
        if(name != null && name != ""){
          $.ajax({
            url:'cinema.php',
            complete: function (response) {
              $('#CinemaContainer').empty();
              $('#CinemaContainer').html(response.responseText);
            },
            error: function () {
              $('#CinemaContainer').empty();
              $('#CinemaMsgContainer').empty();
              $('#CinemaMsgContainer').html('<p>Error when fetching cinema ' + name + 'data.</p>');
            }
          });          
        }
        return false;
      }

      function fetchMovie() {
         $.ajax({
            url:'db.php',
            complete: function (response) {
                $('#output').html(response.responseText);
            },
            error: function () {
                $('#output').html('Bummer: there was an error!');
            }
        });
    </script>

  </head>
  <body>
    <div class="table-responsive">
      <font style = "font-size:20px">Book Your Tickets</font>
      <form>
        <p>User Name: <input type="text" name="UserName" id="UserName"></p>  
        <select name="Cinema"> 
          <option value="">Select Cinema</option>
          <div id = "CinemaContainer">
            <?php
              $sql = "SELECT DISTINCT name FROM cinema";
              $stid = oci_parse ($dbh,$sql);
              oci_execute($stid,OCI_DEFAULT);
              while($row = oci_fetch_array($stid)){
                echo "<option value =\"".$row["NAME"]."\">".$row["NAME"]."</option><br>"; 
              }
              oci_free_statement($stid);
            ?>
          </div>
        </select>
        <div id = "CinemaMsgContainer"><div>
        <br>

        <select name="Movie"> 
          <option value="">Select Movie</option>
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

        <input type="submit" name="formSubmit" value="Search" > 
      </form>
    </div>
  </body> 

  <?php
    oci_close($dbh);
  ?>    

</html>            