
<html>
<head> <title>Movies are your friends : ) </title> </head>
<body>
<table>
<tr> <td colspan="2" style="background-color:#FFA500;"> 
<h1> Movie Catalog</h1>
</td> </tr>


<?php
putenv('ORACLE_HOME=/oraclient');
$dbh = ocilogon ('A0119397','crse1410',sid3);
?>

<tr>
<td style="background-color:#eeeeee;"> 
<form>
Title: <input type="text" name="Title" id="Title">
<select name="Language"> <option value="">Select Language</option> 
<?php
 	$sql = "SELECT DISTINCT language FROM book";
 	$stid = oci_parse ($dbh,$sql);
 	oci_execute($stid,OCI_DEFAULT);
	while($row = oci_fetch_array($stid)){
 	echo"<option value =\"".$row["LANGUAGE"]."\">".$row["LANGUAGE"]."</option><br>";
 	}
 	oci_free_statement($stid);
?>
</select>
<input type="radio" name="Format" id="Format1" value="hardcover">hardcover 
<input type="radio" name="Format" id="Format2" value="paperback">paperback
<input type="submit" name="formSubmit" value="Search" > 
</form>



<?php 
if(isset($_GET['formsubmit'])){
	$sql = "SELECT Title,Authors From Book WHERE Title like '%".$_GET['Title']."%' 
	AND Language ='".$_GET['Language']."'
	AND Format = '".$GET['Format']."'";
	
	echo "<b>SQL: </b>".$sql."<br><br>";
	$stid = oci_parse($dbh, $sql);
	oci_execute($stid, OCI_DEFAULT);
	echo "<table border=\"1\" > <col width=\"75%\"> <col width=\"25%\"><tr><th>Title</th><th>Authors</th></tr>";
	while($row = oci_fetch_array($stid)){echo "<tr>";
	echo "<td>" . $row[0] . "</td>"; 
	echo "<td>" . $row[1] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
	￼oci_free_statement($stid);	
	
}

?>
</td> </tr>

<?php
oci_close();
?>



<tr>
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; CS2102 </td> </tr>
</table>
</body> 
</html>


