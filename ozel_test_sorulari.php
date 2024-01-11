<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <title>Özel Testi</title>
    </head>
    <body><?php
             include "baglanti.php";
             if($_GET){
             $id = $_GET['id'];
            ?>
        <div class="container">
            
            <div class="row mx-auto loga">
                <div class="col-md-8 mx-auto">
                    <form action="ozel_test_sorulari.php" class="mt-5" method="post" enctype="multipart/form-data">
                        <?php
                       
                        $rows = $conn->query("SELECT * FROM ozel_test WHERE kullanici_id=$id");
                        $soru_no = 1;
                        
                      
                        foreach ($rows as $row) { ?>

                        <label class="mt-3">
                            <h5 style="color: red;">
                                SORU
                                <?php echo $soru_no; ?>
                                :
                                <?php  ?>
                            </h5>
                        </label>
                        <label>
                            <?php echo $row["soru"];?>
                        </label>
                        <br />
                       
                            <?php
              
                                      ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="<?php echo $row["id"];?>" id="exampleRadios1" value="<?php echo $row["a"];?>" />
                            <label class="form-check-label" for="exampleRadios1">
                                <?php echo $row["a"];?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="<?php echo $row["id"];?>" id="exampleRadios1" value="<?php echo $row["b"];?>" />
                            <label class="form-check-label" for="exampleRadios1">
                                <?php echo $row["b"];?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="<?php echo $row["id"];?>" id="exampleRadios1" value="<?php echo $row["c"];?>" />
                            <label class="form-check-label" for="exampleRadios1">
                                <?php echo $row["c"];?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="<?php echo $row["id"];?>" id="exampleRadios1" value="<?php echo $row["d"];?>" />
                            <label class="form-check-label" for="exampleRadios1">
                                <?php echo $row["d"];?>
                            </label>
                        </div>
                        <?php 
                       $soru_no++;  }?>
                                
                       <input type="hidden" name="id" value="<?php echo $id;?>">  
                           
                                 
                                
                            
                        
              
                        <button type="submit" class="btn btn-success mb-3 mt-3">Testi Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
<?php } 

if($_POST){
    include("baglanti.php");
    $id=$_POST["id"];
    $i=1;     
    $dogru=0;
    $tur="Özel Test";
    $tarih=date("Y-m-d H:i:s");

    $rows = $conn->query("SELECT * FROM ozel_test WHERE kullanici_id=$id"); 
    foreach ($rows as $row) {
            if($_POST[$i]==$row["dogru"]) {
$dogru++;
            }  
            else{
                $dogru=$dogru;
            }      
  $i++;  
 }

 $sorgu = $conn->query("INSERT INTO sonuclar (kullanici_id,test_turu,tarih,dogru_sayisi) 
 values('$id','$tur','$tarih','$dogru')");
  if (isset($sorgu)) {
    header('Refresh:2; url=anasayfa.php');
}
}
?>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    --></body>
</html>
