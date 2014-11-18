/* Booking */
$sql = "INSERT INTO TICKET(SUBSCRIBERID, STARTTIME, ENDTIME, HALLID) VALUES(".$userID.",TO_DATE('".$sTime."', 'HH24:Mi:SS dd/mm/yyyy'),TO_DATE('".$eTime."', 'HH24:Mi:SS dd/mm/yyyy'),".$hallID.")";

/* Check User */
$sql = "SELECT COUNT(*) AS NUM FROM SUBSCRIBER WHERE SUBSCRIBERID = ".$cName;

/* Select Cinemas */
$sql = "SELECT DISTINCT name FROM cinema";

/* Select Movies from Cinemas */
$sql = "SELECT DISTINCT MOVIETITLE FROM OCCUPY, HALL WHERE OCCUPY.HALLID = HALL.HALLID AND HALL.NAMEOFCINEMA = '".$cName."'";

/* Select All Movies */
$sql = "SELECT DISTINCT * from MOVIE  ";

/* Select Timeslots from Movies */
 $sql = "SELECT DISTINCT TO_CHAR(O.STARTTIME, 'HH24:Mi:SS dd/mm/yyyy') AS STARTTIME, TO_CHAR(O.ENDTIME, 'HH24:Mi:SS dd/mm/yyyy') AS ENDTIME, O.HALLID AS HALLID FROM OCCUPY O, HALL H, CINEMA C WHERE O.MOVIETITLE= '".$mName."' AND O.HALLID = H.HALLID AND H.NAMEOFCINEMA = C.NAME AND H.LOCATIONOFCINEMA = C.LOCATION AND C.NAME = '".$cName."'";

/* Select Future Movies */
$sql = "SELECT DISTINCT * from MOVIE where YEAR > 2014 ";

/* Select Movies in 2014 */
$sql = "SELECT DISTINCT * from MOVIE where YEAR = 2014 ";

/* Select Movies with Multiple Parameters */
$sql = "SELECT * FROM MOVIE WHERE TITLE LIKE '%".$_POST["TITLE"]."%' AND DIRECTOR LIKE '%".$_POST["DIRECTOR"]."%' AND ACTORS LIKE '%".$_POST["ACTORS"]."%' AND YEAR=".$_POST["YEAR"];

/* Select Movies with Names */
$sql = "SELECT * FROM MOVIE WHERE TITLE LIKE '%".$_POST["key"]."%'";

/* Select Tickets */
$sql = "select T.SUBSCRIBERID,S.USERNAME,O.MOVIETITLE ,Cn.NAME ,Cn.LOCATION,H.HALLID,
              TO_CHAR(T.STARTTIME, 'HH24:Mi:SS dd/mm/yyyy') AS STARTTIME, TO_CHAR(T.ENDTIME, 'HH24:Mi:SS dd/mm/yyyy') AS ENDTIME
             from Ticket T , Occupy O, Subscriber S, Cinema Cn, Hall H
             where 
             (T.STARTTIME = O.STARTTIME AND T.ENDTIME = O.ENDTIME AND T.HALLID = O.HALLID)
             AND (H.NAMEOFCINEMA  = Cn.NAME AND H.LOCATIONOFCINEMA = Cn.LOCATION)
             AND T.SUBSCRIBERID = S.SUBSCRIBERID
             AND H.HALLID = O.HALLID
             AND S.SUBSCRIBERID = ".$_POST["UserID"];

/* Delete Tickets */
$sql = "DELETE FROM TICKET WHERE SUBSCRIBERID = ".$id." AND STARTTIME = TO_DATE('".$sTime."', 'HH24:Mi:SS dd/mm/yyyy') AND ENDTIME = TO_DATE('".$eTime."', 'HH24:Mi:SS dd/mm/yyyy') AND HALLID = ".$hallID;