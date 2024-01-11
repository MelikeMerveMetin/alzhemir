<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <title>Genel Test</title>
    </head>
    <body>
    <?php
             include "baglanti.php";
             $id = $_GET['id'];
             $test_no = $_GET['test_no'];

            ?>


        <div class="container">
            
            <div class="row mx-auto loga">
                <div class="col-md-8 mx-auto">
                    <form action="genel_kontrol.php?id=<?php echo $id;?>&test_no=<?php echo $test_no;?>" class="mt-5" method="post" enctype="multipart/form-data">
                        <?php
                       
                        $rows = $conn->query("SELECT * FROM genel_test_sorulari WHERE test_adi=$test_no");
                        $soru_no = 1;
                        $sql = $conn->query("SELECT COUNT(*) FROM genel_test_sorulari WHERE test_adi=$test_no");
                        $count = $sql->fetchColumn();
                        foreach ($rows as $row) { ?>

                        <label>
                            <h5 style="color: red;">
                                SORU
                                <?php echo $soru_no; ?>
                                :
                                <?php  ?>
                            </h5>
                        </label>
                        <label class="mt-5">
                            <?php echo "RESİMDEKİ NESNENİN ADI NEDİR?"; ?>
                        </label>
                        <br />
                        <label><img src="<?php echo $row["genel_resim"]; ?>" width=400px height=400px > </label>
                        <?php
                             
                             $secenek = $conn->query("SELECT dogru FROM genel_test_sorulari WHERE test_adi=$test_no ORDER BY rand() LIMIT 4");
                             
                             $dizi = [];
                             foreach ($secenek as $se) {
                                 $e = $se["dogru"];
                                 array_push($dizi, $e);
                             }
                             
                             if (empty(in_array($row["dogru"], $dizi))) {
                                 array_pop($dizi);
                                 array_push($dizi, $row["dogru"]);
                                 shuffle($dizi);
                             }
                             $elemansayi = count($dizi);
                             
                             for ($i = 0; $i < $elemansayi; $i++) {
                             
                        ?>
                         
                        <div class="form-check mt-3">
                            <input class="form-check-input " type="radio" name="<?php echo $soru_no;?>" id="exampleRadios1" value="<?php echo $dizi["$i"]; ?>" />
                            <label class="form-check-label" for="exampleRadios1">
                                <?php echo $dizi["$i"];; ?>
                            </label>
                        </div>
                        <?php 
                        }
              
                                  $soru_no++;}
                        ?>
                  
                     
                        
                        <button type="submit" class="btn btn-success mb-3 mt-3">Testi Kaydet</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    --></body>
</html>
