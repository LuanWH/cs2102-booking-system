
<html>
<head> <title>Demo Online Book Catalog</title> </head>
<body>
<table>
<tr> <td colspan="2" style="background-color:#FFA500;"> <h1> Demo Book Catalog</h1>
</td> </tr>


<?php
putenv('ORACLE_HOME=/oraclient');
$dbh = ocilogon ('A0119397','crse1410',sid3);
?>

<tr>
<td style="background-color:#eeeeee;"> 
<form>
Title: <input type="text" name="Title" id="Title">
<select name="Language"> <option value="">Select Language</option> </select>
<?php
 $sql = "SELECT DISTINCT language FROM book";
 $stid = oci_parse ($dbh,$sql);
 oci_execute($stid,OCI_DEFAULT);

 while($row = oci_fetch_array($stid)){
 	echo"<option value =\"".$row["LANGUAGE"]."\">".$row["LANGUAGE"]."</option><br>";
 	
 }
 
 oci_free_statement($stid);
?>

<input type="radio" name="Format" id="Format1" value="hardcover">hardcover <input type="radio" name="Format" id="Format2" value="paperback">paperback

<input type="submit" name="formSubmit" value="Search" > </form>

</td> </tr>


<?php
oci_close();
?>



<tr>
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; CS2102 </td> </tr>
</table>
</body> </html>


