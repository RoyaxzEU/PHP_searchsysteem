<?php
include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="nl">	
    <head>			
        <meta charset="UTF-8">
        <title>Urenregistratie</title>	
        <link href="style.css" rel="stylesheet" type="text/css">		
    </head>

<div class="content">
<h1> ARTIKELEN OVERZICHT </h1>


<!-- Zoekbalk -->

	<table>	
		<tr>
            <form action="voorraad.php" method="POST" >
            <td><input type="text" name="zoeken" placeholder="Zoek artikel"></td>
            <td><button><input type="submit" name="sub-zoeken"></button></td>
		</tr>		
	</table>
</form>


<table>
  	<tr>
		<th>ID</th>
		<th>naam</th>
		<th>aantal</th>
		<th>Prijs</th>
		<th>categorie</th>
		<th>Op voorraad?</th>
	</tr>

<!-- ZOEKBALK !-->
<?php
if (empty($_POST['zoeken'])) {            
    $sql="SELECT id, naam, aantal, prijs, categorie, voorraad  FROM producten "; 
}
    else {
        $search = $_POST['zoeken'];
        $sql = "SELECT * FROM producten WHERE naam LIKE '%$search%' or categorie LIKE '%$search%'";    
    }
    $result = mysqli_query($conn, $sql);


//
if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
               
        echo 
                "<tr> 
                    <td> ". $row["id"] . "</td>
                    <td> ". $row["naam"] ."</td> 
                    <td> ". $row["aantal"] ."</td> 
                    <td> ". $row["prijs"] ."</td> 
                    <td> ". $row["categorie"] ."</td> 
                    <td> ". $row["voorraad"] ?>
                    <a href="artikelupdate.php?edit=<?php echo $row['id'];?>"> Wijzig </a>
                    <?php 
                    "</td>
                    </tr>";
                }
} else {
    echo "Geen product beschikbaar";
}
mysqli_close($conn);
         
       ?>

</div>