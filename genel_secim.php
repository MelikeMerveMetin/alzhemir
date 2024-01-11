<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <title>Hello, world!</title>
  </head>
  <body>
  <?php
             include "baglanti.php";
             $id = $_GET['id'];

            ?>

<div class="container">
   <div class="row"> <div class="col-md-12 mt-5 mx-auto"><h3>LÜTFEN TEST SEÇİNİZ...</h3></div></div>
            <div class="row mx-auto">
                <div class="col-md-4 mx-auto text-center">
<form action="genel_test.php" method="post">
<?php
$rows = $conn->query("SELECT COUNT(DISTINCT test_adi) FROM genel_test_sorulari");
$count = $rows->fetchColumn(); 

for($i=1;$i<=$count;$i++){
    ?>
    <div class="row">
                              <div class="col-md-8">
    <a href="genel_test.php?test_no=<?php echo $i;?>&id=<?php echo $id;?>" class="btn btn-danger mt-4"><?php echo $i;?>. Genel Testi Başlat</a>
   </div> </div>   <?php
}

?>
                            
                                
                             
                    </form>        </div>
</div></div>      


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>