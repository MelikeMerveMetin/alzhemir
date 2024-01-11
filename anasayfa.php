<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />
        <title>Anasayfa</title>
    </head>
    <body>
        <div class="container">
            <div class="row mt-4 bg-danger">
                <div class="col-md-5 mt-2" style="font-size: 18px; color: white;">
                    <?php
          include "baglanti.php";
                           session_start();
                           echo "MERHABA  ";
                           echo $_SESSION['kullanici_adi'];
                           echo "  ";
                           echo $_SESSION['kullanici_soyadi'];
                           $id=$_SESSION['kullanici_id'];
        
   ?>
                </div>
                <div class="col-md-2"><a class="btn btn-danger" href="ozel_test.php?id=<?php echo $id;?>" style="text-decoration: none; float: right; font-size: 18px; padding-right:0px;">Özel Test Ekleme</a></div>
                <div class="col-md-3"><a class="btn btn-danger" href="kullanici_guncelle.php?id=<?php echo $id;?>" style="text-decoration: none; float: right; font-size: 18px;">Bilgilerimi Güncelle</a></div>
                <div class="col-md-2">
                    <a class="btn btn-danger" href="cikis.php" style="text-decoration: none; font-size: 18px;">ÇIKIŞ YAP <i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-md-4 mx-auto text-center log">
                <div class="row mx-auto">
                    <a href="uyeler.php" class="btn btn-danger mt-4">Aile Üyesi Ekle</a>
                    <a href="aile_testi.php?id=<?php echo $id;?>" class="btn btn-danger mt-4">Aile Üyesi Testini Başlat</a>
                    <a href="ozel_test_sorulari.php?id=<?php echo $id;?>" class="btn btn-danger mt-4">Özel Testi Başlat</a>
                    <a href="genel_secim.php?id=<?php echo $id;?>" class="btn btn-danger mt-4">Genel Testi Başlat</a>
                    <a href="sonuclar.php?id=<?php echo $id;?>" class="btn btn-danger mt-4 mb-4">Sonuçlarım</a>
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
