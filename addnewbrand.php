<?php
 session_start();
  $host = "localhost";
   $user = "root";
   $password = "";
   $database = "dbkeybest";

  $conn = new mysqli($host, $user, $password, $database);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } ?>
  <html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
.brand {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 19px 29px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

#brand1 {
    background-color: white; 
    color: black; 
    border: 2px solid #555555;
}

#brand1:hover {
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
}

#brand2 {
    background-color: white; 
    color: black; 
    border: 2px solid #555555;
}

#brand2:hover {
    background-color: #008CBA;
    color: white;
     text-decoration: none;
}
#brand3 {
    background-color: white; 
    color: black; 
    border: 2px solid #555555;
}
#brand3:hover {
    background-color: #f44336;
    color: white;
     text-decoration: none;
}
#brand4 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}
#brand4:hover {
  background-color: #008000;
  color: white;
   text-decoration: none;
}
  
#brand5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}
#brand5:hover {
    background-color: #663399;
    color: white;
     text-decoration: none;
}
#brand6 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

#brand6:hover {
    background-color: #800080;
    color: white;
     text-decoration: none;
}
#brand7 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

#brand7:hover {
    background-color: #C71585;
    color: white;
     text-decoration: none;
}
#brand8 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

#brand8:hover {
    background-color: #DDA0DD;
    color: white;
     text-decoration: none;
}
#brand9 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

#brand9:hover {
    background-color: #FF69B4;
    color: white;
     text-decoration: none;
}
#brand10 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

#brand10:hover {
    background-color: #FF00FF;
    color: white;
     text-decoration: none;
}
#brand11 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

#brand11:hover {
    background-color: #FF8C00;
    color: white;
     text-decoration: none;
}
.main{
  display: flex;
}

</style>

</head>


<body>
<h1>Please Select brand to add new shirt</h1>
<?php
  // use prepared statment to insert data
$sql = "SELECT * FROM category";
$result = $conn->query($sql);
$i =0;
$output ="";
$shirt_brand =['','adidas','nike','gucci','prada','supreme','tommy_hilfiger','versace','diesel','hugo_boss','under_armour','puma'];
if ($result->num_rows > 0) {
    // output data of each row
   $output.="<div class='main'>"; 
    while($row = $result->fetch_assoc()) {
      $i++;
        $output.="
              
            <a href='' class='brand' id='brand".$i."'>".$row['brand']." </a><br>
        ";
        $output.="
                                <script>
                                        $(document).ready(function(){
                                          $('#brand".$i."').click(function(){
                                              $('#brand".$i."').attr('href','http://localhost:8082/4Shops/Addnew.php?sh_brand=".$shirt_brand[$i]."');
                                          })
                                        });
                                </script>
                              
        ";

    }
    $output.= "</div>";
} else {
    echo "0 results";
}
print($output);
$conn->close();
?>
</script>
</body>
</html>