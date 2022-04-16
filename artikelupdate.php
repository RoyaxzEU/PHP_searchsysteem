<?php
include 'dbcon.php';
$idd = $_GET["edit"];
?>
<!DOCTYPE html>
		
<head>	
	<meta charset="UTF-8">
	<title>Urenregistratie</title>	
    <link href="style.css" rel="stylesheet" type="text/css">		
</head>

<div class="content">
<h1> ARTIKELEN VOORRAAD STUTIS WIJZIGEN</h1>

<table>
  	<tr>
		<th>ID</th>
		<th>naam</th>
		<th>aantal</th>
		<th>Prijs</th>
		<th>categorie</th>
		<th>Op voorraad ?</th>
	</tr>

<!-- GEGEVENS VAN HET PRODUCT WAARVAN DE VOORRAAD STATUS VAN VERANDERD MOET WORDEN !-->

            <?php
          
             $sql="SELECT id, naam, aantal, prijs, categorie, voorraad  FROM producten WHERE id = $idd"; 
             $result = mysqli_query($conn, $sql);
        
                while($row = mysqli_fetch_assoc($result)) {
                           
                    echo 
                            "<tr> 
                                <td> ". $row["id"] . "</td>
                                <td> ". $row["naam"] ."</td> 
                                <td> ". $row["aantal"] ."</td> 
                                <td> ". $row["prijs"] ."</td> 
                                <td> ". $row["categorie"] ."</td> 
                                <td> ". $row["voorraad"];
                            }
                            
?>

<!-- DROPDOWN MENU !-->
<form action="" method="POST" >

    <select name="wijzig" id="wijzig">
            <option value="JA">JA</option>
            <option value="NEE">NEE</option>
    </select>
            <button><input type="submit" name="sub-wijzig"></button>
</form>

<!-- UPDATE ARTIKEL !-->
<?php
if (isset($_POST['sub-wijzig'])) {   

$voorraad = $_POST['wijzig'];
$sql = "UPDATE producten SET voorraad='$voorraad' WHERE id='$idd'";

            if ($conn->query($sql) === TRUE) {
                echo"De voorraad status is gewijzigd naar: ";
                echo  $_POST['wijzig'];
            } else {
            echo "Error updating record: " . $conn->error;
            }
}
?>

</td>
</tr>

<a href="http://localhost/aa/project/voorraad.php" target="_blank">Terug naar voorraad overzicht</a> 
</div>