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
</head>
<?php
  // use prepared statment to insert data
$sql = "SELECT * FROM category";
$result = $conn->query($sql);
$i =0;
$output ="";
$shirt_brand =['','adidas','nike','gucci','prada','supreme','tommy_hilfiger','versace','diesel','hugo_boss','under_armour','puma'];
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $i++;
        $output.="
            <a href='' id='brand".$i."'>".$row['brand']." </a><br>
        ";
        $output.="
                                <script>
                                        $(document).ready(function(){

                                          $('#brand".$i."').click(function(){
                                              $('#brand".$i."').attr('href','http://localhost:8082/4Shops/Addnew.php?sh_brand=".$shirt_brand[$i]."');
                                                alert('".$shirt_brand[$i]."')
                                          })
                                        });


                                </script>
        ";
    }
} else {
    echo "0 results";
}
print($output);
$conn->close();
?>


<body>
<!--   <a href="" id='nike'>Nike</a>
<a href="" id='gucci'>Gucci</a>
<a href="" id= 'prada'>Prada</a>
<a href="" id='supreme'>Supreme</a>
<a href="" id='tommy_hilfiger'>Tommy Hilfiger</a>
<a href="" id='versace'>Versace</a>
<a href="" id='diesel'>Diesel</a>
<a href="" id='hugo_boss'>Hugo Boss</a>
<a href="" id='under_armour'>Under Armour</a>
<a href="" id= 'puma'>Puma SE</a> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
$(document).ready(function(){
  $(                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    )
})
</script>


<script>
function name_click(){
value_select = document.getElementById("id_select").value;
}
</script>
</body>
</html>