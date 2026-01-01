

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <form action="">
    <h1>infos contact</h1>
   
     <p> <input type="text" name="" id="form" placeholder="entrer votre prenom">prenom </p>
    <p> <input type="text" name="" id="form" placeholder="entrer votre nom">nom </p>
    <p> <input type="date" name="" id="form" placeholder="entrer votre date de naissance"> date de naissance</p>
    <p> <input type="tel" name="" id="form" placeholder="entrer votre numero">numero</p>
     <input type="submit" value="Enregistrer" >

</form>
<body>
  <h1>listes Des contacts</h1> 
</body>
</html>
<?php
$host = "localhost";
$dbname="tp1";
$argc=["#","prenom","nom","date naissance","telephone"];
 echo "<table border =1>";
     echo "<tr>";
    foreach ($argc as $arg){
          echo "<th> $arg</th>";
   }
     echo "</tr>";
     echo "<tr>";
     for($i=0;$i<5;$i++){
        echo "<td></td>";
     }
  echo "</tr>";
 echo "</table>";








?>