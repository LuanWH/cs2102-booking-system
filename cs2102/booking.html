<!DOCTYPE html>      
<html>   

  <head>

    <title>Ticket Booking</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>

  </head>
  <body>
    <div class="table-responsive">
      <font style = "font-size:20px">Book Your Tickets</font>
      <form>
        <p>User Name: <input type="text" name="UserName" id="UserName"></p>  
        <select id="Cinema"> 
          <option value="">Select Cinema</option>
        </select>
        <div id = "CinemaMsgContainer"></div>
        <br>

        <select id="Movie"> 
          <option value="">Select Movie</option>
        </select>
        <div id = "MovieMsgContainer"></div>
        <br>

        <select id="Timeslot"> 
          <option value="">Select Timeslot</option>
        </select>
        <div id = "TimeslotMsgContainer"></div>
        <br>        

        <input type="submit" name="formSubmit" value="Book" > 
      </form>
    </div>
    <script type="text/javascript">

      function fetchTimeSlots(cinemaName, movieTitle){
        if(cinemaName != null && cinemaName != "" &&
           movieTitle != null && movieTitle != ""){
          $.ajax({
            url:'fetchTimeSlots.php',
            type: 'post',
            data: {'cinemaName': cinemaName,
                   'movieTitle': movieTitle},
            success: function (response) {
              alert(response);
              $('#Timeslot').empty();
              $('#Timeslot').html('<option value=\""\"">Select Timeslot</option>');
              $('#Timeslot').append(response);
            },
            error: function () {
              $('#Timeslot').empty();
              $('#TimeslotMsgContainer').empty();
              $('#Timeslot').html('<option value=\""\"">Select Timeslot</option>');
              $('#TimeslotsgContainer').html('<p>Error when fetching timeslot data.</p>');
            }
          });           
        }
      }

      function fetchMovies(cinemaName) {
        if(cinemaName != null && cinemaName != ""){
          $.ajax({
            url:'fetchMovies.php',
            type: 'post',
            data: {'cinemaName': cinemaName},
            success: function (response) {
              alert(response);
              $('#Movie').empty();
              $('#Movie').html('<option value=\""\"">Select Movie</option>');
              $('#Movie').append(response);
            },
            error: function () {
              $('#Movie').empty();
              $('#MovieMsgContainer').empty();
              $('#Movie').html('<option value=\""\"">Select Movie</option>');
              $('#MovieMsgContainer').html('<p>Error when fetching cinema ' + cinemaName + ' movie data.</p>');
            }
          });          
        }
        return true;
      }

      function fetchCinemas() {


          $.ajax({
            url:'fetchCinemas.php',
            dataType: 'text',
            success: function (response) {
              alert("Success!!"+response);
              $('#Cinema').empty();
              $('#Cinema').html('<option value=\""\"">Select Cinema</option>');
              $('#Cinema').append(response);
            },
            error: function (ignore0, ignore1, ignore2) {
              alert("Error!!");
              $('#Cinema').empty();
              $('#CinemaMsgContainer').empty();
              $('#Cinema').html('<option value=\""\"">Select Cinema</option>');
              $('#CinemaMsgContainer').append('<p>Error when fetching cinema data.</p>');
            }
          });                
        }

      $(document).ready(function(){
        fetchCinemas();
        $( "#Cinema" ).change(function() {
          var selectedCinema = $('#Cinema').val();
          alert(selectedCinema);
          fetchMovies(selectedCinema);
        });
      });
    </script>    
  </body> 

</html>            